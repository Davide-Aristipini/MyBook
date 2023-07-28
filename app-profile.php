<?php 
	include "config.php";
	if(!isset($_SESSION['id'])){
		header("Location: ./index2.php");
	} else {
		$sql = "SELECT * FROM utenti WHERE id = ".$_SESSION['id'];
		$risultato = mysqli_query($connect, $sql);
		$utente = mysqli_fetch_array($risultato);
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $sql = "UPDATE `utenti` SET `nome` = '".$_POST['nome']."', `cognome`= '".$_POST['cognome']."', `mail`= '".$_POST['mail']."', `img`= '".$_POST['img']."', `indirizzo`= '".$_POST['indirizzo']."',
		 `ncivico`= '".$_POST['ncivico']."', `cap`= '".$_POST['cap']."', `citta`= '".$_POST['citta']."', `eta`= '".$_POST['eta']."', `copertina`= '".$_POST['copertina']."', `aboutme`= '".$_POST['aboutme']."', `skills`= '".$_POST['skills']."'
                 WHERE `utenti`.`id` = ".$_SESSION['id'];
        
        if(mysqli_query($connect, $sql)){
            $connect -> close();
			$_SESSION['img'] = $utente['img'];
            header("location:app-profile.php"); 
        } else {
            echo  "Error: " . $sql . "" . mysqli_error($connect);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Corso Edibo - <?php echo $utente['nome']. " ".$utente['cognome'];?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
	<link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="./vendor/lightgallery/css/lightgallery.min.css" rel="stylesheet">
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
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="./index.php">Home</a></li>
						<li class="breadcrumb-item active"><a href="./app-profile.php">Profilo</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="photo-content" style="background: url(<?php echo $utente['copertina'];?>);">
                                    <div class="cover-photo" style="background: url(<?php echo $utente['copertina'];?>);"></div>
                                </div>
                                <div class="profile-info">
									<div class="profile-photo">
										<img src="<?php echo $_SESSION['img'];?>" class="img-fluid rounded-circle" alt="">
									</div>
									<div class="profile-details">
										<div class="profile-name px-3 pt-2">
											<h4 class="text-primary mb-0"><?php echo $_SESSION['nome']. " ".$_SESSION['cognome'];?></h4>
											<?php 
												if(isset($_SESSION['professione'])){
														echo "<p>".$_SESSION['professione']."</p>";
												} 
											?>
										</div>
										<div class="profile-email px-2 pt-2">
											<h4 class="text-muted mb-0"><?php echo $_SESSION['mail']; ?></h4>
											<p>Email</p>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link active show">Chi Sono</a>
                                            </li>
                                            <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link">Impostazioni</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="about-me" class="tab-pane fade active show">
                                                <div class="profile-about-me">
                                                    <div class="pt-4 border-bottom-1 pb-3">
                                                        <h4 class="text-primary">Chi Sono</h4>
                                                        <p class="mb-2"><?php echo $utente['aboutme']; ?></p>
                                                    </div>
                                                </div>
                                                <div class="profile-skills mb-5">
                                                    <h4 class="text-primary mb-2">Skills</h4>
                                                    <?php 
                                                    $str_arr = explode (",", $utente['skills']);
                                                    for($i=0;$i<count($str_arr);$i++){
                                                        echo '<a href="javascript:void()" class="btn btn-primary light btn-xs mb-1">'.trim($str_arr[$i]).'</a>';
                                                    }
                                                    ?>
                                                </div>
                                                <div class="profile-personal-info">
                                                    <h4 class="text-primary mb-4">Informazioni Personali</h4>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Nome <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span><?php echo $_SESSION['nome'] ." ".$_SESSION['cognome']; ?> </span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span><?php echo $_SESSION['mail']; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Età <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span><?php echo $utente['eta']; ?> Anni</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Città <span class="pull-right">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7" style="text-transform: capitalize;"><span><?php echo $utente['citta']; ?>,
                                                                Italia</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="profile-settings" class="tab-pane fade">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        <h4 class="text-primary">Impostazioni Account</h4>
                                                        <form method="post">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Email</label>
                                                                    <input type="email" placeholder="Email" class="form-control" required value="<?php echo $utente['mail'];?>" name="mail">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Modifica Password</label>
																	<a href="./page-lock-screen.php"><button type="button" class="btn btn-danger form-control">Modifica Password</button></a>
                                                                </div>
                                                            </div>
															<div class="form-row">
																<div class="form-group col-md-10">
																	<label>Indirizzo</label>
																	<input type="text" placeholder="Via Costantino ecc..." class="form-control" required value="<?php echo $utente['indirizzo'];?>" name="indirizzo">
																</div>
																<div class="form-group col-md-2">
                                                                    <label>N°</label>
                                                                    <input type="text" class="form-control" required value="<?php echo $utente['ncivico'];?>" name="ncivico">
                                                                </div>
															</div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Città</label>
                                                                    <input type="text" class="form-control" required value="<?php echo $utente['citta'];?>" name="citta">
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Cap</label>
                                                                    <input type="text" class="form-control" required value="<?php echo $utente['cap'];?>" name="cap">
                                                                </div>
                                                            </div>
															<div class="form-row">
                                                                <div class="form-group col-md-5">
                                                                    <label>Nome</label>
                                                                    <input type="text" class="form-control" required value="<?php echo $utente['nome'];?>" name="nome">
                                                                </div>
                                                                <div class="form-group col-md-5">
                                                                    <label>Cognome</label>
                                                                    <input type="text" class="form-control" required value="<?php echo $utente['cognome'];?>" name="cognome">
                                                                </div>
																<div class="form-group col-md-2">
                                                                    <label>Età</label>
                                                                    <input type="number" class="form-control" required value="<?php echo $utente['eta'];?>" name="eta">
                                                                </div>
                                                            </div>
															<div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>URL Immagine Profilo</label>
                                                                    <input type="text" class="form-control" required value="<?php echo $utente['img'];?>" name="img">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>URL Immagine Copertina</label>
                                                                    <input type="text" class="form-control" required value="<?php echo $utente['copertina'];?>" name="copertina">
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                    <label>Chi Sono</label>
                                                                    <textarea type="text" class="form-control" required value="<?php echo $utente['aboutme'];?>" name="aboutme" rows="3"><?php echo $utente['aboutme'];?></textarea>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                    <label>Skill</label>
                                                                    <input type="text" class="form-control" required value="<?php echo $utente['skills'];?>" placeholder="Studente, Programmazione, ecc" name="skills">
                                                            </div>
                                                            <button class="btn btn-primary" type="submit">Salva</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<!-- Modal -->
									<div class="modal fade" id="replyModal">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Post Reply</h5>
													<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
												</div>
												<div class="modal-body">
													<form>
														<textarea class="form-control" rows="4">Message</textarea>
													</form>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
													<button type="button" class="btn btn-primary">Reply</button>
												</div>
											</div>
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
	
	<!--removeIf(production)-->
        
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
	<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="./js/custom.min.js"></script>
	<script src="./js/deznav-init.js"></script>
	<script src="./vendor/lightgallery/js/lightgallery-all.min.js"></script>
	<script>
		$('#lightgallery').lightGallery({
			thumbnail:true,
		});
	</script>
    



	
		
</body>

</html>