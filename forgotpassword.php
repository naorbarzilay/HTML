<?php require_once("parts/header.php"); ?>
<?php require_once("db.php"); ?>
<?php
if (isset($_POST['login_form'])) { // אם כפתור השכחתי סיסמה נלחץ
  $email = $_POST['user_email'];
  $sql = "SELECT * FROM `users` WHERE email='$email'"; // מחפש רשומות תחת אותו מייל = 1
  $results = $conn->query($sql);
  if ($results) {
    $porpuse = 'resetpassword';  // מגדיר את מטרת המייל להיות שחזור סיסמה
    echo "<script>
alert('Email send for reset password');
window.location.href='sendmail.php?purpose=$porpuse&email=$email'</script>";
  } else {
    $message = "מייל לא נמצא במערכת!";
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
  <title>שחזור סיסמה</title>
</head>

<body>
  <main>
    <div class="title_disgen">
      <h1>שחזור סיסמה:</h1>
    </div>
    <div id="signup-div">
      <form method="POST">
        <table class='signup-table'>
          <tr>
            <td><label>הכנס את האימייל איתו אתה רשום</label></td>
            <td><input name='user_email' type="email" id="signup-username" placeholder="הכנס/י אימייל" required></td>
          </tr>
        </table>
        <div id="buttondiv">
          <button name='login_form' class="btn btn-dark btn-rounded " type="submit">שלח מייל אתחול</button>
      </form>
    </div>
  </main>
</body>

<?php include "parts/footer.php"; ?>

</html>