<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Tratamento Controller
 *
 * @property \App\Model\Table\TratamentoTable $Tratamento
 * @method \App\Model\Entity\Tratamento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TratamentoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->loadModel('Tratamento'); // Carrega o modelo Tratamentos

        // Busca os tratamentos e concatena as colunas
        $tratamentos = $this->Tratamento->find()
            ->select([
                'id',
                'tratamento' => $this->Tratamento->find()->func()->concat([
                    'nome' => 'literal',
                    ' - ',
                    'diagnostico' => 'literal',
                    ' - ',
                    'tratamento' => 'literal'
                ])
            ])
            ->all();

        // Passa os tratamentos para a view
        $this->set(compact('tratamentos'));
        return $this->render('tratamentos_combobox');
    }

    /**
     * View method
     *
     * @param string|null $id Tratamento id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tratamento = $this->Tratamento->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tratamento'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tratamento = $this->Tratamento->newEmptyEntity();
        if ($this->request->is('post')) {
            $tratamento = $this->Tratamento->patchEntity($tratamento, $this->request->getData());
            if ($this->Tratamento->save($tratamento)) {
                $this->Flash->success(__('The tratamento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tratamento could not be saved. Please, try again.'));
        }
        $this->set(compact('tratamento'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tratamento id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tratamento = $this->Tratamento->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tratamento = $this->Tratamento->patchEntity($tratamento, $this->request->getData());
            if ($this->Tratamento->save($tratamento)) {
                $this->Flash->success(__('The tratamento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tratamento could not be saved. Please, try again.'));
        }
        $this->set(compact('tratamento'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tratamento id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tratamento = $this->Tratamento->get($id);
        if ($this->Tratamento->delete($tratamento)) {
            $this->Flash->success(__('The tratamento has been deleted.'));
        } else {
            $this->Flash->error(__('The tratamento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
