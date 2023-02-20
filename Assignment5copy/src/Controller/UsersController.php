<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\View\View;

class UsersController extends AppController
{

    public function index($id = null)
    {
        // $this->loadModel('Products');
        // $status = $this->request->getQuery('status');
        // if ($status == null) {

        //     $products = $this->Products->find('all');
        // } else {

        //     $products = $this->Products->find('all')->where(['status' => $status]);
        // }

        // $this->set(compact('products'));
        // if ($this->request->is('ajax')) {
        //     $this->autoRender = false;
        //     $this->layout = false;
        //     $this->render('/element/flash/producttable');
        // }

        //============================ get details of logged in user ==========================
        $this->Model = $this->loadModel('UserProfile');
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $user = $this->Users->get($uid, [
            'contain' => ['UserProfile']
        ]);

        //============================== list All categories ==========================
        $this->Model = $this->loadModel('Products');
        $this->Model = $this->loadModel('ProductCategories');
        $categoryList = $this->paginate($this->ProductCategories);
        $categoryDetails = $this->ProductCategories->find('all')->contain('Products')->where(['status' => 0]);

        //============================== list All Products ==========================
        // $productList = $this->paginate($this->Products);
        if ($user->user_type == '0') {
            $this->viewBuilder()->setLayout("home");
            $productList = $this->paginate($this->Products);
        } else {
            $this->viewBuilder()->setLayout("userlayout");
            if ($id != null) {
                $productList = $this->Products->find('all')->contain('ProductCategories')->where(['Products.status' => 0, 'product_category_id' => $id]);
            } else {
                $productList = $this->Products->find('all')->contain('ProductCategories')->where(['Products.status' => 0]);
                // $list = $this->paginate('ProductCategories', [
                //     'contain' => ['Products']
                // ]);
                // dd($productList);
            }
        }

        $this->set(compact('user', 'categoryList', 'productList', 'categoryDetails'));
    }

    public function register()
    {
        $this->Model = $this->loadModel('UserProfile');
        if ($this->Authentication->getIdentity() != null) {
            return $this->redirect(['action' => 'index']);
        } else {
            //==================== Register new user ================= 
            $this->viewBuilder()->setLayout("blank");
            $this->Model = $this->loadModel('UserProfile');
            $user = $this->Users->newEmptyEntity();
            if ($this->request->is('ajax')) {
                // echo '<pre>';
                // print_r($this->request->getData());
                // die;
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $picture = $this->request->getData('user_profile.profile_image');
                // dd($picture);
                $filename = $picture->getClientFilename();

                $imagepath = WWW_ROOT . 'img/' . $filename;
                if ($filename) {
                    $picture->moveTo($imagepath);
                    $user->user_profile->profile_image = $filename;
                }
                // if ($this->Users->save($user)) {
                //     $this->Flash->success(__('The user has been saved.'));

                //     return $this->redirect(['action' => 'login']);
                // }
                // $this->Flash->error(__('The user could not be saved. Please, try again.'), array('class' => 'alert alert-warning', 'role' => 'alert'));
                if ($this->Users->save($user)) {

                    $this->Flash->success(__('user has been created'));

                    echo json_encode(array(
                        "status" => 1,
                        "message" => "user has been created"
                    ));
                    die;
                    // exit;
                }

                $this->Flash->error(__('Failed to save user data'));

                echo json_encode(array(
                    "status" => 0,
                    "message" => "Failed to create"
                ));

                // exit;
                die;
            }
        }
        $this->set(compact('user'));
    }




    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

