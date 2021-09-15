<?php
	if(isset($_GET['excluir'])){
		$idExcluir = intval($_GET['excluir']);
		$selectImagem = MySql::conectar()->prepare("SELECT capa FROM `tb_site.noticias` WHERE id = ?");
		$selectImagem->execute(array($_GET['excluir']));

		$imagem = $selectImagem->fetch()['capa'];
		Painel::deleteFile($imagem);
		Painel::deletar('tb_site.noticias',$idExcluir);
		Painel::redirect(INCLUDE_PATH_PAINEL.'gerenciar-noticias');
        //Função para deletar a noticia junto a imagem do servidor, assim otimizando o site.
	}else if(isset($_GET['order']) && isset($_GET['id'])){
		Painel::orderItem('tb_site.noticias',$_GET['order'],$_GET['id']);
	}

	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 4;
	
	$noticias = Painel::selectAll('tb_site.noticias',($paginaAtual - 1) * $porPagina,$porPagina);
	
?>
<section class="myApresentation">
	<div class="wrapper items-flex">
		<div class="boxMessage">
			<h2>Serviços Cadastrados</h2>
		</div><!--boxMessage-->
	</div><!--wrapper-->
</section><!--myApresentation-->

<section class="contentList headerCardDefault">
	<div class="wrap">
		<div class="row">
			<div class="cardBox card">
				<div class="headerCard">
					<h2>Serviços</h2>
				</div><!--headerCard-->
				<div class="bodyCard">
					<div class="wapperTable">
						<table>
							<tr class="tHead">
								<td>Título</td>
								<td>Categoria</td>
								<td>Imagem</td>
								<td>#</td>
								<td>#</td>
								<td>#</td>
								<td>#</td>
							</tr><!--tHead-->
							<?php
								foreach ($noticias as $key => $value) { //Puxando o valor (nome) da coluna da tabela noticias (tb.site_noticias)
								$nomeCategoria = Painel::select('tb_site.categorias','id=?',array($value['categoria_id']))['nome'];
							?>
							<tr class="tBody">
								<td><?php echo $value['titulo']; ?></td> <!--Mostrando o titulo da Noticia com $value['titulo'] puxado no foreach-->
								<td><?php echo $nomeCategoria; ?></td>
								<td><img style="width: 50px;height:50px;" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['capa']; ?>" /></td>
								<td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-noticia?id=<?php echo $value['id']; ?>"><i data-feather="edit"></i> Editar</a></td>
								<td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-noticias?excluir=<?php echo $value['id']; ?>"><i data-feather="trash-2"></i> Excluir</a></td>
								<td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-noticias?order=up&id=<?php echo $value['id'] ?>"><i data-feather="chevron-up"></i></a></td>
								<td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-noticias?order=down&id=<?php echo $value['id'] ?>"><i data-feather="chevron-down"></i></a></td>
							</tr><!--tBody-->
						<?php } ?>
						</table>
					</div><!--wapperTable-->
				</div><!--bodyCard-->
			</div><!--boxCard-->
		</div><!--row-->
	</div><!--wrap-->
</section><!--contentList-->

<div class="btnPags">
	<?php
			$totalPaginas = ceil(count(Painel::selectAll('tb_site.noticias')) / $porPagina);

			for($i = 1; $i <= $totalPaginas; $i++){
				if($i == $paginaAtual)
					echo '<a class="btnSelected btn btnPage" href="'.INCLUDE_PATH_PAINEL.'gerenciar-noticias?pagina='.$i.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH_PAINEL.'gerenciar-noticias?pagina='.$i.'">'.$i.'</a>';
			}

		?>
</div><!--btnPags-->
