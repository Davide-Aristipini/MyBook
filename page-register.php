<?php
    include 'config.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $mail = $_POST['mail2'];
        $password = md5($_POST['password2']);
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];

        $sql = "INSERT INTO utenti (`id`, `nome`, `cognome`, `mail`, `password`, `img`, `indirizzo`, `ncivico`, `cap`, `citta`, `eta`, `copertina`, `aboutme`, `skills`)
                 VALUES (NULL, '$nome', '$cognome', '$mail', '$password', './images/man.png','', '', 00000, '', 0, '', '', 'Novellino, Pioner')";
        
        if($mail!="" && mysqli_query($connect, $sql)){
            $connect -> close();
            $_SESSION["img"] = './images/man.png'; 
            $_SESSION["nome"] = $nome;
            $_SESSION["cognome"] = $cognome;
            $_SESSION["mail"] = $mail;
            header("location:logout.php"); 
        } else {
            echo  "Error: " . $sql . "" . mysqli_error($connect);
        }
    }
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Corso Edibo - Registrati</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
					
					<div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.php"><img src="images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4 text-white">REGISTRATI</h4>
                                    <form method="POST">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Nome:</strong></label>
                                            <input type="text" class="form-control" placeholder="Nome" name="nome">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Cognome:</strong></label>
                                            <input type="text" class="form-control" placeholder="Cognome" name="cognome">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email:</strong></label>
                                            <input type="email" class="form-control" placeholder="hello@example.com" name="mail2">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password:</strong></label>
                                            <input type="password" class="form-control" placeholder="Password" name="password2">
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Registrati</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">Hai già un Account? <a class="text-white" href="page-login.php">Accedi</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="./vendor/global/global.min.js"></script>
<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="./js/custom.min.js"></script>
<script src="./js/deznav-init.js"></script>

</body>
</html>