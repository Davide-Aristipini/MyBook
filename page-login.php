<?php
    include 'config.php';
    
    if(isset($_SESSION['nome'])){
		header("Location: ./index.php");
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!empty($_POST['mail']) && !empty($_POST['password']))
        {
            $mail = $_POST['mail'];
            $password = md5($_POST['password']);

            $sql = "SELECT * FROM utenti WHERE mail = '".$mail."' AND password = '".$password."'";

            

            $risultato = mysqli_query($connect, $sql);
            $utente = mysqli_fetch_array($risultato);
            if($utente){
                $_SESSION["id"] = $utente['id'];
                $_SESSION["nome"] = $utente['nome'];
                $_SESSION["mail"] = $utente['mail']; 
                $_SESSION["img"] = $utente['img']; 
                $_SESSION["cognome"] = $utente['cognome'];
                $connect -> close();

                header("Location: ./index.php");
            } else {
                echo "Credenziali errate";
            }
        } else {
            echo "Compila i Campi.";
        }
    
    }
?> 
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Corso Edibo - Accedi</title>
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
                                    <h4 class="text-center mb-4 text-white">Entra nel tuo Account</h4>
                                    <form method="post">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email</strong></label>
                                            <input type="email" class="form-control" name="mail" placeholder="hello@example.com">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                               
                                            </div>
                                            <div class="form-group">
                                                <a class="text-white" href="page-forgot-password.php">Password Dimenticata?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Accedi</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">Non hai un account? <a class="text-white" href="./page-register.php">Registrati</a></p>
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