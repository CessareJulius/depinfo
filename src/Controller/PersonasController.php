<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Personas Controller
 *
 *
 * @method \App\Model\Entity\Persona[] paginate($object = null, array $settings = [])
 */
class PersonasController extends AppController
{

    public function isAuthorized($user) { //pj($user);die();

        if (isset($user['role']) and $user['role'] === 'user') {

            if (in_array($this->request->action, ['index', 'view', 'add', 'edit'])) {

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

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $user = $this->Auth->user();
        $session = $this->loadSession($user['id']);
        $countData = $session->count();

        if ($countData > 0) {

            $this->paginate = [
                'conditions' => ['status' => 2],
                'limit' => 9999
            ];
            $personas = $this->paginate($this->Personas);
            $this->set(compact('personas'));
            $this->set('_serialize', ['personas']);
            
        } else {
            $this->Flash->error("Error. Usted ha sido desconectado por el Administrador.");
            return $this->redirect($this->Auth->logout());
        }
    }

    /**
     * View method
     *
     * @param string|null $id Persona id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Auth->user();
        $session = $this->loadSession($user['id']);
        $countData = $session->count();

        if ($countData > 0) {

            $persona = $this->Personas->get($id, [
                'contain' => []
            ]);
            //pj($persona);
            //die();
    
            $this->set('persona', $persona);
            $this->set('_serialize', ['persona']);

        } else {
            $this->Flash->error("Error. Usted ha sido desconectado por el Administrador.");
            return $this->redirect($this->Auth->logout());
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Auth->user();
        $session = $this->loadSession($user['id']);
        $countData = $session->count();

        if ($countData > 0) {
            
            $persona = $this->Personas->newEntity();
            
            if ($this->request->is('post')) {
                $persona = $this->Personas->patchEntity($persona, $this->request->getData());
                $persona->status = 2;
                if ($this->Personas->save($persona)) {
                    $this->Flash->success(__('El Cliente ha sido creado exitosamente.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('El cliente no pudo ser creado. Por favor, intente nuevamente.'));
            }
            $this->set(compact('persona'));
            $this->set('_serialize', ['persona']);

        } else {
            $this->Flash->error("Error. Usted ha sido desconectado por el Administrador.");
            return $this->redirect($this->Auth->logout());
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Persona id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Auth->user();
        $session = $this->loadSession($user['id']);
        $countData = $session->count();

        if ($countData > 0) {

            $persona = $this->Personas->get($id, [
                'contain' => []
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $persona = $this->Personas->patchEntity($persona, $this->request->getData());
                if ($this->Personas->save($persona)) {
                    $this->Flash->success(__('Los datos han sido actualizados correctamente.'));
    
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Los datos no pudieron ser actualizados. Por favor, intente nuevamente.'));
            }
            $this->set(compact('persona'));
            $this->set('_serialize', ['persona']);

        } else {
            $this->Flash->error("Error. Usted ha sido desconectado por el Administrador.");
            return $this->redirect($this->Auth->logout());
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Persona id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $user = $this->Auth->user();
        $session = $this->loadSession($user['id']);
        $countData = $session->count();

        if ($countData > 0) {

            $this->request->allowMethod(['post', 'delete']);
            $persona = $this->Personas->get($id);
            if ($this->Personas->delete($persona)) {
                $this->Flash->success(__('El cliente ha sido Eliminado exitosamente.'));
            } else {
                $this->Flash->error(__('El cliente no puedo ser eliminado. Por favor, intentelo nuevamente.'));
            }
    
            return $this->redirect(['action' => 'index']);
            
        } else {
            $this->Flash->error("Error. Usted ha sido desconectado por el Administrador.");
            return $this->redirect($this->Auth->logout());
        }
    }
}
