<script>
    function validarForm()
    {
        var correu = btoa(document.forms["login"]["correu"].value), pass=btoa(document.forms["login"]["pass"].value);
        document.forms["login"]["secretcorreu"].value = correu;
        document.forms["login"]["secretpass"].value = pass;
    }
</script>
<?php 
require_once("./correus.php");
require_once("./password.php");
$trobat = 0;
if($_SERVER["REQUEST_METHOD"] == "POST"){
$correuDesCifrado = base64_decode( $_POST["secretcorreu"]);
$PassDesCifrado = base64_decode( $_POST["secretpass"]);

echo ($correuDesCifrado);
    for ($i = 0; $i <= 3; $i++)
    {
        $correus = CORREUS[$i];
        $passwordsArxiu = PASSWORD[$i] ;
        $passCifrada = password_hash($passwordsArxiu, PASSWORD_DEFAULT);
        if($correuDesCifrado==$correus && password_verify($PassDesCifrado, $passCifrada) ){
            header("Location: https://educem.com/");
            $trobat =1;
        }
    }
    if( $trobat== 0){
        echo'<script type="text/javascript"> alert("El usuari o contrasenya no es correcta"); window.location.href="practica1.php"; </script>';
    }

}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8" />
    <title>Formulari de Login</title>
    <link rel="stylesheet" href="./practica1.css">
</head>
<body>

<form name="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validarForm()" method="POST"  >
  <h4>Formulari Login</h4>
  <input name="correu"  class="correu" type="text" placeholder="correu@correu.com"/>
  <input name="pass"  class="pw" type="password" placeholder="pass"/>
  <input name="secretcorreu"  class="correu" type="hidden" placeholder="correu@correu.com"/>
  <input name="secretpass"  class="pw" type="hidden" placeholder="pass"/>
  <li><a class='lf--forgot' href='#'>Forgot password?</a></li>
  <input class="sub" type="submit" value="Log in"/>
</form>
</body>
</html>