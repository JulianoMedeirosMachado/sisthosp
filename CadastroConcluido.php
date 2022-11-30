<?php
include("db.php");
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
    $db = new Database;
    ?>

    <div style="display:flex; justify-content:center; align-items: center; height: 100vh; width: 100vw;">

    <?php
    if ($db->addRegisterPaciente($_POST['prontuario'])):
    ?>
    <h3 class="text-center">Cadastro realizado com sucesso!!!!</h3>
    <a type="button" class="btn btn-primary m-5" style="float: center;" href="prontuarios.php">
        Voltar a lista
    </a>
    <?php else:
    ?>
    <h3>Cadastro não foi realizado</h3>
        <a type="button" class="btn btn-primary m-5" href="prontuarios.php">
            Voltar a lista
        </a>
    <?php
    endif;
        ?>
    <script src="https://code.jquery.com/jquery.js"></script>
    </div>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>