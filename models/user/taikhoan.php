<?php  
function getListUser(){
    $sql = "SELECT * FROM users" ;
    $user = pdo_query($sql);
    return $user;
}
function deleteUser($id_user){
    $sql = "DELETE FROM users where id_user =".$id_user;
    pdo_execute($sql);
}
function getOneUser($id_user){
    $sql = "SELECT * FROM users where id_user =" .$id_user ;
    $user_one = pdo_query_one($sql);
    return $user_one;
}
function check_user($username,$password){
$sql = "SELECT * FROM users WHERE username_user='" . $username . "' AND password_user='" . $password . "'";
$tk = pdo_query_one($sql);
return $tk ;
}
function check_user_email($email_user){
    $sql = "SELECT * FROM users WHERE email_user='" . $email_user . "'";
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
function addAllUser($username_user, $password_user,$fullname_user,$phone_user,$email_user,$diachi_user,$image_user,$role){
    $sql = "INSERT INTO users (username_user,password_user,fullname_user,phone_user,email_user,diachi_user,image_user,role) VALUES ('$username_user', '$password_user','$fullname_user','$phone_user','$email_user','$diachi_user','$image_user','$role')";
     pdo_execute($sql);
}
function  updateUser($id_user,$username_user, $password_user,$fullname_user,$phone_user,$email_user,$diachi_user,$image_user,$role)
{
    $sql = "UPDATE users SET username_user = '" . $username_user . "', password_user = '" . $password_user . "', fullname_user = '" . $fullname_user . "', phone_user = '" . $phone_user . "', email_user = '" . $email_user . "', diachi_user = '" . $diachi_user . "' ,image_user = '" . $image_user . "'  ,role='" . $role . "' WHERE id_user=" . $id_user;
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