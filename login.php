<?php
    session_start();
    if (isset($_SESSION['user']) && $_SESSION['user'] != false) {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Logg inn - Vedlikeholdsapplikasjon</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <section id="user_box">
        <header>
            <h1>Perfect Hotels Premium</h1>
        </header>
        <?php
        // Error message handling
        if (isset($_SESSION['error_msg'])) {
            echo "
            <div>
                <div class='error_message'>
                {$_SESSION['error_msg']}
                </div>
            </div>
            ";
            unset($_SESSION['error_msg']);
        }

        if (isset($_SESSION['user'])) {
            echo "
            <div>
                <div class='success_message'>
                {$_SESSION['success_msg']}
                </div>
            </div>
            ";
        } else {
        ?>
        <form action="php/login/login.php" method="POST">
            <div>
                <input placeholder="Brukernavn" required type="text" id="username" name="username" class="type">
            </div>
            <div>
                <input placeholder="Passord" required type="password" id="password" name="password" class="type">
            </div>
            <div>
                <input type="hidden" name="req" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <input type="submit" name="login" value="Logg inn" id="login" class="submit">
            </div>
        </form>
        <?php
        }
        ?>
        <p class="reglink">
            <a href="register.php" class="button">Registrer</a>
        </p>
    </section>
</body>
</html>