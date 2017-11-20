<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Images Controller
 *
 * @property \App\Model\Table\ImagesTable $Images
 *
 * @method \App\Model\Entity\Image[] paginate($object = null, array $settings = [])
 */
class ImagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Profiles']
        ];
        $images = $this->paginate($this->Images);

        $this->set(compact('images'));
        $this->set('_serialize', ['images']);
    }

    /**
     * View method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $image = $this->Images->get($id, [
            'contain' => ['Profiles']
        ]);

        $this->set('image', $image);
        $this->set('_serialize', ['image']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $image = $this->Images->newEntity();
        if ($this->request->is('post')) {
            if (!empty($this->request->data['photo']['name'])) {
                $fileName=$this->request->data['photo']['name'];
                $uploadPath=WWW_ROOT.'img/';
                $uploadFile=$uploadPath.$fileName;
                if (move_uploaded_file($this->request->data['photo']['tmp_name'],$uploadFile)) {
                    $this->request->data['photo']=$fileName;
                }

            }
            $image = $this->Images->patchEntity($image, $this->request->getData());
            if ($this->Images->save($image)) {
                $this->Flash->success(__('The image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The image could not be saved. Please, try again.'));
        }
        $profiles = $this->Images->Profiles->find('list', ['limit' => 200]);
        $this->set(compact('image', 'profiles'));
        $this->set('_serialize', ['image']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $image = $this->Images->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if (!empty($this->request->data['photo']['name'])) {
                $fileName=$this->request->data['photo']['name'];
                $uploadPath=WWW_ROOT.'img/';
                $uploadFile=$uploadPath.$fileName;
                if (move_uploaded_file($this->request->data['photo']['tmp_name'],$uploadFile)) {
                    $this->request->data['photo']=$fileName;
                }

            }
            
            $image = $this->Images->patchEntity($image, $this->request->getData());
            if ($this->Images->save($image)) {
                $this->Flash->success(__('The image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The image could not be saved. Please, try again.'));
        }
        $profiles = $this->Images->Profiles->find('list', ['limit' => 200]);
        $this->set(compact('image', 'profiles'));
        $this->set('_serialize', ['image']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $image = $this->Images->get($id);
        if ($this->Images->delete($image)) {
            $this->Flash->success(__('The image has been deleted.'));
        } else {
            $this->Flash->error(__('The image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
