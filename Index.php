<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Manipulando Dados em XML</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <h1 class="page-header text-center">Manipulando Dados em XML</h1>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <a href="#addnew" class="btn btn-primary" data￾toggle="modal"><span class="glyphicon glyphicon-plus"></span> Novo</a>
                <?php
                session_start();
                if (isset($_SESSION['message'])) {
                ?>

                    <div class="alert alert-info text-center" style="margin￾top:20px;">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                <?php
                    unset($_SESSION['message']);
                }
                ?>
                <table class="table table-bordered table-striped" style="margin￾top:20px;">
                    <thead>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Apelido</th>
                        <th>Genero</th>
                        <th>Curso</th>
                        <th>Data de Nascimento</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <?php
                        //load xml file
                        $file = simplexml_load_file('estudantes.xml');

                        foreach ($file->estudante as $linha) {
                        ?>
                            <tr>
                                <td><?php echo $linha->id; ?></td>
                                <td><?php echo $linha->nome; ?></td>
                                <td><?php echo $linha->apelido; ?></td>
                                <td><?php echo $linha->genero; ?></td>
                                <td><?php echo $linha->curso; ?></td>
                                <td><?php echo date('d/m/Y', strtotime($linha->dataNascimento)); ?></td>
                                <td>
                                    <a href="#edit_<?php echo $linha->id; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon
    glyphicon-edit"></span> Editar</a>
                                </td>
                                <td>
                                    <a href="#delete_<?php echo $linha->id; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon
    glyphicon-trash"></span> Remover</a>
                                </td>
                                <?php include 'edit_delete_modal.php'; ?>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include 'add_modal.php'; ?>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>