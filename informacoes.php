<?php
// Verifique se o id foi fornecido na URL
if(isset($_GET['id'])) {
    // Conecte-se ao banco de dados
    require_once("conexao.php");

    // Sanitize e recupere o id do procedimento
    $id_procedimento = $_GET['id'];
    $id_procedimento = filter_var($id_procedimento, FILTER_SANITIZE_NUMBER_INT);

    

    // Consulta SQL para obter os dados específicos do procedimento com base no id
    $sql = "SELECT * FROM procedimentos WHERE id = $id_procedimento";
    $result = $conn->query($sql);

    // Verifique se a consulta retornou algum resultado
    if ($result->num_rows > 0) {
        // Saída de dados do procedimento
        $row = $result->fetch_assoc();
        // Exiba os dados do procedimento conforme necessário
        echo "ID do Procedimento: " . $row["id"] . "<br>";
        
        // Continue exibindo outros detalhes do procedimento conforme necessário
    } else {
        echo "Nenhum resultado encontrado para este ID de procedimento.";
    }

    // Feche a conexão com o banco de dados
    $conn->close();
} else {
    echo "ID de procedimento não fornecido na URL.";
}
?>





<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="img\Logobordab.png" type="image/x-icon">

    <link rel="stylesheet" href="node_modules\font-awesome\css\font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules\sweetalert2\dist\sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
    img{ 
   width: 2.5em;
   margin: 1em;
  }



    </style>
</head>
<body>
<header> <header class="d-flex p-0" style="background-color: #00a24d !important;">
    <nav class="navbar navbar-expand-lg w-100 navbar-dark p-0" style="background-color: #00a24d !important;">
        <div class="container px-2">
            <a class="navbar-brand d-flex align-items-center" href="http://agendamento.hospitalriogrande.com.br/views/admin/index-a.php" style="color: white;">

                <figure class="float-left mr-2 mb-0">
                    <img src="img/Logobordab.png" rel="shortcut icon">
                </figure>
                <span>HRG</span>
                </a>
            <button class="navbar-toggler navbar-toggler-perso" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon navbar-toggler-icon-perso"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" style="color: white;" href="http://agendamento.hospitalriogrande.com.br/views/admin/index-a.php">Home<span class="sr-only">(current)</span></a>
                    </li>
                                        <li class="nav-item active">
                        <a class="nav-link" style="color: white;" href="http://agendamento.hospitalriogrande.com.br/views/shared/acompanhar.php">Solicitações<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: white;" href="http://agendamento.hospitalriogrande.com.br/views/shared/perfil.php">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <b><a class="nav-link" style="color: white;" href="http://agendamento.hospitalriogrande.com.br/views/account/logout.php">Sair</a></b>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
 </header>


<!-- Main $ncentroc->editSolicitacao(); -->
<main class="container mx-auto py-4" style="transform: none;">
        
<div id="dados-solicitacao">
            
            <div class="row" style="transform: none;">
                
                <div class="col-lg-10 mx-auto" id="mainContent" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

                    

                    <!-- Informação do Paciente -->
                    

                    
                    <!-- Informação do Paciente End -->

                    <!-- Info Cirurgia -->
                    

                    

                    <!-- Info Cirurgia End -->
                    <!-- Upload de Arquivo -->
                    

                    

                    
                <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;"><div class="row box first">
                        <input type="hidden" name="id_solic" >
                        <input type="hidden" name="id_paciente" >
                        <input type="hidden" name="status_solic" >
                        <div id="solicOptions" class="col-md-12 col-sm-12">
                            <div class="form-row mb-2" id="coment">
                                <div class="form-group col-12 text-right">
                                   
                                </div>
                            </div>
                        </div>
                    </div><div class="row box multi">
                    <div class="box-header">
    <h3 class="mb-3">
        <strong><span class="badge badge-success rounded-circle">1</span></strong>
        Informações da Solicitação
    </h3>
    <input type="hidden" id="id_solic">
