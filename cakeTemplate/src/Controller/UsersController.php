<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\View\View;

class UsersController extends AppController
{

    public function index()
    {
        //==================== set dsahboard layout ================= 
        $this->viewBuilder()->setLayout("home");
        $user = $this->Authentication->getIdentity();
        //==================== set dsahboard layout ================= 
        // echo '<pre>';
        // print_r($user->id);
        // die;

        //==================== All post view ================= 
        $this->Model = $this->loadModel('Posts');
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $posts = $this->paginate($this->Posts);
        // echo '<pre>';
        // print_r($posts);
        // die;

        //==================== My Posts =================   
        $mypost = $this->Users->get($user->id, [
            'contain' => ['Posts'],
        ]);

        //==================== View All Users from Table ================= 
        // $details = $this->paginate($this->Users);

        $this->set(compact('mypost', 'posts', 'user'));
    }



    //==================== Show single user profile ================= 
    public function profile()
    {
        $this->viewBuilder()->setLayout("home");
        $user = $this->Authentication->getIdentity();
        // echo "<pre>";
        // print_r($user);
        // die;

        $this->set(compact('user'));
    }



    //==================== Register new user ================= 
    public function register()
    {
        $this->viewBuilder()->setLayout("blank");
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $picture = $this->request->getData('image');
            $filename = $picture->getClientFilename();
            $data['image'] = $filename;
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $hasfileerror = $picture->getError();
                if ($hasfileerror > 0) {
                    $data['image'] = '';
                } else {
                    $filetype = $picture->getClientMediaType();
                    if ($filetype == 'image/png' || $filetype == 'image/jpeg' || $filetype == 'image/jpg') {
                        $imagepath = WWW_ROOT . 'img/' . $filename;
                        $picture->moveTo($imagepath);
                        $data['image'] = $filename;
                    }
                }
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    //==================== Delete Post ================= 
    public function postdelete($id = null)
    {
        $user = $this->Authentication->getIdentity();
        $this->Model = $this->loadModel('Posts');
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The Post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

    //==================== Login registered User ================= 
    public function login()
    {
        $this->viewBuilder()->setLayout("blank");
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            // redirect to /articles after login success
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'users',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    public function addpost()
    {
        $this->viewBuilder()->setLayout("home");
        $user = $this->Authentication->getIdentity();
        $this->set(compact('user'));

        $this->Model = $this->loadModel('Posts');
        $post = $this->Posts->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $picture = $this->request->getData('image_file');
            $filename = $picture->getClientFilename();
            $data['image'] = $filename;
            $data['user_id'] = $user->id;
            $post = $this->Posts->patchEntity($post, $data);
            if ($this->Posts->save($post)) {
                $hasfileerror = $picture->getError();
                if ($hasfileerror > 0) {
                    $data['image'] = '';
                } else {
                    $filetype = $picture->getClientMediaType();
                    if ($filetype == 'image/png' || $filetype == 'image/jpeg' || $filetype == 'image/jpg') {
                        $imagepath = WWW_ROOT . 'img/' . $filename;
                        $picture->moveTo($imagepath);
                        $data['image'] = $filename;
                    }
                }
                $this->Flash->success(__('Your Post Saved Successfully.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Post is not Saved. Please, try again.'));
        }
        $this->set(compact('post'));
    }

    public function comment($postid)
    {

        //===================== View post to comment ======================
        $this->viewBuilder()->setLayout("home");
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;
        $this->Model = $this->loadModel('Posts');
        $postcmt = $this->Posts->get($postid);
        // $postcmt = $this->Posts->get($uid);

        //===================== Add comment to post ======================
        $this->Model = $this->loadModel('Comments');
        $addcmt = $this->Comments->newEmptyEntity();
        if ($this->request->is('post')) {
            $addcmt = $this->Comments->patchEntity($addcmt, $this->request->getData());
            $addcmt['post_id'] = $postid;
            $addcmt['user_id'] = $uid;
            // print_r($addcmt);
            // die;
            if ($this->Comments->save($addcmt)) {
                $this->Flash->success(__('Your Comment is saved'));

                return $this->redirect(['action' => 'comment', $postid, $uid]);
            }
            $this->Flash->error(__('There is some problem. Please, try again.'));
        }

        //==================== View All Comments from Table ================= 
        // $comments = $this->paginate($this->Comments);
        // echo '<pre>';
        // print_r($comments);
        // die;

        //==================== View All Comments of single Post ================= 
        $comments = $this->Posts->get($postid, [
            'contain' => ['Comments'],
        ]);

        $puser_cmt = $this->Comments->find('all', [
            'contain' => ['Users']
        ])->where(['post_id' => $postid])->all();


        //==================== View All Users from Table ================= 
        // $detail = $this->paginate($this->Users);
        // echo '<pre>';
        // print_r($puser_cmt);
        // die;

        //============================ get details of user and on comment ====================
        // $this->Comments = $this->fetchTable('Comments');
        // $result = $this->Comments->getPost($postid);
        // echo '<pre>';
        // print_r($comments);
        // die;

        $this->set(compact('user', 'postcmt', 'addcmt', 'comments', 'puser_cmt'));
        // $this->set(compact('result'));
    }

    //==================== Delete Comment ================= 
    public function deletecmt($id = null, $postid)
    {
        $user = $this->Authentication->getIdentity();
        $this->Model = $this->loadModel('Comments');
        $this->request->allowMethod(['post', 'delete']);
        $comment = $this->Comments->get($id);
        if ($this->Comments->delete($comment)) {
            $this->Flash->success(__('The comment has been deleted.'));
        } else {
            $this->Flash->error(__('The comment could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'comment', $postid]);
    }

    public $paginate = [
        'limit' => 4
    ];
}
