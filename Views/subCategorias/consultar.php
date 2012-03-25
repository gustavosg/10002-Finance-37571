<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="../scripts/functions.js"></script>
		<meta charset="ISO-8859-1">
		<title>Finance-37571: Consultar Sub-Categoria:</title>
	</head>

	<body>
		<form action="resultConsultar.php" name="form" method="post">
			<h1 align="center">Entre com as informações:</h1>
			<br>
			
			<p align="center">
				<label align="center">Sub-Categoria:</label> 
				<input type="text" size="100"	maxlength="50" name="nomeSubCategoria" id="nomeSubCategoria" />
			</p>
			<br>
			<p align="center">
				<button type="submit" value="submit" name="Enviar">Enviar</button>
		
				<button type="button" value="Limpar" name="Limpar" onclick="limparCamposSubCategorias()">Limpar</button>
				<br>
			</p>
		</form>
	</body>
	
	<footer style="position: fixed; right: 3px; bottom: 0px;">
		Gustavo Souza Gonçalves - 37571 <br> Marco Aurélio D. Acaroni - <br>
		PUC Minas - 2011-2012
	</footer>
	
</html>
