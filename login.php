<?
session_start();
if(isset($_SESSION["auth"])&& $_SESSION["auth"] == true){

    header("Location: /profile.php");
    exit();
  }
require_once __DIR__ ."/pdo.php";
$Login=filter_var($_POST["Login"], FILTER_SANITIZE_STRING) ;
$Password=filter_var($_POST["Password"], FILTER_SANITIZE_STRING);

$Password=md5($Password."rengach");
$query=$pdo->prepare("SELECT * FROM user WHERE Login=:Login AND Password=:Password");
$query->execute(["Login"=>$Login, "Password"=>$Password]);
$user=$query->fetch(PDO::FETCH_ASSOC);
echo($Login.$Password);

if($user!=null){
    $_SESSION['auth']=true;
    $_SESSION['user']=[
        "Id"=>$user["Id"], 
    ];
    header("Location: /index.php");  
    
    exit();
}
else{
    $_SESSION['is_error']=true;
    $_SESSION['error_message']="Введені дані невірні. Спробуте ще раз";
    header("Location: /loginForm.php");  
}

?>