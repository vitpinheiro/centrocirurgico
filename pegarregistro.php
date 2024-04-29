<?php
namespace teste;




class PuxarFuncoes {
    private $pdo;

        public function __construct() {
            //ARRUMAR UM JEITO DE DIMINUIR ISSO
            $dbhost = 'localhost';
            $dbname = 'centrocirurgico';
            $dbuser = 'root';
            $dbpass = '';

            // Conexão com o banco de dados usando PDO
            $this->pdo = new \PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        public function pegarstatus() {
            try {
                $sql= "SELECT status, COUNT(*) AS quantidade FROM procedimentos GROUP BY status ";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultados;
            } catch (\PDOException $e) {
                throw $e;
            }
        }

        public function pegarQuantidadeConcluidos() {
            try {
                $sql = "SELECT COUNT(*) AS quantidade FROM procedimentos WHERE status = 'Concluído'";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchColumn(); // Apenas uma coluna é retornada
                return $resultado;
            } catch (\PDOException $e) {
                throw $e;
            }
        }

        public function pegarQuantidadeEmAndamento() {
            try {
                $sql = "SELECT COUNT(*) AS quantidade FROM procedimentos WHERE status = 'Em andamento'";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchColumn(); // Apenas uma coluna é retornada
                return $resultado;
            } catch (\PDOException $e) {
                throw $e;
            }
        }
        
        public function pegarQuantidadePendentes() {
            try {
                $sql = "SELECT COUNT(*) AS quantidade FROM procedimentos WHERE status = 'Pendente'";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchColumn(); // Apenas uma coluna é retornada
                return $resultado;
            } catch (\PDOException $e) {
                throw $e;
            }
        }
        
        public function contarCirurgias(){

            try{   
                 $sql ="SELECT 
                        -- proc.id as idprocedimento,
                        -- proc.id_cirugia,
                        -- ciru.id as idcirurgia,

                        ciru.cirurgia as ciru1,
                        COUNT(id_cirugia) AS quantidade_total
                            FROM procedimentos as proc
                            INNER JOIN cirurgias as ciru ON ciru.id = proc.id_cirugia
                            GROUP BY proc.id_cirugia";
                    
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchColumn(); // Apenas uma coluna é retornada
                return $resultado;

            } catch (\PDOException $e) {
                throw $e;
            }

           
        }

        public function cirurgiasporsetor(){

            try{   
                    $sql ="SELECT
                    seto.nome_setor as setor ,
                    COUNT(proc.id_cirugia) AS total_cirurgias
                FROM
                    centrocirurgico.procedimentos AS proc
                INNER JOIN
                    centrocirurgico.setores AS seto ON proc.id_setores = seto.id
                INNER JOIN
                    centrocirurgico.cirurgias AS ciru ON proc.id_cirugia = ciru.id
                GROUP BY
                    seto.nome_setor;";
                    
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchColumn(); // Apenas uma coluna é retornada
                return $resultado;

            } catch (\PDOException $e) {
                throw $e;
            }

           
        }


    
        public function cirurgioesporsetor() {
            try{  
                $sql= " SELECT  
                ciru.id_setores as idsetor,
                ciru.nome,
                seto.nome_setor
                FROM cirurgioes as ciru 
                INNER JOIN setores as seto
                ON seto.id = ciru.id_setores
                ORDER BY id_setores ASC";
              
              $stmt = $this->pdo->prepare($sql);
              $stmt->execute();
              $resultado = $stmt->fetchColumn(); // Apenas uma coluna é retornada
              return $resultado;

          } catch (\PDOException $e) {
              throw $e;
          }
      }
    


        
      public function pegarinfo() {
        try {
            $sql = "SELECT
            pac.id_procedimentos as id,
            pac.nome as paciente,
            seto.nome_setor as setor,
            proc.leito,
            proc.status
            
            FROM centrocirurgico.pacientes as pac 
            INNER JOIN procedimentos as proc
            ON proc.id = pac.id_procedimentos
            INNER JOIN setores as seto
            ON proc.id_setores = seto.id" ;

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



        public function pegarnomestatus() {
            try {
                $sql = "SELECT p.nome, proc.status  
                        FROM pacientes as p
                        INNER JOIN procedimentos as proc
                        ON proc.id = p.id_procedimentos";
    
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
    
    }
    