<?php
    $infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site.config`");
    $infoSite->execute();
    $infoSite = $infoSite->fetch();


    $noticias = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias`");
    $noticias->execute();
	$noticias = $noticias->fetch();

    $noticiasGrades = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias`");
    $noticiasGrades->execute();
	$noticiasGrades = $noticiasGrades->fetchAll();
    foreach($noticiasGrades as $key => $value){}
        $categoriaNome = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE id = $value[categoria_id]");
        $categoriaNome->execute();
        $categoriaNome = $categoriaNome->fetchAll();
        foreach($categoriaNome as $key => $valueCategoria){
        }

?>
<main class="noticeImportant marginDownBigger">
    <div class="wrap">
        <div class="row w85 center">
            <div class="cardNotice grid-6x4 alignCenter gridOneMobile">
                <div class="imgNotice">
                    <img src="<?php echo INCLUDE_PATH; ?>images/<?php echo $noticias['capa'] ?>" />
                </div><!--imgNotice-->
                <div class="infoNotice">
                    <h2 class="titleNoticeFeature"><a href="<?php echo INCLUDE_PATH; ?>noticias/<?php echo $valueCategoria['slug']; ?>/<?php echo $value['slug']; ?>"><?php echo $noticias['titulo'] ?></a></h2>
                </div><!--infoNotice-->
            </div><!--cardNotice-->
        </div><!--row-->
    </div><!--wrap-->
</main><!--noticeImportant-->

<section class="cardsSmallNotices marginDownBigger">
    <div class="wrap w85 center">
        <div class="row grid-four gridOneMobile">
            <div class="cardNoticeSingle grid-2x8 w100 alignCenter justCenter">
                <div class="cardNumber">
                    <p>1</p>
                </div><!--cardNumber-->
                <div class="cardText">
                    <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h5>
                    <p class="info"><i data-feather="bar-chart"></i><span>571 VIEWS</span></p>
                </div><!--cardText-->
            </div><!--cardNoticeSingle-->
            <div class="cardNoticeSingle grid-2x8 w100 alignCenter justCenter">
                <div class="cardNumber">
                    <p>2</p>
                </div><!--cardNumber-->
                <div class="cardText">
                    <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h5>
                    <p class="info"><i data-feather="bar-chart"></i><span>571 VIEWS</span></p>
                </div><!--cardText-->
            </div><!--cardNoticeSingle-->
            <div class="cardNoticeSingle grid-2x8 w100 alignCenter justCenter">
                <div class="cardNumber">
                    <p>3</p>
                </div><!--cardNumber-->
                <div class="cardText">
                    <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h5>
                    <p class="info"><i data-feather="bar-chart"></i><span>571 VIEWS</span></p>
                </div><!--cardText-->
            </div><!--cardNoticeSingle-->
            <div class="cardNoticeSingle grid-2x8 w100 alignCenter justCenter">
                <div class="cardNumber">
                    <p>4</p>
                </div><!--cardNumber-->
                <div class="cardText">
                    <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h5>
                    <p class="info"><i data-feather="bar-chart"></i><span>571 VIEWS</span></p>
                </div><!--cardText-->
            </div><!--cardNoticeSingle-->
        </div><!--row-->
    </div><!--wrap-->
</section><!--cardsSmallNotices-->

<section class="cardsAveragesNotices marginDownBigger noticeDefault">
    <div class="wrap w85 center">
        <div class="titleCard">
            <h5>Mais Recentes</h5>
        </div><!--title-->
        <div class="row grid-two gridOneMobile">
            <div class="lineRow">
                <div style="background-image:url('<?php INCLUDE_PATH; ?>images/<?php echo $noticias['capa']; ?>')" class="cardImportant grid-one alignEnd">
                    <div class="cardText">
                        <a class="category"><?php echo $valueCategoria['nome']; ?></a>
                        <h2 class="titleNoticeFeatureSmall"><a href="<?php echo INCLUDE_PATH; ?>noticias/<?php echo $valueCategoria['slug']; ?>/<?php echo $value['slug']; ?>"><?php echo $noticias['titulo'] ?></a></h2>
                        <div class="cardAuthor itemsFlex alignCenter">
                            <img src="<?php echo INCLUDE_PATH; ?>images/myAvatar.jpg" />
                            <p class="infoAuthor"><span><?php echo $infoSite['nome_autor'] ?></span> . <span><?php echo $noticias['data'] ?></span></p>
                        </div><!--infoAuthor-->
                    </div><!--cardText-->
                </div><!--cardImportant-->
            </div><!--lineRow--> 
            <div class="lineRow cardSmalls grid-two gridOneMobile">
                <?php
                    $noticiasRecentes = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` LIMIT 4");
                    $noticiasRecentes->execute();
                    foreach($noticiasRecentes as $key => $valueNoticiasRecentes){
                        $categoriaNoticia = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE id = $valueNoticiasRecentes[categoria_id]");
                        $categoriaNoticia->execute();
                        $categoriaNoticia = $categoriaNoticia->fetch()['nome'];
                ?>
                <div class="cardSmallOne">
                    <div class="imgCard">
                        <img src="<?php echo INCLUDE_PATH; ?>images/<?php echo $valueNoticiasRecentes['capa'] ?>" />
                    </div><!--imgCard-->
                    <div class="cardInfoNotice">
                        <a class="tag"><?php echo $categoriaNoticia; ?></a>
                        <h2 class="limitLineClampThree titleNoticeDefault"><a href=""><?php echo $valueNoticiasRecentes['titulo'] ?></a></h2>
                        <p class="infoAuthor"><span><?php echo $infoSite['nome_autor'] ?></span> . <span class="date"><?php echo $noticias['data'] ?></span></p>
                    </div><!--cardInfoNotice-->
                </div><!--cardSmallOne-->
                <?php } ?>
            </div><!--lineRow-->
        </div><!--row-->
    </div><!--wrap-->
