<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <style>
    /* Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
    }

    /* Wrapper que inclui sidebar e conteúdo principal */
    .wrapper {
        display: flex;
    }

    /* Sidebar */
    .sidebar {
        width: 250px;
        background-color: #2c3e50;
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        display: flex;
        flex-direction: column;
    }

    .sidebar-header {
        padding: 20px;
        background-color: #1a252f;
        color: white;
        text-align: center;
    }

    .sidebar-menu {
        list-style-type: none;
        padding: 0;
    }

    .sidebar-menu li {
        padding: 15px 20px;
    }

    .sidebar-menu li a {
        color: white;
        text-decoration: none;
        display: block;
        font-size: 16px;
    }

    .sidebar-menu li a:hover {
        background-color: #34495e;
        border-radius: 4px;
    }

    /* Main Content */
    .main-content {
        margin-left: 250px;
        padding: 20px;
        width: 100%;
        height: 100vh;
        background-color: #ecf0f1;
    }

    .main-content h1 {
        color: #2c3e50;
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 100px;
        }

        .sidebar-header h2 {
            font-size: 16px;
        }

        .sidebar-menu li {
            padding: 10px 15px;
        }

        .sidebar-menu li a {
            font-size: 14px;
        }

        .main-content {
            margin-left: 100px;
        }
    }

    @media (max-width: 480px) {
        .sidebar {
            width: 60px;
        }

        .sidebar-header h2 {
            display: none;
        }

        .sidebar-menu li {
            padding: 8px;
            text-align: center;
        }

        .sidebar-menu li a {
            font-size: 12px;
            text-align: center;
        }

        .main-content {
            margin-left: 60px;
        }
    }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Sidebar</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <h2>Admin Panel</h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="/">Dashboard</a></li>
                <li><a href="#usuarios">Usuários</a></li>
                <li><a href="/atendimento">Atendimentos Médicos</a></li>
                <li><a href="#receitas">Receitas Médicas</a></li>
                <li><a href="#relatorios">Relatórios</a></li>
                <li><a href="#configuracoes">Configurações</a></li>
                <li><a href="#sair">Sair</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <h1>Bem-vindo ao Painel Administrativo</h1>
            <p>Aqui você pode gerenciar todas as funcionalidades do sistema.</p>
            <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
        </div>
    </div>



    <main class="main">

    </main>
    <footer>
    </footer>
</body>

</html>
