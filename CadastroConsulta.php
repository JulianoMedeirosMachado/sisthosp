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
    ?>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <form class="m-5" action="ConsultaCadastrada.php" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Cpf</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="cpf">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>

    </form>


</body>

</html>