<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Shell\ConsoleShell;
use Symfony\Component\Console\Event\ConsoleEvent;
use Composer\EventDispatcher\Event;

/**
 * Users Controller
 *
 */
class UsersController extends AppController
{
    public function isAuthorized($user) { //pj($user);die();
        

        if (isset($user['role']) and $user['role'] === 'user') {

            if (in_array($this->request->action, ['home', 'edit', 'profile', 'logout'])) {

                return true;
            }
        }
        return parent::isAuthorized($user);
    }

    public function loadSession($id) {

        $this->loadModel('Sessions');

        $session = $this->Sessions->find('all', [
            'conditions' => [
                'status' => 'activa',
                'user_id' => $id
            ]
        ]);
        return $session;
    }

    public function login()
    {
        if ($this->request->is('post')) 
        {
            $user = $this->Auth->identify();

            if ($user) {
                $sessExist = $this->loadSession($user['id']);
                
                $countData = $sessExist->count();
                if ($countData > 0) {
                    foreach ($sessExist as $value) {}
                    if ($value['id']) {
                        $this->Auth->setUser($user);
                        return $this->redirect($this->Auth->redirectUrl());
                    }
                } elseif ($countData == 0) {
                    
                    $session = $this->Sessions->newEntity();
                    $session->user_id = $user['id'];
                    $session->status = 'activa';
    
                    if ($this->Sessions->save($session)) {
    
                        $this->Auth->setUser($user);
                        return $this->redirect($this->Auth->redirectUrl());
                    }

                } elseif ($sessExist == null) {
                    echo "Este usuario no tiene una session activa";
                }

            } else {
                $this->Flash->error("Los Datos son invalidos, Por favor, intente nuevamente", ['key' => 'auth']);
            }
        }
    }

    public function home()
    {
        $user = $this->Auth->user();
        $session = $this->loadSession($user['id']);
        $countData = $session->count();

        if ($countData > 0) {
            
                // ----------- Contador de Clientes --------
            $this->loadModel('Personas');
            $clientes = $this->Personas->find('all', [
                'conditions' => [
                    'status' => 2
                ]
            ]);

            $clientCount = $clientes->count();

            // ------- Empleados Registrados ---------
            $users = $this->Users->find('all', [
                'conditions' => [
                    'role' => 'user'
                ]
            ]);

            $empCount = $users->count();

            // ------- Sessions Activas
            $this->loadModel('Sessions');
            $sessExist = $this->Sessions->find('all', [
                'contain' => ['Users'],
                'conditions' => [
                    'Users.role' => 'user',
                    'Sessions.status' => 'activa'
                ]
            ]);
            $sessCount = $sessExist->count();
            if ($sessCount > 0 ) {
                
            } else {
                $sessCount = 0;
            }
            //pj($sessCount);die();

            // ------- Registros Creados
            $this->loadModel('DetalleRegistroEquipos');
            $registroEquipos = $this->DetalleRegistroEquipos->find('all');
            $registroCount = $registroEquipos->count();
            if ($registroCount > 0 ) {
                
            } else {
                $registroCount = 0;
            }
            //pj($registroEquipos);die();

            // ------- Equipos en Reparacion 
            $this->loadModel('Equipos');
            $Equipos_EnRep = $this->Equipos->find('all', [
                'conditions' => [
                    'status' => "reparando"
                ]
            ]);
            $equip_EnRepCount = $Equipos_EnRep->count();
            if ($equip_EnRepCount > 0 ) {
                
            } else {
                $equip_EnRepCount = 0;
            }
            //pj($equipCount);die();

            // ------- Equipos Reparados
            $Equipos_Rep = $this->Equipos->find('all', [
                'conditions' => [
                    'status' => "reparado"
                ]
            ]);
            $equip_RepCount = $Equipos_Rep->count();
            if ($equip_RepCount > 0 ) {
                
            } else {
                $equip_RepCount = 0;
            }
            //pj($equip_RepCount);die();
            
            // ------- Equipos Reparados
            $Equipos_Ent = $this->Equipos->find('all', [
                'conditions' => [
                    'status' => "entregado"
                ]
            ]);
            $equip_EntCount = $Equipos_Ent->count();
            if ($equip_EntCount > 0 ) {
                
            } else {
                $equip_EntCount = 0;
            }
            //pj($equip_EntCount);die(); 

        } else {
            $this->Flash->error("Error. Usted ha sido desconectado por el Administrador.");
            return $this->redirect($this->Auth->logout());
        }
        //pj($countData);die();

        /* 
        
        
        
        */
        //pj($clientCount);die();

        $this->set(compact('clientCount', 'registroCount', 'empCount', 'sessCount', 'equip_EnRepCount', 'equip_RepCount', 'equip_EntCount'));
    }

