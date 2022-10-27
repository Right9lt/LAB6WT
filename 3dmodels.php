<?
session_start();
require_once("pdo.php");
?>
<html>
<head>
    <title>Сонячна система</title>
    <?php
 require_once('headCommon.php');
 ?>
  </head>
  <body>
    <header>
      <div class="header-img">
        <div  class="header-blur">
        <nav class="navbar navbar-expand-lg navbar-dark"  style="background: rgba(0, 0, 0, 0.8);
        position: absolute; width: 100%;
        ">
        
          <div class="collapse navbar-collapse ">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="index.php" >Головна</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" style="color: white;">Модель сонячної системи</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="reviews.php">Відгуки</a>
              </li>
            </ul>
            <?
            if(!isset($_SESSION["auth"])|| (isset($_SESSION["auth"]) && $_SESSION["auth"] != true)){

?>
 <a class="nav-link" href="signinForm.php" style="position: absolute;
    right: 13%;
    color: white;">Зареєструватися</a>
 <a class="nav-link" style="position: absolute;
    right: 10%;
    color: white;" href="loginForm.php">Увійти</a>
<?
            }
            else{
              ?>
              <a class="nav-link" style="position: absolute;
    right: 10%;
    color: white;" href="logout.php">Вийти</a>
              <?
            }
            ?>
            <input class="colorPicker form-control form-control-color" type="color" id="colorPicker">
          </div>
        </nav>
          <p style="position: absolute; top:50%;;
          font-size: 26pt;
          text-align: center;
          color: white;
          left: 50%;
          transform: translate(-50%, -50%);
          ">Модель сонячної системи</p>
        </div>
      </div>
    </header>
    <div style="margin: 20px 0 20px 0;


    height: auto;" class="row">
        <div class="col-1"></div>
        <div class="col-10">
        <iframe src="https://www.solarsystemscope.com/iframe" width="100%" height="700" style="min-width:500px; min-height: 400px; border: 2px solid #0f5c6e;"></iframe>
          <h3>Відгуки про сторінку</h3>
        <?
            if (isset($_SESSION["auth"]) && $_SESSION["auth"] == true) {


            ?>
                <a href="enter3dmodelReview.php" class="btn btn-outline-dark">Додати відгук</a>
                </br></br>
            <?
            }
            $reviews = $pdo->query("SELECT * FROM 3dmodelsreviews")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($reviews as $review) {
            ?>
                <div class="card" style="width: 100%; margin-bottom: 1em;">
                    <div class="card-body">
                        <h5 class="card-title"><? $query = $pdo->prepare("SELECT * FROM user WHERE Id=:Id");
                                                $query->execute(["Id" => $review["UserId"]]);
                                               $user=$query->fetch(PDO::FETCH_ASSOC);
                                                echo($user["Login"]);
                                                ?></h5>

                        <p class="card-text"><?=$review["Text"]?></p>
                    </div>
                </div>
               
            <?
            }
            ?> 
        </div>
        <div  class="col-1"> </div>
    </div>
        <footer>
         <?php require_once('DateShower.php');?>
      </footer>
    </body>
</html>