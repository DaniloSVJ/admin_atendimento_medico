<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atendimento Médico</title>
</head>

<body>

    <h1 style="">Atendimento Medico</h1>
    <?= $this->Form->create($atendimento, ['url' => ['controller' => 'Atendimento', 'action' => 'finalizar', $atendimento->id]]) ?>
    <?= $this->Form->hidden('medico_id', ['value' => $atendimento->medico->id]) ?>
    <?= $this->Form->hidden('paciente_id', ['value' => $atendimento->paciente->id]) ?>

    <div style="display: flex; flex-direction :row;">
        <label for="medico">Dr(a):</label>
        <?= $this->Form->text('medico', ['value' => $atendimento->medico->nome, 'readonly' => true]) ?>
    </div>

    <div style="display: flex; flex-direction :row;">
        <label for="paciente">Paciente: </label>
        <?= $this->Form->text('paciente', ['value' => $atendimento->paciente->nome, 'readonly' => true]) ?>
    </div>

    <label for="sintomas">Sintomas:</label>
    <?= $this->Form->textarea('sintomas', ['value' => $atendimento->sintomas, 'required' => true]) ?>

    <label for="diagnostico">Diagnóstico:</label>
    <?= $this->Form->textarea('diagnostico', ['value' => $atendimento->diagnostico, 'required' => true]) ?>

    <label for="receita">Receita:</label>
    <?= $this->element('remedios_combobox', ['remedios' => $remedios]) ?>
    <button type="button" onclick='addToReceita()'style="background-color: #1E90FF; border-color:#1E90FF; ">Adicionar</button>
    <?= $this->Form->textarea('receita', ['value' => $atendimento->receita, 'required' => true, 'id'=>'receita']) ?>

    <label for="tratamento">Tratamento:</label>
    <?= $this->element('tratamentos_combobox', ['tratamentos' => $tratamentos]) ?>

    <label for="observacoes">Observações:</label>
    <?= $this->Form->textarea('observacoes', ['value' => $atendimento->observacoes]) ?>

    <button type="submit" style="background-color: #008000; border-color:#008000; ">Finalizar Atendimento</button>
    <?= $this->Form->end() ?>

    <script>
    function addToReceita() {
        // Obtém o combobox (select) e textarea
        var selectBox = document.getElementById('remedios_id');
        var textArea = document.getElementById('receita');

        // Pega o valor/texto selecionado do combobox
        var selectedText = selectBox.options[selectBox.selectedIndex].text;

        // Adiciona o texto selecionado em uma nova linha no textarea
        textArea.value += selectedText + "\n";
    }
    </script>
</body>

</html>