    public function index()
    {

        $this->paginate = [
            'conditions' => ['role' => 'user'],
            'limit' => 9999,
            'contain' => ['Personas']
        ];
        //$users = $this->Users->find('all');
        $users = $this->paginate($this->Users);
        //pj($users);die();
        $this->set('users', $users);
    }

    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Personas']
        ]);
            
        //pj($user);die();
    
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    public function profile($id = null)
    {
        $user = $this->Auth->user();
        $session = $this->loadSession($user['id']);
        $countData = $session->count();

        if ($countData > 0) {

            $user = $this->Users->get($id, [
                'contain' => ['Personas']
            ]);
            
            //pj($user);
            //die();
    
            $this->set('user', $user);
            $this->set('_serialize', ['user']);

        } else {
            $this->Flash->error("Error. Usted ha sido desconectado por el Administrador.");
            return $this->redirect($this->Auth->logout());
        }
    }

    public function add()
    {
        /* $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $this->request->data['Personas']['status'] = 1;
            $user->role = 'user';
            $user->cargo = 'empleado';
            $user->active = 1;
            $user->tur_id = 1;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('El Empleado ha sido creado exitosamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El Empleado no pudo ser creado. Por Favor, intente nuevamente.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
         */
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
                
            $this->request->data['Personas']['status'] = 1;
            $user->role = 'user';
            $user->cargo = 'empleado';
            $user->active = 1;
    
            $this->loadModel('Personas');
            $persona = $this->Personas->newEntity();
            $persona = $this->Personas->patchEntity($persona, $this->request->getData());
            if ($this->Personas->save($persona)) {
                $id = $persona->id;
                $user->per_id = $id;
    
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('El Empleado ha sido creado exitosamente.'));
        
                    return $this->redirect(['action' => 'index']);
                }
            } 
            $this->Flash->error(__('El Empleado no pudo ser creado. Por Favor, intente nuevamente.'));
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function edit($id = null)
    {

        $user = $this->Auth->user();
        $session = $this->loadSession($user['id']);
        $countData = $session->count();

        if ($countData > 0) {

            $user = $this->Users->get($id, [
                'contain' => ['Personas']
            ]);
            //pj($user);
            //die();
    
            if ($this->request->is(['Patch', 'post', 'put'])) {
                
                $user = $this->Users->patchEntity($user, $this->request->data);
                if ($this->Users->save($user)) {
                    $this->Flash->success("El usuario a sido modificado Exitosamente");
                    $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error("El usuario no pudo ser modificado. Por favor, Intente nuevamente"); 
                }
            }
    
            $this->set(compact("user"));

        } else {
            $this->Flash->error("Error. Usted ha sido desconectado por el Administrador.");
            return $this->redirect($this->Auth->logout());
        }
    }

    public function closedSession($id) {
        $user = $this->Auth->user();

        if ($id == $user['id']) {
            $session = $this->loadSession($id);
            
            foreach ($session as $value) {}
            $idSession = $value['id'];
            $session = $this->Sessions->get($idSession, [
                        'contain' => []
            ]);
            $session->status = 'terminada';
            if ($this->Sessions->save($session)) {
                return $this->redirect($this->Auth->logout());
            } else {
                $this->Flash->error("No se pudo desconectar");
            }
        } else {
            $session = $this->loadSession($id);
            
            foreach ($session as $value) {}
            $idSession = $value['id'];
            $session = $this->Sessions->get($idSession, [
                        'contain' => []
            ]);
            $session->status = 'terminada';
            if ($this->Sessions->save($session)) {
                return $this->redirect("/Users/home");
            } else {
                $this->Flash->error("El empleado no se pudo desconectar");
            }
        }
    }

    public function logout()
    {
        $user = $this->Auth->user();
        $closedS = $this->closedSession($user['id']); 
    } 
}
