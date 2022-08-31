<?php require_once("parts/header.php");
require_once("db.php");?>
<!DOCTYPE html>
<html dir="rtl" lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
   <link rel="stylesheet" href="style.css">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>עמוד הרשמה</title>
</head>
<body>
<main>
  <div class="title_disgen">
    <h1>טופס הרשמה</h1>
  </div>
  <div id="signup-div">
    <form method="post" action="add.php">
      <table class='signup-table'>
        <tr>
          <td><label>אימייל:</label></td>
          <td><input type="email" id="signup-username" name="email" placeholder="הכנס/י אימייל"  required></td>
        </tr>
        <tr>
          <td><label>שם משתמש:</label></td>
          <td><input type="text" id="signup-username" name="username" placeholder="הכנס/י אימייל"  required></td>
        </tr>
        <tr>
          <td><label>סיסמא:</label></td>
          <td><input type="password" id="signup-password" name="password"  placeholder="הכנס/י סיסמא" required></td>
        </tr>
        <tr>
          <td><label>שם מלא:</label></td>
          <td><input type="text" id="signup-fullaname" name="fullname"  placeholder="הכנס/י שם מלא" required></td>
        </tr>
        <tr>
          <td><label id="sigunp-birthday">תאריך לידה:</label></td>
          <td><input type="date" name="birthday" required><br></td>
        </tr>
      </table>
      <input type="checkbox" id="signup-policy" name="policy" required>
      <label for="policy" id="signup-policy-label">מאשר/ת שקראתי את מדיניות האתר</label>
      <div id="buttondiv">
      <input type="submit" class="submit-button btn btn-dark btn-rounded" value="הירשם" >
    </form>
    <button type="button" class="btn btn-dark btn-rounded">
      לשחזור סיסמה
    </button>
  </div>
</main>
<?php include "parts/footer.php"; ?>
</body>
</html>