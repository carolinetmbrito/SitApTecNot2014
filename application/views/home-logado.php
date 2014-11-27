<!-- Main -->
<div id="main">

    <!-- Intro -->
    <section id="top" class="one dark cover">
        <div class="container">

            <header>
                <h2 class="alt">Hi! I'm <strong>Prologue</strong>, a <a href="http://html5up.net/license">free</a> responsive<br />
                    site template designed by <a href="http://html5up.net">HTML5 UP</a>.</h2>
                <p>Ligula scelerisque justo sem accumsan diam quis<br />
                    vitae natoque dictum sollicitudin elementum.</p>
            </header>

            <footer>
                <a href="#portfolio" class="button scrolly">Magna Aliquam</a>
            </footer>

        </div>
    </section>

    

    <!-- Portfolio -->
    <section id="portfolio" class="two">
        <div class="container">

            <header>
                <h2>Portfolio</h2>
            </header>

            <p>Vitae natoque dictum etiam semper magnis enim feugiat convallis convallis
                egestas rhoncus ridiculus in quis risus amet curabitur tempor orci penatibus.
                Tellus erat mauris ipsum fermentum etiam vivamus eget. Nunc nibh morbi quis 
                fusce hendrerit lacus ridiculus.</p>

            <div class="row">
                <div class="4u">
                    <article class="item">
                        <a href="#" class="image fit"><img src="<?php echo base_url('assets/images/pic02.jpg'); ?>" alt="" /></a>
                        <header>
                            <h3>Ipsum Feugiat</h3>
                        </header>
                    </article>
                    <article class="item">
                        <a href="#" class="image fit"><img src="<?php echo base_url('assets/images/pic03.jpg'); ?>" alt="" /></a>
                        <header>
                            <h3>Rhoncus Semper</h3>
                        </header>                        
                    </article>
                </div>
                <div class="4u">
                    <article class="item">
                        <a href="#" class="image fit"><img src="<?php echo base_url('assets/images/pic04.jpg'); ?>" alt="" /></a>
                        <header>
                            <h3>Magna Nullam</h3>
                        </header>
                    </article>
                    <article class="item">
                        <a href="#" class="image fit"><img src="<?php echo base_url('assets/images/pic05.jpg'); ?>" alt="" /></a>
                        <header>
                            <h3>Natoque Vitae</h3>
                        </header>
                    </article>
                </div>
                <div class="4u">
                    <article class="item">
                        <a href="#" class="image fit"><img src="<?php echo base_url('assets/images/pic06.jpg'); ?>" alt="" /></a>
                        <header>
                            <h3>Dolor Penatibus</h3>
                        </header>
                    </article>
                    <article class="item">
                        <a href="#" class="image fit"><img src="<?php echo base_url('assets/images/pic07.jpg'); ?>" alt="" /></a>
                        <header>
                            <h3>Orci Convallis</h3>
                        </header>
                    </article>
                </div>
            </div>

        </div>
    </section>
    <!-- Contact -->
    <section id="contact" class="four">
        <div class="container">

            <header>
                <h2>Nova noticia</h2>
            </header>

            
            <form method="post" action="noticia/novaNoticia">
                <div class="row half">
                    <div class="12u"><input type="text" name="titulo" placeholder="Titulo" /></div>
                </div>
                <div class="row half">
                    <div class="12u">
                        <textarea name="texto" placeholder="Texto..."></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="12u">
                        <input type="submit" value="Enviar" />
                    </div>
                </div>
            </form>

        </div>
    </section>   

            <!-- Lista as Pessoas Cadastradas -->
            <br />
            <div class="row">
                <?php foreach ($musuario as $usuario): ?>

                    <article class="item 4u">
                        <a href="#" class="image fit">
                            <img src="<?php echo base_url("assets/images/{$usuario->foto}"); ?>" />
                        </a>
                        <header>
                            <h3><a title="Editar" href="<?php echo base_url() . 'musuario/editar/' . $usuario->idusuario; ?>"><?php echo $usuario->nome; ?></a></h3>
                        </header>
                        <!--
                            <p><?php echo $usuario->email; ?></p>
                           
                            <p><?php echo $usuario->dtNascimento; ?></p>
                           
                            <p><?php echo $usuario->senha; ?></p>
                           
                            <p><?php echo $usuario->endereco; ?></p>
                           
                            <p><?php echo $usuario->cidade; ?></p>
                           
                            <p><?php echo $usuario->estado; ?></p>
                          
                            <p><?php echo $usuario->bairro; ?></p>
                           
                            <p><?php echo $usuario->cep; ?></p>
                           
                            <p><?php echo $usuario->telefone; ?></p>
                            
                            <p><?php echo $usuario->celular; ?></p>
                        -->
                    </article>
                <?php endforeach ?>
            </div>

            <!-- Fim Lista -->



        </div>