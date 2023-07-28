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



	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		
		$titolo = str_replace("'","\'",$_POST['titolo']);
		$autore = str_replace("'","\'",$_POST['autore']);
		$pagine = str_replace("'","\'",$_POST['pagine']);
		$copertina = str_replace("'","\'",$_POST['copertina']);
		$trama = str_replace("'","\'",$_POST['trama']);
		$store = str_replace("'","\'",$_POST['store']);
		$codice = str_replace("'","\'",$_POST['codice']);


		$sql="UPDATE `libri` SET `titolo` = '$titolo', `autore` = '$autore', `pagine` = '$pagine',
		 `copertina` = '$copertina',
		  `trama` = '$trama',
		 `store` = '$store', `codice` = '$codice' WHERE `libri`.`id` = ".$idlibro;
		
		if(mysqli_query($connect, $sql)){
            $connect -> close();
            header("Location: ./libro.php?id=$idlibro"); 
        } else {
            echo  "Error: " . $sql . "" . mysqli_error($connect);
        }

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
									<div class="comment-respond" id="respond">
										<h4 class="comment-reply-title text-primary mb-3" id="reply-title">Modifica </h4>
										<form class="comment-form" method="post">
											<div class="row"> 
												<div class="col-lg-6">
													<div class="form-group">
														<label for="author" class="text-black font-w600">Titolo <span class="required">*</span></label>
														<input type="text" class="form-control" value="<?php echo $user[0]['titolo']; ?>" name="titolo" placeholder="Titolo" id="titolo">
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-group">
														<label for="email" class="text-black font-w600">Autore <span class="required">*</span></label>
														<input type="text" class="form-control" value="<?php echo $user[0]['autore']; ?>" placeholder="Autore" name="autore" id="autore">
													</div>
												</div>
                                                <div class="col-lg-3">
													<div class="form-group">
														<label for="author" class="text-black font-w600">Pagine <span class="required">*</span></label>
														<input type="text" class="form-control" value="<?php echo $user[0]['pagine']; ?>" name="pagine" placeholder="Pagine" id="pagine">
													</div>
												</div>
												<div class="col-lg-9">
													<div class="form-group">
														<label for="email" class="text-black font-w600">Link Copertina <span class="required">*</span></label>
														<input type="text" class="form-control" value="<?php echo $user[0]['copertina']; ?>" placeholder="Link Copertina" name="copertina" id="copertina">
													</div>
												</div>
                                                <div class="col-lg-5">
													<div class="form-group">
														<label for="author" class="text-black font-w600">Codice <span class="required">*</span></label>
														<input type="text" class="form-control" value="<?php echo $user[0]['codice']; ?>" name="codice" placeholder="Codice" id="codice">
													</div>
												</div>
												<div class="col-lg-7">
													<div class="form-group">
														<label for="email" class="text-black font-w600">Link Store <span class="required">*</span></label>
														<input type="text" class="form-control" value="<?php echo $user[0]['store']; ?>" placeholder="Link Store" name="store" id="store">
													</div>
												</div>
												<div class="col-lg-12">
													<div class="form-group">
														<label for="comment" class="text-black font-w600">Trama</label>
														<textarea rows="8" class="form-control" name="trama" placeholder="Trama" id="trama"><?php echo $user[0]['trama']; ?></textarea>
													</div>
												</div>
												<div class="col-lg-9">
													<div class="form-group">
														<input type="submit" value="Salva" class="submit btn btn-primary" id="salva" name="salva">
													</div>
												</div>
												<div class="col-lg-3">
													<div class="form-group">
														<a type="button"class="submit btn btn-warning" href="<?php echo './elimina.php?id='.$user[0]['id']; ?>">Elimina Libro</a>
													</div>
												</div>
											</div>
										</form>
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