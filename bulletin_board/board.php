<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <h1 class="text-center text-5xl mb-10">Объявления</h1>
    <?php

        require_once "../bd.php";
        $conn = conn();
        $comments = $conn->prepare('SELECT * FROM bulletin_board, users WHERE bulletin_board.author_id = users.id');
        $comments->execute();
        $row = $comments->fetchAll();
        foreach($row as $item) {
            echo "
                <div class='flex flex-col gap-5 max-w-screen-sm border rounded-xl mx-auto p-10'>
                    <p class='font-bold'>$item[login]</p>
                    <p>$item[title]</p>
                    <p>$item[description]</p>
                    <form action='' method='POST'>
                        <button class='rounded-xl border px-4 py-2'>like ❤</button>
                    </form>
                </div>
            ";
        }

    ?>
</body>
</html>