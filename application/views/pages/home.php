<link rel="stylesheet" href="<?php echo base_url("assets/styles/css/home.css");?>">
<script src="<?php echo base_url('assets/js/ajax.js')?>"></script>
<!-- se exsitir sessão -->
<?php if($this->session->has_userdata("usuario_logado")):?>

<div class="contatos"><br>
   <!-- se o contato foi atualizado, exibia o flash de sucesso  -->
   <?php if($this->session->flashdata("success")):?>
        <div class="success"><?php echo $this->session->flashdata("success");?></div><br>
   <?php endif;?>

   <!-- se o contato não foi atualizado, exiba mensagem de erro  -->
   <?php if($this->session->flashdata("error")):?>
        <div class="error"><?php echo $this->session->flashdata("error");?></div><br>
   <?php endif;?>

   <!-- se o contato foi deletado, exibia o flash de sucesso  -->
   <?php if($this->session->flashdata("success_delete")):?>
        <div class="success"><?php echo $this->session->flashdata("success_delete");?></div><br>
   <?php endif;?>

   <!-- se o contato não foi delete, exiba mensagem de erro  -->
   <?php if($this->session->flashdata("error_delete")):?>
        <div class="error"><?php echo $this->session->flashdata("error_delete");?></div><br>
   <?php endif;?>

   <!-- se o usuario possuir contatos salvos -->
   <?php if($resultados): ?>
   <table class="meus-contatos">
      <tr class="row">
         <td class="col">Nome</td>
         <td class="col">Contato</td>
         <td class="col">Email</td>
         <td class="col">Data de Registro</td>
         <td class="col">Editar</td>
         <td class="col">Excluir</td>
      </tr>
      <!-- mostre cada um dos contatos e seus dados -->
      <?php foreach($resultados as $resultado){?>
      <tr class="row">
         <td class="col"><?php echo $resultado['nome'];?></td>
         <td class="col"><?php echo $resultado['contato'];?></td>
         <td class="col"><?php echo $resultado['email'];?></td>
         <td class="col"><?php echo date("d/m/Y", strtotime($resultado['dt_registro']));?></td>
         <!-- essas duas td não fazem parte da tabela -->
         <td class='col'><?php echo anchor("contato/editar/".$resultado['id_contato'], "<button type='button' id='btn-editar'></button>");?></td>
         <td class="col"><?php echo anchor("contato/delete/".$resultado['id_contato'], "<button type='button' id='btn-deletar'></button>");?></td>
      </tr>
      <?php }?>
      </table>

      <!-- se ele não possuir contatos salvos -->
      <?php else: ?>
      <div class="warning">Você não tem Contatos salvos no momento</div>
      <?php endif;?>
</div>
   <!-- se não o usuario nÃo estiver logado -->
   <?php else: ?>
   <?php redirect("/login"); endif;?>
</body>
</html>