<?
session_start();
if(!(isset($_SESSION["auth"])&& $_SESSION["auth"] == true)){

  header("Location: /index.php");
  exit();
}
?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <h3 class="text-body">Напишіть відгук</h3>
    <form action="enterReviewPOST.php" method="POST">
      <div class="col-md-10">
        <label for="Text" class="form-label">Ваш відгук</label>
        <textarea type="text" name="Text" rows="10" class="form-control" id="Text"></textarea>
      </div>
      <div class="col-md-offset-2 col-md-10" style="margin-top:1em">
        <input type="submit" value="Зберегти" class="btn btn-outline-success" />
        <a href="reviews.php" class="btn btn-outline-danger">Скасувати</a>
      </div>
      <?
      if (isset($_SESSION['is_error']) && $_SESSION['is_error'] === true) {
      ?>
        <div class="alert alert-danger" role="alert" style="margin-top: 1em;">
          <?= $_SESSION['error_message']?>
        </div>
      <?
      }
      unset($_SESSION['is_error']);
      unset($_SESSION['error_message']);
      ?>
    </form>
  </div>
</body>
</html>