</div>

                        <div class="col-md-12 col-sm-12" id="DivInfoSolicitante">
                            <div class=""><p>ID do Procedimento: <?php echo $row["id"]; ?></p>
                                                                    <p class="mb-4 mt-1"><i>(Solicitação atual:<?php echo $row["id"]; ?>)</i></p>
                                                            </div>
                            <div id="datesInfoDiv" class="">
                            
    <div class="timeline">

                        <div>
                            <i class="fas fa-check bg-info"></i>
                            <div class="timeline-item bg-info">
                                <span class="time" style="color: #4a4a4a;"><i class="fas fa-clock"></i> <b></b></span>
                                <h3 class="timeline-header "><b></b> confirmou a solicitação</h3>
                                                            </div>
                    </div>
                        <div>
                            <i class="fas fa-user-headset bg-warning"></i>
                            <div class="timeline-item bg-warning">
                                <span class="time" style="color: #4a4a4a;"><i class="fas fa-clock"></i> <b></b></span>
                                <h3 class="timeline-header "><b></b> atendeu a solicitação</h3>
                                                            </div>
                    </div>
                        <div>
                            <i class="fas fa-plus bg-green"></i>
                            <div class="timeline-item bg-green">
                                <span class="time" style="color: #4a4a4a;"><i class="fas fa-clock"></i> <b></b></span>
                                <h3 class="timeline-header "><b></b> criou a solicitação</h3>
                                                            </div>
                    </div>
            <div>
            <i class="fas fa-clock bg-gray"></i>
        </div>
    </div>

    </div>
                            <div id="divInfoSolicitante" class=""></div>
                        </div>
                    </div><div class="row box multi">
                    <div class="box-header">
    <h3>
        <strong><span class="badge badge-success rounded-circle">2</span></strong>
        Informações do Paciente
    </h3>
    <p>Informe abaixo os dados do paciente da cirurgia.</p>
</div>

                        <div class="editable col-md-12 col-sm-12">

                            <div class="form-group">
                                <label for="username">Nome do Paciente</label>
                                <input id="username" class="form-control" name="username" placeholder="Nome Completo do Paciente" type="text" maxlength="150" autocomplete="off"  value="">
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="datanasc">Data de Nascimento</label>
                                        <input id="datanasc" class="form-control" name="datanasc" type="date" max="2024-04-26" value="">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <div class="form-group">
                                        <label for="cpf">CPF</label>
                                        <input id="cpf" class="form-control" placeholder="999.999.999-11" maxlength="14" name="cpf" type="text" autocomplete="off" >
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <label >CPF próprio?</label>
                                    <div class="d-flex align-items-center h-50 mb-5" >
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" >
                                            <label class="form-check-label px-1" >
                                                Sim
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" >
                                            <label class="form-check-label px-1" >
                                                Não
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Contato 1</label>
                                        <input id="phone" class="form-control" name="phone" placeholder="Contato" type="tel" maxlength="11"  autocomplete="off" value="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="phone2">Contato 2</label>
                                        <input id="phone2" class="form-control" name="phone2" placeholder="Contato" type="tel" maxlength="11"  autocomplete="off" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="convenio">Convênio</label>
                                        <input id="convenio" class="form-control" name="convenio" placeholder="Convênio" type="text"  autocomplete="off" value="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 d-flex align-items-center">
    <div class="form-group w-100">
        <label for="acomodacao">Acomodação</label>
        <div class="dropdown bootstrap-select disabled wide">
            <select id="acomodacao" class="wide selectpicker" name="acomodacao" tabindex="null">
                <option value="Apt">Apartamento</option>
                <option value="Enf" selected="">Enfermaria</option>
            </select>
        </div>
    </div>
</div>


                            <div class="row">
                                <div class="col-md-12 col-sm-12 mb-4">
                                    <label for="alergias">Alergias</label>
                                    <textarea id="alergias" name="alergias" maxlength="400" style="max-height: 9em; min-height: 3em" class="w-100 form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div><div class="row box multi">
                    <div class="box-header">
    <h3 class="mb-3">
        <strong><span class="badge badge-success rounded-circle">3</span></strong>
        Informações da Cirurgia
    </h3>
