<?php
	$url = explode('/',$_GET['url']);
	if(!isset($url[2]))
	{
	$categoria = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE slug = ?");
	$categoria->execute(array(@$url[1]));
	$categoria = $categoria->fetch();
?>
<?php
    $porPagina = 10;
    if(!isset($_POST['parametro'])){
    if($categoria == ''){
        echo '<div class="resultSearch"><h2>Visualizando todos os Posts</h2></div>';
    }else{
        echo '<div class="resultSearch"><h2>Visualizando Posts em <span>'.$categoria['nome'].'</span></h2></div>';
    }
    }else{
        echo '<div class="resultSearch"><h2>Busca realizada com sucesso!</h2></div>';
    }

    $query = "SELECT * FROM `tb_site.noticias` ";
    if($categoria != ''){
        $categoria['id'] = (int)$categoria['id'];
        $query.="WHERE categoria_id = $categoria[id]";
    }
    if(isset($_POST['parametro'])){
        if(strstr($query,'WHERE') !== false){
            $busca = $_POST['parametro'];
            $query.=" AND titulo LIKE '%$busca%'";
        }else{
            $busca = $_POST['parametro'];
            $query.=" WHERE titulo LIKE '%$busca%'";
        }
    }
    $query2 = "SELECT * FROM `tb_site.noticias` "; 
    if($categoria != ''){
            $categoria['id'] = (int)$categoria['id'];
            $query2.="WHERE categoria_id = $categoria[id]";
    }
    if(isset($_POST['parametro'])){
        if(strstr($query2,'WHERE') !== false){
            $busca = $_POST['parametro'];
            $query2.=" AND titulo LIKE '%$busca%'";
        }else{
            $busca = $_POST['parametro'];
            $query2.=" WHERE titulo LIKE '%$busca%'";
        }
    }
    $totalPaginas = MySql::conectar()->prepare($query2);
    $totalPaginas->execute();
    $totalPaginas = ceil($totalPaginas->rowCount() / $porPagina);
    if(!isset($_POST['parametro'])){
        if(isset($_GET['pagina'])){
            $pagina = (int)$_GET['pagina'];
            if($pagina > $totalPaginas){
                $pagina = 1;
            }
            
            $queryPg = ($pagina - 1) * $porPagina;
            $query.=" ORDER BY order_id ASC LIMIT $queryPg,$porPagina";
        }else{
            $pagina = 1;
            $query.=" ORDER BY order_id ASC LIMIT 0,$porPagina";
        }
    }else{

        $query.=" ORDER BY order_id ASC";
    }
    $sql = MySql::conectar()->prepare($query);
    $sql->execute();
    $noticias = $sql->fetchAll();
?>

<section class="containerNotices marginDownBigger">
	<div class="wrap w90 center grid-3x7 gridOneMobile">
		<div class="row mobileTouchMoveAside">
			<div class="followUs marginDownDefault">
				<div class="titleCard">
					<h2>Siga-nos</h2>
				</div><!--titleCard-->
				<div class="socials itemsFlex alignCerter">
					<a href=""><i data-feather="github"></i></a>
					<a href=""><i data-feather="linkedin"></i></a>
					<a href=""><i data-feather="instagram"></i></a>
					<a href=""><i data-feather="twitter"></i></a>
					<a href=""><i data-feather="facebook"></i></a>
				</div><!--socials-->
			</div><!--followUs-->
            <div class="cardNewllaster marginDownDefault cardFilter">
                <div class="headerCard">
                    <h2>Filtro</h2>
                    <p>Filtre as notícias aqui...</p>
                </div><!--headerCard-->
                <div class="bodyCard">
                    <form>
                        <div class="search">
                            <input type="text" name="parametro" placeholder="Pesquise aqui..." />
                            <button type="submit" name="buscar"><i data-feather="search"></i></button>
                        </div><!--search-->
                        <select name="categoria">
                            <option value="" selected="">Todas as categorias</option>
                                <?php
                                    $categorias = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` ORDER BY order_id ASC");
                                    $categorias->execute();
                                    $categorias = $categorias->fetchAll();
                                    foreach ($categorias as $key => $value) {
                                    
                                ?>
                                    <option <?php if($value['slug'] == @$url[1]) echo 'selected'; ?> value="<?php echo $value['slug'] ?>"><?php echo $value['nome']; ?></option>
                                <?php } ?>
						</select>
                    </form>
                </div><!--bodyCard-->
            </div><!--cardNewllaster-->
			<div class="cardNewllaster marginDownDefault">
                    <div class="headerCard">
                        <h2>Inscreva-se em nossa Newllastes</h2>
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
				<div class="cardTrendings noticesSmallDefault marginDownDefault">
                    <div class="titleCard">
                        <h5>Recomendações</h5>
                    </div><!--title-->
                        <?php
                            foreach($noticias as $key=>$value){
                            $sql = MySql::conectar()->prepare("SELECT `slug` FROM `tb_site.categorias` WHERE id = ?");
                            $sql->execute(array($value['categoria_id']));
                            $categoriaNome = $sql->fetch()['slug'];
                        ?>
                    <div class="cardSmallOne grid-3x7 alignCenter">
                        <div class="imgCard">
                            <img src="<?php echo INCLUDE_PATH ?>images/<?php echo $value['capa']; ?>">
                        </div><!--imgCard-->
                        <div class="cardInfoNotice">
                            <a class="tag"><?php echo $categoriaNome; ?></a>
                            <h2 class="limitLineClampThree titleNoticeSmall"><?php echo $value['titulo']; ?></h2>
                            <p class="info"><i data-feather="bar-chart"></i><span>571 VIEWS</span></p>
                        </div><!--cardInfoNotice-->
                    </div><!--cardSmallOne-->
                    <?php } ?>
                </div><!--cardTrendings-->
				<div class="cardTopics noticesSmallDefault">
                    <div class="titleCard">
                        <h5>Latest</h5>
                    </div><!--title-->
                    <div class="cardSmallOne cardTopic grid-two alignCenter bgBlack">
                        <div class="col">
                            <h2 class="limitLineClampThree titleNoticeSmall">World</h2>
                        </div><!--col-->
						<div class="col itemsFlex justEnd alignCenter">
                            <h6 class="number itemsFlex alignCenter justCenter">9</h6>
                        </div><!--col-->
                    </div><!--cardSmallOne-->
					<div class="cardSmallOne cardTopic grid-two alignCenter bgGreen">
                        <div class="col">
                            <h2 class="limitLineClampThree titleNoticeSmall">World</h2>
                        </div><!--col-->
						<div class="col itemsFlex justEnd alignCenter">
                            <h6 class="number itemsFlex alignCenter justCenter">9</h6>
                        </div><!--col-->
                    </div><!--cardSmallOne-->
					<div class="cardSmallOne cardTopic grid-two alignCenter bgBlackLittle">
                        <div class="col">
                            <h2 class="limitLineClampThree titleNoticeSmall">World</h2>
                        </div><!--col-->
						<div class="col itemsFlex justEnd alignCenter">
                            <h6 class="number itemsFlex alignCenter justCenter">9</h6>
                        </div><!--col-->
                    </div><!--cardSmallOne-->
					<div class="cardSmallOne cardTopic grid-two alignCenter bgGreenTwo">
                        <div class="col">
                            <h2 class="limitLineClampThree titleNoticeSmall">World</h2>
                        </div><!--col-->
						<div class="col itemsFlex justEnd alignCenter">
                            <h6 class="number itemsFlex alignCenter justCenter">9</h6>
                        </div><!--col-->
                    </div><!--cardSmallOne-->
                </div><!--cardTopics-->
		</div><!--row-->
		<div class="row">
			<div class="breadCrumbs">
				<a href="<?php INCLUDE_PATH ?>">Home</a> <i data-feather="chevron-right"></i> <a class="index" href="<?php INCLUDE_PATH ?>noticias/" href="">Notícias</a>
			</div><!--breadCrumbs-->
			<div class="wrapNotices">
                <?php
                    foreach($noticias as $key=>$value){
                    $sql = MySql::conectar()->prepare("SELECT `slug` FROM `tb_site.categorias` WHERE id = ?");
                    $sql->execute(array($value['categoria_id']));
                    $categoriaNome = $sql->fetch()['slug'];
                ?>
				<div class="cardNotice">
					<img src="<?php echo INCLUDE_PATH ?>images/<?php echo $value['capa']; ?>" />
					<div class="cardInfo">
						<h2 class="titleNoticeFeatureSmall limitLineClampTwo"><a href="<?php echo INCLUDE_PATH; ?>noticias/<?php echo $categoriaNome; ?>/<?php echo $value['slug']; ?>"><?php echo $value['titulo']; ?></a></h2>
						<p class="limitLineClampFive"><?php echo $value['conteudo']; ?></p>
					</div><!--cardInfo-->
				</div><!--cardNotice-->
                <?php } ?>
			</div><!--wrapNotices-->
		</div><!--row-->
	</div><!--wrap-->
</section><!--containerNotices-->

<section class="noticesWorld marginDownBigger noticeDefault">
    <div class="wrap w85 center">
        <div class="titleCard">
            <h5>Latest</h5>
        </div><!--title-->
        <div class="row grid-three">
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
                    <img src="<?php echo INCLUDE_PATH ?>images/<?php echo $valueNoticiasMundo['capa']; ?>" />
                </div><!--imgCard-->
                <div class="cardInfoNotice">
                    <a class="tag"><?php echo $noticiasMundoCategoria; ?></a>
                    <h2 class="limitLineClampThree titleNoticeDefault"><?php echo $valueNoticiasMundo['titulo']; ?></h2>
                    <p class="limitLineClampFour"><?php echo $value['conteudo']; ?></p>
                    <p class="infoAuthor"><span class="date"><?php echo date('d/m/Y',strtotime($valueNoticiasMundo['data'])) ?></span></p>
                </div><!--cardInfoNotice-->
            </div><!--cardBiggerOne-->
            <?php } ?>
        </div><!--row-->
    </div><!--wrap-->
</section><!--noticesWorld-->









<?php }else{ 
	include('noticia_single.php');
}
?>

