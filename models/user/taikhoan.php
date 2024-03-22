<?php  
function check_user($username,$password){
$sql = "SELECT * FROM users WHERE username_user='" . $username . "' AND password_user='" . $password . "'";
$tk = pdo_query_one($sql);
return $tk ;
}
function dangxuat(){
    if(isset($_SESSION['username'])){
        unset($_SESSION['username']);
        echo "<script language='javascript'>
        window.location.reload();</script>";
        

    }
}
function addUser($username, $password,$email){
    $sql = "INSERT INTO users (username_user,password_user,email_user) VALUES ('$username','$password','$email')";
     pdo_execute($sql);
}



function check_username($username){
    $sql = "SELECT * FROM users WHERE  username_user = '$username'";
    $check_username = pdo_query_one($sql);
    return $check_username ;
    if(mysqli_num_rows($check_username) > 0){
        return true ;
    }else{
        return false ;
    }
    }
    
?>