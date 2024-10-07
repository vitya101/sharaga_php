<?php 
	require_once("getFile.php");
	$header = getFile("header.php");
?>

<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">  
		<title>Гостевая книга</title>
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="css/styles.css">
		<script src="https://cdn.tailwindcss.com"></script>
	</head>
	<body>
		<?php echo $header;?>
		<div id="wrapper">
			<h1>Гостевая книга</h1>
			<?php
			
				require_once "./bd.php";
				$conn = conn();
				$comments = $conn->prepare('SELECT * FROM comments ORDER BY time DESC');
				$comments->execute();
				$row = $comments->fetchAll();
				foreach($row as $item) {
					echo "
						<div class='note'>
							<p>
								<span class='date'>$item[time]</span>
								<span class='name'>$item[name]</span>
							</p>
							<p>$item[comment]</p>
						</div>
					";
				}

			?>
			<div id="form">
				<form action="./cel.php" method="POST">
					<p><input name="name" class="form-control" placeholder="Ваше имя"></p>
					<p><textarea name="comment" class="form-control" placeholder="Ваш отзыв"></textarea></p>
					<p><input type="submit" class="btn btn-info btn-block" value="Сохранить"></p>
				</form>
			</div>
		</div>
	</body>
</html>

