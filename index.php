
<?php
session_start();
$id = $_SESSION['user'];
if (isset($_SESSION['username'])) { ?>


<!DOCTYPE html>

<style>
        .error {
            color: red;
            display: none;
        }
        .success {
            color: green;
            display: none;
        }
    </style>


    <?php include "lib/head.php" ?>

    <?php include 'config/SYD_Class.php';
    $coder = new sydClass();
    ?>
 

  

  <body >
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar" >
      <div class="layout-container">
        <!-- Menu -->

      <?php include "lib/sidebar.php" ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

         <?php include "lib/navbar.php" ?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper" >
            <!-- Content -->
            
            <div class="tab-content" id="myTabContent">

           <?php include "mydata/home.php"  ?>
            </div>
            <!-- / Content -->

            <!-- Footer -->
           <?php include "lib/footer.php" ?>
            <!-- / Footer -->

            <div class="content-backdrop fade" ></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    

    
  </body>
</html>

<?php include "mydata/model.php" ?>

<?php include "mydata/script.php" ?>

<?php include "mydata/events.php" ?>
<?php include "mydata/commen_validation.php" ?>



<script>
  // $('#mainsection').click(function(){
  //  $('.nav-link ').removeClass('active');
  //  $(this).addclass('active');
  // })

  $(".nav-link").click(function() {
    $(".nav-link").removeClass("active");
    $(this).addClass('active');
  })
</script>

<?php  }
else{
  header('Location: login2.php');
}
?>
