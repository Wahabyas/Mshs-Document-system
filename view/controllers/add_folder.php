<?php
     require '../model/class_model.php';
	if(ISSET($_POST)){
		$conn = new class_model();
		$Folder_name = trim($_POST['Folder']);
		$Dropdown = trim($_POST['icon']);
		$Strand1 = trim($_POST['Strand1']);
		$id = trim($_POST['id']);

		$course = $conn->add_Folder($Folder_name, $Dropdown,$Strand1,$id);
		if($course == TRUE){
		    echo '<div class="alert alert-success" style="background:  rgba(12, 193, 21, 0.7); color:white;">Add Folder Successfully!</div><script> setTimeout(function() {  window.history.go(-2); }, 1000); </script>';

		  }else{
			echo '<div class="alert alert-danger" style="background: rgba(193, 18, 12, 0.7); color:white;" >Add Folder Failed!</div><script> setTimeout(function() {  window.history.go(-0); }, 1000); </script>';
		}
	}
?>

