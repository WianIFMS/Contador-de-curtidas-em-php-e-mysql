
<?php 
//session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);  


require_once"Conexao.php"; 
$sql= "SELECT * FROM postagens WHERE id = ?";

      $sqlprep = $conexao->prepare($sql);
      $sqlprep->bind_param("i" ,$vetorUmRegistro["id"]);
      $sqlprep->execute();
      $resultadoSql = $sqlprep->get_result();
      $postagem = $resultadoSql->fetch_assoc();

      $sql= "SELECT * FROM contador";
$resultadosql = $conexao->query($sql);
$vetorRegistros = $resultadosql->fetch_all(MYSQLI_ASSOC);
      ?>
<!DOCTYPE html>
<html>
<head>
	<title>Contador de curtidas</title>
</head>

	<body>

		<h1>Contador</h1>

			<form method="post" action="SalvarCurtidas.php">
				<input type="submit" name="gostei" > 

			</form>
				<form method="post" action="SalvarCurtidas.php">
					<input type="submit" name="naogostei" >
				 	
			</form>

			<h2>Listar Curtidas</h2>

	<table>

		<tr>
			<th>ID</th>
			<th>Gostei</th>
			<th>Não Gostei</th>
		</tr>
		<tr>
			<?php $gostei = 0;  $naogostei = 0;  

			foreach ($vetorRegistros as $value) {?>		


	</tr>
	<?php 
	if ($value["gostei"] != null) {
		$gostei++;
	}elseif($value["naogostei"] != null){
$naogostei++;
	} } ?>
	</table>
		
Gostei <?=$gostei;?><br>
Não Gostei <?=$naogostei;?>
	</body>

</html>