</div>


                        <div class="editable col-md-12 col-sm-12">
                            
                            <div class="form-group mb-2">

                                <div class="form-row">
    
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label for="datacirurgia">Data pretendida</label>
                                            <input id="datacirurgia" class="form-control" name="datacirurgia" type="date"  value="" min="2024-04-26">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-8">
                                        <div class="form-group">
                                            <label for="time">Hora pretendida</label>
                                            <input id="time" class="form-control" name="time" type="time" value="" required="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 ml-md-1">
                                        <label>Prioridade</label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="prioridade" id="eletivo" value="" >
                                            <label class="form-check-label px-1" >
                                                Eletiva
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="prioridade" id="urgencia" value=""  checked="">
                                            <label class="form-check-label px-1" >
                                                Urgência
                                            </label>
                                        </div>
                                    </div> 
                                </div>

                                <label>Tipo de Cirurgia</label>

                                <!-- Checkbox de cirurgia convencional -->
                                <div class="form-row">

                                    <div class="form-group mb-0 col-12 col-md-3">

                                        <div class="form-check custom-control custom-checkbox mx-2 pr-2">
                                            <input type="checkbox" name="tipo_cir[]" class="custom-control-input" id="conven" value="conven" autofocus="" checked=""  >
                                            <label class="custom-control-label" for="conven">Convencional</label>
                                        </div>

                                    </div>

                                </div>

                                <!-- Inputs de cirurgias convencionais -->
                                <div class="form-group">

                                    <div id="CirurConvTitle" class="form-row align-items-end mt-2">
                                        <label class="col-4">Codigo</label>
                                        <label class="col-8 p-0">Nome do procedimento</label>
                                    </div>
                                    <ul id="list_cir_conv">
                                                                                            <li class="form-row mb-2 align-items-end">
                                                        <input name="CirConvID[]" type="hidden" value="">
                                                        <div class="input-group col-4 flex-column">
                                                            <input name="tipo_cirurgia_tuss_cod[]" class="form-control w-100" type="text" value="" >
                                                        </div>
                                                        <div class="input-group col-8 flex-column p-0">
                                                            <input name="tipo_cirurgia_tuss_nome[]" class="form-control w-100" type="text" value="">
                                                        </div>
                                                    </li>
                                                                                                        <li class="form-row mb-2 align-items-end">
                                                        <input name="CirConvID[]" type="hidden" value="">
                                                        <div class="input-group col-4 flex-column">
                                                            <input name="tipo_cirurgia_tuss_cod[]" class="form-control w-100" type="text" value="" >
                                                        </div>
                                                        <div class="input-group col-8 flex-column p-0">
                                                            <input name="tipo_cirurgia_tuss_nome[]" class="form-control w-100" type="text" value="">
                                                        </div>
                                                    </li>
                                                                                                        <li class="form-row mb-2 align-items-end">
                                                        <input name="CirConvID[]" type="hidden" value="">
                                                        <div class="input-group col-4 flex-column">
                                                            <input name="tipo_cirurgia_tuss_cod[]" class="form-control w-100" type="text" value="" >
                                                        </div>
                                                        <div class="input-group col-8 flex-column p-0">
                                                            <input name="tipo_cirurgia_tuss_nome[]" class="form-control w-100" type="text" value="" >
                                                        </div>
                                                    </li>
                                                                                        </ul>

                                </div>

                                <div class="form-row">

                                    <div class="form-group mb-0 col-12 col-md-3">

                                        <div class="form-check custom-control custom-checkbox mx-2 pr-2">
                                            <input type="checkbox" name="tipo_cir[]" class="custom-control-input" id="plas" value="" oninvalid="this.setCustomValidity(&#39;Marque pelo menos uma opção!&#39;)" oninput="this.setCustomValidity(&#39;&#39;)" autofocus="">
                                            <label class="custom-control-label" for="plas">Plástica</label>
                                        </div>

                                    </div>

                                </div>

                                <div id="CirurPlastTitle" class="form-row a mt-2 d-none">
                                    <label class="col-4">Codigo</label>
                                    <label class="col-8 p-0">Nome do procedimento</label>
                                </div>

                                <ul id="list_cir_plast">
                                                                    </ul>

                                <!-- Checkbox de cirurgia sus -->
                                <div class="form-row">

                                    <div class="form-group mb-0 col-12 col-md-3">

                                        <div class="form-check custom-control custom-checkbox mx-2 pr-2">
                                            <input type="checkbox" name="tipo_cir[]" class="custom-control-input" id="sus" value="" autofocus="" >
                                            <label class="custom-control-label" for="sus">SUS</label>
                                        </div>

                                    </div>

                                </div>

                                <!-- Checkbox de cirurgias sus -->
                                <div class="form-group">

                                    <div id="CirurSusTitle" class="form-row align-items-end mt-2 d-none">
                                        <label class="col-4">Codigo</label>
                                        <label class="col-8 p-0">Nome do procedimento</label>
                                    </div>
                                    <ul id="list_cir_sus">
                                                                            </ul>

                                </div>

                            </div>

                            <div class="form-row pl-2">

                                <div class="form-group mb-0 w-100">

                                    <div class="form-row align-items-end">
                                        <label class="col-8 p-0">Nome do Cirurgião</label>
                                        <label class="col-3">CRM</label>
                                    </div>

                                    <ul id="list_cir">
                                                                                    <li class="form-row mb-2 align-items-end">
                                                <div id="oldCirur" class="input-group col-8 flex-column p-0">
                                                    <input name="cirur_nome[]" class="form-control w-100" placeholder="Nome do Cirurgião" type="text" autocomplete="off" value="" >
                                                </div>
                                                <div class="input-group col-4 flex-column">
                                                    <input name="cirur_crm[]" class="form-control w-100" placeholder="CRM" type="text" autocomplete="off" data-parsley-pattern="^[^a-zA-ZÀ-ü\s.]+$" value="">
                                                </div>
                                            </li>
                                                                                </ul>
                                </div>
                            </div>

                            <div class="form-row pl-2">
                                <div class="form-group mb-0 w-100">
                                    <ul id="list_cir">
                                        <li class="form-row mb-0 align-items-end">
                                            <div class="input-group col-8 flex-column p-0">
                                                <label for="anest_nome">Anestesista</label>
                                                <input id="anest_nome" name="anest_nome" class="form-control w-100" placeholder="Nome do Anestesista" type="text" autocomplete="off" value="">
                                                <input type="hidden" name="anest_id" value="">
                                            </div>
                                            <div class="input-group col-4 flex-column">
                                                <label for="anest_crm">CRM</label>
                                                <input id="anest_crm" name="anest_crm" class="form-control w-100" placeholder="CRM" type="text" autocomplete="off" value="">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <ul class="row pl-3">

                                <li class="form-check custom-control custom-checkbox col-12 col-sm-6 col-md-4 col-xl-3 mt-1">
                                    <input type="checkbox" name="requisitos[]" class="custom-control-input" id="reserva-sangue" value="reserva_sangue" >
                                    <label class="custom-control-label" for="reserva-sangue">Reserva de Sangue</label>
                                </li>

                                <li class="form-check custom-control custom-checkbox col-12 col-sm-6 col-md-4 col-xl-3 mt-1">
                                    <input type="checkbox" name="requisitos[]" class="custom-control-input" id="uti" value="uti"  >
                                    <label class="custom-control-label" for="uti">UTI</label>
                                </li>

                                <li class="form-check custom-control custom-checkbox col-12 col-sm-6 col-md-4 col-xl-3 mt-1">
                                    <input type="checkbox" name="requisitos[]" class="custom-control-input" id="congelacao" value="congelacao" >
                                    <label class="custom-control-label" for="congelacao">Congelação</label>
                                </li>

                                <li class="form-check custom-control custom-checkbox col-12 col-sm-6 col-md-4 col-xl-3 mt-1">
                                    <input type="checkbox" name="requisitos[]" class="custom-control-input" id="scopia" value="scopia">
                                    <label class="custom-control-label" for="scopia">Scopia</label>
                                </li>

                                <li class="form-check custom-control custom-checkbox col-12 col-sm-6 col-md-4 col-xl-3 mt-1">
                                    <input type="checkbox" name="requisitos[]" class="custom-control-input" id="mantatermica" value="mantatermica" >
                                    <label class="custom-control-label" for="mantatermica">Manta Termica</label>
                                </li>

                                <li class="form-check custom-control custom-checkbox col-12 col-sm-6 col-md-4 col-xl-3 mt-1">
                                    <input type="checkbox" name="requisitos[]" class="custom-control-input" id="ultracision" value="ultracision" >
                                    <label class="custom-control-label" for="ultracision">Ultracision</label>
                                </li>

                                <li class="form-check custom-control custom-checkbox col-12 col-sm-6 col-md-4 col-xl-3 mt-1">
                                    <input type="checkbox" name="requisitos[]" class="custom-control-input" id="microscopio" value="microscopio" >
                                    <label class="custom-control-label" for="microscopio">Microscópio</label>
                                </li>

                                <li class="form-check custom-control custom-checkbox col-12 col-sm-6 col-md-4 col-xl-3 mt-1">
                                    <input type="checkbox" name="requisitos[]" class="custom-control-input" id="compressorpneumatico" value="compressorpneumatico" >
                                    <label class="custom-control-label" for="compressorpneumatico">Compressor Pneumático</label>
                                </li>

                                <li class="form-check custom-control custom-checkbox col-12 col-sm-6 col-md-4 col-xl-3 mt-1">
                                    <input type="checkbox" name="requisitos[]" class="custom-control-input" id="ultrassom" value="ultrassom">
                                    <label class="custom-control-label" for="ultrassom">Ultrassom</label>
                                </li>

                                <li class="form-check custom-control custom-checkbox col-12 col-sm-6 col-md-4 col-xl-3 mt-1">
                                    <div class="mb-2">
                                        <input type="checkbox" class="custom-control-input" name="requisitos[]" id="outro" value="outro">
                                        <label class="custom-control-label" for="outro">Outro</label>
                                    </div>
                                                                                <input class="form-control" type="text" id="outroValor" name="outro" value="" disabled="" >
                                                                    </li>
                                
                            </ul>

                        </div>

                    </div><div class="row box multi">
                    <div class="box-header">
    <h3 class="mb-3">
        <strong><span class="badge badge-success rounded-circle">4</span></strong>
        OPME
    </h3>
