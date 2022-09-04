<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>

    <style>
        body 
        {    
            background-image: url("https://i.stack.imgur.com/9WYxT.png");
            background-size:cover;

        }
        #button_login {
            height: 25px;
            width: 80px;
            background-color: rgb(0, 128, 255);
            border-radius: 20px;
            border: none;
            font-size: 16px;
            color: white;
            margin: 8px;
            margin-left: 27.5px;
            margin-top:20px;  
        }
        #button_login:hover{
            opacity: 80%;
            height: 27px;
            width: 82px;
        }
        .loginform {
            border-width: 0.5px;
            border-style: solid;
            border-color: rgb(184, 175, 175);
            border-radius: 20px;
            width: 300px;
            height: 28px;
            font-size: 12px;
            margin: 8px;
            
        }
        .loginform:hover{
            
            font-size: 13px;
        }
        #login_h1
        {
            margin-left: 36.353%;
            font-size: 55px;
            color: rgb(255, 255, 255);
            opacity:90%;
        }
        #logindivbox  
        {
            margin-left: 38.5%;
            width:300px;
            background-color: rgba(236, 236, 236, 0.856);
            padding: 50px;
            border-radius:25px;
            height: 150px;
            padding-left:30px;
            padding-top:20px;
            opacity: 80%;
        }
        #forgotpass
        {
           color: blue;
           margin-left:18%;
        }
        #forgotpass:hover
        {
           text-decoration:underline;
        }
        #button_goto_teacher_login{
            height: 25px;
            width: 170px;
            background-color: rgb(0, 126, 252);
            border-radius: 20px;
            border: none;
            font-size: 16px;
            color: white;
        }
        #button_goto_teacher_login:hover{
            opacity: 90%;
            height: 27px;
            width: 172px;
        }
        /*#show_password_icon{
            width: 16px;
            height: 16px;
            left: 642px;
            bottom: 630px;
            margin-left:5%;
        }
        #show_password_icon:hover{
            width:18px;
            height:18px;
        }*/
    </style>
    

    <title>Login</title>
</head>
<body>
    
    <h1 id="login_h1">STUDENT LOGIN</h1>
    <div id="logindivbox">
    <form action="connectlogin.php" method="post">
        <input type="text" class="loginform" id="student_id" placeholder="Student ID" maxlength="7" name="student_id">
        <input type="password" class="loginform" id="student_password" placeholder="Password" maxlength="128" name="student_password">
    
        <input type="checkbox" id = "showpassword_checkbox" onclick="showpass()">
        <label for="showpassword_checkbox">Show Password</label>
        <label type="link" id="forgotpass">Forgot Password?</label> 
        <button onclick=goto_student_home_page() id = "button_login">LOGIN</button>
        <button onclick=send_to_database() id="button_goto_teacher_login">TEACHER LOGIN</button>
    </form>
        <!--<img id="show_password_icon" src="https://cdn-icons-png.flaticon.com/512/2355/2355322.png" alt="eye">-->
    </div>
    <script>
        function showpass()
        {
            var stupass = document.getElementById("student_Password")
            if (stupass.type === "password"){
                stupass.type = "text";
            } else {
                stupass.type = "password";
            }
        }
        function goto_to_teacher_login(){

            window.location.href = 'http://127.0.0.1:5500/Login_Pages/Teacher_Login.html';
        }
        function goto_student_home_page(){
            window.location.href = 'http://127.0.0.1:5500/Student_VCM_Code_Input/VCM_Code_Input.html';
        }
    
    </script>    
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
</body>
</html>