
<?php

	require 'config/connection.php';

	class class_model{

		public $host = db_host;
		public $user = db_user;
		public $pass = db_pass;
		public $dbname = db_name;
		public $conn;
		public $error;
 
		public function __construct(){
			$this->connect();
		}
 
		private function connect(){
			$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
			if(!$this->conn){
				$this->error = "Fatal Error: Can't connect to database".$this->conn->connect_error;
				return false;
			}
		}

		public function login($username, $password, $status, $role) {
			$stmt = $this->conn->prepare("SELECT * FROM `user` WHERE `username` = ? AND `password` = ? AND `Status` = ? AND `role` = ?") or die($this->conn->error);
			$stmt->bind_param("ssss", $username, $password, $status, $role);
			if($stmt->execute()){
				
				$result = $stmt->get_result();
				$valid = $result->num_rows;
				$fetch = $result->fetch_array();
				if($fetch){
					if($username === $fetch['username'] && $password === $fetch['password'] ){
				return array(
					'user_id' => htmlentities($fetch['user_id']),
					'count' => $valid
				);
			}else{
				return array(
					'user_id'=> null,
					'count'=> 0
				);
			}
			}else{
				return array(
					'user_id'=> null,
					'count'=> 0
				);
			}
			}
		}
		
		public function user_account($user_id){
			$stmt = $this->conn->prepare("SELECT * FROM `user` WHERE `user_id` = ?") or die($this->conn->error);
		    $stmt->bind_param("i", $user_id);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				return array(
					'First_name'=> $fetch['First_name'],
					'username'=> $fetch['username'],
					'Middle_name'=> $fetch['Middle_name'],
					'Last_name'=> $fetch['Last_name'],
					'DoB'=> $fetch['DoB'],
					'Phone_No'=> $fetch['Phone_No'],
					'About_me'=> $fetch['About_me'],
					'role'=> $fetch['role'],
					'Status'=> $fetch['Status'],
					'profile_name'=> $fetch['profile_name'],
					'Background'=> $fetch['Background'],
					'Strand'=> $fetch['Strand'],
					'password'=> $fetch['password'],
					'role'=> $fetch['role']
				);
			}	
		}

		public function fetch_users(){ 
            $sql = "SELECT * FROM  user WHERE role = 'Admin'";
				$stmt = $this->conn->prepare($sql); 
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;
		  }
		  public function fetch_chairperson(){ 
            $sql = "SELECT * FROM  user WHERE role = 'Chairperson'";
				$stmt = $this->conn->prepare($sql); 
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;
		  }
		  public function fetch_faculty(){ 
            $sql = "SELECT * FROM  user WHERE role = 'Faculty'";
				$stmt = $this->conn->prepare($sql); 
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;
		  }

		  public function fetch_facultyalone($Strand){ 
            $sql = "SELECT * FROM  user WHERE role = 'Faculty' AND Strand = ?";
				$stmt = $this->conn->prepare($sql); 
			$stmt->bind_param("s", $Strand);
				
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;
		  }
		  public function fetch_facultyalone1(){ 
            $sql = "SELECT * FROM  user WHERE role = 'Faculty' AND (Strand = 'TVL-ICT' OR Strand = 'TVL-HE' OR Strand = 'TVL-AFA') ";
				$stmt = $this->conn->prepare($sql); 
		
				
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;
		  }
		  public function fetch_staff(){ 
            $sql = "SELECT * FROM  user WHERE role = 'Staff'";
				$stmt = $this->conn->prepare($sql); 
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;
		  }

		  public function fetch_staffalone($Strand){ 
            $sql = "SELECT * FROM  user WHERE role = 'Staff' AND Strand = ?";
				$stmt = $this->conn->prepare($sql); 
			$stmt->bind_param("s", $Strand);
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;
		  }
		  public function fetch_staffalone1(){ 
            $sql = "SELECT * FROM  user WHERE role = 'Staff' AND (Strand = 'TVL-ICT' OR Strand = 'TVL-AFA' OR Strand = 'TVL-HE') ";
				$stmt = $this->conn->prepare($sql);  
			
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;
		  }

		public function fetchAll_room(){ 
            $sql = "SELECT * FROM  room";
				$stmt = $this->conn->prepare($sql); 
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;
		  }

		 public function fetch_Folder() { 
    $sql = "SELECT folders.*, user.First_name,user.Middle_name,user.Last_name 
            FROM folders 
            JOIN user ON folders.user_id = user.user_id";
    
    $stmt = $this->conn->prepare($sql); 
    
    if (!$stmt) {
        die("Prepare failed: " . $this->conn->error);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}


	    public function fetchAll_course(){ 
            $sql = "SELECT * FROM tbl_course";
				$stmt = $this->conn->prepare($sql); 
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;
		  }

		  public function fetchAll_documents(){
			$sql = "SELECT * FROM `doc-name`";
			$stmt = $this->conn->prepare($sql);
		
			if ($stmt->execute()) {
				$result = $stmt->get_result();
				$data = array();
		
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
		
				$stmt->close();
				return $data;
			} else {
				// If there's an error, you might want to handle it or log it.
				echo "Error: " . $stmt->error;
				return false;
			}
		}

		public function user_profile($user_id){
			$stmt = $this->conn->prepare("SELECT * FROM `tbl_usermanagement` WHERE `user_id` = ?") or die($this->conn->error);
			$stmt->bind_param("i", $user_id);
			
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				return array(
					'user_id' => $fetch['user_id'],
					'complete_name' => $fetch['complete_name'], 
					'desgination' => $fetch['desgination'],
					'email_address' => $fetch['email_address'],
					'phone_number' => $fetch['phone_number'],
					'username' => $fetch['username'],
					'password' => $fetch['password'],
					'status' => $fetch['status'],
					'STRAND' => $fetch['STRAND'],
					'role' => $fetch['role']        
				);
			}
		}
		
		

		  public function countAllCourses() {
			$sql = "SELECT COUNT(*) as course_count FROM tbl_course";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->get_result();		
			$row = $result->fetch_assoc();
		
			// Return the count
			return $row['course_count'];
		}
		
		public function countStudentsByCourse($courseName) {
			$sql = "SELECT COUNT(*) as student_count FROM tbl_student WHERE course = ?";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param("s", $courseName);
			$stmt->execute();
			$result = $stmt->get_result();
		
			// Fetch the count directly instead of fetching all rows
			$row = $result->fetch_assoc();
		
			// Return the count
			return $row['student_count'];
		}


		public function countAllStudents() {
			$sql = "SELECT COUNT(*) as student_count FROM tbl_student";
			$stmt = $this->conn->prepare($sql);
			
			if (!$stmt) {
				die("Error in preparing statement: " . $this->conn->error);
			}
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			return $row['student_count'];
		}
		
		

		public function add_Folder($Folder_name, $Dropdown,$Strand1,$id){
	       $stmt = $this->conn->prepare("INSERT INTO `folders` (`name`, icon,Strand,user_id) VALUES(?, ?,?,?)") or die($this->conn->error);
			$stmt->bind_param("ssss", $Folder_name, $Dropdown,$Strand1,$id);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}




		public function add_room($Section,$Section_code,$Room_name){
			$stmt = $this->conn->prepare("INSERT INTO `room` (`section`,`section_code`,`Room_name`) VALUES(?,?,?)") or die($this->conn->error);
			$stmt->bind_param("sss",$Section,$Section_code,$Room_name);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}

		public function get_files_by_folder($folder_id) {
			$sql = "SELECT 
						f.file_id,
						f.file_name,
						f.file,
						f.upload,
						f.size,
						f.Form,
						f.sender,
						f.id AS folder_id,
						u.username AS username, 
						u.First_name AS First_name, 
						u.Middle_name AS Middle_name, 
						u.Last_name AS Last_name, 
						u.role AS role, 
						d.name AS folder_name,
						d.icon AS folder_icon
					FROM file f
					JOIN folders d ON f.id = d.id
					JOIN user u ON f.sender = u.user_id  
					WHERE f.id = ?";
			
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param("i", $folder_id);
			$stmt->execute();
			$result = $stmt->get_result();
		
			$files = [];
			while ($row = $result->fetch_assoc()) {
				$files[] = $row;
			}
		
			$stmt->close();
			$this->conn->close();
		
			return $files;
		}
		public function get_files_by_id($user_id) {
			$sql = "SELECT 
	f.file_id,
	f.file_name,
	f.file,
	f.upload,
	f.size,
	f.Form,
	f.sender,
	f.id AS folder_id,
	u.username AS username, 
	u.First_name AS First_name, 
	u.Last_name AS Last_name, 
	u.Middle_name AS Middle_name, 
	u.role AS role, 
	d.name AS folder_name,
	d.icon AS folder_icon
FROM file f
JOIN folders d ON f.id = d.id
JOIN user u ON f.deleter = u.user_id  
WHERE f.sender = ? AND f.isitdelete IS NOT NULL 
ORDER BY f.isitdelete DESC
";
					
					$stmt = $this->conn->prepare($sql);

					$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$result = $stmt->get_result();
		
			$files = [];
			while ($row = $result->fetch_assoc()) {
				$files[] = $row;
			}
		
			$stmt->close();
			$this->conn->close();
		
			return $files;
		}
		

		public function edit_Document($Document_name,$Price){
			$stmt = $this->conn->prepare("INSERT INTO `doc-name` (docname,Price) VALUES( ?,?)") or die($this->conn->error);
			$stmt->bind_param("si", $Document_name,$Price);
		
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
				
			} else {
				echo "Error: " . $stmt->error;
				return false;
			}
		}


		public function edit_room($section,$section_code,$room_name,$room_id) {
			$sql = "UPDATE `room` SET  `section` = ?, `section_code` = ?, `Room_name` = ? WHERE `room_id` = ?";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param("sssi",$section,$section_code,$room_name,$room_id);
			if ($stmt->execute()) {
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		public function edit_clubmember($club_memeber,$Clubname,$position,$clubadviser,$AAccount_status,$club_id) {
			$sql = "UPDATE `clubmembers` SET `club_memeber` = ?, `club_name` = ?,  `position` = ? , `Clubadviser` = ?, `Status` = ? WHERE `club_memberid` = ?";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param("sssssi", $club_memeber,$Clubname,$position,$clubadviser,$AAccount_status,$club_id);
			if ($stmt->execute()) {
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}

		public function edit_Announcement($to,$title,$Announcements,$from){
			$stmt = $this->conn->prepare("INSERT INTO `announcement` (Announcement_to,Announcement_title,Announcement_desc,Announcement_from) VALUES( ?,?,?,?)") or die($this->conn->error);
			$stmt->bind_param("ssss", $to,$title,$Announcements,$from);
		
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			} else {
				echo "Error: " . $stmt->error;
				return false;
			}
		}
		


		public function edit_course($course_name, $course_decription, $course_id){
			$sql = "UPDATE `tbl_course` SET  `course_name` = ?, `course_decription` = ?  WHERE course_id = ?";
			 $stmt = $this->conn->prepare($sql);
			$stmt->bind_param("ssi", $course_name, $course_decription, $course_id);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}

		public function edit_folder($folder_name, $folder_icon, $folder_id){
			$sql = "UPDATE `folders` SET  `name` = ?, `icon` = ?  WHERE id = ?";
			 $stmt = $this->conn->prepare($sql);
			$stmt->bind_param("ssi",$folder_name, $folder_icon, $folder_id);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}

		public function edit_file($Filename, $file_id){
			$sql = "UPDATE `file` SET  `file_name` = ? WHERE file_id  = ?";
			 $stmt = $this->conn->prepare($sql);
			$stmt->bind_param("si",$Filename, $file_id);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}

		public function remove_file($file_id){
			$sql = "UPDATE `file` SET  `isitdelete` = NULL WHERE file_id  = ?";
			 $stmt = $this->conn->prepare($sql);
			$stmt->bind_param("i", $file_id);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}

		public function delete_course($course_id){
			$sql = "DELETE FROM tbl_course WHERE course_id = ?";
			 $stmt = $this->conn->prepare($sql);
			$stmt->bind_param("i", $course_id);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		public function delete_folder($folder_id){
			$sql = "DELETE FROM folders WHERE id = ?";
			 $stmt = $this->conn->prepare($sql);
			$stmt->bind_param("i", $folder_id);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		public function delete_file1($user_id,$file_id) {
			$sql_max = "SELECT MAX(isitdelete) AS max_delete FROM file";
	$result = $this->conn->query($sql_max);
	$row = $result->fetch_assoc();
	$next_delete_value = $row['max_delete'] + 1; 
	
			$sql = "UPDATE `file` SET  `isitdelete` = ?, `deleter` = ? WHERE `file_id` = ?";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param("iii",$next_delete_value,$user_id,$file_id);
			if ($stmt->execute()) {
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		

		public function delete_room($room_id){
			$sql = "DELETE FROM room WHERE room_id = ?";
			 $stmt = $this->conn->prepare($sql);
			$stmt->bind_param("i",$room_id);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}

		public function delete_clubmember($club_id){
			$sql = "DELETE FROM clubmembers WHERE club_memberid = ?";
			 $stmt = $this->conn->prepare($sql);
			$stmt->bind_param("i",$club_id);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}

		public function delete_option($id) {
			$sql = "DELETE FROM `doc-name` WHERE docname = ?";
			$stmt = $this->conn->prepare($sql);
		
			if (!$stmt) {
				// Handle prepare error
				echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;
				return false;
			}
		
			$stmt->bind_param("s", $id); // Assuming 'course_id' is a string, change to "i" if it's an integer
		
			if ($stmt->execute()) {
				$stmt->close();
				$this->conn->close();
				return true;
			} else {
				$stmt->close(); // Close the statement even in case of an error
				$this->conn->close();
				return false;
			}
		}
		
		

		public function add_student( $first_name, $middle_name, $last_name, $course, $year_level, $date_ofbirth, $gender, $complete_address, $email_address, $mobile_number, $username,$IDNumber, $status){
			$stmt = $this->conn->prepare("INSERT INTO `tbl_student` ( `first_name`, `middle_name`, `last_name`, `course`, `year_level`, `date_ofbirth`, `gender`, `complete_address`, `email_address`, `mobile_number`, `username`, `password`, `account_status`) VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)") or die($this->conn->error);
			$stmt->bind_param("sssssssssssss", $first_name, $middle_name, $last_name, $course, $year_level, $date_ofbirth, $gender, $complete_address, $email_address, $mobile_number, $username,$IDNumber, $status);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
 
	    public function fetchAll_student(){ 
            $sql = "SELECT * FROM  tbl_student";
				$stmt = $this->conn->prepare($sql); 
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;
		  }

		  public function fetchAll_club(){ 
            $sql = "SELECT * FROM  club";
				$stmt = $this->conn->prepare($sql); 
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;
		  }

		  public function fetchAll_clubmember(){ 
            $sql = "SELECT * FROM  clubmembers";
				$stmt = $this->conn->prepare($sql); 
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;
		  }

		  public function fetchAll_Announcement(){ 
            $sql = "SELECT * FROM  announcement";
				$stmt = $this->conn->prepare($sql); 
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }

		public function edit_student($first_name, $middle_name, $last_name, $course, $year_level, $date_ofbirth, $gender, $complete_address, $email_address, $mobile_number, $username, $password, $account_status,$Grad, $student_id){
			$sql = "UPDATE `tbl_student` SET   `first_name` = ?, `middle_name` = ?, `last_name` = ?, `course` = ?, `year_level` = ?, `date_ofbirth` = ?, `gender` = ?, `complete_address` = ?, `email_address` = ?, `mobile_number` = ?, `username` = ?, `password` = ?, `account_status` = ? , `Graduate` = ?  WHERE student_id = ?";
			 $stmt = $this->conn->prepare($sql);
			$stmt->bind_param("ssssssssssssssi", $first_name, $middle_name, $last_name, $course, $year_level, $date_ofbirth, $gender, $complete_address, $email_address, $mobile_number, $username, $password, $account_status,$Grad, $student_id);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}

		public function add_announcement($to,$title,$announcement,$from,$announcement_id){
			$sql = "UPDATE `announcement` SET   `Announcement_to` = ?, `Announcement_title` = ?, `Announcement_desc` = ?, `Announcement_from` = ? WHERE Announcement_id = ?";
			 $stmt = $this->conn->prepare($sql);
			$stmt->bind_param("ssssi", $to,$title,$announcement,$from,$announcement_id);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}

		public function delete_student($student_id){
				$sql = "DELETE FROM tbl_student WHERE student_id = ?";
				 $stmt = $this->conn->prepare($sql);
				$stmt->bind_param("i", $student_id);
				if($stmt->execute()){
					$stmt->close();
					$this->conn->close();
					return true;
				}
			}

			public function delete_announcement($student_id){
				$sql = "DELETE FROM announcement WHERE Announcement_id = ?";
				 $stmt = $this->conn->prepare($sql);
				$stmt->bind_param("i", $student_id);
				if($stmt->execute()){
					$stmt->close();
					$this->conn->close();
					return true;
				}
			}


	    public function fetchAll_document(){ 
            $sql = "SELECT * FROM  tbl_document";
				$stmt = $this->conn->prepare($sql);
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }



		public function delete_document($document_id){


			$sql="SELECT document_name FROM tbl_document WHERE document_id = ?";
				$stmt2=$this->conn->prepare($sql);
				$stmt2->bind_param("i", $document_id);
				$stmt2->execute();
				$result2=$stmt2->get_result();
				$row=$result2->fetch_assoc();
				$imagepath=$_SERVER['DOCUMENT_ROOT']."/mshs-protal/student/".$row['document_name'];
				unlink($imagepath);

				$sql = "DELETE FROM tbl_document WHERE document_id = ?";
				 $stmt = $this->conn->prepare($sql);
				$stmt->bind_param("i", $document_id);
				if($stmt->execute()){
					$stmt->close();
					$this->conn->close();
					return true;
				}
			}

	    public function fetchAll_documentrequest(){ 
            $sql = "SELECT * FROM  tbl_documentrequest";
				$stmt = $this->conn->prepare($sql); 
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }

		public function edit_request($control_no, $studentID_no, $document_name, $no_ofcopies, $date_request, $date_releasing, $processing_officer, $status, $request_id){
			$sql = "UPDATE `tbl_documentrequest` SET  `control_no` = ?, `studentID_no` = ?, `document_name` = ?, `no_ofcopies` = ?, `date_request` = ?, `date_releasing` = ?, `processing_officer` = ?, `status` = ?  WHERE request_id = ?";
			 $stmt = $this->conn->prepare($sql);
			$stmt->bind_param("ssssssssi", $control_no, $studentID_no, $document_name, $no_ofcopies, $date_request, $date_releasing, $processing_officer, $status, $request_id);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}

		public function delete_request($request_id){
				$sql = "DELETE FROM tbl_documentrequest WHERE request_id = ?";
				 $stmt = $this->conn->prepare($sql);
				$stmt->bind_param("i", $request_id);
				if($stmt->execute()){
					$stmt->close();
					$this->conn->close();
					return true;
				}
			}

    public function fetchAll_payment(){ 
            $sql = "SELECT *,CONCAT(tbl_student.first_name, ', ' ,tbl_student.middle_name, ' ' ,tbl_student.last_name) as student_name FROM  tbl_payment INNER JOIN tbl_student ON tbl_student.student_id =  tbl_payment.student_id ORDER BY tbl_payment.student_id DESC";
				$stmt = $this->conn->prepare($sql);
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }

		  public function edit_payment($control_no, $total_amount, $amount_paid, $date_ofpayment, $proof_ofpayment, $status, $payment_id){
			$sql = "UPDATE `tbl_payment` SET  `control_no` = ?, `total_amount` = ?, `amount_paid` = ?, `date_ofpayment` = ?, `proof_ofpayment` = ?, `status` = ?  WHERE payment_id = ?";
			 $stmt = $this->conn->prepare($sql);
			$stmt->bind_param("ssssssi", $control_no, $total_amount, $amount_paid, $date_ofpayment, $proof_ofpayment, $status, $payment_id);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}

		public function delete_payment($payment_id){
				$sql = "DELETE FROM tbl_payment WHERE payment_id = ?";
				 $stmt = $this->conn->prepare($sql);
				$stmt->bind_param("i", $payment_id);
				if($stmt->execute()){
					$stmt->close();
					$this->conn->close();
					return true;
				}
			}

			public function add_user($CODE,$complete_name, $designation, $email_address, $phone_number, $username,$password, $status, $Strand,$Role){
				$stmt = $this->conn->prepare("INSERT INTO `tbl_usermanagement` (`CODE`,`complete_name`, `desgination`, `email_address`, `phone_number`, `username`, `password`, `status`, `STRAND`,`role`) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?,?)") or die($this->conn->error);
				$stmt->bind_param("ssssssssss",$CODE,$complete_name, $designation, $email_address, $phone_number, $username,$password, $status, $Strand,$Role);
				if($stmt->execute()){
					$stmt->close();
					$this->conn->close();
					return true;
				}
			}

	    public function fetchAll_user(){ 
            $sql = "SELECT * FROM  tbl_usermanagement";
				$stmt = $this->conn->prepare($sql); 
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }

	    public function edit_user($complete_name, $desgination, $email_address, $phone_number, $username, $password, $status,$STRAND,$Role, $user_id){
			$sql = "UPDATE `tbl_usermanagement` SET  `complete_name` = ?, `desgination` = ?, `email_address` = ?, `phone_number` = ?, `username` = ?, `password` = ?, `status` = ?, `STRAND` = ?, `role` = ? WHERE user_id = ?";
			 $stmt = $this->conn->prepare($sql);
			$stmt->bind_param("sssssssssi", $complete_name, $desgination, $email_address, $phone_number, $username, $password, $status,$STRAND,$Role, $user_id);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}

		public function delete_user($user_id) {
			$sql = "SELECT profile_name, Background FROM user WHERE user_id = ?";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$user = $result->fetch_assoc();
			$stmt->close();
		
			if ($user) {
				
				
		
				try {

					$sql = "DELETE FROM user WHERE user_id = ?";
					$stmt = $this->conn->prepare($sql);
					$stmt->bind_param("i", $user_id);
				
					if ($stmt->execute()) {
						$profilePath = "../../imageupload/" . $user['profile_name'];
				$backgroundPath = "../../imageupload/" . $user['Background'];
		
				if (file_exists($profilePath)) {
					unlink($profilePath);
				}
		
				if (file_exists($backgroundPath)) {
					unlink($backgroundPath);
				}
						$stmt->close();
						$this->conn->close();
						return true;
						
					} else {
						$stmt->close();
						$this->conn->close();
						return false;
					}
				} catch (mysqli_sql_exception $e) {
					if ($e->getCode() == 1451) {
						// Foreign key constraint failed
					
					} else {
						// Other MySQL error
						echo "Error: " . $e->getMessage();
					}
					return false;
				}
				
			}
		
			return false;
		}
		
		public function delete_file($file_id) {
			$sql = "SELECT `file` FROM `file` WHERE file_id = ?";
			$stmt = $this->conn->prepare($sql);
			$stmt->bind_param("i", $file_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$file = $result->fetch_assoc();
			$stmt->close();
		
			if ($file) {
				
				
		
				try {

					$sql = "DELETE FROM `file` WHERE file_id = ?";
					$stmt = $this->conn->prepare($sql);
					$stmt->bind_param("i", $file_id);
				
					if ($stmt->execute()) {
						$profilePath = "../filebank/" . $file['file'];
				
		
				if (file_exists($profilePath)) {
					unlink($profilePath);
				}
		
				
						$stmt->close();
						$this->conn->close();
						return true;
						
					} else {
						$stmt->close();
						$this->conn->close();
						return false;
					}
				} catch (mysqli_sql_exception $e) {
					if ($e->getCode() == 1451) {
						// Foreign key constraint failed
					
					} else {
						// Other MySQL error
						echo "Error: " . $e->getMessage();
					}
					return false;
				}
				
			}
		
			return false;
		}

	    public function count_numberofstudents(){ 
            $sql = "SELECT COUNT(student_id) as count_students FROM tbl_student";
				$stmt = $this->conn->prepare($sql); 
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }

	    public function count_numberoftotalrequest(){ 
            $sql = "SELECT COUNT(request_id) as count_request FROM tbl_documentrequest";
				$stmt = $this->conn->prepare($sql); 
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }

		 public function count_numberoftotalpending(){ 
            $sql = "SELECT COUNT(request_id) as count_pending FROM tbl_documentrequest WHERE status = 'Pending'";
				$stmt = $this->conn->prepare($sql); 
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }

		   public function count_numberoftotalpaid(){ 
            $sql = "SELECT COUNT(request_id) as count_paid FROM tbl_documentrequest WHERE status = 'Paid'";
				$stmt = $this->conn->prepare($sql); 
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }

		 public function count_numberoftotalreceived(){ 
            $sql = "SELECT COUNT(request_id) as count_received FROM tbl_documentrequest WHERE status = 'Received'";
				$stmt = $this->conn->prepare($sql); 
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }


		 public function count_groupbymonth(){ 
            $sql = "SELECT COUNT(total_amount) as p_amountcount, SUM(total_amount) as p_amountsum, DATE_FORMAT(date_ofpayment, '%M') as month_s FROM tbl_payment GROUP BY DATE_FORMAT(date_ofpayment, '%M') ORDER BY DATE_FORMAT(date_ofpayment, '%M') ASC";
				$stmt = $this->conn->prepare($sql); 
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }


	 public function count_groupbycourse(){ 
            $sql = "SELECT count(course) as count_coursename,course FROM tbl_student GROUP BY course";
				$stmt = $this->conn->prepare($sql); 
				$stmt->execute();
				$result = $stmt->get_result();
		        $data = array();
		         while ($row = $result->fetch_assoc()) {
		                   $data[] = $row;
		            }
		         return $data;

		  }

	}	
?>