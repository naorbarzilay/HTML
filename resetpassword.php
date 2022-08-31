<?php require_once("parts/header.php"); ?> 
<?php require_once("db.php"); ?>
<?php
if(isset($_POST['login_form'])) { // אם כפתור האישור נלחץ
$email = $_GET['email']; // האיימיל שנשלח
$pass = $_POST['user_password']; // הסיסמה החדשה
$sql = "UPDATE `users` SET `password` = '$pass' WHERE `users`.`email` = '$email'"; 
if ($conn->query ($sql)){
    echo "<script>
    alert('Password updated, please login');
    window.location.href='login.php';
    </script>";
    }
    else{
        echo $conn->error;
    }
}

?>

<!DOCTYPE html>
<html dir="rtl" lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title >שחזור סיסמה</title>
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
          <td><label>הכנס את הסיסמה החדשה:</label></td>
          <td><input name='user_password' type="password" id="signup-username" placeholder="הכנס/י סיסמה"  required></td>
        </tr>
      </table>
      <div id="buttondiv">
      <button name='login_form' class="btn btn-dark btn-rounded " type="submit">אשר סיסמה</button>
    </form>
  </div>
</main>
</body>

<?php include "parts/footer.php"; ?>
</html>