</section><!--cardAvaragesNotices-->

<section class="noticesSpeeds noticesSpeedsDefault marginDownBigger">
    <div class="wrap w85 center">
        <div class="titleCard">
            <h5>Notícias Rápidas</h5>
        </div><!--title-->
        <div class="row grid-four gridOneMobile">
            <?php 
                $noticiasSpeed = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` LIMIT 4");
                $noticiasSpeed->execute();
                foreach($noticiasSpeed as $key => $valueNoticiasSpeed){
            ?>
            <div class="cardSpeedOne grid-4x6">
                <img src="<?php echo INCLUDE_PATH; ?>images/<?php echo $valueNoticiasSpeed['capa']; ?>" />
                <div class="textSpeedNotice">
                    <h4 class="limitLineClampThree titleNoticeDefault"><a><?php echo $valueNoticiasSpeed['titulo']; ?></a></h4>
                    <p class="infoAuthor"><span class="date"><?php echo $valueNoticiasSpeed['data']; ?></span></p>
                </div><!--textSpeedNotice-->
            </div><!--cardSpeedOne-->
            <?php } ?>
        </div><!--row-->
    </div><!--wrap-->
</section><!--noticesSpeeds-->

<section class="noticesDay noticeDefault noticesSpeedsDefault marginDownBigger">
    <div class="wrap w85 center grid-6x4 gridOneMobile">
        <div class="row">
            <div style="background-image:url('<?php INCLUDE_PATH; ?>images/<?php echo $noticias['capa']; ?>')" class="cardImportant grid-one alignEnd">
                <div class="cardText">
                    <a class="category">Coronavirus</a>
                    <h2 class="titleNoticeFeatureSmall"><a href="<?php echo INCLUDE_PATH; ?>noticias/<?php echo $valueCategoria['slug']; ?>/<?php echo $value['slug']; ?>"><?php echo $noticias['titulo']; ?></a></h2>
                    <div class="cardAuthor itemsFlex alignCenter">
                        <img src="<?php echo INCLUDE_PATH; ?>images/myAvatar.jpg" />
                        <p class="infoAuthor"><span><?php echo $infoSite['nome_autor']; ?></span> . <span><?php echo $noticias['data']; ?></span></p>
                    </div><!--infoAuthor-->
                </div><!--cardText-->
            </div><!--cardImportant-->
        </div><!--row-->
        <div class="row">
            <div class="titleCard grid-two">
                <h5 class="titleNoticeDefault">Holofote</h5><p class="infoAuthor itemsFlex alignCenter justEnd"></span class="date">Setembro 13,2021</span></p><!--infoAuthor-->
            </div><!--titleCard-->
            <div class="wrapperCard">
                <?php
                    $noticiasHolofotes = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` LIMIT 4");
                    $noticiasHolofotes->execute();
                    foreach($noticiasHolofotes as $key => $valueNoticiasHolofotes){
                        $categoriaNoticiaHolofote = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE id = $valueNoticiasHolofotes[categoria_id]");
                        $categoriaNoticiaHolofote->execute();
                        $categoriaNoticiaHolofote = $categoriaNoticiaHolofote->fetch()['nome'];
                ?>
                <div class="cardSpeedOne grid-2x8 alignCenter">
                    <img src="<?php INCLUDE_PATH; ?>images/<?php echo $valueNoticiasHolofotes['capa']; ?>" />
                    <div class="textSpeedNotice">
                        <h4 class="limitLineClampTwo titleNoticeDefault"><a href="<?php echo INCLUDE_PATH; ?>noticias/<?php echo $valueCategoria['slug']; ?>/<?php echo $value['slug']; ?>"><?php echo $valueNoticiasHolofotes['titulo']; ?></a></h4>
                        <p class="infoAuthor"><a class="categoryBox"><?php echo $categoriaNoticiaHolofote; ?></a> . <span class="date"><?php echo $valueNoticiasHolofotes['data']; ?></span></p>
                    </div><!--textSpeedNotice-->
                </div><!--cardSpeedOne-->
                <?php } ?>
            </div><!--wrapperCard-->
        </div><!--row-->
    </div><!--wrap-->
