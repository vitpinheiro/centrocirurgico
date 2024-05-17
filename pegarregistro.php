<?php
namespace teste;

use DateTime;




class PuxarFuncoes
{
    private $pdo;

    public function __construct()
    {
        //ARRUMAR UM JEITO DE DIMINUIR ISSO
        $dbhost = 'localhost';
        $dbname = 'centrocirurgico';
        $dbuser = 'root';
        $dbpass = '';

        // Conexão com o banco de dados usando PDO
        $this->pdo = new \PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function pegarstatus()
    {
        try {
            if (isset($_GET['mes'])) {
                $monthMap = array(
                    "Jan" => 1,
                    "Feb" => 2,
                    "Mar" => 3,
                    "Apr" => 4,
                    "May" => 5,
                    "Jun" => 6,
                    "Jul" => 7,
                    "Aug" => 8,
                    "Sep" => 9,
                    "Oct" => 10,
                    "Nov" => 11,
                    "Dec" => 12
                );
                $mesClicadoAbbr = $_GET['mes'];
                $mesClicado = $monthMap[$mesClicadoAbbr];
                $sql = "SELECT status, COUNT(*) AS quantidade FROM procedimentos as proc WHERE MONTH(proc.data)=$mesClicado GROUP BY status ";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultados;
            } else {
                $sql = "SELECT status, COUNT(*) AS quantidade FROM procedimentos as proc GROUP BY status ";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultados;
            }
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function pegarConcluidos()
    {
        try {
            if (isset($_GET['mes'])) {
                $monthMap = array(
                    "Jan" => 1,
                    "Feb" => 2,
                    "Mar" => 3,
                    "Apr" => 4,
                    "May" => 5,
                    "Jun" => 6,
                    "Jul" => 7,
                    "Aug" => 8,
                    "Sep" => 9,
                    "Oct" => 10,
                    "Nov" => 11,
                    "Dec" => 12
                );
                $mesClicadoAbbr = $_GET['mes'];
                $mesClicado = $monthMap[$mesClicadoAbbr];

                $sql = "SELECT 
                        ciru.cirurgia AS nome_cirurgia,
                        COUNT(proc.id_cirugia) AS quantidade_concluida
                    FROM 
                        procedimentos AS proc
                    INNER JOIN 
                        cirurgias AS ciru ON ciru.id = proc.id_cirugia
                    WHERE 
                        proc.status = 'Concluído'
                        AND MONTH(proc.data) = :mesClicado
                    GROUP BY 
                        ciru.cirurgia";

                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(['mesClicado' => $mesClicado]);
                $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultados;
            } else {
                $sql = "SELECT 
                        ciru.cirurgia AS nome_cirurgia,
                        COUNT(proc.id_cirugia) AS quantidade_concluida
                    FROM 
                        procedimentos AS proc
                    INNER JOIN 
                        cirurgias AS ciru ON ciru.id = proc.id_cirugia
                    WHERE 
                        proc.status = 'Concluído'
                    GROUP BY 
                        ciru.cirurgia";

                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultados;
            }
        } catch (\PDOException $e) {
            throw $e;
        }
    }


    public function pegarEmandamento()
    {
        try {
            if (isset($_GET['mes'])) {
                $monthMap = array(
                    "Jan" => 1,
                    "Feb" => 2,
                    "Mar" => 3,
                    "Apr" => 4,
                    "May" => 5,
                    "Jun" => 6,
                    "Jul" => 7,
                    "Aug" => 8,
                    "Sep" => 9,
                    "Oct" => 10,
                    "Nov" => 11,
                    "Dec" => 12
                );
                $mesClicadoAbbr = $_GET['mes'];
                $mesClicado = $monthMap[$mesClicadoAbbr];

                $sql = "SELECT 
                        ciru.cirurgia AS nome_cirurgia,
                        COUNT(proc.id_cirugia) AS quantidade_Em_andamento
                    FROM 
                        procedimentos AS proc
                    INNER JOIN 
                        cirurgias AS ciru ON ciru.id = proc.id_cirugia
                    WHERE 
                        proc.status = 'Em andamento'
                        AND MONTH(proc.data) = :mesClicado
                    GROUP BY 
                        ciru.cirurgia";

                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(['mesClicado' => $mesClicado]);
                $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultados;
            } else {
                $sql = "SELECT 
                        ciru.cirurgia AS nome_cirurgia,
                        COUNT(proc.id_cirugia) AS quantidade_Em_andamento
                    FROM 
                        procedimentos AS proc
                    INNER JOIN 
                        cirurgias AS ciru ON ciru.id = proc.id_cirugia
                    WHERE 
                        proc.status = 'Em andamento'
                    GROUP BY 
                        ciru.cirurgia";

                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultados;
            }
        } catch (\PDOException $e) {
            throw $e;
        }
    }
    public function pegarPendente()
    {
        try {
            if (isset($_GET['mes'])) {
                $monthMap = array(
                    "Jan" => 1,
                    "Feb" => 2,
                    "Mar" => 3,
                    "Apr" => 4,
                    "May" => 5,
                    "Jun" => 6,
                    "Jul" => 7,
                    "Aug" => 8,
                    "Sep" => 9,
                    "Oct" => 10,
                    "Nov" => 11,
                    "Dec" => 12
                );
                $mesClicadoAbbr = $_GET['mes'];
                $mesClicado = $monthMap[$mesClicadoAbbr];

                $sql = "SELECT 
                        ciru.cirurgia AS nome_cirurgia,
                        COUNT(proc.id_cirugia) AS quantidade_Pendente
                    FROM 
                        procedimentos AS proc
                    INNER JOIN 
                        cirurgias AS ciru ON ciru.id = proc.id_cirugia
                    WHERE 
                        proc.status = 'Pendente'
                        AND MONTH(proc.data) = :mesClicado
                    GROUP BY 
                        ciru.cirurgia";

                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(['mesClicado' => $mesClicado]);
                $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultados;
            } else {
                $sql = "SELECT 
                        ciru.cirurgia AS nome_cirurgia,
                        COUNT(proc.id_cirugia) AS quantidade_Pendente
                    FROM 
                        procedimentos AS proc
                    INNER JOIN 
                        cirurgias AS ciru ON ciru.id = proc.id_cirugia
                    WHERE 
                        proc.status = 'Pendente'
                    GROUP BY 
                        ciru.cirurgia";

                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultados;
            }
        } catch (\PDOException $e) {
            throw $e;
        }
    }


    // public function pegarTiposConcluidos() {
    //     try {
    //         if(isset($_GET['mes'])) {
    //             $monthMap = array(
    //                 "Jan" => 1,
    //                 "Feb" => 2,
    //                 "Mar" => 3,
    //                 "Apr" => 4,
    //                 "May" => 5,
    //                 "Jun" => 6,
    //                 "Jul" => 7,
    //                 "Aug" => 8,
    //                 "Sep" => 9,
    //                 "Oct" => 10,
    //                 "Nov" => 11,
    //                 "Dec" => 12
    //             );
    //             $mesClicadoAbbr = $_GET['mes'];
    //             $mesClicado = $monthMap[$mesClicadoAbbr];
    //         $sql = "SELECT 
    //         ciru.cirurgia AS nome_cirurgia,
    //         COUNT(proc.id_cirugia) AS quantidade_concluida
    //     FROM 
    //         procedimentos AS proc
    //     INNER JOIN 
    //         cirurgias AS ciru ON ciru.id = proc.id_cirugia
    //     WHERE 
    //         proc.status = 'Concluído'
    //     GROUP BY 
    //         ciru.cirurgia AND MONTH(proc.data)=$mesClicado";
    //         $stmt = $this->pdo->prepare($sql);
    //         $stmt->execute();
    //         $resultado = $stmt->fetchColumn(); // Apenas uma coluna é retornada
    //         return $resultado;
    //         }else{
    //         $sql = "SELECT 
    //         ciru.cirurgia AS nome_cirurgia,
    //         COUNT(proc.id_cirugia) AS quantidade_concluida
    //     FROM 
    //         procedimentos AS proc
    //     INNER JOIN 
    //         cirurgias AS ciru ON ciru.id = proc.id_cirugia
    //     WHERE 
    //         proc.status = 'Concluído'
    //     GROUP BY 
    //         ciru.cirurgia";
    //         $stmt = $this->pdo->prepare($sql);
    //         $stmt->execute();
    //         $resultado = $stmt->fetchAll(); // Apenas uma coluna é retornada
    //         return $resultado;
    //         }
    //     } catch (\PDOException $e) {
    //         throw $e;
    //     }
    // }

    public function pegarQuantidadeConcluidos()
    {
        try {
            if (isset($_GET['mes'])) {
                $monthMap = array(
                    "Jan" => 1,
                    "Feb" => 2,
                    "Mar" => 3,
                    "Apr" => 4,
                    "May" => 5,
                    "Jun" => 6,
                    "Jul" => 7,
                    "Aug" => 8,
                    "Sep" => 9,
                    "Oct" => 10,
                    "Nov" => 11,
                    "Dec" => 12
                );
                $mesClicadoAbbr = $_GET['mes'];
                $mesClicado = $monthMap[$mesClicadoAbbr];
                $sql = "SELECT COUNT(*) AS quantidade FROM procedimentos as proc WHERE status = 'Concluído' AND MONTH(proc.data)=$mesClicado";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchColumn(); // Apenas uma coluna é retornada
                return $resultado;
            } else {
                $sql = "SELECT COUNT(*) AS quantidade FROM procedimentos WHERE status = 'Concluído'";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchColumn(); // Apenas uma coluna é retornada
                return $resultado;
            }
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function pegarQuantidadeEmAndamento()
    {
        try {
            if (isset($_GET['mes'])) {
                $monthMap = array(
                    "Jan" => 1,
                    "Feb" => 2,
                    "Mar" => 3,
                    "Apr" => 4,
                    "May" => 5,
                    "Jun" => 6,
                    "Jul" => 7,
                    "Aug" => 8,
                    "Sep" => 9,
                    "Oct" => 10,
                    "Nov" => 11,
                    "Dec" => 12
                );
                $mesClicadoAbbr = $_GET['mes'];
                $mesClicado = $monthMap[$mesClicadoAbbr];
                $sql = "SELECT COUNT(*) AS quantidade FROM procedimentos as proc WHERE status = 'Em andamento' AND MONTH(proc.data)=$mesClicado";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchColumn(); // Apenas uma coluna é retornada
                return $resultado;
            } else {
                $sql = "SELECT COUNT(*) AS quantidade FROM procedimentos as proc WHERE status = 'Em andamento'";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchColumn(); // Apenas uma coluna é retornada
                return $resultado;
            }
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function pegarQuantidadePendentes()
    {
        try {
            if (isset($_GET['mes'])) {
                $monthMap = array(
                    "Jan" => 1,
                    "Feb" => 2,
                    "Mar" => 3,
                    "Apr" => 4,
                    "May" => 5,
                    "Jun" => 6,
                    "Jul" => 7,
                    "Aug" => 8,
                    "Sep" => 9,
                    "Oct" => 10,
                    "Nov" => 11,
                    "Dec" => 12
                );
                $mesClicadoAbbr = $_GET['mes'];
                $mesClicado = $monthMap[$mesClicadoAbbr];
                $sql = "SELECT COUNT(*) AS quantidade FROM procedimentos as proc WHERE status = 'Pendente' AND MONTH(proc.data)=$mesClicado";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchColumn(); // Apenas uma coluna é retornada
                return $resultado;
            } else {
                $sql = "SELECT COUNT(*) AS quantidade FROM procedimentos as proc WHERE status = 'Pendente'";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchColumn(); // Apenas uma coluna é retornada
                return $resultado;
            }
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function contarCirurgias()
    {

        try {
            $sql = "SELECT 
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

    public function cirurgiasporsetor()
    {

        try {
            if (isset($_GET['mes'])) {
                $monthMap = array(
                    "Jan" => 1,
                    "Feb" => 2,
                    "Mar" => 3,
                    "Apr" => 4,
                    "May" => 5,
                    "Jun" => 6,
                    "Jul" => 7,
                    "Aug" => 8,
                    "Sep" => 9,
                    "Oct" => 10,
                    "Nov" => 11,
                    "Dec" => 12
                );
                $mesClicadoAbbr = $_GET['mes'];
                $mesClicado = $monthMap[$mesClicadoAbbr];
                $sql = "SELECT
                    seto.nome_setor as setor ,
                    COUNT(proc.id_cirugia) AS total_cirurgias
                FROM
                    centrocirurgico.procedimentos AS proc
                INNER JOIN
                    centrocirurgico.setores AS seto ON proc.id_setores = seto.id
                INNER JOIN
                    centrocirurgico.cirurgias AS ciru ON proc.id_cirugia = ciru.id
                    WHERE MONTH(proc.data) = $mesClicado
                GROUP BY
                    seto.nome_setor;";

                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll(); // Apenas uma coluna é retornada

                return $resultado;
            } else {
                $sql = "SELECT
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
                $resultado = $stmt->fetchAll(); // Apenas uma coluna é retornada

                return $resultado;
            }

        } catch (\PDOException $e) {
            throw $e;
        }


    }
    public function cirurgiasprioridade()
    {

        try {
            $sql = "SELECT 
                    cirur.cirurgia,
                    proc.prioridade,
                     COUNT(*) AS num_cirurgias
                    FROM procedimentos as proc
                    INNER JOIN centrocirurgico.cirurgias as cirur on proc.id_cirugia = cirur.id
                    GROUP BY cirur.cirurgia, proc.prioridade;";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll(); // Apenas uma coluna é retornada

            return $resultado;

        } catch (\PDOException $e) {
            throw $e;
        }


    }



    public function cirurgioesporsetor()
    {
        try {
            $sql = " SELECT  
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

    public function cirurgioesPorHora()
    {
        try {

            // Obter a data e hora atual
            date_default_timezone_set('America/Sao_Paulo');

            $dataHoraAtual = date('Y-m-d H:i:s');
            echo $dataHoraAtual;
            $consulta = "
                SELECT 
                    cirur.id as id_cirurgiao,
                    cirur.nome as nome_cirurgiao,
                    seto.id as id_setores,
                    horarios.hora_inicio,
                    horarios.hora_termino,
                    
                    seto.nome_setor as setor
                FROM 
                    horarios_cirurgioes as horarios
                INNER JOIN 
                    cirurgioes as cirur ON cirur.id = horarios.id_cirurgiao
                INNER JOIN 
                    setores as seto ON seto.id = horarios.id_setores
                WHERE 
                
           horarios.hora_termino > :dataHoraAtual
                AND horarios.hora_inicio <= :dataHoraAtual
                

            ";
            // AND horarios.hora_termino > :dataHoraAtual
            // Preparar a consulta
            $stmt = $this->pdo->prepare($consulta);

            // Executar a consulta com o parâmetro da data atual
            $stmt->execute(['dataHoraAtual' => $dataHoraAtual]);

            // Retornar os resultados
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {

            throw $e;
        }
    }




    public function pegarinfo()
    {
        try {
            if (isset($_GET['mes'])) {
                $monthMap = array(
                    "Jan" => 1,
                    "Feb" => 2,
                    "Mar" => 3,
                    "Apr" => 4,
                    "May" => 5,
                    "Jun" => 6,
                    "Jul" => 7,
                    "Aug" => 8,
                    "Sep" => 9,
                    "Oct" => 10,
                    "Nov" => 11,
                    "Dec" => 12
                );
                $mesClicadoAbbr = $_GET['mes'];
                $mesClicado = $monthMap[$mesClicadoAbbr];
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
            ON proc.id_setores = seto.id
            WHERE MONTH(proc.data)=$mesClicado";

                $stmt = $this->pdo->prepare($sql);
                // Executa a consulta SQL
                $stmt->execute();
                // Obtém os resultados da consulta como um array associativo
                $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                // Retorna os resultados
                return $resultados;
            } else {
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
                    ON proc.id_setores = seto.id";

                $stmt = $this->pdo->prepare($sql);
                // Executa a consulta SQL
                $stmt->execute();
                // Obtém os resultados da consulta como um array associativo
                $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                // Retorna os resultados
                return $resultados;
            }
        } catch (\PDOException $e) { // Trata qualquer exceção do tipo PDOException
            // Lança a exceção para ser tratada em outro lugar do código
            throw $e;
        }
    }


    public function pegarnomestatus()
    {
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
