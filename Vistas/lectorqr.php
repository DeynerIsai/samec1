<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Decodificar códigos QR con PHP</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="qr.css">
 
</head>
<body class="bg">
	<div class="container">
		<br><br><br>
		<div class="row">
			<div class="col-md-6 offset-md-3 card">
				<div class="panel-heading">
					<h1>Decodificar códigos QR</h1>
				</div>
				<hr>
				<form action="decode.php" method="post" enctype="multipart/form-data">
					<input type="file" name="qrimage" id="qrimage" class="form-control" required=""><br>
					<input type="submit" class="btn btn-md btn-block btn-info" value="Enviar datos" name="">
					
				</form>
				
			</div>
		</div>	
 
	</div>
	
</body>
</html>