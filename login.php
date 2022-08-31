<?php require_once("parts/header.php"); ?>
<?php if (isset($_COOKIE['user_email'])) { // אם המשתמש נמצא בקואקי אז עובר ישר לדף המתכונים
  $_SESSION['user_email'] = $_COOKIE['user_email'];
  header('Location: index.php');
  exit;
} ?>
<?php
if (isset($_POST['login_form'])) { // אם כפתור ההתחברות נלחץ
  $email = $_POST['user_email'];
  $pass = $_POST['password'];
  $sql = "SELECT * FROM `users` WHERE email='$email 'AND password ='$pass'"; // בודק אם קיים משתמש עם אותו מייל וסיסמה
  $results = $conn->query($sql);
  $result = $conn->query($sql)->fetch_assoc();
  if ($results->num_rows > 0) { // אם קיים משתמש אז יש יותר משורה אחת
    if ($result['active'] == 0) { // אם המשתמש לא מאומת אז לא יצליח להתחבר
      $message = "אנא אמת את האיימיל שלך דרך האישור נשלח אליך";
      echo "<script type='text/javascript'>alert('$message');</script>";
    } else {
      if (isset($_POST['remember_me'])) { // אם נלחץ הכפתור של "זכור אותי"
        setcookie('user_email', $_POST['user_email'], time() + 60 * 60 * 24 * 7); // שומר את המשתמש לשבוע
        $_SESSION['user_email'] = $_POST['user_email'];
        header('Location: index.php');
        exit;
      }
      $_SESSION['user_email'] = $_POST['user_email'];
      echo "<script type='text/javascript'>alert('hereeee2');</script>";
      header('Location: index.php');
      exit;
    }
  } else {
    $message = "הקלדת מייל או סיסמה שגויים";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
}
?>
<!DOCTYPE html>
<html dir="rtl" lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>עמוד כניסה</title>
</head>

<body>

  <main>
    <div class="title_disgen">
      <h1>דף ראשי</h1>
    </div>
    <div id="signup-div">
      <form method="POST">
        <table class='signup-table'>
          <tr>
            <td><label>אימייל:</label></td>
            <td><input name='user_email' type="email" id="signup-username" placeholder="הכנס/י אימייל" required></td>
          </tr>
          <tr>
            <td><label>סיסמא:</label></td>
            <td><input name='password' type="password" id="signup-password" placeholder="הכנס/י סיסמא" required></td>
          </tr>
        </table>
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="1" name="remember_me"> זכור אותי
          </label>
        </div>
        <div id="buttondiv">
          <button name='login_form' class="btn btn-dark btn-rounded" type="submit">התחבר</button>
      </form>
      <button type="button" class="btn btn-dark btn-rounded" onclick="location='forgotpassword.php'">
        לשחזור סיסמה
      </button>

  </main>
  <?php include "parts/footer.php"; ?>
</body>

</html>