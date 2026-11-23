<?php
    session_start();

    $message = "";

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST["txtUserName"];
        $password = $_POST["txtPassword"];

        echo "username: " . $username . "<BR>";
        echo "password: " . $password . "<BR>";

        require_once "db_connect.php";

        //$sql = "SELECT user_id FROM user_info WHERE user_name = :user_name AND password = :password;";
        $sql = "CALL sp_log_login(:user_name, :password)";
        
        $stmt = $pdo->prepare($sql);

        $stmt->execute(["user_name" => $username, "password" => $password]);

        $user = $stmt->fetch();

        if($user) {
            session_regenerate_id();

            $_SESSION["user_id"] = $user["user_id"];
            $SESSION["user_name"] = $username;

            header("Location: diary.php");
            exit;
        }
        else {
            $message = "Invalid username or password. Please try again.";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <!--Meta data-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Meta title-->
        <title>Login Page</title>
        <!--Stylesheet-->
        <link rel="stylesheet" href="main.css">
        <!--Javascript file-->
        <script src="Validator.js" defer></script>
    </head>
    <body>
        <!--Main title-->
        <header>
            <?php include 'menu.php'; ?>
            <h1>Login</h1>
        </header>

        <main>
            <form name="loginForm" id="loginForm" onsubmit="return validateLoginForm();" action="login.php" method="post">
                <!--Name field-->
                <div class="row">
                    <label for="txtUserName" id="lblUserName" name="lblUserName">User Name:</label>
                    <input type="text" name="txtUserName" id="txtUserName" required>
                    <div class="error" id="txtUserNameErr"></div>
                </div>

                <!--Age field-->
                <div class="row">
                    <label for="txtPassword" id="lblPassword" name="lblUserName">Password:</label>
                    <input type="password" name="txtPassword" id="txtPassword">
                    <div class="error" id="txtPasswordErr"></div>
                </div>

                <!--ID number field-->

                <div class="row">
                    <input type="submit" value="Submit">
                </div>
            </form>
        </main>
    </body>
</html>