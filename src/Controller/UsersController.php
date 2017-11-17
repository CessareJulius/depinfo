<?php
namespace App\Controller;

use App\Controller\AppController;

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

    public function createSession() {
        return  print ("hola mundo");
    }

    public function login()
    {
        if ($this->request->is('post')) 
        {
            $user = $this->Auth->identify();

            if ($user) {   
                $this->loadModel('Sessions');
                $sessExist = $this->Sessions->find('all', [
                    'conditions' => [
                        'status' => 'activa',
                        'user_id' => $user['id']
                    ]
                ]);
                
                $countData = $sessExist->count();
                if ($countData > 0) {

                    foreach ($sessExist as $key => $value) {}
                    if ($value['id']) {
                        $this->Flash->error("Este usuario tiene una session activa, 
                        de ser un error comuniquese con el administrador");
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
        //pj($clientCount);die();

        $this->set(compact('clientCount', 'empCount', 'sessCount'));
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

    public function profile($id = null)
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
    }

    public function logout()
    {
        // Obtener todos los datos del usuario logeado
        $user = $this->Auth->user();

        // Cargamos el modelo Sessions
        $this->loadModel('Sessions');

        // Buscamos la session que tenga activa el usuario actual. Esto nos retorna un array
        $querySession = $this->Sessions->find('all', [
            'conditions' => [
                'status' => 'activa',
                'user_id' => $user['id']
            ]
        ]);
        foreach ($querySession as $value) {
            # code...
        }
        $idSession = $value['id'];

        $session = $this->Sessions->get($idSession, [
            'contain' => []
        ]);
        $session->status = 'terminada';
        if ($this->Sessions->save($session)) {
            return $this->redirect($this->Auth->logout());
        }
        //pj($session);die();

        /*
        $session = $this->Sessions->get("Sessions");
        $query = $session->query();
        $result = $query
                        ->update('sessions')
                        ->set(['status' => 'terminada'])
                        ->where(['id' => $idSession])
                        ->execute();
        */
        /*
        // Obtenemos permisos para editar la entidad
        $othersession = TableRegistry::get('Sessions');
        $user = $othersession->get($session['id']);
        //$session->status = 'terminada';
        */
        //pj($session);die();
        //UPDATE `sessions` SET `status` = 'activa' WHERE `sessions`.`id` = 1;
        
    } 
}
