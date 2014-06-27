            <div class="hotlink-container row-fluid">
                <div class="hotlink span4">
                    <h3>Novidades</h3>
                    <ol>
                        <a href="noticia.php"><li>Notícia de número 1</li></a>
                        <a href="noticia.php"><li>Notícia de número 2</li></a>
                        <a href="noticia.php"><li>Notícia de número 3</li></a>
                        <a href="noticia.php"><li>Notícia de número 4</li></a>
                        <a href="noticia.php"><li>Notícia de número 5</li></a>
                    </ol>
                    <a href="noticias.php"><span class="mais-noticias">Veja mais...</span></a>
                </div>

                <div class="hotlink span4 center">
                    <h3>Conheça</h3>
                    <a href="#"><img src="assets/img/logo_jardins_lunardi.png" /></a>
                </div>

                <div class="hotlink span4">
                    <h3>Newsletter</h3>
                    Digite seu endereço de e-mail para receber as notícias:<br /><br />
                    <form class="form-inline">
                        <input type="text" placeholder="Seu e-mail" />
                        <button type="submit" class="">Enviar</button>
                    </form>
                </div>
            </div>

            <div class="mini-banners-container center row-fluid">

                <a href="javascript:void(window.open('http://www8.caixa.gov.br','Simulador','scrollbars=yes,top=10,left=70,width=540,height=630'))" class="span4"><img src="assets/img/banner-simule.png" /></a>
                <a href="contato.php" class="span4"><img src="assets/img/banner-faleconosco.png" /></a>
                <a class="span4" href="#" data-target="#modalAtendimento" data-toggle="modal"><img src="assets/img/banner-horario.png" /></a>

            </div>

            <div class="footer">
                <div class="row-fluid">
                    <div class="footer-logo center span3">
                        <img class="mini-logo" src="assets/img/logo-footer.png" />
                    </div>
                    <div class="footer-menu span2">
                        <h4>Menu</h4>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="imobiliaria.php">Imobiliária</a></li>
                            <li><a href="imoveis.php">Imóveis</a></li>
                            <li><a href="corretores.php">Corretores</a></li>
                            <li><a href="parceiros.php">Parceiros</a></li>
                            <li><a href="contato.php">Contato</a></li>
                        </ul>
                    </div>
                    <div class="footer-onde span3">
                        <h4>Onde Estamos</h4>
                        <adress>
                            R. Teófilo Tavares, nº 55<br />
                            Jardins - Chapecó - SC <br />
                            E-mail: contato@lunardiimoveis.com.br
                        </adress>
                    </div>
                    <div class="span4 center">
                        <a href="contato.php#localizacao"><img class="map-preview" src="assets/img/map-preview.png" /></a>
                    </div>
                </div>
                <div class="separador"></div>
                <div class="rodape center">
                    <span>Lunardi Empreendimentos Imobiliários LTDA - Chapecó - SC Todos direitos reservados 2011 - 2013</span>
                    <img class="mini-logo-duo pull-right visible-desktop" src="assets/img/duo-logo.png" />
                    <br class="hidden-desktop" /><br class="hidden-desktop" />
                        <a href="http://www.duosolucoes.com.br" target="_blank"><img class="mini-logo-duo center hidden-desktop" src="assets/img/duo-logo.png" /></a>
                </div>
            </div>

        </div> <!-- Fim do Container -->

        <div id="modalAtendimento" class="modal hide fade">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Horários de Atendimento</h3>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Dias</th>
                            <th>Período 1</th>
                            <th>Período 2</th>
                        </tr>  
                    </thead>
                    <tbody>
                        <tr>
                            <td>Segunda á Sexta-Feira</td>
                            <td>08:30 - 11:30</td>
                            <td>14:00 - 17:30</td>
                        </tr>
                        <tr>
                            <td>Sábado</td>
                            <td>08:30 - 11:30</td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer ">
                <a class="pull-left" href="contato.php#localizacao">Mais informações de Contato</a>
                <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-white"></i> Fechar</button>
            </div>
        </div>

        <script src="assets/js/jquery-1.10.2.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!-- <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script> -->
    </body>
</html>