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
      <div class="header-blur">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background: rgba(0, 0, 0, 0.8);
      position: absolute; width: 100%;
      ">

          <div class="collapse navbar-collapse ">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#" style="color: white;">Головна</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="3dmodels.php">Модель сонячної системи</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="reviews.php">Відгуки</a>
              </li>
            </ul>
            <input class="colorPicker form-control form-control-color" type="color" id="colorPicker">
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
          </div>
        </nav>
        <p class="header-title" id="title">Сонячна система</p>
      </div>
    </div>
  </header>
  <div 
 class="row main">
    <div class="col-1">
      
    </div>
    <div class="col-10">
      <p>
        Сонячна система — планетна система, що включає в себе центральну зорю — Сонце, і всі природні
        космічні
        об'єкти (планети, астероїди, комети, потоки сонячного вітру тощо), які об'єднуються гравітаційною взаємодією.
        Сонячна система є частиною значно більшого комплексу, який складається із зірок і міжзоряної речовини —
        галактики
        Чумацький Шлях.
      </p>
      <p>
        У сонячній системі є наступні види крсмічних тіл:
      </p>
      <ul class="coolList">
        <li>Зірки</li>
        <li>Планети</li>
        <li>Астероїди</li>
        <li>Комети</li>
        <li>Кентаври</li>
        <li>Карликові планети</li>
        <li>Супутники</li>
      </ul>
      <h3>Основні зарактеристики планет сонячнох системи</h3>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Назва</th>
            <th scope="col">Маса</th>
            <th scope="col">Прискорення вільного падіння</th>
            <th scope="col">Тиск на поверхні</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Меркурій</td>
            <td>3,3011× 1023 кг</td>
            <td>3,70 м/с²</td>
            <td>
              ~5·10–15 бар</td>
          </tr>
          <tr>
            <td>Венера</td>
            <td>4,8685× 1024 кг</td>
            <td>8,87 м/с²</td>
            <td>93 бар</td>
          </tr>
          <tr>
            <td>Земля</td>
            <td>5,9737×1024 кг</td>
            <td>9,766 м/с²</td>
            <td>101,325 кПа</td>
          </tr>
          <tr>
            <td>Марс</td>
            <td>6,4185× 1023 кг</td>
            <td>3,711 м/с²</td>
            <td>0,636 (0,4–0,87) кПа</td>
          </tr>
          <tr>
            <td>Юпітер</td>
            <td>1,8986× 1027 кг</td>
            <td>24,79 м/с²</td>
            <td>20—220 кПа</td>
          </tr>
          <tr>
            <td>Сатурн</td>
            <td>5,6846× 1026</td>
            <td>10,44 м/с²</td>
            <td>0,636 (0,4-0,87) кПа</td>
          </tr>
          <tr>
            <td>Уран</td>
            <td>(8,6810 ± 0.0013) × 1025 кг</td>
            <td>21,3 м/с²</td>
            <td>-</td>
          </tr>
          <tr>
            <td>Нептун</td>
            <td>1,0243× 1026 кг</td>
            <td>11,15 м/с²</td>
            <td>-</td>
          </tr>
        </tbody>
      </table>
      <h3>Галерея Газових гігантів</h3>
      <img height="350px" width="350px" src="jup.jpg">
      <img height="350px" width="350px" src="sat.jpg">

      <img height="350px" width="350px" src="uranus.jpg">
      <img height="350px" width="350px" src="nep.jpg">
      <h3>Відео про сонячну систему</h3>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/A4OLi0YX-tM" title="YouTube video player"
        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen></iframe>
        <h3>Відгуки про сторінку</h3>
        <?
            if (isset($_SESSION["auth"]) && $_SESSION["auth"] == true) {


            ?>
                <a href="enterIndexReview.php" class="btn btn-outline-dark">Додати відгук</a>
                </br></br>
            <?
            }
            $reviews = $pdo->query("SELECT * FROM indexreviews")->fetchAll(PDO::FETCH_ASSOC);
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
    <div class="col-1"> </div>
  </div>
  <footer>
  <?php require_once('DateShower.php');?>


  </footer>
</body>

</html>