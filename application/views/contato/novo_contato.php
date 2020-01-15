<link rel="stylesheet" href=<?php echo base_url('assets/styles/css/contato.css')?>>
<script src="<?php echo base_url('assets/js/email.js');?>"></script>

<?php if($this->session->has_userdata("usuario_logado")):?>

<!-- Mostrar erros de validação -->
<?php echo validation_errors();?>

<!-- mostrar que contato foi salvo -->
<?php if($this->session->flashdata("sucesso")):?>
   <div class="success"><?php echo $this->session->flashdata("sucesso");?></div><br>
<?php endif;?>

<div class="contato">
   <!-- abrir o formulario -->
   <?php echo form_open("/contato/novo", "onsubmit='formulario();'");?>
   <!-- input que recebe o id do usuario que esta salvando o contato -->
   <input type="hidden" name="id_user" value="<?php echo($this->session->userdata("usuario_logado"));?>">
   <h2 class="title">Salve seus Contatos aqui</h2>
   <hr>
   <label for="nome">Nome: 
      <input type="text" name="nome"  style="width: 250px">
   </label><br>

   <label for="contato">Contato:
      <input type="number" name="contato" style="width: 235px">
   </label><br>

   <label for="email">Email: 
      <input type="email" name="email" id="" placeholder="Opcional" style="width: 252px">
   </label><br>

   <button type="submit" class="btn" id="btn-salvar">Salvar</button>
</div>

<?php else: ?>
<?php redirect("/login"); endif;?>
    
</body>
</html>