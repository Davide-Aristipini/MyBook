<?php
    include "config.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mail = $_POST['mail'];
            
            $sql = "SELECT * FROM utenti WHERE mail = '".$mail."'";

            $risultato = mysqli_query($connect, $sql);
            $utente = mysqli_fetch_array($risultato);
            if($utente){
                
                $password_temporanea = generateRandomString(6);

                $password=md5($password_temporanea);
                $sql = "UPDATE `utenti` SET `password` = '".$password."' WHERE `utenti`.`id` = ".$utente['id'];
                mysqli_query($connect, $sql);
                $to      = $_POST['mail'];
                $subject = 'Cambio Password';
                $message = '<html>
                                <head>
                                    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
                                </head>
                                <body>
                                    Usa questa password temporanea per accedere: '.$password_temporanea.' <br> <a href="https://mybook.digitcom-informatica.com/page-login.php">ACCEDI QUI</a>
                                </body>
                            </html>';
                $headers = 'From: mybook@digitcom-informatica.com'       . "\r\n" .
                            'Reply-To: digitcomsrls@gmail.com' . "\r\n" .
                            'Content-type: text/html; charset: utf8' . "\r\n" .
                            'MIME-Version: 1.0' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();
        
                mail($to, $subject, $message, $headers);

                $connect -> close();

                //header("location:index.php");
                echo $password_temporanea . "<a href='./index.php'> accedi </a>";
            } else {
                echo "La mail non è registrata nei nostri sistemi.";
                echo $sql;
            }
        
    }

    function generateRandomString($length) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Corso Edibo - Password Dimenticata</title>
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
                                    <h4 class="text-center mb-4 text-white">Password Dimenticata</h4>
                                    <form method="post">
                                        <div class="form-group">
                                            <label class="text-white"><strong>Email</strong></label>
                                            <input type="email" class="form-control" placeholder="hello@example.com" name="mail">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Avanti</button>
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