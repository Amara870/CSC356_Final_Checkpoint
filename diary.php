<?php
    session_start();

    if(!isset($_SESSION["user_id"])) {
        header("Location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Princess Tiana's Diary</title>
        <link rel="stylesheet" href="main.css">
        <script src=""></script>
    </head>

    <body>
        <header>
            <h1><?php echo "Welcome, " . $_SESSION["user_name"]; ?></h1>
            <h2>Tia's Diary</h2>
        </header>

        <main>
            <!--JSON file write-->
            <!--Database save-->
            <textarea placeholder="Diary Entry: "></textarea>
        </main>
        
        <footer>

        </footer>
    </body>
</html>