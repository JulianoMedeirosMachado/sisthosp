<?php
use FTP\Connection;


class Database
{
    protected $connect;
    protected $db;
    public function __construct()
    {
        $this->connect = mysqli_connect("localhost", "root", "") or DIE("Falha ao conectar ao servidor");
        $this->db = mysqli_select_db($this->connect, "sisthosp") or DIE("Falha ao selecionar o banco de dados");
    }

    public function getRegisters($tablename)
    {
        $query = "SELECT * FROM {$tablename}";
        $result = mysqli_query($this->connect, $query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addRegisterPaciente($paciente)
    {
        if (!$paciente['nome'] || !$paciente['cpf'] || !$paciente['sus'] || !$paciente['telefone']) {
            return false;
        }

        $query = "INSERT INTO prontuarios_db (nome, cpf, sus, telefone) VALUES ('{$paciente['nome']}', '{$paciente['cpf']}', '{$paciente['sus']}', '{$paciente['telefone']}')";
        return mysqli_query($this->connect, $query);
    }

    public function load($tableName, $id)
    {
        $query = "SELECT * FROM {$tableName} WHERE `id` = '$id'";
        $results = mysqli_query($this->connect, $query)->fetch_all(MYSQLI_ASSOC);
        if (!empty($results)) {
            return $results[0];
        }
        return false;
    }
    public function updateStatus($statusNum)
    {
        $query = "UPDATE ficha SET 'status' = `$statusNum'')";
        return mysqli_query($this->connect, $query);
    }

    public function checarCpf($cpf)
    {
        $query = "SELECT * FROM prontuarios_db WHERE `cpf` = '$cpf'";
        $results = mysqli_query($this->connect, $query)->fetch_all(MYSQLI_ASSOC);
        if (!empty($results)) {
            return $results[0];

        }


        return false;
    }
    
    public function addFicha($paciente)
    {
        $query = "INSERT INTO ficha (id_paciente, status) VALUES ('{$paciente}', '1')";
        return mysqli_query($this->connect, $query);
    }

    public function updateFicha($fichaUpdate)
    {
        unset($fichaUpdate["nome"]);
        $parameters = array();
        $id = $fichaUpdate["id"];
        unset($fichaUpdate["id"]);
        $query = "UPDATE ficha SET ";
        foreach($fichaUpdate as $column=>$value){
            $parameters[]="$column = '$value'";
        }
        $parametersString = implode(", ", $parameters);
        $query.=$parametersString." WHERE id='$id'";
        return mysqli_query($this->connect, $query);
    }
}
?>