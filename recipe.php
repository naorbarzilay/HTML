<?php require_once("parts/header.php"); ?>
<?php require_once("db.php"); ?>

<?php
if (isset($_POST['formula_update'])) { // אם כפתור העדכון של המצרכים
  $text = $_POST['floatingInputGrid'];
  $com_id = filter_input(INPUT_POST, 'floatingSelectGrid'); // לוקח את מספר המרכיב שנבחר
  $id_formula = $_GET['id'];
  $sql1 = "UPDATE `components` SET `description` = '$text' WHERE `id_formula` = $id_formula AND idcomponet = '$com_id'"; // משנה את הערך של הכיתוב להיות לפי מה שהמשתמש הקליד
  if ($conn->query($sql1)) {
    echo "<script>
  alert('Page update');
  </script>";
  } else {
    echo $conn->error;
  }
}

if (isset($_POST['inst_update'])) { // אם כפתור ערוך שלב הכנה נלחץ
  $text = $_POST['floatingInputGrid2'];
  $ins_id = filter_input(INPUT_POST, 'floatingSelectGrid2');
  $id_formula = $_GET['id'];
  $sql = "UPDATE `instructions` SET `description` = '$text' WHERE `id_formula` = $id_formula AND inst_id = '$ins_id'"; # משנה את שלב ההכנה
  if ($conn->query($sql)) {
    echo "<script>
    alert('Page update');
    </script>";
  } else {
    echo $conn->error;
  }
}

?>
<!DOCTYPE html>
<html dir="rtl" lang="he">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  $id = $_GET['id']; // מקבל את המזהה של המתכון ( שם המתכון)
  $sql = "SELECT * FROM formulas WHERE id=$id"; // מקבל את המתכון מהמסד
  $result = $conn->query($sql);
  while ($formula = $result->fetch_assoc()) : {
  ?>
      <title><?= $formula['pagetitle']; ?></title>
</head>


<script>
  // החלק של מחיקת המצרכים 
  // כל check מסמל כפתור
  // בעת לחיצה מוסיף קו חצוי
  $(document).ready(function() {
    $("#check1").click(function() {
      let string_text = $("#1").text();
      $("#1").html('<s>' + string_text.slice(0, string_text.length - 3) + '</s>');
    })
    $("#check2").click(function() {
      let string_text = $("#2").text();
      $("#2").html('<s>' + string_text.slice(0, string_text.length - 2) + '</s>');
    })
    $("#check3").click(function() {
      let string_text = $("#3").text();
      $("#3").html('<s>' + string_text.slice(0, string_text.length - 3) + '</s> ');
    })
    $("#check4").click(function() {
      let string_text = $("#4").text();
      $("#4").html('<s>' + string_text.slice(0, string_text.length - 2) + '</s>');
    })
    $("#check5").click(function() {
      let string_text = $("#5").text();
      $("#5").html('<s>' + string_text.slice(0, string_text.length - 2) + '</s>');
    })
    $("#check6").click(function() {
      let string_text = $("#6").text();
      $("#6").html('<s>' + string_text.slice(0, string_text.length - 2) + '</s>');
    })
    $("#check7").click(function() {
      let string_text = $("#7").text();
      $("#7").html('<s>' + string_text.slice(0, string_text.length - 3) + '</s>');
    })
  });
</script>

<body>
  <main>
    <div class="title_disgen">
      <h1><?= $formula['title']; ?></h1>
    </div>
    <p><?= $formula['description']; ?> </p>
    <p align=left> <b><u> publish by:</u><?= $formula['publishName']; ?> </b></p>
    <p align=left> <b><u> publish Date:</u><?= $formula['publishDate']; ?> </b></p>
<?php }
  endwhile; ?>
