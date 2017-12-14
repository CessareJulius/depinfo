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
    public $personaCliente = [];

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

    public function registrosActivos()
    {
        $registrosActivos = $this->DetalleRegistroEquipos->find('all', [
            'contain' => [
                'Equipos', 
                'RegistroEquipos' => [
                    'Personas',
                    'Users' => [
                        'Personas'
                    ]
                ]
            ],
            'conditions' => [
                'DetalleRegistroEquipos.status' => "activo"
            ]
        ]);
        //pj($registrosActivos);die();
        $this->set('registrosActivos', $registrosActivos);
    }

    public function registrosAnulados()
    {
        $registrosAnulados = $this->DetalleRegistroEquipos->find('all', [
            'contain' => [
                'Equipos', 
                'RegistroEquipos' => [
                    'Personas',
                    'Users' => [
                        'Personas'
                    ]
                ]
            ],
            'conditions' => [
                'DetalleRegistroEquipos.status' => "anulado"
            ]
        ]);
        //pj($registrosAnulados);die();
        $this->set('registrosAnulados', $registrosAnulados);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formCedula = true;
        $detalleRegistroEquipo = $this->DetalleRegistroEquipos->newEntity();
        $this->loadModel("Personas");
        
        if ($this->request->is('post')) {
            //pj($this->request->data['Personas']['cedula']);die();

            // ------ pregunto si viene algun dato del form
            if (isset($this->request->data)) {
                //pj($this->request->data);die();

                // ------ pregunto si viene un form con button de nombre buscarCedula 
                if (isset($this->request->data['buscarCedula']) && $this->request->data['buscarCedula'] == 'bCedula') {
                    //pj($this->request->data);die();
                    $cedula = $this->request->data['cedula'];

                    $cliente = $this->Personas->find('all', [
                        'conditions' => [
                            'cedula' => $cedula
                        ]
                    ]);
                    //pj($cliente);die();
                    $countClient = $cliente->count();
                    $formCedula = false;
                    if ($countClient > 0) {
                        foreach ($cliente as $value) {}
                        $id = $value['id'];
                        $cliente = $this->Personas->get($id);
                        $this->personaCliente = $cliente;
                        $this->Flash->warning("El Cliente con esa Cedula ya esta registrado. Por favor complete los datos del Equipo");
                        $this->set(compact('formCedula', 'countClient', 'cliente', 'detalleRegistroEquipo'));
                    } else {
                        $countClient = 0;
                        $this->Flash->warning("Cliente Nuevo. Por favor complete ambos Formularios");
                        $this->set(compact('formCedula', 'countClient', 'cliente', 'detalleRegistroEquipo'));
                    }
                    //pj($cliente);die();
                } 
                
                if (isset($this->request->data['crearRegistro']) && $this->request->data['crearRegistro'] == 'cRegistro') {
                    //pj($this->request->data);die();
                    $persona = $this->validateCedula($this->request->data['Personas']['cedula']);

                    if (isset($this->request->data['Personas']['cedula']) && $this->request->data['Personas']['cedula'] == $persona['cedula']) {
                        //$this->request->data['Personas'] = $persona;
                        $this->saveRegistro($this->request->data(), $persona['id']);
                        //pj($persona['id']);die();
                        //pj($this->request->data);die();
                    } else {
                        $this->saveRegistro($this->request->data(), $this->savePersona($this->request->data()));
                        //pj($cedula);die();
                    } 
                }
            }
        }
        $this->set(compact('formCedula', 'detalleRegistroEquipo'));
        /*
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
        */
    }
    public function validateCedula($cedula) {
        $this->loadModel("Personas");
        $cliente = $this->Personas->find('all', [
            'conditions' => [
                'cedula' => $cedula
            ]
        ]);
        if ($cliente->count() > 0) {
            foreach ($cliente as $key => $value) {}
            $persona = $value;
        } else {
            $persona = 0;
        }
        return $persona;
    }
    public function savePersona($data) {
        //$this->loadModel('Users');
        //$user = $this->Auth->user();
        //pj($user['id']);die();
        $this->loadModel('Personas');
        $data['Personas']['status'] = 2;
        $persona = $this->Personas->newEntity();
        $persona = $this->Personas->patchEntity($persona, $data);
        //pj($persona);die();
        if ($this->Personas->save($persona)) {
            $id = $persona->id;
            return $id;
        }
        $this->Flash->error(__('El Cliente no pudo ser creado. Por Favor, intente nuevamente.'));
    }

    public function saveRegistro($data, $id) {

        // ------ agregar los datos del equipo
        if ($data['Equipos']['departamento'] == "") {
            $data['Equipos']['departamento'] = null;
        }

        $this->loadModel('Equipos');
        $data['Equipos']['status'] = 'reparando';
        $equipo = $this->Equipos->newEntity();
        $equipo = $this->Equipos->patchEntity($equipo, $data);

        if ($this->Equipos->save($equipo)) {
            $equipo_id = $equipo->id;

            // -------- agregar los datos del registroEquipo
            $user = $this->Auth->user();
            $this->loadModel('RegistroEquipos');
            $data['RegistroEquipos']['persona_id'] = $id;
            $data['RegistroEquipos']['user_id'] = $user['id'];
            $registroEquipo = $this->RegistroEquipos->newEntity();
            $registroEquipo = $this->RegistroEquipos->patchEntity($registroEquipo, $data);
    
            if ($this->RegistroEquipos->save($registroEquipo)) {
                $registroEquipo_id = $registroEquipo->id;
    
                // -------- agregar los datos del registroEquipo

                $detalleRegistroEquipo = $this->DetalleRegistroEquipos->newEntity();
                $detalleRegistroEquipo->status = 'activo';
                $detalleRegistroEquipo->falla = $data['DetalleRegistroEquipos']['falla'];
                $detalleRegistroEquipo->reparacion = null;
                $detalleRegistroEquipo->equipo_id = $equipo_id;
                $detalleRegistroEquipo->registro_equipos_id = $registroEquipo_id;

                if ($this->DetalleRegistroEquipos->save($detalleRegistroEquipo)) {
                    $this->Flash->success(__('Se han registrado los datos exitosamente.'));
    
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('El registro no pudo ser creado. Por favor, intente nuevamente.'));   
            }
            $this->Flash->error(__('No se pudo crear en RegistroEquipo. Por Favor, intente nuevamente.'));

        }
        $this->Flash->error(__('El Equipo no pudo ser creado. Por Favor, intente nuevamente.'));
            
        //pj($id);die();
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

    public function addReparacion($id)
    {
        $addReparacion = $this->DetalleRegistroEquipos->get($id, [
            'contain' => []
        ]);
        $this->loadModel('Equipos');
        //pj($equipo);die();
        
        if ($this->request->is(['patch', 'post', 'put'])){
            $addReparacion = $this->DetalleRegistroEquipos->patchEntity($addReparacion, $this->request->getData());
            if ($this->DetalleRegistroEquipos->save($addReparacion)) {
                
                $equipo = $this->Equipos->get($addReparacion->equipo_id, [
                    'contain' => []
                ]);
                $equipo->status = 'reparado';
                if ($this->Equipos->save($equipo)) {

                    $this->Flash->success(__('Se ha agregado la reparacion exitosamente.'));

                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error("No se pudo cambiar el status del equipo. Por Favor, intente nuevamente");
                }
            }
            $this->Flash->error(__('The detalle registro equipo could not be saved. Please, try again.'));
        }
        $this->set('addReparacion', $addReparacion);
    }

    public function anular($id)
    {
        $registro = $this->DetalleRegistroEquipos->get($id, [
            'contain' => []
        ]);
        $registro->status = 'anulado';
        if ($this->DetalleRegistroEquipos->save($registro)) {
            $this->Flash->success(__('Se han anulado el registro exitosamente.'));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error("No se pudo anular el registro. Por Favor, intente nuevamente");
        }
    }

    public function activar($id)
    {
        $registro = $this->DetalleRegistroEquipos->get($id, [
            'contain' => []
        ]);
        $registro->status = 'activo';
        if ($this->DetalleRegistroEquipos->save($registro)) {
            $this->Flash->success(__('Se han activado el registro exitosamente.'));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error("No se pudo activar el registro. Por Favor, intente nuevamente");
        }
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
