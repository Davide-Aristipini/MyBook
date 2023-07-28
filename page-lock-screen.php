<?php 
	include "config.php";
	if(!isset($_SESSION['id'])){
		header("Location: ./index2.php");
	} 
    echo "<style> .errore{opacity: 0;} </style>";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if($_POST['password1'] == $_POST['password2']){
            echo "<style> .errore{opacity: 0;} </style>";
            $password = md5($_POST['password2']);
            $sql = "UPDATE `utenti` SET `password` = '".$password."' WHERE `utenti`.`id` = ".$_SESSION['id'];
            if(mysqli_query($connect, $sql)){
                $connect -> close();
                header("Location: ./app-profile.php"); 
            } else {
                echo  "Error: " . $sql . "" . mysqli_error($connect);
            }
        } else{
            echo "<style> .errore{opacity: 1;} </style>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Corso Edibo - Modica Password</title>
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
                                    <h4 class="text-center mb-4 text-white">Modifica Password</h4>
                                    <form method="post">
                                        <div class="form-group">
                                            <label class="text-white"><strong>Nuova Password</strong></label>
                                            <input type="password" class="form-control" required name="password1">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-white"><strong>Conferma Password</strong></label>
                                            <input type="password" class="form-control" required name="password2">
                                        </div>
                                        <div class="form-group text-danger errore">
                                            <p class='text-danger'> Le due password non coincidono </p>
                                        </div>                                            
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Modifica Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
    <!-- Common JS -->
    <script src="./vendor/global/global.min.js"></script>
	<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <!-- Custom script -->
    <script src="./vendor/deznav/deznav.min.js"></script>
    <script src="./js/custom.min.js"></script>
    <script src="./js/deznav-init.js"></script>
</body>

</html>