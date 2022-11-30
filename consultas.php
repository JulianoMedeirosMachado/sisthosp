<?php
include("db.php");

$showComplete = false;
$pacienteId = false;
if(isset($_GET["paciente"])){
    $pacienteId = $_GET["paciente"];
    $showComplete = true;
}
//Puxando os registros da table com a função.
$STATUS = array(
    "1" => "Em espera",
    "2" => "Em atendimento",
    "3" => "Aguardando exames/medicamento",
    "4" => "Finalizado"
);
$_db = new Database;
$_registers = $_db->getRegisters("ficha");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>

<body>

    <?php
    include("header.php");
    ?>
    <h1 class="text-center m-2">Consultas</h1>
            <div class="text-center">
                <a type="button" class="btn btn-primary m-5" href="CadastroConsulta.php">
                    Nova consulta
                </a>
            </div>

            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cpf</th>
                        <th scope="col">SUS</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Status</th>
                        <th scope="col">Editar</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

            foreach ($_registers as $id => $register) {
                if($register["status"] == "4" && !$showComplete) continue;
                if($register["id_paciente"] == $pacienteId || !$pacienteId){
                    $paciente = $_db->load("prontuarios_db", $register["id_paciente"]);
                    $status = $STATUS[$register['status']];
                    $url = 'EditarConsulta.php?consulta='.$register["id"];
                    echo "<tr>
                    <td>{$register['id']}</td>
                    <td>{$paciente['nome']}</td>
                    <td>{$paciente['cpf']}</td>
                    <td>{$paciente['sus']}</td>
                    <td>{$paciente['telefone']}</td>
                    <td>{$status}</td>
                    <td><a href='$url' type='submit' class='btn btn-primary'>Editar</a></td>
                    </tr>";
                }
            }
            ?>

                </tbody>
            </table>

            <script src="https://code.jquery.com/jquery.js"></script>
            <script src="js/bootstrap.min.js"></script>
</body>

</html>