</div>

                        <div class="col-md-12 col-sm-12 d-none" id="opme_div_check">
                            <div class="input-group" id="verify_file">
                                <label>Irá ter OPME? <b></b></label>
                                <div class="custom-control custom-radio ml-5">
                                    <input type="radio" class="custom-control-input" name="opme_check" id="confirm_opme" value="yes" required="">
                                    <label class="custom-control-label" for="confirm_opme">Sim</label>
                                </div>
                                <div class="custom-control custom-radio ml-3">
                                    <input type="radio" class="custom-control-input" name="opme_check" id="confirm_no_opme" value="no" required="">
                                    <label class="custom-control-label" for="confirm_no_opme">Não</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <ul id="list_OPME">
                                                                    <li class="form-row align-items-end my-md-2 my-4">
                                        <div class="input-group col-12 col-md-6 flex-column">
                                            <label>Descrição</label>
                                            <input name="OPME_desc[]" class="form-control w-100" placeholder="Descrição" type="text"  autocomplete="off" value="">
                                        </div>
                                        <div class="input-group col-3 col-md-2 flex-column">
                                            <label>Quant.</label>
                                            <input name="OPME_quant[]" class="form-control w-100" placeholder="Qtd" type="number" min="1" data-parsley-pattern="^[a-zA-Z\s.]+$"  value="">
                                        </div>
                                        <div class="input-group col-9 col-md-3 flex-column">
                                            <label>Fornecedor</label>
                                            <input name="OPME_forn[]" class="form-control w-100" placeholder="Fornecedor" type="text" data-parsley-pattern="^[a-zA-Z\s.]+$"  autocomplete="off" value="">
                                        </div>
                                    </li>
                                                                    <li class="form-row align-items-end my-md-2 my-4">
                                        <div class="input-group col-12 col-md-6 flex-column">
                                            <label>Descrição</label>
                                            <input name="OPME_desc[]" class="form-control w-100" placeholder="Descrição" type="text"  autocomplete="off" value="">
                                        </div>
                                        <div class="input-group col-3 col-md-2 flex-column">
                                            <label>Quant.</label>
                                            <input name="OPME_quant[]" class="form-control w-100" placeholder="Qtd" type="number" min="1" data-parsley-pattern="^[a-zA-Z\s.]+$"  value="">
                                        </div>
                                        <div class="input-group col-9 col-md-3 flex-column">
                                            <label>Fornecedor</label>
                                            <input name="OPME_forn[]" class="form-control w-100" placeholder="Fornecedor" type="text" data-parsley-pattern="^[a-zA-Z\s.]+$"  autocomplete="off" value="">
                                        </div>
                                    </li>
                                                                    <li class="form-row align-items-end my-md-2 my-4">
                                        <div class="input-group col-12 col-md-6 flex-column">
                                            <label>Descrição</label>
                                            <input name="OPME_desc[]" class="form-control w-100" placeholder="Descrição" type="text" autocomplete="off" value="">
                                        </div>
                                        <div class="input-group col-3 col-md-2 flex-column">
                                            <label>Quant.</label>
                                            <input name="OPME_quant[]" class="form-control w-100" placeholder="Qtd" type="number" min="1" data-parsley-pattern="^[a-zA-Z\s.]+$"  value="">
                                        </div>
                                        <div class="input-group col-9 col-md-3 flex-column">
                                            <label>Fornecedor</label>
                                            <input name="OPME_forn[]" class="form-control w-100" placeholder="Fornecedor" type="text" data-parsley-pattern="^[a-zA-Z\s.]+$"  autocomplete="off" value="">
                                        </div>
                                    </li>
                                                                    <li class="form-row align-items-end my-md-2 my-4">
                                        <div class="input-group col-12 col-md-6 flex-column">
                                            <label>Descrição</label>
                                            <input name="OPME_desc[]" class="form-control w-100" placeholder="Descrição" type="text"  autocomplete="off" value="">
                                        </div>
                                        <div class="input-group col-3 col-md-2 flex-column">
                                            <label>Quant.</label>
                                            <input name="OPME_quant[]" class="form-control w-100" placeholder="Qtd" type="number" min="1" data-parsley-pattern="^[a-zA-Z\s.]+$"  value="">
                                        </div>
                                        <div class="input-group col-9 col-md-3 flex-column">
                                            <label>Fornecedor</label>
                                            <input name="OPME_forn[]" class="form-control w-100" placeholder="Fornecedor" type="text" data-parsley-pattern="^[a-zA-Z\s.]+$" autocomplete="off" value="">
                                        </div>
                                    </li>
                                                                    <li class="form-row align-items-end my-md-2 my-4">
                                        <div class="input-group col-12 col-md-6 flex-column">
                                            <label>Descrição</label>
                                            <input name="OPME_desc[]" class="form-control w-100" placeholder="Descrição" type="text"  autocomplete="off" value=" ">
                                        </div>
                                        <div class="input-group col-3 col-md-2 flex-column">
                                            <label>Quant.</label>
                                            <input name="OPME_quant[]" class="form-control w-100" placeholder="Qtd" type="number" min="1" data-parsley-pattern="^[a-zA-Z\s.]+$"  value="">
                                        </div>
                                        <div class="input-group col-9 col-md-3 flex-column">
                                            <label>Fornecedor</label>
                                            <input name="OPME_forn[]" class="form-control w-100" placeholder="Fornecedor" type="text" data-parsley-pattern="^[a-zA-Z\s.]+$"  autocomplete="off" value="">
                                        </div>
                                    </li>
                                                                    <li class="form-row align-items-end my-md-2 my-4">
                                        <div class="input-group col-12 col-md-6 flex-column">
                                            <label>Descrição</label>
                                            <input name="OPME_desc[]" class="form-control w-100" placeholder="Descrição" type="text"  autocomplete="off" value=" ">
                                        </div>
                                        <div class="input-group col-3 col-md-2 flex-column">
                                            <label>Quant.</label>
                                            <input name="OPME_quant[]" class="form-control w-100" placeholder="Qtd" type="number" min="1" data-parsley-pattern="^[a-zA-Z\s.]+$"  value="">
                                        </div>
                                        <div class="input-group col-9 col-md-3 flex-column">
                                            <label>Fornecedor</label>
                                            <input name="OPME_forn[]" class="form-control w-100" placeholder="Fornecedor" type="text" data-parsley-pattern="^[a-zA-Z\s.]+$"  autocomplete="off" value="">
                                        </div>
                                    </li>
                                                            </ul>
                        </div>
                    </div><div class="row box">
                    <div class="box-header">
    <h3 class="mb-3">
        <strong><span class="badge badge-success rounded-circle">5</span></strong>
        Pedido Médico da Cirurgia
    </h3>
