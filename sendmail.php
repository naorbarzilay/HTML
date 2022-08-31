<?php
require_once "db.php";
$to_email = $_GET['email']; // המייל שאליו שולחים
$purpose = $_GET['purpose']; /*מה המטרה (אתחול סיסמה או אישור משתמש) */
if($purpose == 'activeuser'){ // אם המטרה היא משתמש חדש
$subject = "Registration for Naor&Yazan website";
$body = "Hi, this is an activation email, you need to click on the link to authenticate your user http://localhost/project/activeupdate.php?email=$to_email";
} else { // אחרת המטרה היא איפוס סיסמה
    $subject = "Reset password";
    $body = "Hi, this is an activation email, you need to click on the link to authenticate your user http://localhost/project/resetpassword.php?email=$to_email";
}
$headers = "From: Naor&Yazan formulas website";
if (mail($to_email, $subject, $body, $headers))
{
    echo "<script>
    alert('Email sent!');
    window.location.href='login.php';
    </script>";

    /** אם נרצה בצורה לוקאלית אנא השתמשו בקוד זה:
     * echo "http://localhost/project/activeupdate.php?email=$to_email";
     * או
     *  http://localhost/project/resetpassword.php?email=$to_email";
     * בהתאם למשימה שנדרשו
     * נקבל הדפסה לדף ואז אחרי לחיצה זה יעביר לדף של האקטיבציה
     */
}
else
{
    $message = "Email doesn't sent!";
    echo "<script type='text/javascript'>alert('$message');</script>";
}