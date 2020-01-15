<link rel="stylesheet" href="<?php echo base_url("assets/styles/css/editar.css");?>">
<script src="<?php echo base_url('assets/js/editar.js');?>"></script>
<script src="<?php echo base_url('assets/js/email.js');?>"></script>
<!-- se existir sessão -->
<?php if($this->session->has_userdata("usuario_logado")):?>

<!--mostrar erros de validação  -->
<?php echo validation_errors();?>

<!-- se teve resultado na busca -->
<?php if($resultado):?>
<div class="editar">
    <?php foreach ($resultado as $dados){?>
    <?php echo form_open("/contato/editar/".$dados['id_contato'], "onsubmit='formulario();'");?>
    
    <h2 class="title">Atualizar Informações de contato</h2>
    <hr>

    <label for="nome">Nome: 
        <input type="text" name="nome" id="" value="<?php echo $dados['nome'];?>" onblur="resetar();" style="width: 250px">
    </label><br>

    <label for="contato">Contato: 
        <input type="text" name="contato" id="" value="<?php echo $dados['contato'];?>" onblur="resetar();" style="width: 235px">
    </label><br>

    <label for="email">Email: 
        <input type="email" name="email" id="" value="<?php echo $dados['email'];?>" onblur="resetar();" style="width: 252px">
    </label><br>
    <?php }?>
    <button type="submit" class="btn" id="salvar-edicao">Atualizar</button>       
</div>

<!-- se o contato não existir exiba a mensagem de erro -->
    <?php else: ?>
        <div class="error">Contato não encontrado</div><br>
    <?php endif;?>
<!-- se não o usuario não estiver logado -->
<?php else: ?>
   <?php redirect("/login"); endif;?>

</body>
</html>