</div>

                        <div class="col-md-12">
                            <p id="nome_arquivo">Não tem arquivo salvo</p>                                <input type="hidden" name="confirm_change_file" value="vazio">
                                                            <input type="file" name="filepond" id="filep" class="d-none" disabled="">
                        </div>
                        <!-- <div class="col-md-12">
                                <p>Arquivos: jpg, png, pdf, max. 1Mb.</p>
                            </div> -->
                    </div><div class="row box">
                    <div class="box-header">
    <h3 class="mb-3">
        <strong><span class="badge badge-success rounded-circle">6</span></strong>
        Financeiro
    </h3>
</div>

                        <div class="col-md-12">
                            <p id="nome_arquivo">Não tem arquivo salvo</p>                                <input type="hidden" name="confirm_change_file_financ" value="vazio">
                                
                            <input type="file" name="filepond_financ" id="filep_financ" class="d-none" disabled="">

                        </div>
                    </div><div class="row box d-none">
                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn-form-func" id="sub" disabled="">
                                    <span class="btn-form-func-content">Enviar Pedido</span>
                                    <span class="icon"><i class="fa fa-paper-plane" aria-hidden="true"></i></span>
                                </button>
                            </div>
                        </div>
                    </div><div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;"><div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 960px; height: 2796px;"></div></div><div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div></div></div></div></div>

            </div>

        </form>


    

        </div>
</main>
 
    <script src="node_modules\@popperjs\core\dist\umd\popper.min.js"></script>
    <script src="node_modules\bootstrap\dist\js\bootstrap.min.js"></script>
</body>
</html>
