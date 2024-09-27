<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Atendimento Controller
 *
 * @property \App\Model\Table\AtendimentoTable $Atendimento
 * @method \App\Model\Entity\Atendimento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AtendimentoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->loadModel('Atendimento');

        $listaDeAtendimento = $this->Atendimento->find('all');

        $this->set('listaDeAtendimento', $listaDeAtendimento);
    }

    public function atendidos()
    {
        // Busca os atendimentos com status "atendido"
        $this->loadModel('Atendimento');

        $atendimentos = $this->Atendimento->find('all', [
            'conditions' => ['Atendimento.status' => 'finalizado'],
            'contain' => ['Medicos','Pacientes']

        ]);

        $this->set(compact('atendimentos'));
        $this->render('atendidos');

    }

    public function naoAtendidos()
    {
        // Busca os atendimentos com status "não atendido"
        $this->loadModel('Atendimento');

        $atendimentos = $this->Atendimento->find('all', [
            'conditions' => ['Atendimento.status' => 'espera'],
            'contain' => ['Medicos','Pacientes']
        ]);

        $this->set(compact('atendimentos'));
        $this->render('naoAtendidos'); // Nome correto da view

    }

    /**
     * View method
     *
     * @param string|null $id Atendimento id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Atendimento');

        // Carregar o modelo Tratamento
        $this->loadModel('Tratamento');
        $this->loadModel('Remedios');

        // Busca o atendimento
        $atendimento = $this->Atendimento->get($id,[
            'contain' => ['Medicos','Pacientes']

        ]);
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
        $tratamentos = $this->Tratamento->find()
        ->select([
            'id',
            'tratamento' => $this->Tratamento->find()->func()->concat([
                'nome' => 'literal',
                ' - ',
                'tipo' => 'literal',
                ' - ',
                'descricao' => 'literal'
            ])
        ])
        ->all();

        // Passa as variáveis para a view
        $this->set(compact('atendimento','tratamentos','remedios'));
        $this->render('atendimento'); // Nome correto da view

    }
    public function review($id = null)
    {
        $this->loadModel('Atendimento');

        // Carregar o modelo Tratamento
        $this->loadModel('Tratamento');
        $this->loadModel('Remedios');

        // Busca o atendimento
        $atendimento = $this->Atendimento->get($id,[
            'contain' => ['Medicos','Pacientes']

        ]);
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
        $tratamentos = $this->Tratamento->find()
        ->select([
            'id',
            'tratamento' => $this->Tratamento->find()->func()->concat([
                'nome' => 'literal',
                ' - ',
                'tipo' => 'literal',
                ' - ',
                'descricao' => 'literal'
            ])
        ])
        ->all();

        // Passa as variáveis para a view
        $this->set(compact('atendimento','tratamentos','remedios'));
        $this->render('verificar'); // Nome correto da view

    }
    public function finalizar($id = null)
    {
        $this->request->allowMethod(['post', 'put']);
        $this->loadModel('Atendimento'); // Certifique-se de que está carregando o modelo

        // Buscar o atendimento pelo ID
        $atendimento = $this->Atendimento->get($id);

        // Atualizar os dados do atendimento
        $atendimento->diagnostico = $this->request->getData('diagnostico');
        $atendimento->tratamento = $this->request->getData('tratamento');
        $atendimento->data_fim = (new \DateTime())->format('Y-m-d');
        $atendimento->observacoes = $this->request->getData('observacoes');
        $atendimento->receita = $this->request->getData('receita');
        $atendimento->sintomas = $this->request->getData('sintomas');
        $atendimento->status = 'finalizado';

        // Salvar os dados atualizados
        if ($this->Atendimento->save($atendimento)) {
            $this->Flash->success(__('Atendimento finalizado com sucesso.'));

            // Redirecionar para a rota desejada após finalizar
            return $this->redirect(['controller' => 'Atendimento', 'action' => 'naoAtendidos']);
        } else {
            $this->Flash->error(__('Ocorreu um erro ao finalizar o atendimento. Tente novamente.'));
        }
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $atendimento = $this->Atendimento->newEmptyEntity();
        if ($this->request->is('post')) {
            $atendimento = $this->Atendimento->patchEntity($atendimento, $this->request->getData());
            if ($this->Atendimento->save($atendimento)) {
                $this->Flash->success(__('The atendimento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The atendimento could not be saved. Please, try again.'));
        }
        $medicos = $this->Atendimento->Medicos->find('list', ['limit' => 200])->all();
        $pacientes = $this->Atendimento->Pacientes->find('list', ['limit' => 200])->all();
        $this->set(compact('atendimento', 'medicos', 'pacientes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Atendimento id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */


    /**
     * Delete method
     *
     * @param string|null $id Atendimento id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $atendimento = $this->Atendimento->get($id);
        if ($this->Atendimento->delete($atendimento)) {
            $this->Flash->success(__('The atendimento has been deleted.'));
        } else {
            $this->Flash->error(__('The atendimento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
