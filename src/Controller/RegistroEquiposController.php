<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RegistroEquipos Controller
 *
 * @property \App\Model\Table\RegistroEquiposTable $RegistroEquipos
 *
 * @method \App\Model\Entity\RegistroEquipo[] paginate($object = null, array $settings = [])
 */
class RegistroEquiposController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personas', 'Users']
        ];
        $registroEquipos = $this->paginate($this->RegistroEquipos);

        $this->set(compact('registroEquipos'));
        $this->set('_serialize', ['registroEquipos']);
    }

    /**
     * View method
     *
     * @param string|null $id Registro Equipo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $registroEquipo = $this->RegistroEquipos->get($id, [
            'contain' => ['Personas', 'Users']
        ]);

        $this->set('registroEquipo', $registroEquipo);
        $this->set('_serialize', ['registroEquipo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $registroEquipo = $this->RegistroEquipos->newEntity();
        if ($this->request->is('post')) {
            $registroEquipo = $this->RegistroEquipos->patchEntity($registroEquipo, $this->request->getData());
            if ($this->RegistroEquipos->save($registroEquipo)) {
                $this->Flash->success(__('The registro equipo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The registro equipo could not be saved. Please, try again.'));
        }
        $personas = $this->RegistroEquipos->Personas->find('list', ['limit' => 200]);
        $users = $this->RegistroEquipos->Users->find('list', ['limit' => 200]);
        $this->set(compact('registroEquipo', 'personas', 'users'));
        $this->set('_serialize', ['registroEquipo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Registro Equipo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $registroEquipo = $this->RegistroEquipos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $registroEquipo = $this->RegistroEquipos->patchEntity($registroEquipo, $this->request->getData());
            if ($this->RegistroEquipos->save($registroEquipo)) {
                $this->Flash->success(__('The registro equipo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The registro equipo could not be saved. Please, try again.'));
        }
        $personas = $this->RegistroEquipos->Personas->find('list', ['limit' => 200]);
        $users = $this->RegistroEquipos->Users->find('list', ['limit' => 200]);
        $this->set(compact('registroEquipo', 'personas', 'users'));
        $this->set('_serialize', ['registroEquipo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Registro Equipo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $registroEquipo = $this->RegistroEquipos->get($id);
        if ($this->RegistroEquipos->delete($registroEquipo)) {
            $this->Flash->success(__('The registro equipo has been deleted.'));
        } else {
            $this->Flash->error(__('The registro equipo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
