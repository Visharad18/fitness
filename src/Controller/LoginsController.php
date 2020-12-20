<?php

namespace App\Controller;


use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultpasswordHasher;
use Cake\Datasource\ConnectionManager;



class LoginsController extends AppController
{
	private $user, $id, $users_table, $queries_table, $conn;

	public function initialize()
	{
		parent::initialize();
		
        $this->Auth->allow(['index', 'register','login','contact','recipes']);

        $this->users_table = TableRegistry::get('Users');
        $this->queries_table = TableRegistry::get('Queries');
        $this->conn = ConnectionManager::get('default');
	}


    public function isAuthorized($user)
    {
        $action = $this->request->getParam();
        if(in_array($action, ['index','register']))
            return true;
        if($this->Auth->User())
        	return true;
        return false;
    }

	public function index()
	{
		
		$user = $this->users_table->newEntity();
		$this->set('user',$user);
		// debug($user);
		
		$query = $this->queries_table->newEntity();
		$this->set('query',$query);
		debug($query);
	}

	public function register()
	{
		debug($this->request->getData());
		if($this->request->is('POST')) {
			debug($this->request->getData());
			if($this->request->getData('pass_word') != $this->request->getData('confirm_password')) {
				return $this->Flash->error("Passwords don't match!");
				// $this->request = NULL;
				// $this->redirect(["action" => "index"]);
			}
			$user = $this->users_table->newEntity($this->request->getData());
			debug($user);
			$errors = $user->getErrors();
			// $hasher = new DefaultpasswordHasher();
		
			$this->redirect(["action" => "index"]);
			if(count($errors) > 0) {
				debug($errors);
				foreach($errors as $err)
					foreach ($err as $key => $val)
						$this->Flash->error($err." ".$key." ".$val);
				return $this->redirect(["action" => "index"]);
			}
			else {
				if($this->users_table->save($user)) {
					return $this->Flash->success("Registration successful");
				}
				else {
					return $this->Flash->error("An error occured while saving your details");
				}
			}
		}
		
	}

	public function login()
	{
		if($this->request->is('POST')) {
			// debug($this->request);
			// $this->request['data']['pass_word'] = $hasher->hash($this->request->getData('pass_word'));
			// debug($this->request);
			$this->user = $this->Auth->identify();
			debug($this->user);
			if($this->user) {
				$this->Auth->setUser($this->user);
				// debug($this->Auth->redirectUrl());
				$this->Flash->success("WELCOME ".$this->user['firstname']." ".$this->user['lastname']."!");
				return $this->redirect($this->Auth->redirectUrl());
			}
			debug($this->Auth);
			return $this->Flash->error("Invalid username or password");
		}
	}

	public function logout()
	{
		$this->Flash->success("You're now logged out");
		return $this->redirect($this->Auth->logout());
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
		// debug($this->user);
		debug($this->id);
		debug($this->Auth->User('user_id'));
		debug($this->Auth->User('image'));
		$this->set('image',$this->Auth->User('image'));
		$this->set('user_type',$this->Auth->User('user_type'));
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
    	// debug($this->Auth->User('user_id'));
    	$this->id = $this->Auth->User('user_id');
    	debug($this->id);
    	$user = $this->users_table->get($this->id);
    	$this->user = $user;
    	debug($this->user);
    	debug(WWW_ROOT."img\\uploads\\users\\".$user['image']);

        $this->set('user',$this->user);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->users_table->patchEntity($user, $this->request->getData());
            // debug($user);

            //Check if image has been uploaded
            if(!empty($this->request->getData('image')))
            {

                $file = $this->request->getData('image'); //put the data into a var for easy use
                debug($file);
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = ['jpg', 'jpeg', 'gif', 'png', 'bmp']; //set allowed extensions

                //only process if the extension is valid
                if(in_array($ext, $arr_ext))
                {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is 
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img\\uploads\\users\\' . $file['name']);

                        //prepare the filename for database entry
                        $user['image'] = $file['name'];
                }
            }
            if(!$user['image'])
            	$user['image'] = $this->Auth->User('image');
            if ($this->users_table->save($user)) {
            	$this->user = $user;
            	$this->Auth->setUser($user);
                $this->Flash->success(__('The changes have been saved.'));
                return $this->redirect(['Controller'=>'Logins', 'action' => 'dashboard']);
            }
            $this->Flash->error(__('The changes could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function password()
    {
    	$user = $this->users_table->get($this->Auth->User('user_id'));
    	$old_password = $user['pass_word'];
    	debug($old_password);
    	if($this->request->is(['post','put','patch'])) {
			if($this->request->getData('pass_word')) {
				$user = $this->users_table->patchEntity($user, $this->request->getData());
				debug($user);
            	// $old_password = $this->request->getData('old_password');
            	// debug($old_password);
            	$hasher = new DefaultpasswordHasher();
            	// debug($hasher->check($old_password,$this->user['pass_word']));
            	if(!$hasher->check($this->request->getData('old_password'),$old_password)) {
            		$this->Flash->error('Current Password is incorrect');
            		debug($old_password);
            		debug($this->request->getData('old_password'));
            		debug($this->request->getData('pass_word'));
            		debug($this->request->getData('confirm_password'));
            		// return $this->redirect(['action'=>'edit']);
            	}
            	else if($this->request->getData('pass_word') !== $this->request->getData('confirm_password')) {
            		$this->Flash->error("Passwords don't match!");
            		// return $this->redirect(['action'=>'edit']);
            	}
            	else {
            	
        		if($this->users_table->save($user)) {
        			debug($this->user);
        			debug($user);
        			$this->Flash->success('Password updated! Please login again.');
	                return $this->redirect($this->Auth->logout());
            	}
            	$this->Flash(__("The changes couldn't be saved, please try after some time!"));
            	return $this->redirect(['action'=>'edit']); }
            }

        }
    }


    public function contact() {
        if ($this->request->is(['patch', 'post', 'put'])) {
        	// debug($query);
			$query = $this->queries_table->newEntity($this->request->getData());
			debug($query);
			$errors = $query->getErrors();
			if(count($errors) > 0) {
				foreach($errors as $err)
					foreach ($err as $key => $val)
						$this->Flash->error($key.": ".$val);
				return;
			}
			if($this->queries_table->save($query)) {
				$this->Flash->success("We've got you. Stay tuned!");
				return $this->redirect(["action" => "index"]);
			}
		}
	}

	public function seller()
	{
		$user = $this->users_table->get($this->Auth->User('user_id'));
		if($this->request->is(['put','patch','post'])) {
			$user['user_type'] = 'seller';
			if($this->users_table->save($user)) {
				return $this->Flash->success("Registered as seller!");
				$this->Auth->setUser($user);
			}
			return $this->Flash->error("An error occured, please try after some time");
		}
	}

	public function recipes()
	{
		$this->set('image',$this->Auth->User('image'));
		$this->set('user_type',$this->Auth->User('user_type'));
	}
}

?>