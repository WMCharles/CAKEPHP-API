<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\View\JsonView;

class UsersController extends AppController
{

    public function viewClasses(): array
    {
        return [JsonView::class];
    }

    public function index()
    {
        $users = $this->Users->find('all')->all();
        $this->set('users', $users);
        $this->viewBuilder()->setOption('serialize', ['users']);
    }

    public function view($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        $this->set('user', $user);
        $this->viewBuilder()->setOption('serialize', ['user']);
    }

    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                // $this->Flash->success(__('The user has been saved.'));
                // return $this->redirect(['action' => 'index']);
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
            // $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        // $this->set(compact('user'));
        $this->set([
            'message' => $message,
            'recipe' => $user,
        ]);
        $this->viewBuilder()->setOption('serialize', ['user',  'message']);
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                // $this->Flash->success(__('The user has been saved.'));
                // return $this->redirect(['action' => 'index']);
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
            // $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        // $this->set(compact('user'));
        $this->set([
            'message' => $message,
            'recipe' => $user,
        ]);
        $this->viewBuilder()->setOption('serialize', ['user',  'message']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            // $this->Flash->success(__('The user has been deleted.'));
            $message = 'Deleted';
        } else {
            // $this->Flash->error(__('The user could not be deleted. Please, try again.'));
            $message = 'Error';
        }
        // # documentation
        // # $message = 'Deleted';
        // if (!$this->Recipes->delete($user)) {
        //     $message = 'Error';
        // }
        // return $this->redirect(['action' => 'index']);
        $this->set('message', $message);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }
}
