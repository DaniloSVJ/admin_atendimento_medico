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
                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 435px;">Nome</th>
                            <th class="esc sorting_disabled" rowspan="1" colspan="1" style="width: 107px;">CRM</th>

                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 94px;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php foreach ($listaDeMedicos as $medicos): ?>
                        <tr class="odd">
                            <td>
                                <input type="checkbox" id="seletor-57" class="form-check-input"
                                    onchange="selecionar('57')">
                                 <?=  $medicos->nome ;?>
                            </td>
                            <td class="esc"> <?= $medicos->crm ;?></td>

                            <td>
                                <big><a href="#"
                                        onclick="editar('57','Euclides de Souza','','','','38914417891','','','Sim','00/00/0000')"
                                        title="Editar Dados"><i class="fa fa-edit text-primary"></i></a></big>

                                <li class="dropdown head-dpdn2" style="display: inline-block;">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false"><big><i class="fa fa-trash-o text-danger"></i></big></a>

                                    <ul class="dropdown-menu" style="margin-left:-230px;">
                                        <li>
                                            <div class="notification_desc2">
                                                <p>Confirmar Exclusão? <a href="#" onclick="excluir('57')"><span
                                                            class="text-danger">Sim</span></a></p>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                                <big><a href="#"
                                        onclick="mostrar('Euclides de Souza','','','','38914417891','17/08/2024','','','Sim','00/00/0000')"
                                        title="Mostrar Dados"><i class="fa fa-info-circle text-primary"></i></a></big>


                                <big><a href="#" onclick="arquivo('57', 'Euclides de Souza')"
                                        title="Inserir / Ver Arquivos"><i class="fa fa-file-o "
                                            style="color:#22146e"></i></a></big>

                                <big><a href="#" onclick="reservas('57', 'Euclides de Souza')" title="Ver Reservas"><i
                                            class="fa fa-calendar" style="color:#827878"></i></a></big>


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
