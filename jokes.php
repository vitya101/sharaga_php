<?php 
	require_once("getFile.php");
	$header = getFile("header.php");
    $offset = intval($_GET['offset'] ?? 0);
    $limit = 2;
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
		<div id="wrapper" class="grid gap-5">
			<h1 class="text-center text-6xl font-bold mb-10">Внимание, анекдот</h1>
			<?php

                require_once "./bd.php";

				$conn = conn();
				$joke = $conn->prepare("SELECT * FROM jokes WHERE isHidden=false LIMIT $limit OFFSET $offset");
				$joke->execute();
				$row = $joke->fetchAll();
				foreach($row as $item) {
					echo "
						<div class='note p-10 border rounded-2xl'>
							<p>
								<span class='date'>$item[author]</span>
							</p>
							<p>$item[joke]</p>
						</div>
					";
				}

			?>
            <div id="pagination" class="w-1/6 m-auto flex justify-between gap-2">
                <?php 
                    $url=strtok($_SERVER["REQUEST_URI"],'?');
                    $jokeQuery = $conn->prepare("SELECT COUNT(*) FROM jokes WHERE isHidden=false");
                    $jokeQuery->execute();
                    $countJoke = $jokeQuery->fetchColumn();
                    if ($countJoke > $limit) {
                        for($i = 0;$i < ceil($countJoke / $limit); $i++) {
                            $setOffset = $i * $limit;
                            echo "<a href='$url?offset=$setOffset' class='border p-3 rounded w-10 h-10 flex items-center justify-center hover:bg-sky-400 hover:text-white'>". $i + 1 ."</a>";
                        }
                    }
                    // 
                ?>
            </div>
			<div id="form">
				<form class="grid gap-5 p-5 border rounded-2xl" action="./jokes_cel.php" method="POST">
                    <h3 class="text-center">Предложите свой анекдот</h3>
					<p><input name="author" class="form-control" placeholder="Ваше имя"></p>
					<p><textarea name="joke" class="form-control" placeholder="Ваш анекдот"></textarea></p>
                    <div>
                    <p>Выберите категорию</p>
                    <select name="category" class="w-full border h-10 rounded">
                        <?php 
                            $category = $conn->prepare('SELECT * FROM joke_categories');
                            $category->execute();
                            $row = $category->fetchAll();
                            foreach($row as $item) {
                                echo "<option value='$item[id]'>$item[category]</option>";
                            }
                        ?>
                    </select>
                    </div>
					<p><input type="submit" class="btn btn-info btn-block" value="Сохранить"></p>
				</form>
			</div>
		</div>
	</body>
</html>

