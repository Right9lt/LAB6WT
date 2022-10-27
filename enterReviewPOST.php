<?
session_start();
if(!(isset($_SESSION["auth"])&& $_SESSION["auth"] == true)){

    header("Location: /index.php");
    exit();
  }
require_once __DIR__ ."/pdo.php";
$Text=filter_var($_POST["Text"], FILTER_SANITIZE_STRING) ;
if($Text===""){
$_SESSION['is_error']=true;
$_SESSION['error_message']="Введіть текс";
header("Location: /enterReview.php"); 
exit();
}
$sql = "INSERT INTO `reviews`(`Text`, `UserId`) VALUES (:Text,:UserId)";
$params =[
"Text"=>$Text,
"UserId"=>$_SESSION["user"]["Id"]
];
$prepare = $pdo->prepare($sql);
$prepare->execute($params);
header("Location: /reviews.php");

?>