<?php 
	include "config.php";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!empty($_POST['mail']) && !empty($_POST['password']))
        {
            $mail = $_POST['mail'];
            $password = md5($_POST['password']);

            $sql = "SELECT * FROM Utenti WHERE mail = '".$mail."' AND password = '".$password."'";

            echo $sql;

            $risultato = mysqli_query($connect, $sql);
            $utente = mysqli_fetch_array($risultato);
            if($utente){
                $_SESSION["id"] = $utente['id'];
                $_SESSION["nome"] = $utente['nome'];
                $_SESSION["mail"] = $utente['mail']; 
                $_SESSION["img"] = $utente['img'];
				$_SESSION["cognome"] = $utente['cognome']; 
                $connect -> close();

                header("location:index.php");
            } else {
                echo "Credenziali errate";
            }
        } else {
            echo "Compila i Campi.";
        }
    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Corso Edibo</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
	<link rel="stylesheet" href="./vendor/chartist/css/chartist.min.css">
    <link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="./vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper" class="show menu-toggle">
		
		<!--**********************************
            Header start
        ***********************************-->
         <?php 
		 	include 'header.php';
		 ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="col-xl" >
                        <div class="card text-center text-white bg-secondary">
                            <div class="card-header">
                                <h5 class="card-title text-white">Area Riservata</h5>
                            </div>
                            <div class="card-body">

                                <p class="card-text text-white" style="font-size: xx-large;">Accedi per visualizzare i dati</p>
								<button type="button" class="btn btn-secondary light btn-card" data-toggle="modal" data-target="#exampleModalCenter">Accedi</button>
								<div class="modal fade" id="exampleModalCenter">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
												<form method="post">
													<div class="modal-header">
														<h5 class="modal-title text-primary">Accedi</h5>
														<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
														</button>
													</div>
													<div class="modal-body">
															<div class="form-group">
																<label class="mb-1 text-primary"><strong>Email</strong></label>
																<input type="email" class="form-control" name="mail" placeholder="hello@example.com">
															</div>
															<div class="form-group">
																<label class="mb-1 text-primary"><strong>Password</strong></label>
																<input type="password" class="form-control" placeholder="Password" name="password">
															</div>
															<div class="form-row d-flex justify-content-between mt-4 mb-2">
																<div class="form-group">
																</div>
																<div class="form-group text-primary">
																	<a href="page-forgot-password.php">Password Dimenticata?</a>
																</div>
															</div>
														<div class="new-account mt-3 text-primary">
															<p>Non hai un account? <a href="./page-register.php">Registrati</a></p>
														</div>                                                </div>
													<div class="modal-footer">
														<button type="button" class="btn btn-danger light" data-dismiss="modal">Indietro</button>
														<button type="submit" class="btn btn-primary">Accedi</button>
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
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <?php 
		 	include 'footer.php';
		 ?>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
	<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="./vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="./js/custom.min.js"></script>
	<script src="./js/deznav-init.js"></script>
	<script src="./vendor/owl-carousel/owl.carousel.js"></script>
	
	<!-- Chart piety plugin files -->
    <script src="./vendor/peity/jquery.peity.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="./vendor/apexchart/apexchart.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="./js/dashboard/dashboard-1.js"></script>
	<script>
		function carouselReview(){
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.testimonial-one').owlCarousel({
				loop:true,
				autoplay:true,
				margin:30,
				nav:false,
				dots: false,
				left:true,
				navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
				responsive:{
					0:{
						items:1
					},
					484:{
						items:2
					},
					882:{
						items:3
					},	
					1200:{
						items:2
					},			
					
					1540:{
						items:3
					},
					1740:{
						items:4
					}
				}
			})			
		}
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000); 
		});
	</script>
</body>
</html>