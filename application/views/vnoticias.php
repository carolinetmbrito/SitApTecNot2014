<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title> </title>
        <meta charset="UTF-8" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/estilo.css'); ?>"/>
    </head>
    <body>

        <?php echo form_open('noticias/novaNoticia', 'id="form-noticias"'); ?>

        <label for="titulo">Titulo:</label><br/>
        <input type="text" name="titulo" value="<?php echo set_value('titulo'); ?>"/>
        <div class="error"><?php echo form_error('titul'); ?></div>
        
        <label for="texto">Texto</label><br/>
        <input type="text" name="texto" value="<?php echo set_value('texto'); ?>"/>
        <div class="error"><?php echo form_error('texto'); ?></div>
       
        <input type="submit" name="cadastrar" value="Cadastrar" />

        <?php echo form_close(); ?>

        <!-- Lista as Pessoas Cadastradas -->
        <div id="grid-noticias">
            <ul>
                <?php foreach ($noticias as $noticia): ?>
                    <li>
                        <a title="Deletar" href="<?php echo base_url() . 'noticias/deletar/' . $noticia->idnoticia; ?>" onclick="return confirm('Confirma a exclusão deste registro?')">
                            <img src="<?php echo base_url('assets/images/lixo.png');?>" />
                        </a>
                        <span> - </span>
                        <a title="Editar" href="<?php echo base_url() . 'noticias/editar/' . $noticia->idnoticia; ?>"><?php echo $noticia->titulo; ?></a>
                        <span> - </span>
                        <span><?php echo $noticia->texto; ?></span>
                        <span> - </span>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
        <!-- Fim Lista -->

    </body>
</html>