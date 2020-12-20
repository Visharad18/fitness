<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Database\Connection;
use Cake\Datasource\ConnectionManager;


/**
 * Sessions Controller
 *
 * @property \App\Model\Table\SessionsTable $Sessions
 *
 * @method \App\Model\Entity\Session[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SessionsController extends AppController
{

    private $user, $user_id, $conn;

    public function initialize()
    {
        parent::initialize();
        $this->user  = $this->Auth->User();
        debug($this->user);
        $this->user_id = $this->user['user_id'];
        debug($this->user_id);
        $this->conn = ConnectionManager::get('default');
        // $this->Auth->config([
        //     'authError' => 'Please login first to view this page'
        // ]);
    }


    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        // $this->Flash->success($action);
        if(in_array($action, ['index','add']))
            return true;
        $slug = $this->request->getParam('pass.0');
        if(!$slug)
            return false;
        $session = $this->Sessions->get($slug);
        return $session->user_id == $this->user_id;
        return false;
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->set('user',$this->Auth->User());
        $this->paginate = [
            'contain' => ['Users'],
        ];
        debug($this->user_id);
        debug($this->Sessions);
        $sessions = $this->Sessions->findByUser_id($this->user_id);
        debug($sessions);
        $this->set('sessions',$this->paginate($sessions));
    }

    /**
     * View method
     *
     * @param string|null $id Session id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $session = $this->Sessions->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('session', $session);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->set('user_id',$this->user_id);
        $session = $this->Sessions->newEntity();
        if ($this->request->is('post')) {
            $session = $this->Sessions->patchEntity($session, $this->request->getData());
            if ($this->Sessions->save($session)) {
                $this->Flash->success(__('The session has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The session could not be saved. Please, try again.'));
        }
        $users = $this->Sessions->Users->find('list', ['limit' => 200]);
        $this->set(compact('session', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Session id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->Sessions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $session = $this->Sessions->patchEntity($session, $this->request->getData());
            if ($this->Sessions->save($session)) {
                $this->Flash->success(__('The session has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The session could not be saved. Please, try again.'));
        }
        $users = $this->Sessions->Users->find('list', ['limit' => 200]);
        $this->set(compact('session', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Session id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $session = $this->Sessions->get($id);
        if ($this->Sessions->delete($session)) {
            $this->Flash->success(__('The session has been deleted.'));
        } else {
            $this->Flash->error(__('The session could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
