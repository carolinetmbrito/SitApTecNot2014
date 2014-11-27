<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title> </title>
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
</head>
<body>
	<?php echo form_open('noticias/atualizar', 'id="form-noticias"'); ?>
 
	<input type="hidden" name="idnoticia" value="<?php echo $dados_noticia[0]->idnoticia; ?>"/>
 
	<label for="titulo">Titulo:</label><br/>
	<input type="text" name="titulo" value="<?php echo $dados_noticia[0]->titulo; ?>"/>
	<div class="error"><?php echo form_error('titulo'); ?></div>
 
	<label for="texto">Texto:</label><br/>
	<input type="text" name="texto" value="<?php echo $dados_noticia[0]->texto; ?>"/>
	<div class="error"><?php echo form_error('texto'); ?></div>
 
	<input type="submit" name="atualizar" value="Atualizar" />
 
	<?php echo form_close(); ?>
</body>
</html>