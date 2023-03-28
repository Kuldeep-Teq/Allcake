<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * LikeDislike Controller
 *
 * @property \App\Model\Table\LikeDislikeTable $LikeDislike
 * @method \App\Model\Entity\LikeDislike[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LikeDislikeController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Model = $this->loadModel('Users');
    }


    public function likeProducts($id = null)
    {
        $user = $this->Authentication->getIdentity();
        $uid = $user->id;

        $this->paginate = [
            'contain' => ['Users', 'Products'],
        ];
        $likeDislike = $this->paginate($this->LikeDislike);
        dd($likeDislike);

        return $this->redirect(['controller' => 'Users', 'action' => 'index']);

        $this->set(compact('likeDislike'));
    }

    public function dislikeProducts()
    {
        return $this->redirect(['controller' => 'Users', 'action' => 'index']);
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    // public function index()
    // {
    //     $this->paginate = [
    //         'contain' => ['Users', 'Products'],
    //     ];
    //     $likeDislike = $this->paginate($this->LikeDislike);

    //     $this->set(compact('likeDislike'));
    // }

    // /**
    //  * View method
    //  *
    //  * @param string|null $id Like Dislike id.
    //  * @return \Cake\Http\Response|null|void Renders view
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function view($id = null)
    // {
    //     $likeDislike = $this->LikeDislike->get($id, [
    //         'contain' => ['Users', 'Products'],
    //     ]);

    //     $this->set(compact('likeDislike'));
    // }

    // /**
    //  * Add method
    //  *
    //  * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
    //  */
    // public function add()
    // {
    //     $likeDislike = $this->LikeDislike->newEmptyEntity();
    //     if ($this->request->is('post')) {
    //         $likeDislike = $this->LikeDislike->patchEntity($likeDislike, $this->request->getData());
    //         if ($this->LikeDislike->save($likeDislike)) {
    //             $this->Flash->success(__('The like dislike has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The like dislike could not be saved. Please, try again.'));
    //     }
    //     $users = $this->LikeDislike->Users->find('list', ['limit' => 200])->all();
    //     $products = $this->LikeDislike->Products->find('list', ['limit' => 200])->all();
    //     $this->set(compact('likeDislike', 'users', 'products'));
    // }

    // /**
    //  * Edit method
    //  *
    //  * @param string|null $id Like Dislike id.
    //  * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function edit($id = null)
    // {
    //     $likeDislike = $this->LikeDislike->get($id, [
    //         'contain' => [],
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $likeDislike = $this->LikeDislike->patchEntity($likeDislike, $this->request->getData());
    //         if ($this->LikeDislike->save($likeDislike)) {
    //             $this->Flash->success(__('The like dislike has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The like dislike could not be saved. Please, try again.'));
    //     }
    //     $users = $this->LikeDislike->Users->find('list', ['limit' => 200])->all();
    //     $products = $this->LikeDislike->Products->find('list', ['limit' => 200])->all();
    //     $this->set(compact('likeDislike', 'users', 'products'));
    // }

    // /**
    //  * Delete method
    //  *
    //  * @param string|null $id Like Dislike id.
    //  * @return \Cake\Http\Response|null|void Redirects to index.
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $likeDislike = $this->LikeDislike->get($id);
    //     if ($this->LikeDislike->delete($likeDislike)) {
    //         $this->Flash->success(__('The like dislike has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The like dislike could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
}
