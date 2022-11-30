
<?php
include("db.php");
$db = new Database;
$idFicha = $_GET['consulta'];
$consulta = $db->load("ficha", $idFicha);
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

    <form class="m-5" action="EdicaoSucesso.php" method="post">
        <?php
        $fields = array("nome", "queixa", "pressao", "oxigenacao", "cid", "descricao", "status");
        $paciente = $db->load("prontuarios_db", $consulta['id_paciente']);
        $consulta = array_merge($paciente, $consulta);
        foreach($fields as $field){
            echo "
            <div class='mb-3'>
            <label for='$field' class='form-label'>".ucfirst($field)."</label>
            <input type='text' class='form-control' id='$field' value='$consulta[$field]' name='consulta[$field]'>
            </div>
            ";
        }
        echo "   <div class='mb-3'>
        <input type='hidden' class='form-control' id='id-consulta' value='$idFicha' name='consulta[id]'>
        </div>"
        ?>
        
        <button type="submit" class="btn btn-primary">Salvar alterações</button>

    </form>

</body>

</html>
