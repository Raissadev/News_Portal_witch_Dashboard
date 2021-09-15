<?php include('config.php'); ?>
<?php Site::updateUsuarioOnline(); ?>
<?php Site::contador(); ?>
<?php
	$infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site.config`");
	$infoSite->execute();
	$infoSite = $infoSite->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $infoSite['titulo']; ?> - myCode</title>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link href="<?php echo INCLUDE_PATH; ?>css/style.css" rel="stylesheet" />
	<script src="https://unpkg.com/feather-icons"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Raissa Daros" />
	<meta name="keywords" content="">
	<meta name="description" content="Este é um site desenvolvido por Raissadev.">
	<link rel="icon" href="<?php echo INCLUDE_PATH; ?>favicon.ico" type="image/x-icon" />
	<meta charset="utf-8" />
</head>
<body>
<base base="<?php echo INCLUDE_PATH; ?>" />
	<?php
		$url = isset($_GET['url']) ? $_GET['url'] : 'home';
		switch ($url) {
			case 'depoimentos':
				echo '<target target="depoimentos" />';
				break;

			case 'servicos':
				echo '<target target="servicos" />';
				break;
		}
	?>
	<header>
		<div class="wrap grid-2x8 alignCenter gridTwoMobile">
			<div class="row heightComplet itemsFlexCenter justCenter">
				<div class="logoHeader itemsFlexCenter">
					<i class="toggleMenu" data-feather="menu"></i>
					<h2><a href="<?php echo INCLUDE_PATH; ?>">Raissadev</a></h2>
				</div><!--logoHeader-->
			</div><!--row-->
			<div class="row heightComplet grid-one alignEnd alignCenterMobile">
				<div class="lineRow grid-two w100">
					<div class="col itemsFlex alignCenter">
						<p class="hideMobile">Esse é o meu código, espero muito que você goste dele.</p>
					</div><!--col-->
					<div class="col w100 itemsFlex justEnd alignCenterMobile">
						<a href=""><i data-feather="sun"></i></a>
						<a href=""><i data-feather="shopping-bag"></i></a>
						<a href=""><i data-feather="search"></i></a>
					</div><!--col-->
				</div><!--lineRow-->
				<div class="lineRow w100 grid-two heightComplet">
					<ul class="itemsMenu itemsFlex alignEnd heightComplet">
						<li><a href="<?php echo INCLUDE_PATH; ?>">Início</a></li>
						<li><a href="<?php echo INCLUDE_PATH; ?>noticias">Notícias</a></li>
						<li><a href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
						<li><a href="">Categorias</a></li>
						<li><a href="">Demos</a></li>
					</ul>
					<div class="colInter  itemsFlex justEnd heightComplet">
						<ul class="itemsMenu  itemsFlex alignEnd heightComplet">
							<li><a href=""><i data-feather="mail"></i>Newllaster</a></li>
						</ul>
						<ul class="itemsMenu  itemsFlex alignEnd heightComplet">
							<li><a href="">Follow</a></li>
						</ul>
					</div><!--colInter-->
				</div><!--lineRow-->
			</div><!--row-->
		</div><!--wrap-->
	</header>
	
	<aside class="aside showMenu">
		<div class="wrap">
			<div class="row">
				<div class="titleAside grid-two alignCenter">
					<h2>RaissaDev.</h2>
					<div class="closeAside itemsFlex justEnd">
						<i class="toggleMenu btn closeAside" data-feather="x"></i>
					</div><!--closeAside-->
				</div><!--titleAside-->
			</div><!--row-->
			<div class="row paddingOneRem">
				<div class="itemsMobile hideDesktop">
					<ul class="itemsMenu">
						<li><a href="<?php echo INCLUDE_PATH; ?>">Início</a></li>
						<li><a href="<?php echo INCLUDE_PATH; ?>noticias">Notícias</a></li>
						<li><a href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
						<li><a href="">Categorias</a></li>
						<li><a href="">Demos</a></li>
					</ul>
				</div><!--itemsMobile-->
				<div class="followUs marginDownDefault">
					<div class="titleCard">
						<h2>Siga-nos</h2>
					</div><!--titleCard-->
					<div class="socials itemsFlex alignCerter">
						<a href="https://github.com/Raissadev"><i data-feather="github"></i></a>
						<a href=""><i data-feather="linkedin"></i></a>
						<a href=""><i data-feather="instagram"></i></a>
						<a href=""><i data-feather="twitter"></i></a>
						<a href=""><i data-feather="facebook"></i></a>
					</div><!--socials-->
				</div><!--followUs-->
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
                    <div class="footerCard itemsFlex">
                        <input type="checkbox" />
                        <label>By checking this box, you confirm that you have read and are agreeing to our terms of use regarding the storage of the data submitted through this form.</label>
                    </div><!--footerCard-->
                </div><!--cardNewllaster-->
			</div><!--row-->
		</div><!--wrap-->
	</aside><!--aside-->
	

	


	<div class="containerMain">
	<?php

		if(file_exists('pages/'.$url.'.php')){
			include('pages/'.$url.'.php');
		}else{
			//Podemos fazer o que quiser, pois a página não existe.
			if($url != 'depoimentos' && $url != 'servicos'){
				$urlPar = explode('/',$url)[0];
				if($urlPar != 'noticias'){
				$pagina404 = true;
				include('pages/404.php');
				}else{
					include('pages/noticias.php');
				}
			}else{
				include('pages/home.php');
			}
		}

	?>

	</div><!--containerMain-->

	<footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixed"'; ?>>
		<div class="wrap w90 center">
			<div class="row grid-two gridOneMobile">
				<div class="copy itemsFlex alignCerter justCenterMobile">
					<h6>Todos os direitos reservados - <span>RaissaDev</span></h6>
				</div><!--copy-->
				<div class="socials itemsFlex alignCerter justEnd justCenterMobile spaceDefaultMobile">
					<a href="https://github.com/Raissadev"><i data-feather="github"></i></a>
					<a href=""><i data-feather="linkedin"></i></a>
					<a href=""><i data-feather="instagram"></i></a>
				</div><!--socials-->
			</div><!--row-->
		</div><!--wrap-->
	</footer>

	<script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
	<script src="<?php echo INCLUDE_PATH; ?>js/constants.js"></script>
	<script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>
	<script src="<?php echo INCLUDE_PATH; ?>js/script.js"></script>

	<script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>

	<?php

		if(is_array($url) && strstr($url[0],'noticias') !== false){
	?>
		<script>
			$(function(){
				$('select').change(function(){
					location.href=include_path+"noticias/"+$(this).val();
				})
			})
		</script>
	<?php
		}
	?>

	<?php
		if($url == 'contato'){
	?>
	<?php } ?>
	<!--<script src="<?php echo INCLUDE_PATH; ?>js/exemplo.js"></script>-->
	<script src="<?php echo INCLUDE_PATH; ?>js/formularios.js"></script>
</body>
</html>