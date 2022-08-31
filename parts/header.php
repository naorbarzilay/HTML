<?php
session_start(); // מתחיל סאשן 
require_once("db.php"); // הדאטה שמכיל את המשתמשים ואת המתכונים
?>
<?php if(isset($_POST['search_btn'])) { // מגדיר את החיפוש לאתר
$formula_search=$_POST['search_label'];
$sql = "SELECT * From formulas WHERE id Like '%$formula_search%'"; // נותן רק את המתכונים שמכילים את המילה בחיפוש
if ($conn->query($sql)){
    header("Location: index.php?sort=WHERE id Like '%$formula_search%'");
} else {
    $message = "No recipe found";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
}?>
<!doctype html>
<html>
<header>
  <nav dir="ltr" class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">OurFoodWeb</a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">

            <?php
            $page = basename($_SERVER["REQUEST_URI"]); // בודק איזה דף ביקש לפתוח את הקובץ ומדגיש בתפריט את הדף הנוכחי 
            if ($page == "project" || preg_match("{index.php}", $page)) { ?>
            <div class="navbar-nav">
                <a href="login.php" class="nav-item nav-link ">Login</a>
                <a href="index.php" class="nav-item nav-link active">Formulas</a>
                <a href="register.php" class="nav-item nav-link">Register</a>
                <a href="logout.php" class="nav-item nav-link">Logout</a>
            </div>
            <?php }
            // השתמשנו בפונקציה של המחרוזת כי לעיתים נשלחים ערכים בשורת הכתובות ולכן בודדנו רק את שם הדף
            if (substr($page, 0, 9) == "login.php" ) { ?> 
            <div class="navbar-nav">
                <a href="login.php" class="nav-item nav-link active">Login</a>
                <a href="index.php" class="nav-item nav-link ">Formulas</a>
                <a href="register.php" class="nav-item nav-link">Register</a>
                <a href="logout.php" class="nav-item nav-link">Logout</a>
            </div>
            <?php }

            if ($page == "register.php") { ?>
            <div class="navbar-nav">
                <a href="login.php" class="nav-item nav-link ">Login</a>
                <a href="index.php" class="nav-item nav-link ">Formulas</a>
                <a href="register.php" class="nav-item nav-link active">Register</a>
                <a href="logout.php" class="nav-item nav-link">Logout</a>
            </div>
            <?php }
            // השתמשנו בפונקציה של המחרוזת כי לעיתים נשלחים ערכים בשורת הכתובות ולכן בודדנו רק את שם הדף
            if ($page == "recipe.php" || substr($page, 0, 10) == "recipe.php") { ?>
            <div class="navbar-nav">
                <a href="login.php" class="nav-item nav-link ">Login</a>
                <a href="index.php" class="nav-item nav-link ">Formulas</a>
                <a href="register.php" class="nav-item nav-link ">Register</a>
                <a href="logout.php" class="nav-item nav-link">Logout</a>
            </div>
            <?php } ?>
            <form method="POST" >
                <div class="input-group">            
                    <input type="text" name="search_label" class="form-control" placeholder="חפש מתכון">
                    <button type="submit" name="search_btn" class="btn btn-secondary"><i class="bi-search"></i></button>
                </div>
            </form>
     
        </div>
    </div>
</nav>
</header>