<div id="mainrecipe">
  <div>
    <img id="imgrecipe" src="images/Classic-Cheesecake-Recipe-25-500x500.jpg" alt="cheese-cake">
  </div>
  <div id="recipemenu">
    <ul class="list-group list-group-flush">
      <?php $sql = "SELECT * FROM components WHERE id_formula=$id";
      $result_com = $conn->query($sql);
      while ($component = $result_com->fetch_assoc()) : { // מדפיס את כל המרכיבים
      ?>
          <li class="list-group-item" id="<?= $component['idcomponet']; ?>"><?= $component['description']; ?><button class="btn btn-light" id="check<?= $component['idcomponet']; ?>">יש לי</button></li>
      <?php }
      endwhile; ?>
    </ul>

  </div>
</div>
</div>
<div>
  <h3 id="h3underline">אופן הכנה:</h3>
  <ul type="circle">
    <?php $sql = "SELECT * FROM instructions WHERE id_formula=$id";
    $result_ins = $conn->query($sql);
    while ($instruction = $result_ins->fetch_assoc()) : { // מדפיס את כל שלבי ההכנה
    ?>
        <li><?= $instruction['description']; ?></li>
    <?php }
    endwhile; ?>
  </ul>

</div>
<h3 id="h3underline">עריכת מצרכים:</h3>
<form method="POST">
  <div class="row g-2">
    <div class="col-md">
      <div class="form-floating">
        <input name="floatingInputGrid" type="text" class="form-control" id="floatingInputGrid" placeholder="הכנס טקסט לעריכה">
        <label for="floatingInputGrid">הכנס טקסט לעריכה</label>
      </div>
    </div>
    <div class="col-md">
      <div class="form-floating">
        <select class="form-select" name="floatingSelectGrid" id="floatingSelectGrid" aria-label="Floating label select example">
          <?php $sql = "SELECT * FROM components WHERE id_formula=$id";
          $result_com = $conn->query($sql);
          while ($component = $result_com->fetch_assoc()) : { // מציג את כל המרכיבים בקומבו בוקס
          ?>
              <option id="<?= $component['idcomponet']; ?>" value="<?= $component['idcomponet']; ?>"><?= $component['description']; ?></option>
          <?php }
          endwhile; ?>
        </select>
        <label for="floatingSelectGrid">רשימת מצרכים</label>
      </div>
    </div>
  </div>
  <h3 id="h3underline">עריכת אופן הכנה:</h3>
  <div class="row g-2">
    <div class="col-md">
      <div class="form-floating">
        <input name="floatingInputGrid2" type="text" class="form-control" id="floatingInputGrid2" placeholder="הכנס טקסט לעריכה">
        <label for="floatingInputGrid2">הכנס טקסט לעריכה</label>
      </div>
    </div>
    <div class="col-md">
      <div class="form-floating">
        <select class="form-select" name="floatingSelectGrid2" id="floatingSelectGrid2" aria-label="Floating label select example">
          <?php $sql = "SELECT * FROM instructions WHERE id_formula=$id";
          $result_inst = $conn->query($sql);
          while ($instruction = $result_inst->fetch_assoc()) : {  // מציג את כל השלבים בקומבו בוקס
          ?>
              <option id="<?= $instruction['inst_id']; ?>" value="<?= $instruction['inst_id']; ?>"><?= $instruction['description']; ?></option>
          <?php }
          endwhile; ?>
        </select>
        <label for="floatingSelectGrid2">רשימת שלבים</label>
      </div>
    </div>
  </div>
  <div class="text-center" id="buttondiv">
    <button type="button" class="btn btn-primary exampleModal1" data-bs-toggle="modal" data-bs-target="#exampleModal">
      שתף מתכון
    </button>
    <button name='formula_update' class="btn btn-dark btn-rounded" type="submit">ערוך מתכון</button>
    <button name='inst_update' class="btn btn-dark btn-rounded" type="submit">ערוך שלב הכנה</button>

  </div>
</form>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">שתף מתכון</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" placeholder="הכנס שם משתמש לשיתוף" name="uname" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Share</button>
      </div>
    </div>
  </div>
</div>
  </main>
  <?php include "parts/footer.php"; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="myscripts.js"></script>
</body>

</html>