</section><!--noticesDay-->

<section class="noticesWorld marginDownBigger noticeDefault">
    <div class="wrap w85 center">
        <div class="titleCard">
            <h5>Mundo</h5>
        </div><!--title-->
        <div class="row grid-three gridOneMobile">
            <?php
                $noticiasMundo = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` LIMIT 3");
                $noticiasMundo->execute();
                $noticiasMundo = $noticiasMundo->fetchAll();
                foreach($noticiasMundo as $key => $valueNoticiasMundo){
                    $noticiasMundoCategoria = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE id = $valueNoticiasMundo[categoria_id]");
                    $noticiasMundoCategoria->execute();
                    $noticiasMundoCategoria = $noticiasMundoCategoria->fetch()['nome'];
            ?>
            <div class="cardBiggerOne">
                <div class="imgCard">
                    <img src="<?php echo INCLUDE_PATH; ?>images/<?php echo $valueNoticiasMundo['capa']; ?>" />
                </div><!--imgCard-->
                <div class="cardInfoNotice">
                    <a class="tag"><?php echo $noticiasMundoCategoria; ?></a>
                    <h2 class="limitLineClampThree titleNoticeDefault"><?php echo $valueNoticiasMundo['titulo'] ?></h2>
                    <p class="limitLineClampFour"><?php echo $valueNoticiasMundo['conteudo'] ?></p>
                    <p class="infoAuthor"><span class="date"><?php echo $valueNoticiasMundo['data'] ?></span></p>
                </div><!--cardInfoNotice-->
            </div><!--cardBiggerOne-->
            <?php } ?>
        </div><!--row-->
    </div><!--wrap-->
</section><!--noticesWorld-->

<section class="noticesFeatures noticesSmallDefault noticeDefault noticeMarginInternalDefault marginDownBigger">
    <div class="wrap w85 center">
        <div class="titleCard">
            <h5>Notícias em Destaque</h5>
        </div><!--title-->
        <div class="row grid-6x4 marginDownDefault gridOneMobile">
            <div style="background-image:url('<?php INCLUDE_PATH; ?>images/<?php echo $noticias['capa']; ?>')" class="cardImportant grid-one alignEnd">
                <div class="cardText">
                    <a class="category"><?php echo $valueCategoria['nome']; ?></a>
                    <h2 class="titleNoticeFeatureSmall"><a><?php echo $noticias['titulo']; ?></a></h2>
                    <div class="cardAuthor itemsFlex alignCenter">
                        <img src="<?php echo INCLUDE_PATH; ?>images/myAvatar.jpg" />
                        <p class="infoAuthor"><span><?php echo $infoSite['nome_autor']; ?></span> . <span><?php echo $noticias['data']; ?></span></p>
                    </div><!--infoAuthor-->
                </div><!--cardText-->
            </div><!--cardImportant-->
            <div class="cardBiggerOne spaceDefaultMobile">
                <div class="imgCard">
                    <img src="<?php INCLUDE_PATH; ?>images/<?php echo $noticias['capa']; ?>" />
                </div><!--imgCard-->
                <div class="cardInfoNotice">
                    <a class="tag"><?php echo $valueCategoria['nome']; ?></a>
                    <h2 class="limitLineClampThree titleNoticeDefault"><?php echo $noticias['titulo']; ?></h2>
                    <p class="infoAuthor"><span><?php echo $infoSite['nome_autor']; ?></span> . <span class="date"><?php echo $noticias['data']; ?></span></p>
                </div><!--cardInfoNotice-->
            </div><!--cardBiggerOne-->
        </div><!--row-->
        <div class="row grid-three marginDownSmall gridOneMobile">
            <?php
                $noticiasMundoSpeed = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` LIMIT 6");
                $noticiasMundoSpeed->execute();
                $noticiasMundoSpeed = $noticiasMundoSpeed->fetchAll();
                foreach($noticiasMundoSpeed as $key => $valueNoticiasMundoSpeed){
            ?>
            <div class="cardSpeedOne grid-3x7 alignCenter">
                <img src="<?php echo INCLUDE_PATH; ?>images/<?php echo $valueNoticiasMundoSpeed['capa']; ?>" />
                <div class="textSpeedNotice">
                    <h4 class="limitLineClampThree titleNoticeDefault"><?php echo $valueNoticiasMundoSpeed['titulo']; ?></h4>
                    <p class="infoAuthor"><span class="date"><?php echo $valueNoticiasMundoSpeed['data']; ?></span></p>
                </div><!--textSpeedNotice-->
            </div><!--cardSpeedOne-->
            <?php } ?>
        </div><!--row-->
    </div><!--wrap-->
