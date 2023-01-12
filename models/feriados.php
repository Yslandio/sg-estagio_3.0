<?php

$_SESSION['banco'] = 'mysql';

function connection()
{ // Faz a conexão com o banco de dados    
    switch ($_SESSION['banco']) {
        case 'mysql':
            $dbtype = 'mysql';
            $dbname = 'sg_estagio';
            $host = 'localhost';
            $user = 'root';
            $password = '';
            break;
        case 'sqlite':
            $dbtype = 'sqlite';
            $dbname = 'sg_estagio';
    }

    try {
        if ($_SESSION['banco'] == 'mysql') {
            $connection = new PDO("$dbtype:dbname=$dbname;host=$host", "$user", "$password");
        }
        elseif ($_SESSION['banco'] == 'sqlite') {
            $connection = new PDO("$dbtype:banco.$dbname");
            $connection->exec(
                "CREATE TABLE IF NOT EXISTS feriados (
                id INTEGER PRIMARY KEY AUTOINCREMENT, 
                description_date TEXT, 
                holidayDate DATE NOT NULL
                )"
            );
        }
    } catch (PDOException $erro) {
        echo "Erro de conexão ao banco de dados! <br><br>" . $erro->getMessage();
        die();
    }

    return $connection;
}

function allHolidays($ano = null)
{ // Retorna todos os campos da tabela de feriados
    $connection = connection();

    $ano = $ano ?? date('Y');

    $feriados = $connection->query("SELECT * FROM feriados WHERE holidayDate LIKE '%$ano%' ORDER BY holidayDate DESC");

    $feriados = $feriados ? $feriados->fetchAll(PDO::FETCH_ASSOC) : [];

    return $feriados;
}

function getHolidays($ano = null)
{ // Retorna as data de feriado / não letiva do banco de dados com base em um ano ou tudo caso não especifique o ano
    $connection = connection();

    $feriados = $connection->query("SELECT holidayDate FROM feriados WHERE holidayDate LIKE '%$ano%' ORDER BY holidayDate DESC");

    $feriados = $feriados ? $feriados->fetchAll(PDO::FETCH_ASSOC) : [];

    // return $feriados;

    // Se for cadastrado a data no banco de dados no formato americano presisa descomentar o código abaixo e comentar a linha 27 com o retorno
    $holidayDays = [];

    if (!empty($feriados)) {
        foreach ($feriados as $feriado) {
            $holidayDays[] = date('d/m/Y', strtotime($feriado['holidayDate'])); // Converte o formato de data para o padrão brasileiro
            // $holidayDays[] = implode('/', array_reverse(explode('-', $feriado['holidayDate']))); // Este também converte o formato de data para o padrão brasileiro
        }
    }

    return $holidayDays;
}

function storeHoliday($description, $date)
{ // Cadastra feriado / data não letiva
    $connection = connection();

    // $date = date('d/m/Y', strtotime($date)); // Converte o formato de data para o padrão brasileiro
    // $date = implode('/', array_reverse(explode('-', $date))); // Este também converte o formato de data para o padrão brasileiro

    // Verificar se a data já está cadastrada no banco de dados
    try {
        $holidayDate = $connection->query("SELECT holidayDate FROM feriados WHERE holidayDate = '$date'");
    } catch (PDOException $erro) {
        echo "Erro ao tentar cadastrar a data no banco de dados! <br><br>" . $erro->getMessage();
        die();
    }
    if ($holidayDate->fetchColumn() > 0)
        return false;

    try {
        $connection->query("INSERT INTO feriados (description_date, holidayDate) VALUES ('$description', '$date')");
    } catch (PDOException $erro) {
        echo "Erro ao tentar cadastrar a data no banco de dados! <br><br>" . $erro->getMessage();
        die();
    }

    return true;
}

function destroyHoliday($id)
{ // Exclui feriado / data não letiva
    $connection = connection();

    try {
        $connection->query("DELETE FROM feriados WHERE id LIKE '$id'");
    } catch (PDOException $erro) {
        echo "Erro ao tentar excluir a data no banco de dados! <br><br>" . $erro->getMessage();
        die();
    }

    return true;
}
