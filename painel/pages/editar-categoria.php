<?php 
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$categoria = Painel::select('tb_site.categorias','id = ?',array($id));
	}else{
		Painel::alert('erro','Você precisa passar o parametro ID.');
		die();
	}
 ?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Categoria</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
                $slug = Painel::generateSlug($_POST['nome']); //O slug vai ser igual ao generateSlug criado no arquivo Painel.php. Em post nome
                $arr = array_merge($_POST,array('slug'=>$slug)); //O array_merge serve para gente unir mais de um array
				$verificar = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE nome = ? AND id != ?"); //Função para verificar se existe uma categoria com o mesmo nome (só que esse mesmo nome não pode retornar o que a gente atualizou agora)
                $verificar->execute(array($_POST['nome'],$id));
                $info = $verificar->fetch();
                if($verificar->rowCount() == 1 && $_POST['nome'] == $info['nome']){ //Verificando se existe no banco de dado e para verificar os acentos também
                    Painel::alert('erro','Já existe uma categoria com esse nome!');
                }else{
                    //Essa função $verificar vai: Conectar ao banco de dados > preparar > selecionar tudo da tabela `tb_site.categorias` > quando nome for igual a ? > e o ID tem que ser diferente desse ?
                    if(Painel::update($arr)){
                        Painel::alert('sucesso','A categoria foi editada com sucesso!');
                        $categoria = Painel::select('tb_site.categorias','id = ?',array($id));
                    }else{
                        Painel::alert('erro','Campos vázios não são permitidos.');
                    }
                }
			}
		?>

		<div class="form-group">
			<label>Categoria:</label>
			<input type="text" name="nome" value="<?php echo $categoria['nome']; ?>">
		</div><!--form-group-->



		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="hidden" name="nome_tabela" value="tb_site.categorias" />
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->