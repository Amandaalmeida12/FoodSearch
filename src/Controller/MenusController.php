<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Menus Controller
 *
 * @property \App\Model\Table\MenusTable $Menus
 *
 * @method \App\Model\Entity\Menu[] paginate($object = null, array $settings = [])
 */
class MenusController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $menus = $this->paginate($this->Menus);

        $this->set(compact('menus'));
        $this->set('_serialize', ['menus']);
    }

    /**
     * View method
     *
     * @param string|null $id Menu id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $menu = $this->Menus->get($id, [
            'contain' => ['ProfileMenus']
        ]);

        $this->set('menu', $menu);
        $this->set('_serialize', ['menu']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $menu = $this->Menus->newEntity();
        if ($this->request->is('post')) {
            if (!empty($this->request->data['photo']['name'])) {
                $fileName=$this->request->data['photo']['name'];
                $uploadPath=WWW_ROOT.'img/';
                $uploadFile=$uploadPath.$fileName;
                if (move_uploaded_file($this->request->data['photo']['tmp_name'],$uploadFile)) {
                    $this->request->data['photo']=$fileName;
                }

            }
            $menu = $this->Menus->patchEntity($menu, $this->request->getData());
            $menu->user_id=$this->Auth->user('id');
            if ($this->Menus->save($menu)) {
                $this->Flash->success(__('The menu has been saved.'));

                return $this->redirect(['controller' => 'ProfileMenus', 'action' => 'add']);
            }
            $this->Flash->error(__('The menu could not be saved. Please, try again.'));
        }
        $this->set(compact('menu'));
        $this->set('_serialize', ['menu']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Menu id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $menu = $this->Menus->get($id, [
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
            $menu = $this->Menus->patchEntity($menu, $this->request->getData());
            if ($this->Menus->save($menu)) {
                $this->Flash->success(__('The menu has been saved.'));

                return $this->redirect(['controller'=>'ProfileMenus','action' => 'add']);
            }
            $this->Flash->error(__('The menu could not be saved. Please, try again.'));
        }
        $this->set(compact('menu'));
        $this->set('_serialize', ['menu']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Menu id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menu = $this->Menus->get($id);
        if ($this->Menus->delete($menu)) {
            $this->Flash->success(__('The menu has been deleted.'));
        } else {
            $this->Flash->error(__('The menu could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function isAuthorized($user)
    {
        if ($this->request->getParam('action')==='add') {
            return true;
        }
        if (in_array($this->request->getParam('action'), ['edit','delete'])) {
            $menuId=(int)$this->request->getParam('pass.0');
            if ($this->Menus->isOwnedBy($menuId,$user['id'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

}
