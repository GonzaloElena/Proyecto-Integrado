<?php $this->load->view('includes/cabecera_principal'); ?>

<div id="cabecera_top">
<?php 
	echo form_open('comprobar_login');
	echo anchor('login/editar', $login_usuario);
	echo anchor('principal/logout', 'Desconectarse');
	echo form_close();
	?>

</div>
<div>
<table width=40% border="1" align="left" cellpadding="2" bgcolor="transparent" style="text-align: center" class="transparente"> 
<th>Últimos videos</th>	
</table>
</div>
<div>
<table width=40% border="1" align="center" cellpadding="2" bgcolor="transparent" style="text-align: center" class="transparente"> 
<th>Videos más votados</th>	
</table>
</div>
<?php $this->load->view('includes/pie'); ?>
