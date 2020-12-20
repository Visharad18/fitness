<?php

namespace App\Controller;


use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultpasswordHasher;


class LoginsController extends AppController
{
	private $user;

	public function initialize()
	{
		parent::initialize();
		$this->Auth->config([
            'unauthorizedRedirect' => $this->referer(),
            'authError' => 'Invalid Username or Password',
            'authenticate' => [
                'Form' => [
                    'userModel' => 'Users',
                    'fields' => [
                        'username' => 'email',
                        'password' => 'pass_word'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Logins',
                'action' => 'login',
            ],
            'loginRedirect' => [
                'controller' => 'Logins',
                'action' => 'dashboard'
            ],
            'logoutRedirect' => [
                'controller' => 'Logins',
                'action' => 'index'
            ],
            'storage' => 'Session'
        ]);
        $this->Auth->allow(['index', 'register','login','contact']);
	}

	public function index()
	{
		$users_table = TableRegistry::get('Users');
		$user = $users_table->newEntity();
		$this->set('user',$user);
		// debug($user);
		$queries_table = TableRegistry::get('Queries');
		$query = $queries_table->newEntity();
		$this->set('query',$query);
	}

	public function register()
	{
		debug($this->request->getData());
		if($this->request->is('POST')) {
			debug($this->request->getData());
			if($this->request->getData('pass_word') != $this->request->getData('confirm_password')) {
				$this->Flash->error("Passwords don't match!");
				return;
				// $this->request = NULL;
				// $this->redirect(["action" => "index"]);
			}
			$users_table = TableRegistry::get('Users');
			$user = $users_table->newEntity($this->request->getData());
			debug($user);
			$errors = $user->getErrors();
			// $hasher = new DefaultpasswordHasher();
		
			$this->redirect(["action" => "index"]);
			if(count($errors) > 0) {
				debug($errors);
				foreach($errors as $err)
					foreach ($err as $key => $val)
						$this->Flash->error($err." ".$key." ".$val);
				$this->redirect(["action" => "index"]);
			}
			else {
				if($users_table->save($user)) {
					$this->Flash->success("Registration successful");
				}
				else {
					$this->Flash->error("An error occured while saving your details");
				}
			}
		}
		
	}

	public function login()
	{
		if($this->request->is('POST')) {
			// debug($this->request);
			$hasher = new DefaultpasswordHasher();
			// $this->request['data']['pass_word'] = $hasher->hash($this->request->getData('pass_word'));
			// debug($this->request);
			$this->user = $this->Auth->identify();
			// debug($this->user);
			if($this->user) {
				$this->Auth->setUser($this->user);
				// debug($this->Auth->redirectUrl());
				$this->Flash->success("WELCOME ".$this->user['firstname']." ".$this->user['lastname']."!");
				$this->redirect($this->Auth->redirectUrl());
			}
			else {
				debug($this->Auth);
				// $this->Flash->error("Invalid username or password");
			}
		}
	}

	public function logout()
	{
		$this->Flash->success("You're now logged out");
		$this->redirect($this->Auth->logout());
		//$this->redirect(["action" => "index"]);
	}

	/**
	* Dashboard method
	*
	* @param void
	* @return void
	*/

	public function dashboard()
	{
		
	}

	/**
	* Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit()
    {
        $this->set('user',$this->user);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if($this->request->getData('old_password')) {
            	if($hasher->hash($this->request->getData('old_password')) !== $this->user['pass_word']) {
            		$this->Flash->error('Current Password is incorrect');
            		return;
            	}
            	if($this->request->getData('pass_word') !== $this->request->getData('confirm_password')) {
            		$this->Flash->error("Passwords don't match!");
            		return;
            	}
            }
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }


    public function contact() {
    	if($this->request() == ['post','put']) {
			$queries_table = TableRegistry::get('Queries');
			$query = $queries_table->newEntity($this->request->getData());
			debug($query);
			$errors = $query->getErrors();
			if(count($errors) > 0) {
				foreach($errors as $err)
					foreach ($err as $key => $val)
						$this->Flash->error($key.": ".$val);
			}
			else {
				$this->set('contacts',$contact);
				if($contacts_table->save($contact))
					$this->Flash->success("We've got you. Stay tuned!");
			}
		}
	}
}

?>