<?php 
	include "config.php";
	if(!isset($_SESSION['nome'])){
		header("Location: ./index2.php");
	}

	if(!isset($_GET['id'])){
		header("Location: ./index.php");
	} 

	$idlibro = $_GET['id'];
	

	$ceck="SELECT * FROM `libri` WHERE idutente = ".$_SESSION['id']." AND id = $idlibro";
	$result = mysqli_query($connect, $ceck); 
	$user = mysqli_fetch_all($result, MYSQLI_ASSOC); 

	if(!$user){
		header("Location: ./index.php");
	}
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Corso Edibo |  <?php echo $user[0]['titolo']; ?> </title>
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
    <div id="main-wrapper"  class="show menu-toggle">
		
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
						<li class="breadcrumb-item active"><a href="javascript:void(0)"><?php echo $user[0]['titolo']; ?></a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
					<div class="col-xl-1">
					</div>
                    <div class="col-lg-10">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="profile-info">
									<div class="profile-photo" style="margin-top: 0;">
										<img src="<?php echo $user[0]['copertina']; ?>" class="img-fluid" alt="">
									</div>
									<div class="profile-details">
										<div class="profile-name px-3 pt-2">
											<h4 class="text-primary mb-0" style="font-size: x-large;"><?php echo $user[0]['titolo']; ?></h4>
											<p>Titolo</p>
										</div>
										<div class="profile-email px-2 pt-2">
											<h4 class="text-muted mb-0"><?php echo $user[0]['autore']; ?></h4>
											<p>Autore</p>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-xl-1">
					</div>
                </div>
                <div class="row">
                    <div class="col-xl-1">
                       
                    </div>
                    <div class="col-xl-10">
                        <div class="card">
                            <div class="card-body">
								<div class="post-details">
									<div class="row">
										<div class="profile-details">
											<h3 class="mb-2 text-black"><?php echo $user[0]['titolo']; ?></h3>
											<ul class="mb-4 post-meta d-flex flex-wrap">
												<li class="post-author mr-3"><?php echo $user[0]['autore']; ?></li>
												<li class="post-date mr-3"><?php echo $user[0]['pagine']; ?> Pagine</li>
												<li class="post-comment">Avanzamento <?php echo round(($user[0]['segnalibro']/$user[0]['pagine'])*100, 1); ?>%</li>
											</ul>
											<h4>Prefazione</h4>
											<p><?php echo $user[0]['trama']; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-8">
											<img src="<?php echo $user[0]['copertina']; ?>" alt="" class="img-fluid mb-3">
										</div>
										<div class="col-lg-4" style="margin-top: 5%;">
											<form method="post" action="segnalibro.php">
												<h3>Segnalibro</h3>
												<p>Salva l'ultima pagina letta</p>
												<div class="input-group mb-3">
													<input type="number" min="0" max="<?php echo $user[0]['pagine']; ?>" class="form-control" value="<?php echo $user[0]['segnalibro']; ?>" name="pagina">
                                                    <input type="hidden" name="id" value="<?php echo $user[0]['id']; ?>">
													<div class="input-group-append">
														<button class="btn btn-primary" type="submit">Salva Pagina</button>
													</div>
												</div>
											</form>
										</div>
									</div>	
									<div class="row"> 
										<div class="col-lg-12" style="text-align: center;">
											<div class="form-group">
												<a type="button" class="submit btn btn-primary" href="<?php echo $user[0]['store']; ?>">COMPRA</a>
												<a type="button" class="submit btn btn-danger" href="<?php echo './modifica.php?id='.$user[0]['id']; ?>">Modifica</a>
											</div>
										</div>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
					<div class="col-xl-1">
                        
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