</section><!--backgroundNotice-->

<section class="backgroundNotice marginDownBigger">
    <div class="wrap">
        <div class="row">
            <img src="<?php echo INCLUDE_PATH; ?>images/<?php echo $noticias['capa'] ?>" />
            <div class="textCardNotice w60 center w80Mobile textCenter">
                <a class="category">ESPORTES</a>
                <h2 class="titleNoticeFeature"><a href="<?php echo INCLUDE_PATH; ?>noticias/<?php echo $valueCategoria['slug']; ?>/<?php echo $value['slug']; ?>"><?php echo $noticias['titulo'] ?></a></h2>
            </div><!--textCardNotice-->
        </div><!--row-->
    </div><!--wrap-->
</section><!--backgroundNotice-->


<section class="listNotices">
    <div class="wrap w85 center">
        <div class="titleCard">
            <h5>Veja Mais</h5>
        </div><!--title-->
        <div class="row grid-7x3 gridOneMobile">
            <div class="col">
                <?php
                    $listaNoticias = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` LIMIT 10");
                    $listaNoticias->execute();
                    $listaNoticias = $listaNoticias->fetchAll();
                    foreach($listaNoticias as $key => $valueListaNoticias){
                ?>
                <div class="cardBiggerOne grid-3x7 alignCenter">
                    <div class="imgCard">
                        <img src="<?php echo INCLUDE_PATH; ?>images/<?php echo $valueListaNoticias['capa']?>" />
                    </div><!--imgCard-->
                    <div class="cardInfoNotice">
                        <a class="tag">Finanças</a>
                        <h2 class="limitLineClampThree titleNoticeSmall marginDefaultTitle"><a href="<?php echo INCLUDE_PATH; ?>noticias/<?php echo $valueCategoria['slug']; ?>/<?php echo $value['slug']; ?>"><?php echo $valueListaNoticias['titulo']?></a></h2>
                        <p class="infoAuthor"><span><?php echo $infoSite['nome_autor']?></span> . <span class="date"><?php echo $valueListaNoticias['data']?></span></p>
                    </div><!--cardInfoNotice-->
                </div><!--cardBiggerOne-->
                <?php } ?>
            </div><!--col-->
            <div class="col">
                <div class="cardNewllaster">
                    <div class="headerCard">
                        <h2>Inscreva-se em nossa Newllaster</h2>
                        <p>Seja notificado sobre as melhores notícias, fresquinhas para você.</p>
                    </div><!--headerCard-->
                    <div class="bodyCard">
                        <form>
                            <input type="email" placeholder="Envie seu email" />
                            <input type="submit" value="Enviar" />
                        </form>
                    </div><!--bodyCard-->
                    <div class="footerCard checkCard itemsFlex">
                        <input type="checkbox" />
                        <label>Ao marcar esta caixa, você confirma que leu e concorda com nossos termos de uso em relação ao armazenamento dos dados enviados por meio deste formulário.</label>
                    </div><!--footerCard-->
                </div><!--cardNewllaster-->
                <div class="cardTrendings noticesSmallDefault">
                    <div class="titleCard">
                        <h5>Pequenas Noticias</h5>
                    </div><!--title-->
                    <?php
                        $listaNoticiasSmall = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` LIMIT 4");
                        $listaNoticiasSmall->execute();
                        $listaNoticiasSmall = $listaNoticiasSmall->fetchAll();
                        foreach($listaNoticiasSmall as $key => $valueListaNoticiasSmall){
                    ?>
                    <div class="cardSmallOne grid-3x7 alignCenter">
                        <div class="imgCard">
                            <img src="<?php echo INCLUDE_PATH; ?>images/<?php echo $valueListaNoticiasSmall['capa']; ?>">
                        </div><!--imgCard-->
                        <div class="cardInfoNotice">
                            <a class="tag">Finanças</a>
                            <h2 class="limitLineClampThree titleNoticeSmall"><?php echo $valueListaNoticiasSmall['titulo']; ?></h2>
                            <p class="info"><i data-feather="bar-chart"></i><span>571 VIEWS</span></p>
                        </div><!--cardInfoNotice-->
                    </div><!--cardSmallOne-->
                    <?php } ?>
                </div><!--cardTrendings-->
            </div><!--col-->
        </div><!--row-->
    </div><!--wrap-->
</section><!--listNotices-->



