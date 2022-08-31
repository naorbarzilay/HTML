<!doctype html>
<html>
<?php
    $page = basename($_SERVER["REQUEST_URI"]); // לוקח את הכתובת של הקובץ
    // נבדוק איזה דף מבקש להציג ונציג בהתאם (בדף של ההרשמה ההפנייה לדף הבית ולכן בדקנו בהתאם)
    if ($page == "login.php" || $page == "register.php" || substr($page, 0, 9)== "login.php" ||$page  == "forgotpassword.php" || preg_match("{resetpassword}", $page)) { ?>
      
    <footer id="registerfooter">
       <section class="">
          <!-- Footer https://mdbootstrap.com/docs/standard/navigation/footer/ -->
          <footer class="text-center text-white">
            <div class="container p-4 pb-0">
              <section class="">
                <p class="d-flex justify-content-center align-items-center">
                  <button type="button" class="btn btn-outline-light btn-rounded" onclick="location.href='index.php'">
                   למסך הבית
                  </button>
                </p>
              </section>
            </div>
             <div class="text-center p-3 divinsidefooter">
             © 2022 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">Naor&Yazan</a>
            </div>
      <!-- Copyright -->
        </section>
     </footer>
     <?php } 
     else { ?>
      <footer>
      <section class="">
        <!-- Footer https://mdbootstrap.com/docs/standard/navigation/footer/ -->
        <footer class="text-center text-white">
          <div class="container p-4 pb-0">
            <section class="">
              <p class="d-flex justify-content-center align-items-center">
                <button type="button" class="btn btn-outline-light btn-rounded" onclick="location.href='register.php'">
                  הירשם
                </button>
              </p>
            </section>
          </div>
          <div class="text-center p-3 divinsidefooter">
            © 2022 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">Naor&Yazan</a>
          </div>
          <!-- Copyright -->
      </section>
    </footer>
     }
     <?php }?>