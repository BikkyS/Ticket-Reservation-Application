<style>
    <?php 
    include 'login.css';
    ?>
    </style>
    <script>
  function preventBack(){window.history.forward()};
  setTimeout("preventBack()", 0);
  window.onunload=function(){null;}
</script>
<?php
if(isset($_SESSION["loggedin"]) || isset($_COOKIE["number"])){
    header('location:index.php');
}
$_SESSION["loggedin"]=false;
require_once './db/config.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
        
    $number=$_POST['number'];
    $password=$_POST['password'];

        $sql="Select * from `users` where number='$number' and password='$password'";
        $result1=mysqli_query($conn,$sql);
        if($result1){
            $num=mysqli_num_rows($result1);
            if($num>0){
                echo '<script>alert("Login Sucessful")</script>';
            }else{
                        echo '<script>alert("Something Went Wrong")</script>';
            }
        }
    }

require_once './db/config.php';

$number=$password=$fname='';
$err='';
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(empty(trim($_POST['number'])) || empty(trim($_POST['password'])))
    {
        $err="Please enter number+password";
    }
    else{
        $number =trim($_POST['number']);
        $password =trim($_POST['password']);
        // $fname = $_POST['fname'];
    }

    if(empty($err))
    {
        $sql="SELECT id,number,fname,lname,password FROM users WHERE number=?";
        $stmt=mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"s",$param_number);
        
        $param_number=$number;
    
        // try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt)==1){
                     mysqli_stmt_bind_result($stmt,$id,$number,$fname,$lname,$hashed_password);
                     if(mysqli_stmt_fetch($stmt))
                     {
                        if(password_verify($password,$hashed_password))
                        {
                            //this means the password is correct. Allow user to login
                            session_start();
                            $_SESSION["number"]=$number;
                            // $_SESSION["id"]=$id;
                            $_SESSION["loggedin"]=true;
                            $_SESSION["login"]="ok";
                            // $fname=$_SESSION["fname"];
                            $_SESSION["fname"]=$fname;
                            // echo $fname;
                            setcookie('number',$_SESSION["loggedin"],time()+60*60*24*30);
                            //redirect user to index.php
                            header("location:index.php");
                        }
                     }
                    }
            }
            mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <script>
        if( window.history.replaceState ){
            window.history.replaceState(null,null,window.location.href);
        };
    </script> -->
    <script>
            window.history.forward();
    </script>

</head>
<body>
<div class="bg-modal">
        <div class="modal-content">
          <div class="close">+</div>
            <h2>LOGIN</h2>
            <form method="post">
                <label>Mobile Number</label>
                <select>
                    <option>+977</option>
                </select>
                <input type="text" placeholder="Mobile Number" name="number">
                <label>Password</label>
                <input type="password" placeholder="Password" name="password">
                <button type="submit">Login</button>
            </form>
            <div>Not Registered?<a href="signup_form.php"><b> Signup</b></a></div>
        </div>
    </div>
    <script type="text/javascript" src="login.js" ></script>
</body>
</html>