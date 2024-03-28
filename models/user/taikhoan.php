<?php  
function getListUser(){
    $sql = "SELECT * FROM users" ;
    $user = pdo_query($sql);
    return $user;
}
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
function addAllUser($username_user, $password_user,$fullname_user,$avatar_user,$phone_user,$email_user,$diachi_user){
    $sql = "INSERT INTO users (username_user,password_user,fullname_user,avatar_user,phone_user,email_user,diachi_user) VALUES ('$username_user', '$password_user','$fullname_user','$avatar_user','$phone_user','$email_user','$diachi_user')";
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