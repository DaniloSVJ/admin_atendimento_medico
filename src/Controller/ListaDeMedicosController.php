<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;

/**
 * ListaDeMedicos Controller
 *
 * @method \App\Model\Entity\ListaDeMedico[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ListaDeMedicosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->loadModel('Medicos');

        $listaDeMedicos = $this->Medicos->find('all');

        $this->set('listaDeMedicos', $listaDeMedicos);
    }

    /**
     * View method
     *
     * @param string|null $id Lista De Medico id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $listaDeMedico = $this->ListaDeMedicos->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('listaDeMedico'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $listaDeMedico = $this->ListaDeMedicos->newEmptyEntity();
        if ($this->request->is('post')) {
            $listaDeMedico = $this->ListaDeMedicos->patchEntity($listaDeMedico, $this->request->getData());
            if ($this->ListaDeMedicos->save($listaDeMedico)) {
                $this->Flash->success(__('The lista de medico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lista de medico could not be saved. Please, try again.'));
        }
        $this->set(compact('listaDeMedico'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lista De Medico id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $listaDeMedico = $this->ListaDeMedicos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $listaDeMedico = $this->ListaDeMedicos->patchEntity($listaDeMedico, $this->request->getData());
            if ($this->ListaDeMedicos->save($listaDeMedico)) {
                $this->Flash->success(__('The lista de medico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lista de medico could not be saved. Please, try again.'));
        }
        $this->set(compact('listaDeMedico'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lista De Medico id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $listaDeMedico = $this->ListaDeMedicos->get($id);
        if ($this->ListaDeMedicos->delete($listaDeMedico)) {
            $this->Flash->success(__('The lista de medico has been deleted.'));
        } else {
            $this->Flash->error(__('The lista de medico could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
