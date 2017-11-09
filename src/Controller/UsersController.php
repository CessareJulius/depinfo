<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 */
class UsersController extends AppController
{
    public function login()
    {
        if ($this->request->is('post')) 
        {
            $user = $this->Auth->identify();
            //pj($user);
            //die();
            if ($user) 
            {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            else {
                $this->Flash->error("Los Datos son invalidos, Por favor, intente nuevamente", ['key' => 'auth']);
            }
        }
    }

    public function home()
    {
        $this->render();
    }

    public function index()
    {
        $this->paginate = [
            'conditions' => ['status' => 1],
            'limit' => 9999,
            'contain' => ['Personas', 'Turnos']
        ];
        //$users = $this->Users->find('all');
        $users = $this->paginate($this->Users);
        //pj($users);
        //die();
        $this->set('users', $users);
    }

    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Personas']
        ]);
        
        //pj($user);
        //die();

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->users->save($user)) {
                $this->Flash->success(__('El Empleado ha sido creado exitosamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El Empleado no pudo ser creado. Por Favor, intente nuevamente.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Personas', 'Turnos']
        ]);
        //pj($user);
        //die();

        if ($this->request->is(['Patch', 'post', 'put'])) 
        {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) 
            {
                $this->Flash->success("El usuario a sido modificado Exitosamente");
                $this->redirect(['action' => 'index']);
            }
            else 
            {
                $this->Flash->error("El usuario no pudo ser modificado. Por favor, Intente nuevamente"); 
            }
        }

        $this->set(compact("user"));
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    } 
}
