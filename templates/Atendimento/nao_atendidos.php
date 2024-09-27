<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css" rel="stylesheet">

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
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 435px;">Sala</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 435px;">Data de Início</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 435px;"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($atendimentos as $atendimento): ?>
                        <tr class="odd">

                            <!-- Exibe o nome do médico -->
                            <td><?= h($atendimento->medico->nome) ?></td>

                            <!-- Exibe o nome do paciente -->
                            <td><?= h($atendimento->paciente->nome) ?></td>

                            <td><?= h($atendimento->sala) ?></td>

                            <td><?= h($atendimento->data_inicio->format('d/m/Y')) ?></td>

                            <td>
                                <a style="padding: 5px; border-radius: 5px; background-color: green; color:#FFFFFF" href="/atender/<?= $atendimento->id ?>" class="btn btn-success">Atender</a>
                            </td>
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
