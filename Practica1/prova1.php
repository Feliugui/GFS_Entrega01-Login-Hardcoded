<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["usuari"]=="admin" && $_POST["pass"]=="1234"){
            header("Location: principal.php");
        }else{
            $usuari = $_POST["usuari"];
            $err = true;
        }
    }
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8" />
    <title>Formulari de Login</title>
</head>
<body>
    <?php
        if(isset($err)){
            echo "<p>Revisi l'usuari i la contrassenya</p>";
        }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <input name="usuari" type="text" placeholder="Usuari" value="<?php if(isset($usuari)) echo $usuari;?>" />
        <input name="pass" type="password" placeholder="Pass"/>
        <input type="submit" value="Login" />
    </form>
</body>
</html>