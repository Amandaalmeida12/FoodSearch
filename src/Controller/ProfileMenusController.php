<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * ProfileMenus Controller
 *
 * @property \App\Model\Table\ProfileMenusTable $ProfileMenus
 *
 * @method \App\Model\Entity\ProfileMenu[] paginate($object = null, array $settings = [])
 */
class ProfileMenusController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
     public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index','view','busca']);
    }

    public function index()
    {   
        $this->paginate = [
            'contain' => ['Profiles', 'Menus', 'Images']
        ];
        $profileMenus = $this->paginate($this->ProfileMenus);
        
        $this->set(compact('profileMenus'));
        $this->set('_serialize', ['profileMenus']);
    }

    /**
     * View method
     *
     * @param string|null $id Profile Menu id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $profileMenu = $this->ProfileMenus->get($id, [
            'contain' => ['Profiles', 'Menus', 'Images']
        ]);

        $this->set('profileMenu', $profileMenu);
        $this->set('_serialize', ['profileMenu']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $profileMenu = $this->ProfileMenus->newEntity();
        if ($this->request->is('post')) {
            $profileMenu = $this->ProfileMenus->patchEntity($profileMenu, $this->request->getData());
            $profileMenu->user_id =$this->Auth->user( 'id' ); 
            if ($this->ProfileMenus->save($profileMenu)) {
                $this->Flash->success(__('The profile menu has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The profile menu could not be saved. Please, try again.'));
        }
        $profiles = $this->ProfileMenus->Profiles->find('list', ['limit' => 200]);
        $menus = $this->ProfileMenus->Menus->find('list', ['limit' => 200]);
        $images = $this->ProfileMenus->Images->find('list', ['limit' => 200]);
        $this->set(compact('profileMenu', 'profiles', 'menus', 'images'));
        $this->set('_serialize', ['profileMenu']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Profile Menu id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $profileMenu = $this->ProfileMenus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $profileMenu = $this->ProfileMenus->patchEntity($profileMenu, $this->request->getData());
            if ($this->ProfileMenus->save($profileMenu)) {
                $this->Flash->success(__('The profile menu has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The profile menu could not be saved. Please, try again.'));
        }
        $profiles = $this->ProfileMenus->Profiles->find('list', ['limit' => 200]);
        $menus = $this->ProfileMenus->Menus->find('list', ['limit' => 200]);
        $images = $this->ProfileMenus->Images->find('list', ['limit' => 200]);
        $this->set(compact('profileMenu', 'profiles', 'menus', 'images'));
        $this->set('_serialize', ['profileMenu']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Profile Menu id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $profileMenu = $this->ProfileMenus->get($id);
        if ($this->ProfileMenus->delete($profileMenu)) {
            $this->Flash->success(__('The profile menu has been deleted.'));
        } else {
            $this->Flash->error(__('The profile menu could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function isAuthorized($user) 
    {
        if ($this->request->getParam('action')==='add') {
            return true;
        }
        if (in_array($this->request->getParam('action'),['edit','delete'])) {
            $profileMenuId=(int)$this->request->getParam('pass.0');
            if ($this->ProfileMenus->isOwnedBy($profileMenuId,$user['id'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }
    public function busca()
    {
       if ($this->request->is(['patch','post','put'])) {
           $cat_ids=$this->request->data;
           $profileMenus=$this->ProfileMenus->find('all')->Where(['id '=>$cat_ids])->toArray();
           
       }else{
            echo "Ops!";
       }
       $this->set('profileMenus', $profileMenus);
        $this->set('_serialize', ['profileMenus']);

    }
}
