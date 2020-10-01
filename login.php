<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>United Security© - Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div id="master">
        <header>
            <div class="login">
                <a href="login.php">Entre ou Cadastre-se</a>
            </div>
            <div class="logo">
                <a href="index.php"><img src="src/logo.png" alt="United Security©" title="United Security©"></a>
                <h2 class="subtitulo">Maior segurança. A tecnologia à seu favor.</h2>

            </div>
            <br>
            <nav>
                <ul>
                    <li><a href="index.php">Início</a></li>
                    <li><a href="servicos.php">Serviços</a></li>
                    <li><a href="contato.php"> Contato</a></li>
                    <li><a href="sobre.php"> Sobre</a></li>
             
                </ul>
            </nav>
        </header>
        
        
 

       

            <form id="LogIn" action="login.php" method="POST">
<?php
    session_start();
            


    if (!empty($_POST)) {
 
	
    $servidor = "localhost";
    $usuario = "root" ;
    $senha = "" ;
    $base = "united";
        
    $conn = mysqli_connect($servidor, $usuario, $senha, $base);
        
    if(!$conn ){
        die("Erro encontrado: " . mysqli_connect_error());
        
    }
	// receber o pedido de login com segurança
	$username = ($_POST['nick']);
	$password = ($_POST['password']);
 
	// verificar o utilizador em questão (pretendemos obter uma única linha de registos)
	$login = mysqli_query($conn, "SELECT apelido, senha FROM cadastro WHERE apelido = '$username' AND senha = '$password'");
 
	if (mysqli_num_rows($login)> 0) {
 
        echo "<script>alert('Bem vindo(a), $username')</script>";
        echo "<h1 class='titulo'>Olá, $username </h1>";
	} else {
        echo "<h1 class='titulo'>Login</h1>";
		echo "<script>alert('Login e/ou senha incorretos. Por favor, tente novamente.')</script>";
	}
}
    else{
        echo"<h1 class='titulo'>Login</h1>";
    }
?>
    
            <fieldset>
                <label for="nick">Login<b>*</b>:</label><input type="text" id="nick" name="nick" placeholder="Digite seu apelido" required/>
                <br>
                <label for="password">Senha<b>*</b>:</label><input type="password" id="password" name="password" placeholder="Digite sua Senha" required><br>
                <input type="submit" value="Login" id="logar" name="logar">
                
                <p>Ainda nao possui sua conta? <a href="cadastro.php"><strong>Cadastre-se!</strong></a></p>
            </fieldset>
                
        </form>
        
        
        
      


        <footer>

        </footer>
    </div>
</body>
</html>