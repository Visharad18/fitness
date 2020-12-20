<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    private static $user;

    public function initialize()
    {
        parent::initialize();
        // $this->Auth->config([
        //     'authError' => 'Please login first to view this page',
        //     'authorize' => 'Controller'
        // ]);
        $this->Auth->allow(['index','view']);
        $user = $this->Auth->User();
        // debug($user);
    }

    public function isAuthorized($user)
    {
        $user_type = $this->Auth->User('user_type');
        if($user_type == 'admin')
            return true;
        $action = $this->request->getParam('action');
        $this->Flash->Success($action);
        if(in_array($action, ['index','view']))
            return true;
        if(in_array($action, ['add']))
            if($user_type == 'seller')
                return true;

        $slug = $this->request->getParam('pass.0');
        if(!$slug)
            return false;
        if(in_array($action, ['edit','delete'])){
            $product = $this->Products->get($slug);
                return $product->seller == $this->Auth->User('user_id');
        }
        return false;

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {

        $user_type = $this->Auth->User('user_type');
        debug($user_type);
        $this->set('user_type',$user_type);
        if($user_type == 'admin' || $user_type == 'customer' || !$user_type)
            $products = $this->paginate($this->Products);
        if($user_type == 'seller')
            $products = $this->paginate($this->Products->findBySeller($this->Auth->User('user_id')));

        $this->set('products',$products);
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if($this->Auth->User())
            $this->set('user_type',$this->Auth->User('user_type'));
        else
            $this->set('user_type',null);
        $Users = TableRegistry::get('Users');
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);

        $user = $Users->get($product->seller);
        $product->seller = $user->firstname.' '.$user->lastname;

        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            $product['seller'] = $this->Auth->User('user_id');
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
                        debug(move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img\\uploads\\products\\' . $file['name']));

                        //prepare the filename for database entry
                        $product['image'] = $file['name'];
                }
                else 
                    return $this->Flash->error("The uploaded file is not an image!");
            }

            
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);
        // debug($product['image']);
        // debug( WWW_ROOT . 'img\\uploads\\products\\' . $product['image']);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());

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
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img\\uploads\\products\\' . $file['name']);

                        //prepare the filename for database entry
                        $product['image'] = $file['name'];
                }
                else 
                    return $this->Flash->error("The uploaded file is not an image!");
            }
            else
                $product['image'] = $this->Products->get($id)->image;
            

            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