    public function login()
    {
        $this->viewBuilder()->setLayout("blank");
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {

            $result = $this->Authentication->getIdentity();
            if ($result->status == '0') {
                // redirect to /articles after login success
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Users',
                    'action' => 'index',
                ]);
            } else {
                $this->Flash->error(__('Your Account is Not Activate'), ['class' => 'alert alert-warning', 'role' => 'alert']);
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Users',
                    'action' => 'logout',
                ]);
            }

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid email or password'));
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    public function profile()
    {
        //============================ View Profile of logged in user ==========================

        $this->Model = $this->loadModel('UserProfile');
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $user = $this->Users->get($uid, [
            'contain' => ['UserProfile']
        ]);

        if ($user->user_type == '0') {
            $this->viewBuilder()->setLayout("home");
        } else {
            $this->viewBuilder()->setLayout("userlayout");
        }

        $this->set(compact('user'));
    }

    public function updateProfile($id = null)
    {
        $this->Model = $this->loadModel('UserProfile');
        $id = $_GET['id'];
        $user = $this->Users->get($id, [
            'contain' => ['UserProfile']
        ]);
        echo json_encode($user);
        exit;
    }
    // public function editProfile($id = null)
    // {
    //     // $this->autoRender = false;
    //     return $this->redirect(['action' => 'profile', $id]);
    //     //============================ get details of logged in user ==========================

    //     $this->Model = $this->loadModel('UserProfile');
    //     $user = $this->Authentication->getIdentity();
    //     $uid = $user->id;
    //     $user = $this->Users->get($uid, [
    //         'contain' => ['UserProfile']
    //     ]);

    //     $user = $this->Users->newEmptyEntity();
    //     if ($this->request->is('post')) {
    //         $user = $this->Users->patchEntity($user, $this->request->getData());
    //         $picture = $this->request->getData('user_profile.image');
    //         $filename = $picture->getClientFilename();

    //         $imagepath = WWW_ROOT . 'img/' . $filename;
    //         if ($filename) {
    //             $picture->moveTo($imagepath);
    //             $user->user_profile->profile_image = $filename;
    //         }
    //         if ($this->Users->save($user)) {
    //             $this->Flash->success(__('User Details has been Updated.'));

    //             return $this->redirect(['action' => 'profile']);
    //         }
    //         $this->Flash->error(__('The user could not be saved. Please, try again.'));
    //     }

    //     $this->set(compact('user'));
    // }

    public function editProfile($id = null)
    {
        $this->Model = $this->loadModel('UserProfile');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            // print_r($data);
            // die;
            $fileName2 = $this->request->getData("imagedd");
            $id = $this->request->getData("iddd");
            $user = $this->Users->get($id, [
                'contain' => ['UserProfile'],
            ]);
            $productImage = $this->request->getData('user_profile.profile_image');
            $fileName = $productImage->getClientFilename();
            if ($fileName == '') {
                $fileName = $fileName2;
            }
            $fileSize = $productImage->getSize();
            $data['user_profile']["profile_image"] = $fileName;
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $hasFileError = $productImage->getError();

                if ($hasFileError > 0) {
                    $data["image"] = "";
                } else {
                    $fileType = $productImage->getClientMediaType();

                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "img/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data["image"] = $fileName;
                    }
                }
                echo json_encode(array(
                    "status" => 1,
                    "message" => "The User has been saved.",
                ));
                exit;
            }
            echo json_encode(array(
                "status" => 0,
                "message" => "The User  could not be saved. Please, try again.",
            ));
            exit;
        }
        $users = $this->Users->UserProfile->find('list', ['limit' => 200])->all()->toArray();
        $this->set(compact('user', 'users'));
    }

    public function userlist()
    {
        //============================ get details of logged in user ==========================

        $this->Model = $this->loadModel('UserProfile');
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $user = $this->Users->get($uid, [
            'contain' => ['UserProfile']
        ]);

        if ($user->user_type == '0') {
            $this->viewBuilder()->setLayout("home");

            $users = $this->paginate('Users', [
                'contain' => ['UserProfile']
            ]);
        } else {
            $this->viewBuilder()->setLayout("userlayout");
            return $this->redirect(['action' => 'index']);
        }


        $this->set(compact('user', 'users'));
    }

    //================================== fucntion for ajax/productlist  ====================
    public function ajaxshowproducts($id = null)
    {
        $this->Model = $this->loadModel('Products');
        $this->Model = $this->loadModel('ProductCategories');
        $id = $_GET['id'];
        $products = $this->ProductCategories->get($id, [
            'contain' => ['Products']
        ]);
        echo json_encode($products);
        exit;
    }
    //================================== fucntion for add/list categories ====================
    public function addcategory()
    {
        //============================ get details of logged in user ==========================

        $this->Model = $this->loadModel('UserProfile');
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $user = $this->Users->get($uid, [
            'contain' => ['UserProfile']
        ]);

        if ($user->user_type == '0') {
            $this->viewBuilder()->setLayout("home");

            //============================== add categories ==========================
            $this->Model = $this->loadModel('Products');
            $this->Model = $this->loadModel('ProductCategories');
            $category = $this->ProductCategories->newEmptyEntity();
            if ($this->request->is('post')) {
                $category = $this->ProductCategories->patchEntity($category, $this->request->getData());
                if ($this->ProductCategories->save($category)) {
                    $this->Flash->success(__('The category has been saved.'));

                    return $this->redirect(['action' => 'addcategory']);
                }
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }

            //============================== list All categories ==========================
            $categorycount = $this->paginate($this->ProductCategories);
            $categoryList = $this->ProductCategories->find('all')->contain('Products');
            // dd($categoryDetails);
        } else {
            $this->viewBuilder()->setLayout("userlayout");
            return $this->redirect(['action' => 'index']);
        }



        $this->set(compact('user', 'categorycount', 'category', 'categoryList'));
    }

    //========================== for update category ==================================
    public function editcategory($id = null)
    {
        $this->Model = $this->loadModel('UserProfile');
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $user = $this->Users->get($uid, [
            'contain' => ['UserProfile']
        ]);

        if ($user->user_type == '0') {
            $this->viewBuilder()->setLayout('home');
            $this->Model = $this->loadModel('ProductCategories');
            $productCategory = $this->ProductCategories->get($id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $productCategory = $this->ProductCategories->patchEntity($productCategory, $this->request->getData());
                if ($this->ProductCategories->save($productCategory)) {
                    $this->Flash->success(__('The product category has been Updated.'));

                    return $this->redirect(['action' => 'addcategory']);
                }
                $this->Flash->error(__('The product category could not be saved. Please, try again.'));
                return $this->redirect(['action' => 'editcategory', $id]);
            }
        } else {
            $this->viewBuilder()->setLayout('userlayout');
            return $this->redirect(['action' => 'index']);
        }




        $this->set(compact('productCategory', 'user'));
    }


    //================================== fucntion for add/list products ====================
    public function addproduct()
    {
        //============================ get details of logged in user ==========================

        $this->Model = $this->loadModel('UserProfile');
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $user = $this->Users->get($uid, [
            'contain' => ['UserProfile']
        ]);

        if ($user->user_type == '0') {
            $this->viewBuilder()->setLayout("home");
            //============================== list All categories ==========================
            $this->Model = $this->loadModel('ProductCategories');
            $categoryList = $this->paginate($this->ProductCategories);


            //=================== adding products =====================================
            $this->Model = $this->loadModel('Products');
            $addproduct = $this->Products->newEmptyEntity();
            if ($this->request->is('post')) {
                $data = $this->request->getData();
                $picture = $this->request->getData('product_image');
                $filename = $picture->getClientFilename();
                $data['product_image'] = $filename;
                $addproduct = $this->Products->patchEntity($addproduct, $data);
                // dd($addproduct);
                $addproduct['user_id'] = $uid;
                if ($this->Products->save($addproduct)) {
                    $hasfileerror = $picture->getError();
                    if ($hasfileerror > 0) {
                        $data['product_image'] = '';
                    } else {
                        $filetype = $picture->getClientMediaType();
                        if ($filetype == 'image/png' || $filetype == 'image/jpeg' || $filetype == 'image/jpg') {
                            $imagepath = WWW_ROOT . 'img/' . $filename;
                            $picture->moveTo($imagepath);
                            $data['product_image'] = $filename;
                        }
                    }
                    $this->Flash->success(__('The Product has been saved.'));

                    return $this->redirect(['action' => 'addproduct']);
                }
                $this->Flash->error(__('Product could not be saved. Please, try again.'));
            }

            //============================== list All Products ==========================
            $productList = $this->paginate($this->Products);
        } else {
            $this->viewBuilder()->setLayout("userlayout");
            return $this->redirect(['action' => 'index']);
        }



        $this->set(compact('user', 'categoryList', 'addproduct', 'productList'));
    }

    public function viewproduct($pid = null)
    {
        //============================ get details of logged in user ==========================

        $this->Model = $this->loadModel('UserProfile');
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $user = $this->Users->get($uid, [
            'contain' => ['UserProfile']
        ]);

        if ($user->user_type == '0') {
            $this->viewBuilder()->setLayout("home");
            return $this->redirect(['action' => 'index']);
        } else {
            $this->viewBuilder()->setLayout("userlayout");
            //============================ get details of user and on comment ====================
            $this->Model = $this->loadModel('ProductComments');
            $comments = $this->ProductComments->find('all', [
                'contain' => ['Users', 'Users.UserProfile']
            ])->where(['product_id' => $pid])->all();
            // dd($comments);

            //============================== list All Products ==========================
            $this->Model = $this->loadModel('Products');
            $productList = $this->paginate($this->Products);
            $product = $this->Products->get($pid);
            // dd($product);
        }



        //==================== View All Comments of single Product ================= 
        // $comments = $this->Products->get($pid, [
        //     'contain' => ['ProductComments'],
        // ]);



        $this->set(compact('user', 'product', 'comments'));
    }

    public function comment($pid)
    {
        //============================ get details of logged in user ==========================
        $this->Model = $this->loadModel('UserProfile');
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $user = $this->Users->get($uid, [
            'contain' => ['UserProfile']
        ]);

        $this->autoRender = false;
        // $this->Model = $this->loadModel('UserProfile');
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        // $user = $this->Users->get($uid, [
        //     'contain' => ['UserProfile']
        // ]);
        if ($user->user_type == '1') {
            $this->viewBuilder()->setLayout("userlayout");

            //===================== Add comment to post ======================
            $this->Model = $this->loadModel('ProductComments');
            $addcmt = $this->ProductComments->newEmptyEntity();
            if ($this->request->is('post')) {
                $data = $this->request->getData();
                $addcmt = $this->ProductComments->patchEntity($addcmt, $data);
                // dd($addcmt);
                $addcmt['user_id'] = $uid;
                if ($this->ProductComments->save($addcmt)) {
                    $this->Flash->success(__('Your Comment is saved'));

                    return $this->redirect(['action' => 'viewproduct', $pid]);
                }
                $this->Flash->error(__('Please fill All fields'));
                return $this->redirect(['action' => 'viewproduct', $pid]);

                $this->set(compact('user', 'addcmt'));
            }
        } else {
            return $this->redirect(['action' => 'index']);
            $this->viewBuilder()->setLayout("home");
        }
    }

    //================== products active inactive ======================
    public function productStatus($id = null, $status = null)
    {
        $this->Model = $this->loadModel('Products');
        $this->request->allowMethod(['post']);
        $productStatus = $this->Products->get($id);
        if ($status == 0)
            $productStatus->status = 1;
        else
            $productStatus->status = 0;
        if ($this->Products->save($productStatus)) {
            $this->Flash->success(('The Products status has changed.'));
        }
        return $this->redirect(['action' => 'index']);

        $this->set(compact('productStatus'));
    }
    public function ajaxproductStatus($id = null, $status = null)
    {
        $this->Model = $this->loadModel('Products');
        $this->Model = $this->loadModel('ProductCategories');
        $this->request->allowMethod(['post']);
        $id = $_POST['id'];
        $status = $_POST['status'];
        $productcstatus = $this->ProductCategories->get($id);
        //  echo $status;die;
        if ($status == 0) {
            $productcstatus->status = 1;
            // $product = $this->Products->find('all')->where(['product_category_id' => $id]);
            // $product->status = 1;
        }
        if ($this->ProductCategories->save($productcstatus)) {
            // if ($this->Products->save($product)) {
            echo json_encode(array(
                "status" => $status,
                "id" => $id,
            ));
            exit;
        }
        // }
    }

    //================== product Categories active inactive ======================
    public function categoryStatus($id = null, $status = null)
    {
        $this->Model = $this->loadModel('ProductCategories');
        $this->request->allowMethod(['post']);
        $categoryStatus = $this->ProductCategories->get($id);
        if ($status == 0)
            $categoryStatus->status = 1;
        else

            $categoryStatus->status = 0;
        if ($this->ProductCategories->save($categoryStatus)) {
            $this->Flash->success(('The Product Category status has changed.'));
        }
        return $this->redirect(['action' => 'addcategory']);

        $this->set(compact('categoryStatus'));
    }

    //==================AJAX product Categories active inactive ======================
    public function ajaxategoryStatus($id = null, $status = null)
    {
        $this->Model = $this->loadModel('ProductCategories');
        $this->request->allowMethod(['post']);
        $id = $_POST['id'];
        $status = $_POST['status'];
        $categoryStatus = $this->ProductCategories->get($id);
        if ($status == 0) {
            $categoryStatus->status = 1;
        } else {
            $categoryStatus->status = 0;
        }

        if ($this->ProductCategories->save($categoryStatus)) {
            echo json_encode(array(
                "status" => $status,
                "id" => $id,
            ));
            exit;
        }
    }

    //================== users active inactive ======================
    public function userStatus($id = null, $status = null)
    {
        $this->Model = $this->loadModel('Users');
        $this->request->allowMethod(['post']);
        $userStatus = $this->Users->get($id);
        if ($status == 0)
            $userStatus->status = 1;
        else
            $userStatus->status = 0;
        if ($this->Users->save($userStatus)) {
            $this->Flash->success(('The User status has changed.'));
        }
        return $this->redirect(['action' => 'userlist']);

        $this->set(compact('userStatus'));
    }

    public function softDelete($id = null, $delstatus = null)
    {
        $this->Model = $this->loadModel('Users');
        $this->request->allowMethod(['post']);
        $deleteStatus = $this->Users->get($id);
        if ($delstatus == 0)
            $deleteStatus->delete_status = 1;
        // else
        //     $userStatus->status = 0;
        if ($this->Users->save($deleteStatus)) {
            $this->Flash->success(('The User has deleted.'));
        }
        return $this->redirect(['action' => 'userlist']);

        $this->set(compact('deleteStatus'));
    }


    //============================= for view products =====================
    public function productview($id = null)
    {
        //============================ get details of logged in user ==========================
        $this->Model = $this->loadModel('UserProfile');
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $user = $this->Users->get($uid, [
            'contain' => ['UserProfile']
        ]);

        $this->Model = $this->loadModel('Products');
        $result = $this->Authentication->getIdentity();
        if ($result->user_type == '0') {
            $this->viewBuilder()->setLayout("home");
            $product = $this->Products->get($id, [
                'contain' => [],
            ]);
        } else {
            $product = $this->Products->get($result->id, [
                'contain' => [],
            ]);
        }

        $this->set(compact('product', 'user'));
    }

    //================================== delete products ======================
    public function productdelete($id = null)
    {
        $this->Model = $this->loadModel('Products');
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The Product has been deleted.'));
        } else {
            $this->Flash->error(__('The Product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //======================= update product details ===================
    public function productedit($id = null)
    {
        $this->Model = $this->loadModel('UserProfile');
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $user = $this->Users->get($uid, [
            'contain' => ['UserProfile']
        ]);

        //============================== list All categories ==========================
        $this->Model = $this->loadModel('ProductCategories');
        $categoryList = $this->paginate($this->ProductCategories);

        if ($user->user_type == '0') {

            $this->viewBuilder()->setLayout("home");
            $this->Model = $this->loadModel('Products');
            $product = $this->Products->get($id, [
                'contain' => [],
            ]);

            $filename2 = $product['product_image'];
            if ($this->request->is(['patch', 'post', 'put'])) {
                $data = $this->request->getData();
                $picture = $this->request->getData('product_image');
                $filename = $picture->getClientFilename();

                if ($filename == '') {
                    $filename = $filename2;
                }
                $data['product_image'] = $filename;
                $product = $this->Products->patchEntity($product, $data);
                if ($this->Products->save($product)) {
                    $hasfileerror = $picture->getError();

                    if ($hasfileerror > 0) {
                        $data['product_image'] = '';
                    } else {
                        $filetype = $picture->getClientMediaType();
                        if ($filetype == 'image/png' || $filetype == 'image/jpeg' || $filetype == 'image/jpg') {
                            $imagepath = WWW_ROOT . 'img/' . $filename;
                            $picture->moveTo($imagepath);
                            $data['product_image'] = $filename;
                        }
                    }
                    $this->Flash->success(__('The user has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->viewBuilder()->setLayout("userlayout");
        }




        $this->set(compact('product', 'user', 'categoryList'));
    }

    //============================= for view category =====================
    public function categoryview($id = null)
    {
        //============================ get details of logged in user ==========================
        $this->Model = $this->loadModel('UserProfile');
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $user = $this->Users->get($uid, [
            'contain' => ['UserProfile']
        ]);

        $this->Model = $this->loadModel('ProductCategories');
        $result = $this->Authentication->getIdentity();
        if ($result->user_type == '0') {
            $this->viewBuilder()->setLayout("home");
            $category = $this->ProductCategories->get($id, [
                'contain' => [],
            ]);
        } else {
            $category = $this->ProductCategories->get($result->id, [
                'contain' => [],
            ]);
        }

        $this->set(compact('category', 'user'));
    }

    //================================== delete categories ======================
    public function categorydelete($id = null)
    {
        $this->Model = $this->loadModel('ProductCategories');
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->ProductCategories->get($id);
        if ($this->ProductCategories->delete($category)) {
            $this->Flash->success(__('The Category has been deleted.'));
        } else {
            $this->Flash->error(__('The Category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'addcategory']);
    }

    //============================= for view category =====================
    public function userview($id = null)
    {
        //============================ get details of logged in user ==========================
        $this->Model = $this->loadModel('Products');
        $this->Model = $this->loadModel('UserProfile');
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $user = $this->Users->get($uid, [
            'contain' => ['UserProfile']
        ]);

        $this->Model = $this->loadModel('Users');
        $this->Model = $this->loadModel('ProductComments');
        $result = $this->Authentication->getIdentity();
        if ($result->user_type == '0') {
            $this->viewBuilder()->setLayout("home");
            $userdetail = $this->Users->get($id, [
                'contain' => ['UserProfile', 'ProductComments'],
            ]);
        } else {
            $userdetail = $this->Users->get($result->id, [
                'contain' => ['UserProfile', 'ProductComments'],
            ]);
        }

        $this->set(compact('userdetail', 'user'));
    }

    //================================== delete users ======================
    public function userdelete($id = null)
    {
        $this->autoRender = false;
        // ==============hard delete======================
        // $this->request->allowMethod(['post', 'delete']);
        // $user = $this->Users->get($id);
        // if ($this->Users->delete($user)) {
        //     $this->Flash->success(__('The User has been deleted.'));
        // } else {
        //     $this->Flash->error(__('The User could not be deleted. Please, try again.'));
        // }

        // return $this->redirect(['action' => 'userlist']);



        //===================== hard delete using ajax ===================
        // if ($this->request->is('ajax')) {

        //     $user = $this->Users->get($id);
        //     if ($this->Users->delete($user)) {

        //         $this->Flash->success(__('The student has been deleted.'));

        //         echo json_encode(array(
        //             "status" => 1,
        //             "message" => "The student has been deleted."
        //         ));

        //         exit;
        //     } else {
        //         $this->Flash->error(__('The student could not be deleted. Please, try again.'));

        //         echo json_encode(array(
        //             "status" => 0,
        //             "message" => "The student could not be deleted. Please, try again."
        //         ));

        //         exit;
        //     }
        // }

        //===================== soft delete using ajax ===================
        if ($this->request->is('ajax')) {

            $user = $this->Users->get($id);
            $user->delete_status = 1;
            if ($this->Users->save($user)) {


                // $this->Flash->success(__('The student has been deleted.'));

                echo json_encode(array(
                    "status" => 1,
                    "message" => "The student has been deleted."
                ));

                exit;
            } else {
                // $this->Flash->error(__('The student could not be deleted. Please, try again.'));

                echo json_encode(array(
                    "status" => 0,
                    "message" => "The student could not be deleted. Please, try again."
                ));

                exit;
            }
        }
    }
}
