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
            'limit' => 9999,
            'contain' => ['Personas', 'Turnos']
        ];
        //$users = $this->Users->find('all');
        $users = $this->paginate($this->Users);
        //pj($users);
        //die();
        $this->set('users', $users);
    }

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

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function home()
    {
        $this->render();
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $Users = $this->Users->patchEntity($Users, $this->request->getData());
            if ($this->Users->save($Users)) {
                $this->Flash->success(__('El Empleado ha sido actualizado exitosamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El Empleado no pudo actualizado. Por favor, intente nuevamente.'));
        }
        $this->set(compact('users'));
        $this->set('_serialize', ['persona']);
    }

    public function edit($id)
    {
        $user = $this->Users->get($id);
        //pj($user);
        //die();
        
                if ($this->request->is(['Patch', 'post', 'put'])) 
                {
                    $user = $this->Users->patchEntity($user, $this->request->data);
                    if ($this->Users->save($user)) 
                    {
                        $this->Flash->success("El Empleado a sido modificado Exitosamente");
                        $this->redirect(['action' => 'index']);
                    }
                    else 
                    {
                        $this->Flash->error("El Empleado no pudo ser modificado. Por favor, Intente nuevamente"); 
                    }
                }
        
                $this->set(compact("user"));
    }
}
