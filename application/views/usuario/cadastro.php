<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/css/partials/msg.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/css/cadastro.css');?>">
    <title>Cadastre - se</title>
</head>
<body>
    <!-- mostrar os erros de validação -->
<?php echo validation_errors();?>
    <div class="cadastro">
    <h3 class="title">Cadastre-se e salve seus contatos mais importantes</h3>
    <hr>
    <!-- abrir o formulario -->
    <?php echo form_open(('/cadastro'));?>
        <label for="nome">Nome: 
           <input type="text" name="nome" style="width: 250px">
        </label><br>

        <label for="sobrenome">Sobrenome: 
            <input type="text" name="sobrenome" style="width: 205px">
        </label><br>

        <label for="senha">Senha: 
            <input type="password" name="senha" id="" style="width: 250px">
        </label><br>

        <label for="email">Email: 
            <input type="email" name="email" style="width: 252px">
        </label><br>

        <button type="submit" class="btn" id="btn-cadastro">Cadastrar</button><br>

        <span><a href="login" class="link">Ja tenho uma conta</a></span>
    </div>
</body>
</html>