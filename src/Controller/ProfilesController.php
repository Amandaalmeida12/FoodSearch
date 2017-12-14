<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Profiles Controller
 *
 * @property \App\Model\Table\ProfilesTable $Profiles
 *
 * @method \App\Model\Entity\Profile[] paginate($object = null, array $settings = [])
 */
class ProfilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['Profilesjson']);
    }
    public function mapa()
    {

    }
    public function Profilesjson()
    {
        $this->autoRender= false;
        $profiles=$this->Profiles->find()->select(['Profiles.title','Profiles.address','Profiles.lat','Profiles.lng']);
        $resultJ=json_encode($profiles);
        $this->response->type('json');
        $this->response->body($resultJ);
        return $this->response;
    }
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $profiles = $this->paginate($this->Profiles);

        $this->set(compact('profiles'));
        $this->set('_serialize', ['profiles']);
    }

    /**
     * View method
     *
     * @param string|null $id Profile id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $profile = $this->Profiles->get($id, [
            'contain' => ['Users', 'Images', 'ProfileMenus']
        ]);

        $this->set('profile', $profile);
        $this->set('_serialize', ['profile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $profile = $this->Profiles->newEntity();
        if ($this->request->is('post')) {
            if (!empty($this->request->data['photo']['name'])) {
                $fileName=$this->request->data['photo']['name'];
                $uploadPath=WWW_ROOT.'img/';
                $uploadFile=$uploadPath.$fileName;
                if (move_uploaded_file($this->request->data['photo']['tmp_name'],$uploadFile)) {
                    $this->request->data['photo']=$fileName;
                }

            }
            $profile = $this->Profiles->patchEntity($profile, $this->request->getData());
            $profile->user_id=$this->Auth->user('id');
            if ($this->Profiles->save($profile)) {
                $this->Flash->success(__('Cadastro realizado!'));

                return $this->redirect(['controller' => 'Images', 'action' => 'add']);
            }
            $this->Flash->error(__('Erro ao efetuar o cadastro!'));
        }
        $users = $this->Profiles->Users->find('list', ['limit' => 200]);
        $this->set(compact('profile', 'users'));
        $this->set('_serialize', ['profile']);
    }

    /**
     * Edit methodd
     *
     * @param string|null $id Profile id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $profile = $this->Profiles->get($id, [
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
            $profile = $this->Profiles->patchEntity($profile, $this->request->getData());
            if ($this->Profiles->save($profile)) {
                $this->Flash->success(__('The profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The profile could not be saved. Please, try again.'));
        }
        $users = $this->Profiles->Users->find('list', ['limit' => 200]);
        $this->set(compact('profile', 'users'));
        $this->set('_serialize', ['profile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Profile id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $profile = $this->Profiles->get($id);
        if ($this->Profiles->delete($profile)) {
            $this->Flash->success(__('The profile has been deleted.'));
        } else {
            $this->Flash->error(__('The profile could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function isAuthorized($user)
    {
        if ($this->request->getParam('action')==='add') {
            return true;
        }
        if (in_array($this->request->getParam('action'), ['edit','delete'])) {
            $profileId=(int)$this->request->getParam('pass.0');
            if ($this->Profiles->isOwnedBy($profileId,$user['id'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }
}
