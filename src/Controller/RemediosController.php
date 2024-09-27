<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Remedios Controller
 *
 * @property \App\Model\Table\RemediosTable $Remedios
 * @method \App\Model\Entity\Remedio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RemediosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->loadModel('Remedios');
        $remedios = $this->Remedios->find()
        ->select([
            'id',
            'remedios' => $this->Remedios->find()->func()->concat([
                'nome' => 'literal',
                ' - ',
                'tipo' => 'literal',
                ' - ',
                'quantidade' => 'literal',
                   ' - ',
                'dosagem' => 'literal'
            ])
        ])
        ->all();
        $this->set(compact('remedios'));
        return $this->render('remedios_combobox');

    }

    /**
     * View method
     *
     * @param string|null $id Remedio id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $remedio = $this->Remedios->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('remedio'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $remedio = $this->Remedios->newEmptyEntity();
        if ($this->request->is('post')) {
            $remedio = $this->Remedios->patchEntity($remedio, $this->request->getData());
            if ($this->Remedios->save($remedio)) {
                $this->Flash->success(__('The remedio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The remedio could not be saved. Please, try again.'));
        }
        $this->set(compact('remedio'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Remedio id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $remedio = $this->Remedios->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $remedio = $this->Remedios->patchEntity($remedio, $this->request->getData());
            if ($this->Remedios->save($remedio)) {
                $this->Flash->success(__('The remedio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The remedio could not be saved. Please, try again.'));
        }
        $this->set(compact('remedio'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Remedio id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $remedio = $this->Remedios->get($id);
        if ($this->Remedios->delete($remedio)) {
            $this->Flash->success(__('The remedio has been deleted.'));
        } else {
            $this->Flash->error(__('The remedio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
