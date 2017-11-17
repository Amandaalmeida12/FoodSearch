<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProfileMeis Controller
 *
 * @property \App\Model\Table\ProfileMeisTable $ProfileMeis
 *
 * @method \App\Model\Entity\ProfileMei[] paginate($object = null, array $settings = [])
 */
class ProfileMeisController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Menus']
        ];
        $profileMeis = $this->paginate($this->ProfileMeis);

        $this->set(compact('profileMeis'));
        $this->set('_serialize', ['profileMeis']);
    }

    /**
     * View method
     *
     * @param string|null $id Profile Mei id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $profileMei = $this->ProfileMeis->get($id, [
            'contain' => ['Users', 'Menus']
        ]);

        $this->set('profileMei', $profileMei);
        $this->set('_serialize', ['profileMei']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $profileMei = $this->ProfileMeis->newEntity();
        if ($this->request->is('post')) {
            $profileMei = $this->ProfileMeis->patchEntity($profileMei, $this->request->getData());
            if ($this->ProfileMeis->save($profileMei)) {
                $this->Flash->success(__('The profile mei has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The profile mei could not be saved. Please, try again.'));
        }
        $users = $this->ProfileMeis->Users->find('list', ['limit' => 200]);
        $menus = $this->ProfileMeis->Menus->find('list', ['limit' => 200]);
        $this->set(compact('profileMei', 'users', 'menus'));
        $this->set('_serialize', ['profileMei']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Profile Mei id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $profileMei = $this->ProfileMeis->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $profileMei = $this->ProfileMeis->patchEntity($profileMei, $this->request->getData());
            if ($this->ProfileMeis->save($profileMei)) {
                $this->Flash->success(__('The profile mei has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The profile mei could not be saved. Please, try again.'));
        }
        $users = $this->ProfileMeis->Users->find('list', ['limit' => 200]);
        $menus = $this->ProfileMeis->Menus->find('list', ['limit' => 200]);
        $this->set(compact('profileMei', 'users', 'menus'));
        $this->set('_serialize', ['profileMei']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Profile Mei id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $profileMei = $this->ProfileMeis->get($id);
        if ($this->ProfileMeis->delete($profileMei)) {
            $this->Flash->success(__('The profile mei has been deleted.'));
        } else {
            $this->Flash->error(__('The profile mei could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
