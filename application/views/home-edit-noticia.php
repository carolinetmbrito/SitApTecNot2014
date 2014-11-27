<!-- Main -->
<div id="main">
    <!-- Edit -->
    <section id="noticia" class="four">
        <div class="container">

            <header>
                <h2>Alteração da Noticia</h2>
            </header>

            <?php echo form_open('noticias/atualizar', 'id="form-noticias"'); ?>
            <form method="post" action="noticia/novaNoticia">
                <input type="hidden" name="idnoticia" value="<?php echo $dados_noticia[0]->idnoticia; ?>"/>

                <div class="row half">
                    <div class="12u"><input type="text" name="titulo" placeholder="titulo" value="<?php echo $dados_noticia[0]->titulo; ?>" />
                        <div class="error"><?php echo form_error('titulo'); ?></div></div>

                    <div class="12u"><input type="text" name="texto" placeholder="texto" value="<?php echo $dados_noticia[0]->tezto; ?>"/>
                        <div class="error"><?php echo form_error('texto'); ?></div></div>
                </div>
            </form>

            <div class="row">
                <div class="12u">
                    <input type="submit" name="cadastrar" value="Cadastrar"/>
                </div>
            </div>

            <?php echo form_close(); ?>

        </div>
    </section>

</div>