<?php

$_SESSION['banco'] = 'sqlite';

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
