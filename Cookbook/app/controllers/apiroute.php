<?php
session_start();
require_once ("../models/Model.php");
 function deleteUser($userId){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "DELETE FROM `user` WHERE id=$userId ";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r; 
}
 function makeAdmin($userId){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q= "UPDATE `user` SET is_admin=1 WHERE id=$userId ";
    $r= $model->requete($conn,$q);
    $model->deconnexion($conn);
    return $r; 
}
function validate($userId){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q0="SELECT * FROM user_temp where id='$userId' LIMIT 1";
    $r0= $model->requete($conn,$q0);
    $fetch=$r0->fetch(PDO::FETCH_ASSOC);
    $Fname=$fetch['first_name'];
    $Lname=$fetch['last_name'];
    $sex=$fetch['sexe'];
    $Bdate=$fetch['birth_date'];
    $email=$fetch['email'];
    $password=$fetch['password'];
    $q="INSERT INTO user (first_name, last_name, sexe, birth_date, email, password,is_admin)
        VALUES ('$Fname','$Lname',$sex,'$Bdate','$email','$password','0');";
    $r= $model->requete($conn,$q);
    $q1="DELETE FROM user_temp WHERE id='$userId'";
    $r1= $model->requete($conn,$q1);
    $model->deconnexion($conn);
    return $r; 
}
function invalidate($userId){
    $model=new Model();
    $conn=$model->connexion("cookbook","localhost:3307","root","");
    $q1="DELETE FROM user_temp WHERE id='$userId'";
    $r1= $model->requete($conn,$q1);
    $model->deconnexion($conn);
    return $r1; 
}

if (isset($_POST['delete'])){
    $userid=$_POST['delete'];
    unset($_POST['delete']);
    deleteUser($userid);
    header("location:/AdminUsers");
}
if (isset($_POST['makeadmin'])){
    $userid=$_POST['makeadmin'];
    unset($_POST['makeadmin']);
    makeAdmin($userid);
    header("location:/AdminUsers");
}
if (isset($_POST['profile'])){
    $userid=$_POST['profile'];
    unset($_POST['profile']);
    $_SESSION['userid']=$userid;
    header("location:/Profile");
}
if (isset($_POST['validate'])){
    $userid=$_POST['validate'];
    unset($_POST['validate']);
    validate($userid);
    header("location:/AdminUsers");
}
if (isset($_POST['invalidate'])){
    $userid=$_POST['invalidate'];
    unset($_POST['invalidate']);
    invalidate($userid);
    header("location:/AdminUsers");
}


?>