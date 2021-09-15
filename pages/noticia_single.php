<?php
	$url = explode('/',$_GET['url']);
	
	$infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site.config`");
	$infoSite->execute();
	$infoSite = $infoSite->fetch();

	$verifica_categoria = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE slug = ?");
	$verifica_categoria->execute(array($url[1]));
	if($verifica_categoria->rowCount() == 0){
		Painel::redirect(INCLUDE_PATH.'noticias');
	}
	$categoria_info = $verifica_categoria->fetch();

	$post = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE slug = ? AND categoria_id = ?");
	$post->execute(array($url[2],$categoria_info['id']));
	if($post->rowCount() == 0){
		Painel::redirect(INCLUDE_PATH.'noticias');
	}

	//É POR QUE MINHA NOTICIA EXISTE
	$post = $post->fetch();

	if(isset($_POST['postar_comentario'])){
		$nome = $_POST['nome'];
		$comentario = $_POST['mensagem'];
		$noticia_id = $_POST['noticia_id'];

		$sql = MySql::conectar()->prepare("INSERT INTO `tb_site.comentarios` VALUES (null,?,?,?)");
		$sql->execute(array($nome,$comentario,$noticia_id));
		Painel::redirect('');
	}
?>
<section class="noticeSingle containerNotices">
	<div class="wrap w90 center grid-7x3 gridOneMobile">
		<div class="row">
			<article class="noticeWrapper">
				<div class="titleNotice">
					<a class="category">Sports</a> <a class="category">Coronavirus</a>
					<h2 class="titleNoticeSingleFeature"><?php echo $post['titulo'] ?></h2>
					<div class="cardAuthor marginDownDefault itemsFlex alignCenter">
						<img src="<?php echo INCLUDE_PATH; ?>images/myAvatar.jpg" />
						<p class="infoAuthor"><span><?php echo $infoSite['nome_autor'] ?></span> . <span class="date"><?php echo $post['data'] ?></span></p>
					</div><!--autorCard-->
				</div><!--titleNotice-->
				<div class="imgNotice marginDownDefault">
					<img src="<?php echo INCLUDE_PATH; ?>images/myWallpaper.jpg" />
				</div><!--imgNotice-->
				<div class="contentNotice marginDownBigger">
					<p class="description"><?php echo $post['conteudo']; ?></p>
				</div><!--contentNotice-->
				<div class="commentsUsers marginDownBigger">
					<div class="titleCard">
                        	<h5>Comentários</h5>
                    	</div><!--title-->
					<?php 
						$comentarios = MySql::conectar()->prepare("SELECT * FROM `tb_site.comentarios` WHERE noticia_id = ?");
						$comentarios->execute(array($post['id']));
						$comentarios = $comentarios->fetchAll();
						foreach($comentarios as $key => $value){
					?>
					<div class="cardCommentUser marginDownDefault itemsFlex alignCenter">
						<figure class="userImg">
							<img src="<?php echo INCLUDE_PATH; ?>images/myWallpaper.jpg" />
						</figure><!--userImg-->
						<div class="commentUser">
							<h3 class="titleNoticeDefault"><?php echo $_SESSION['nome']; ?></h3>
							<p class="limitLineClampTwo"><?php echo $value['comentario']; ?></p>
						</div><!--commentUser-->
					</div><!--cardCommentUser-->
					<?php } ?>
				</div><!--commentUsers-->
				<div class="commentSection">
					<div class="commentCard">
						<?php
							if(Painel::logado() == false){
						?>
						<div class="containerLogin">
							<p>Você Precisa estar logado para comentar! <a href="<?php echo INCLUDE_PATH ?>painel">Clique aqui para efetuar o login.</a></p>
						</div><!--containerLogin-->
						<?php
							}else{
						?>
						<div class="titleCard">
                        	<h5>Deixe um Comentário</h5>
                    	</div><!--title-->
						<form method="post">
							<div class="formGroup">
								<textarea name="mensagem" placeholder="Seu comentário"></textarea>
							</div><!--formGroup-->
							<div class="formGroup grid-three gridOneMobile">
								<input type="text" name="email" placeholder="email@example.com" />
								<input type="text" name="nome" value="<?php echo $_SESSION['nome']; ?>" />
								<input type="text" placeholder="99 9999-9999" />
							</div><!--formGroup-->
							<div class="formGroup itemsFlex alignCenter justEnd">
							<div class="checkCard itemsFlex alignCenter">
                        		<input type="checkbox" />
                        		<label>Ao marcar esta caixa, você confirma que leu e concorda com nossos termos de uso em relação ao armazenamento dos dados enviados por meio deste formulário.</label>
                    		</div><!--checkCard-->
								<input type="hidden" name="noticia_id" value="<?php echo $post['id']; ?>" />
								<input class="w30" type="submit" name="postar_comentario" value="Comentar" />
							</div><!--formGroup-->	
							<?php } ?>			
						</form>
					</div><!--commentCard-->
				</div><!--commentSection-->
			</article><!--noticeWrapper-->
		</div><!--row-->
		<div class="row mobileTouchMoveAside">
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
                    <div class="cardTopics noticesSmallDefault">
                    <div class="titleCard">
                        <h5>Categorias</h5>
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
	</div><!--wrap-->
</section><!--noticeSingle-->
