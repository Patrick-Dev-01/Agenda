<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/css/partials/menu.css');?>">
    <link rel="stylesheet" href=<?php echo base_url('assets/styles/css/partials/msg.css')?>>
    <script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
    <script src="<?php echo base_url('assets/js/menu.js');?>"></script>
   
    <title></title>
</head>
<body onload="valores();">

<header class="cabecalho">
   <img src="<?php echo base_url('assets/img/options.png');?>" alt="" id="options" onclick="abrir();"> 
</header>

<aside class="menu-lateral">
    <div class="user">
        <img src="<?php echo base_url('assets/img/user.png');?>" id="img-user" alt="">
        <?php foreach($dados as $dado){?>
        <span class="username"><?php echo ($dado['nome']." ".$dado['sobrenome']);?></span>
        <?php }?>
    </div>
    <hr style="width: 100%">
   <ul id="menu">
       <?php echo anchor("/", "<li class='pages'>Agenda</li>");?>
       <?php echo anchor("contato/novo", "<li class='pages'>Novo Contato</li>");?>
       <?php echo anchor("/logout", "<li class='pages'>Sair</li>");?>
   </ul>
</aside>
    