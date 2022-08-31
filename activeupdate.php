<?php
    require_once "db.php";
    $email = $_GET['email']; // מקבל את המייל שנשלח בלינק
    $sql = "UPDATE `users` SET `active` = '1' WHERE `users`.`email` = '$email'"; // מעדכן את המשתמש להיות מאומת

    if ($conn->query ($sql)){ // הודעה עם הפניה, אחרת שגיאה
    echo "<script>
    alert('User verified, please login');
    window.location.href='login.php'; 
    </script>";
    }
    else{
        echo $conn->error;
    }
