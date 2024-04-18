<?php

namespace funcoes;

class PuxarFuncoes {
        public function __construct() {
            //ARRUMAR UM JEITO DE DIMINUIR ISSO
            $dbhost = 'localhost';
            $dbname = 'registros';
            $dbuser = 'root';
            $dbpass = '';

            // Conexão com o banco de dados usando PDO
            $this->pdo = new \PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        public function  TestandoFuncoes(){

        }


    }
?>