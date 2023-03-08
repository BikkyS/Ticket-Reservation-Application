<?php
require_once "./db/config.php";
$fname=$lname=$number=$password='';
$fname_err=$lname_err=$number_err=$password_err='';

if($_SERVER['REQUEST_METHOD']=='POST'){
//     //check if number is empty
//     if(empty(trim($_POST["number"]))){
//         $number_err= "Number cannot be blank";
//     }
//     else{
//         $sql="SELECT id FROM users WHERE number=?";
//         $stmt=mysqli_prepare($conn,$sql);
//         if($stmt){
//             mysqli_stmt_bind_param($stmt,"s",$param_number);

//             //set the value of param number
//             $param_number=trim($_POST['number']);

//             //try to execute this statement
//             if(mysqli_stmt_execute($stmt)){
//                 mysqli_stmt_store_result($stmt);
//                 if(mysqli_stmt_num_rows($stmt)==1){
//                     $number_err="This Number is already registered";
//                 }
//                 else{
//                     $number=trim($_POST['number']);
//                 }
//             }
//             else{
//                 echo "Something went wrong";
//             }
//         }
//     }
//     mysqli_stmt_close($stmt);


// //check for password
// if(empty(trim($_POST['password']))){
//     $password_err = 'password cannot be blank';
// }
// elseif(strlen(trim($_POST['password']))<8){
//     $password_err = 'password cannot be less than 8 characters';
// }
// else{
//     $password=trim($_POST['password']);
// }
// //check for confirm passowrd field
// if(trim($_POST['password']) != trim($_POST['confirm_password'])){
//     $password_err="password should match";
// }

// // if there were no errors, insert into database
// if(empty($number_err) && empty($password_err) && empty($confirm_password_error)){
//     $sql="insert into users(number,fname,lname,password) values(?,?,?,?)";
//     $stmt = mysqli_prepare($conn,$sql);
//     if($stmt){
//         mysqli_stmt_bind_param($stmt,"ssss",$param_number,$param_fname,$param_lanme,$param_password);
//         //set these parameters
//         $param_number = $number;
//         $param_fname = $fname=$_POST['fname'];
//         $param_lanme = $lname = $_POST['lname'];
//         $param_password = password_hash($password,PASSWORD_DEFAULT);

//         //TRY TO EXECUTE THE QUERY

//         if(mysqli_stmt_execute($stmt)){
//             echo '<script>alert("Registration Sucessful! Please Login.")</script>';
//         }
//         else{
//             echo "something went wrong";
//         }
//     }
//     mysqli_stmt_close($stmt);
// }
$number=$_POST['number'];
$fname=strip_tags($_POST['fname']);
$lname=strip_tags($_POST['lname']);
$password=strip_tags($_POST['password']);
$password=password_hash($password,PASSWORD_DEFAULT);

// $sql="insert into `users`(number,fname,lname,password) values('$number','$fname','$lname','$password')";
// $result=mysqli_query($conn,$sql);
// if($result){
//     echo '<script>alert("Registration Sucessful! Please Login.")</script>';
// }
// else{
//     echo '<script>alert("Something Went Wrong")</script>';
//             }
        $sql="Select * from `users` where number='$number'";
        $result=mysqli_query($conn,$sql);
        if($result){
            $num=mysqli_num_rows($result);
            if($num>0){
                // echo '<script>alert("This Number is Already Registered")</script>';
                $_SESSION['signupfailed']="ok";
            }else{
                $sql="insert into `users`(number,fname,lname,password) values('$number','$fname','$lname','$password')";
                $result=mysqli_query($conn,$sql);
                if($result){
                        // echo '<script>alert("Registration Sucessful! Please Login.")</script>';
                        $_SESSION['signupsucess']="ok";
                    }
                    else{
                        // echo '<script>alert("Something Went Wrong")</script>';
            }
        }
}
}
mysqli_close($conn);
?>