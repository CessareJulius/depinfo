<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DetalleRegistroEquipos Controller
 *
 * @property \App\Model\Table\DetalleRegistroEquiposTable $DetalleRegistroEquipos
 *
 * @method \App\Model\Entity\DetalleRegistroEquipo[] paginate($object = null, array $settings = [])
 */
class DetalleRegistroEquiposController extends AppController
{
    public function isAuthorized($user) { //pj($user);die();
        

        if (isset($user['role']) and $user['role'] === 'user') {

            if (in_array($this->request->action, ['index','add', 'view', 'edit'])) {

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
        $this->paginate = [
            'contain' => [
                'Equipos', 
                'RegistroEquipos' => [
                    'Personas',
                    'Users' => [
                        'Personas'
                    ]
                ]
            ]
        ];
        $detalleRegistroEquipos = $this->paginate($this->DetalleRegistroEquipos);
        //pj($detalleRegistroEquipos);die();
        $this->set(compact('detalleRegistroEquipos'));
        $this->set('_serialize', ['detalleRegistroEquipos']);
    }

    /**
     * View method
     *
     * @param string|null $id Detalle Registro Equipo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detalleRegistroEquipo = $this->DetalleRegistroEquipos->get($id, [
            'contain' => [
                'Equipos', 
                'RegistroEquipos' => [
                    'Personas',
                    'Users' => [
                        'Personas'
                    ]
                ]
            ]
        ]);

        $this->set('detalleRegistroEquipo', $detalleRegistroEquipo);
        $this->set('_serialize', ['detalleRegistroEquipo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $detalleRegistroEquipo = $this->DetalleRegistroEquipos->newEntity();
        if ($this->request->is('post')) {
            $detalleRegistroEquipo = $this->DetalleRegistroEquipos->patchEntity($detalleRegistroEquipo, $this->request->getData());
            if ($this->DetalleRegistroEquipos->save($detalleRegistroEquipo)) {
                $this->Flash->success(__('The detalle registro equipo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detalle registro equipo could not be saved. Please, try again.'));
        }
        $equipos = $this->DetalleRegistroEquipos->Equipos->find('list', ['limit' => 200]);
        $registroEquipos = $this->DetalleRegistroEquipos->RegistroEquipos->find('list', ['limit' => 200]);
        $this->set(compact('detalleRegistroEquipo', 'equipos', 'registroEquipos'));
        $this->set('_serialize', ['detalleRegistroEquipo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Detalle Registro Equipo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detalleRegistroEquipo = $this->DetalleRegistroEquipos->get($id, [
            'contain' => []
        ]);
        //pj($detalleRegistroEquipo);die();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detalleRegistroEquipo = $this->DetalleRegistroEquipos->patchEntity($detalleRegistroEquipo, $this->request->getData());
            if ($this->DetalleRegistroEquipos->save($detalleRegistroEquipo)) {
                $this->Flash->success(__('The detalle registro equipo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detalle registro equipo could not be saved. Please, try again.'));
        }
        $this->set(compact('detalleRegistroEquipo'));
        $this->set('_serialize', ['detalleRegistroEquipo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Detalle Registro Equipo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detalleRegistroEquipo = $this->DetalleRegistroEquipos->get($id);
        if ($this->DetalleRegistroEquipos->delete($detalleRegistroEquipo)) {
            $this->Flash->success(__('The detalle registro equipo has been deleted.'));
        } else {
            $this->Flash->error(__('The detalle registro equipo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
