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

    $sql = "DELETE FROM `libri` WHERE `libri`.`id` = $idlibro";

	if(mysqli_query($connect, $sql)){
		$connect -> close();
		header("location:libro.php?id=$idlibro"); 
	} else {
		echo  "Error: " . $sql . "" . mysqli_error($connect);
	}

?>