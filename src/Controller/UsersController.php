<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 */
class UsersController extends AppController
{
    public function index()
    {
        $this->paginate = [
            'limit' => 5,
        ];
        //$users = $this->Users->find('all');
        $users = $this->paginate($this->Users);
        //pj($users);
        //die();
        $this->set('users', $users);
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $Users = $this->Users->patchEntity($Users, $this->request->getData());
            if ($this->Users->save($Users)) {
                $this->Flash->success(__('The Users has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Users could not be saved. Please, try again.'));
        }
        $this->set(compact('users'));
        $this->set('_serialize', ['persona']);
    }

    public function edit($id)
    {
        echo "Editar usuario: ".$id;
        exit();
    }
}
