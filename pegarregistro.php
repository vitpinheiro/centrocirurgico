<?php
namespace teste;

$puxardados = new PuxarDados();

class PuxarDados {
    private $pdo;

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

    public function pegarregistro() {
        try {
            $sql= "SELECT plano_saude, quantidade_jan, quantidade_fev, quantidade_mar FROM registros_hospital ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultados;
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    
    public function pegarcirurgioes() {
        try {
            $sql= "SELECT nome, CRM, especialidade, email, telefone, quantidade FROM cirurgioes ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultados;
        } catch (\PDOException $e) {
            throw $e;
        }
    }
    public function pegarcirurgias() {
        try {

            $sql = "SELECT quantidade, especialidade, SUM(quantidade) AS quantidade_total 
                    FROM cirurgioes 
                    GROUP BY especialidade"; // Agrupa os resultados pela especialidade

                    $stmt = $this->pdo->prepare($sql);
                    // Executa a consulta SQL
                    $stmt->execute();
                    // Obtém os resultados da consulta como um array associativo
                    $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    // Retorna os resultados
                    return $resultados;
                    
        } catch (\PDOException $e) { // Trata qualquer exceção do tipo PDOException
            // Lança a exceção para ser tratada em outro lugar do código
            throw $e;
        }
    }
    
    
    public function pegarGenero() {
        try {
            $sql = "SELECT genero, COUNT(*) AS quantidade FROM pacientes GROUP BY genero";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultados;
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function pegarestado() {
        try {
            $sql = "SELECT estado, COUNT(*) AS quantidade FROM pacientes GROUP BY estado";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultados;
        } catch (\PDOException $e) {
            throw $e;
        }
    }
}




?>