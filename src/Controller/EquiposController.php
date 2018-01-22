<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Equipos Controller
 *
 *
 * @method \App\Model\Entity\Equipo[] paginate($object = null, array $settings = [])
 */
class EquiposController extends AppController
{
    public function isAuthorized($user) { //pj($user);die();
        

        if (isset($user['role']) and $user['role'] === 'user') {

            if (in_array($this->request->action, ['index', 'view', 'edit', 'reparando', 'reparados', 'entregados'])) {

                return true;
            }
        }
        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $equipos = $this->paginate($this->Equipos);
        //pj($equipos);die();

        $this->set(compact('equipos'));
        $this->set('_serialize', ['equipos']);
    }

    public function reparando() {
        $equipos_EnRep = $this->Equipos->find('all', [
            'contain' => [
                'DetalleRegistroEquipos' => [
                    'RegistroEquipos'
                ]
            ],
            'conditions' => [
                'Equipos.status' => "reparando"
            ]
        ]);
        //pj($equipos_EnRep);die();

        $this->set(compact('equipos_EnRep'));
        $this->set('_serialize', ['equipos_EnRep']);
    }

    public function reparados() {
        $equipos_Reparados = $this->Equipos->find('all', [
            'contain' => [
                'DetalleRegistroEquipos'
            ],
            'conditions' => [
                'Equipos.status' => "reparado"
            ]
        ]);
        //pj($equipos_Reparados);die();

        $this->set(compact('equipos_Reparados'));
        $this->set('_serialize', ['equipos_Reparados']);
    }

    public function entregados() {
        $equipos_Entregados = $this->Equipos->find('all', [
            'contain' => [
                'DetalleRegistroEquipos'
            ],
            'conditions' => [
                'Equipos.status' => "entregado"
            ]
        ]);
        //pj($equipos_Ent);die();

        $this->set(compact('equipos_Entregados'));
        $this->set('_serialize', ['equipos_Entregados']);
    }

    public function entregarEquipo($id)
    {
        $equipo = $this->Equipos->get($id, [
            'contain' => []
        ]);
        $equipo->status = 'entregado';
        if ($this->Equipos->save($equipo)) {
            $this->Flash->success(__('Se ha cambiado el status del equipo a entregado.'));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error("No se pudo cambiar el status del equipo. Por Favor, intente nuevamente");
        }
    }

    /**
     * View method
     *
     * @param string|null $id Equipo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $equipo = $this->Equipos->get($id, [
            'contain' => []
        ]);
        //pj($equipo);die();
        $this->set('equipo', $equipo);
        $this->set('_serialize', ['equipo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $equipo = $this->Equipos->newEntity();
        if ($this->request->is('post')) {
            $equipo = $this->Equipos->patchEntity($equipo, $this->request->getData());
            if ($this->Equipos->save($equipo)) {
                $this->Flash->success(__('El equipo ha sido creado exitosamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El equipo no pudo ser creado, Por favor, intente nuevamente.'));
        }
        $this->set(compact('equipo'));
        $this->set('_serialize', ['equipo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Equipo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $equipo = $this->Equipos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            if ($this->request->data['departamento'] == "") {
                $this->request->data['departamento'] = null;
            }
            //pj($this->request->data());die();
            
            $equipo = $this->Equipos->patchEntity($equipo, $this->request->getData());
            if ($this->Equipos->save($equipo)) {
                $this->Flash->success(__('El equipo ha sido editado exitosamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El equipo no pudo ser editado, Por favor, intente nuevamente.'));
        }
        $this->set(compact('equipo'));
        $this->set('_serialize', ['equipo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Equipo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $equipo = $this->Equipos->get($id);
        if ($this->Equipos->delete($equipo)) {
            $this->Flash->success(__('El equipo ha sido borrado exitosamente.'));
        } else {
            $this->Flash->error(__('El equipo no pudo ser borrado. Por favor intente nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
