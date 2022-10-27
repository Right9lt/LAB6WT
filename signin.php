<?
session_start();

if(isset($_SESSION["auth"])&& $_SESSION["auth"] == true){

    header("Location: /index.php");
    exit();
  }
require_once __DIR__ ."/pdo.php";

$Login=filter_var($_POST["Login"], FILTER_SANITIZE_STRING) ;
$Password=filter_var($_POST["Password"], FILTER_SANITIZE_STRING);
$Email=filter_var($_POST["Email"],FILTER_SANITIZE_EMAIL);

if($Login===""||
$Password===""||
!filter_var($Email,FILTER_VALIDATE_EMAIL)){
$_SESSION['is_error']=true;
$_SESSION['error_message']="Перевірте правильність введених даних";
header("Location: /signinForm.php"); 
exit();
}


$query=$pdo->prepare("SELECT * FROM user WHERE Login=:Login");
$query->execute(["Login"=>$Login]);
$sd=$query->fetch(PDO::FETCH_ASSOC);
if($sd !=null){
    $_SESSION['is_error']=true;
    $_SESSION['error_message']="Акаунт з таким логіном вже існує";
    header("Location: /signinForm.php"); 
    exit();
}


$query=$pdo->prepare("SELECT * FROM user WHERE Email=:Email");
$query->execute(["Email"=>$Email]);
$sd=$query->fetch(PDO::FETCH_ASSOC);
if($sd !=null){
    $_SESSION['is_error']=true;
    $_SESSION['error_message']="Акаунт з такою поштою вже існує";
    header("Location: /signinForm.php"); 
    exit();
}


if(mb_strlen($Password)<5){
    $_SESSION['is_error']=true;
    $_SESSION['error_message']="Пароль повинен бути більше 5 символів";
    header("Location: /signinForm.php"); 
    exit();
}

$Password=md5($Password."rengach");
$sql = "INSERT INTO `user`( `Login`, `Password`, `Email`) VALUES (:Login ,:Password, :Email)";
$params =[
"Login"=>$Login,
"Password"=>$Password,
"Email"=>$Email,
];
$prepare = $pdo->prepare($sql);
$prepare->execute($params);
$_SESSION['RegSuc']=true;
$_SESSION['suc_msg']="Ви успішно зареєструвались!";
header("Location: /loginForm.php");
?>
