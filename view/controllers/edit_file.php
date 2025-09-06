<?php
  require_once "../model/class_model.php";;
	if(ISSET($_POST)){
		$conn = new class_model();
		$Filename = trim($_POST['Filename']);
	
		$file_id = trim($_POST['fileid']);
		$course = $conn->edit_file($Filename, $file_id);
		if($course == TRUE){
		    echo '<div class="alert alert-success">Edit file Successfully!</div><script> setTimeout(function() {  window.history.go(-1); }, 1000); </script>';

		  }else{
			echo '<div class="alert alert-danger">Edit file Failed!</div><script> setTimeout(function() {  window.history.go(-0); }, 1000); </script>';
		}
	}
?>

