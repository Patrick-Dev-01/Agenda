<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/css/partials/msg.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/css/login.css');?>">
    <title></title>
</head>
<body>
    <!-- Se der erro de autenticação -->
    <?php if($this->session->flashdata("erro_autenticacao")): ?>
        <!-- Mostre a mensagem de erro -->
        <div class="error"><?php echo $this->session->flashdata("erro_autenticacao");?></div>
    <?php endif;?>
    
    <div class="login">
        <h2 class="title">Faça sua autenticação</h2>
        <hr>
        <!-- Abrir o formulário -->
        <?php echo form_open("/login")?>
        <label for="email">Email: 
            <input type="email" name="email" style="width: 252px">
        </label><br>
        
        <label for="senha">Senha: 
            <input type="password" name="senha" style="width: 250px">
        </label><br>

        <button type="submit" class="btn" id="btn-login">Entrar</button><br>

        <span><a href="cadastro" class="link">Cadastre-se aqui</a></span>
    </div>
</body>
</html>