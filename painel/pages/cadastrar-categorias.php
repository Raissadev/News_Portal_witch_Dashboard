<section class="myApresentation">
	<div class="wrapper items-flex">
		<div class="boxMessage">
			<h2>Cadastrar Categoria</h2>
		</div><!--boxMessage-->
	</div><!--wrapper-->
</section><!--myApresentation-->

<section class="contentForm headerCardDefault formDefault">
	<div class="wrap">
		<div class="row">
			<div class="cardBox card">
				<div class="headerCard">
					<h2>Cadastrar categoria</h2>
				</div><!--headerCard-->
				<div class="bodyCard">
				<form method="post" enctype="multipart/form-data">
					<?php
						if(isset($_POST['acao'])){
							$nome = $_POST['nome'];
							if($nome == ''){
								Painel::alert('erro','O campo nome não pode ficar vázio!');
							}else{
								//Apenas cadastrar no banco de dados!
								$verificar = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE nome = ?");
								$verificar->execute(array($_POST['nome']));
								if($verificar->rowCount() == 0){
								$slug = Painel::generateSlug($nome);

								$arr = ['nome'=>$nome,'slug'=>$slug,'order_id'=>'0','nome_tabela'=>'tb_site.categorias'];
								Painel::insert($arr);
								Painel::alert('sucesso','O cadastro da categoria foi realizado com sucesso!');
								}else{
									Painel::alert("erro",'Já existe uma categoria com este nome!');
								}
							}
							
						}
						?>
						<div class="formGroup">
							<label>Nome da categoria:</label>
							<input type="text" name="nome">
						</div><!--formGroup-->
						<div class="formGroup">
							<input type="submit" name="acao" value="Cadastrar!">
						</div><!--formGroup-->
					</form>
				</div><!--bodyCard-->
			</div><!--boxCard-->
		</div><!--row-->
	</div><!--wrap-->
</section><!--contentForm-->



