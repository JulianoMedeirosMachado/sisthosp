<?php
include("db.php");

//Puxando os registros da table com a função.
$_db = new Database;
$_registers = $_db->getRegisters("prontuarios_db");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prontuários</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>

<body>

    <?php
    include("header.php");
    ?>
<div class="text-center">
    <h1 class="text-center m-2">Prontuários cadastrados</h1>
    <a type="button" class="btn btn-primary m-5" href="CadastroProntuario.php">
    Adicionar novo
    </a>
</div>
    <table class="table">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Histórico</th>
                <th scope="col">Nome</th>
                <th scope="col">Cpf</th>
                <th scope="col">SUS</th>
                <th scope="col">Telefone</th>
            </tr>
        </thead>
        <tbody>

            <?php

            foreach ($_registers as $id => $register) {
                $url ="consultas.php?paciente=".$register['id'];
                echo "<tr>
                <td>{$register['id']}</td>
                <td><a href='$url' type='submit' class='btn btn-primary'>Ver</a></td>
                <td>{$register['nome']}</td>
                <td>{$register['cpf']}</td>
                <td>{$register['sus']}</td>
                <td>{$register['telefone']}</td>
                </tr>";

            }
            ?>

        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>