<?php
require_once "db.php";
$email = $_POST['email']; // מקבל את המייל מהדף הקודם
$username = $_POST['username']; // מקבל את השם משתמש מהדף הקודם
$password = $_POST['password']; // מקבל את הסיסמה מהדף הקודם
$date = $_POST['birthday']; // מקבל את התאריך לידה מהדף הקודם
$fullname = $_POST['fullname']; // מקבל את השם המלא מהדף הקודם

// מוסיף את המשתמש למסד הנתונים
$sql = "INSERT INTO `users` (`email`, `fullname`, `username`, `birthdate`, `active`, `password`) VALUES ('$email', '$fullname', '$username','$date',0,'$password')";
if ($conn->query($sql)){
    $porpuse = 'activeuser'; // המטרה היא הוספת משתמש
    echo "<script>
alert('User Added, now please verify the mail you recieve');
window.location.href='sendmail.php?purpose=$porpuse&email=$email'</script>";
} else {
    $message = "Error!! user not added";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
