<?php
namespace teste;

include_once("conexao.php");
$pesquisa = $mysqli->real_escape_string($_GET['busca']);
$sql_code = "SELECT * FROM registros_hospital WHERE plano_saude LIKE '%$pesquisa%' OR quantidade_jan LIKE '%$pesquisa%' OR  quantidade_fev LIKE '%$pesquisa%' OR  quantidade_mar LIKE '%$pesquisa%'";
$sql_query = $mysqli->query($sql_code) or die("erro ao consultar".$mysqli->error);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de busca</title>
</head>
<body>
    <h1>Planos de saúde</h1>
    <form action="">
        <input name="busca" value="<?php if(isset($_GET['busca']));  ?>" placeholder="Digite os termos de pesquisa" type="text">
        <button type="submit">Pesquisar</button>
    </form>
    <br>
    <table width="600px " border="1">
        <tr>
            <th>Plano de saude</th>
            <th>Quant janeiro</th>
            <th>Quant fevereiro</th>
            <th>Quant março</th>
        </tr>
        
        <?php
        if(!isset($_GET['busca'])){
        ?>
        <tr>
         <td colspan="3">Digite algo</td>
        </tr>
        <?php
        }else{
          $pesquisa = $mysqli->real_escape_string($_GET['busca']);
          $sql_code = "SELECT * FROM registros_hospital WHERE plano_saude LIKE '%$pesquisa%' OR nome LIKE '%$pesquisa%' OR  genero LIKE '%$pesquisa%' OR  estado LIKE '%$pesquisa%'";
          $sql_query = $mysqli->query($sql_code) or die("erro ao consultar".$mysqli->error);


          if($sql_query->num_rows ==0 ){
        ?>
        <tr>
        <td>Nenhum resultado encontrado</td>
        </tr>
        <?php 
        }else{
            while($dados = $sql_query->fetch_assoc()){
                ?>
                <tr>
                  <td><?php echo $dados['plano_saude']; ?></td>
                  <td><?php echo $dados['nome']; ?></td>
                  <td><?php echo $dados['genero']; ?></td>
                  <td><?php echo $dados['estado']; ?></td>
                  
                </tr>
                <?php
            }
        }
        ?>

        <?php 
        } ?>
    </table>

</body>
</html>