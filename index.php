<?php include("parts/header.php"); ?>
<?php require_once("db.php"); ?>
<?php
$sort = '';
if (!isset($_SESSION['user_email'])) { // בודק שהמשתמש לא נמצא בסאשן , במידה וכן אז עובר לדף המתכונים, במידה ולא אז עובר לדף החיבור
  header('Location: login.php');
  exit;
}

// בודק איזה כפתור מיון נלחץ ופותח את הדף מחדש עם השאילתה כפרמטר
if (isset($_POST['ascending_btn'])) {
  header('Location: index.php?sort=ORDER BY id ASC');
}
if (isset($_POST['descending_btn'])) {
  header('Location: index.php?sort=ORDER BY id DESC');
}
if (isset($_POST['date_asc_btn'])) {
  header('Location: index.php?sort=ORDER BY publishDate ASC');
}
if (isset($_POST['date_dsc_btn'])) {
  header('Location: index.php?sort=ORDER BY publishDate DESC');
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>רשימת מתכונים</title>

</head>

<body>
  <main>
    <div class="title_disgen">
      <h1>רשימת מתכונים</h1>
    </div>
    <form method="POST">
      <?php
      if (empty($_GET['sort'])) { // בודק רק אם לחצנו, במידה ולא לחצנו על כפתור מיון אז זה ברירת מחדל (אין שליחה של משתנה מיון) 
        $sort = '';
      } else {
        $sort = $_GET['sort'];  // אחרת אם לחצנו על כפתור מיון נקבל לערך זה את השאילתה
      }
      $sql = "SELECT * FROM formulas $sort"; // מגדיר את השאילתה ביחד עם המיון (במידה ואין מיון אז ערך ריק)
      $result = $conn->query($sql);
      $formulas = array(); // מערך של מתכונים
      while ($formula = $result->fetch_assoc()) : {
          $temparray = [$formula['id'], $formula['image'], $formula['href'], $formula['publishDate'], $formula['publishName']];
          array_push($formulas, $temparray); // עובר על כל מתכון ומכניס למערך
        }
      endwhile;   ?>
      <div class="container ">
        <div class="row gx-2 gy-5 ">
          <?php for ($i = 0; $i < count($formulas); $i++) { // עובר על כל מתכון וממלא את הפרטים בדף
            $formula = $formulas[$i]; ?>
            <div class="col-md-4 col-3 col-sm-12">
              <article>
                <div class="card bg-light border-dark">
                  <img src="<?= $formula['1'] ?>" class="img12 img-fluid ">
                  <div class="card-body">
                    <h5 class="card-title"><?= $formula['0']; ?> <br></h5>
                    <p class="card-text "><u>Publish name:</u> <?= $formula['4']; ?></p>
                    <p class="card-text "><u>Publish date:</u> <?= $formula['3']; ?></p>
                    <a href="<?= $formula['2']; ?>" class="btn btn-primary stretched-link">Open</a>
                  </div>
                </div>
              </article>
            </div>
          <?php } ?>
        </div>
      </div>
      </div>
  </main>

  <div class="text-center p-3" id="buttondiv">
    <button name='ascending_btn' class="btn btn-dark btn-rounded" type="submit">Ascending order A-Z </button>
    <button name='descending_btn' class="btn btn-dark btn-rounded" type="submit">Descending order Z-A</button>
    <button name='date_dsc_btn' class="btn btn-dark btn-rounded" type="submit">Sort by date (new first)</button>
    <button name='date_asc_btn' class="btn btn-dark btn-rounded" type="submit">Sort by date (old first)</button>
  </div>
  </form>
  <?php include "parts/footer.php"; ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>