<?php
function send_to_database(){
    
    $student_id = $_POST['student_id']
    $student_pass = $_POST['student_password']

    //database connection
    $conn =new mysqli('localhost','root','','studpass')
    if($conn->connect_error){
        die('Connection Failed  :  '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(student_id, student_pass) values(?, ?,)");
		$stmt->bind_param("ss", $student_id, $student_pass,);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
    } 
}
    
?>