<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <style>
    .widget-shadow {
        background-color: #fff;
        box-shadow: 0 -1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24);
        -webkit-box-shadow: 0 -1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24);
        -moz-box-shadow: 0 -1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24);
    }
    </style>
</head>

<body>


    <div style="backgroud-colo">
        <div class="bs-example widget-shadow" style="padding:15px" id="listar"><small>


                <table class="table table-hover dataTable no-footer" id="tabela" role="grid"
                    aria-describedby="tabela_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 435px;">Médico</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 435px;">Paciente</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 435px;">Sala</th>                            </th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 435px;">Diagnostico</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 435px;">Tratamento</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 435px;">Observação</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 435px;">Data de Inicio</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 435px;">Data de Fim</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 435px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($atendimentos as $atendimento): ?>
                        <tr class="odd">
                            <td><?= h($atendimento->medico->nome) ?></td>
                            <td><?= h($atendimento->paciente->nome) ?></td>
                            <td><?= h($atendimento->sala) ?></td>
                            <td><?= h($atendimento->diagnostico) ?></td>
                            <td><?= h($atendimento->tratamento) ?></td>
                            <td><?= h($atendimento->observacoes) ?></td>
                            <td><?= h($atendimento->data_inicio->format('d/m/Y')) ?></td>
                            <td><?= h($atendimento->data_fim ? $atendimento->data_fim->format('d/m/Y') : 'N/A') ?></td>
                            <td>
                                <a style="padding: 5px; border-radius: 5px; background-color: #00008B; color:#FFFFFF" href="/verificar/<?= $atendimento->id ?>" class="btn btn-success">Revisar</a>
                            </td>                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>


                <script type="text/javascript">
                let table = new DataTable('#tabela', {
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.13.2/i18n/pt-BR.json"
                    }
                });
                </script>

        </div>
    </div>

</body>

</html>
