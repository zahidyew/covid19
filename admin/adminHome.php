<?php
session_start();

// if loggedIn var is not set, then the admin has not logged in
if (!isset($_SESSION['loggedIn'])) {
   header("Location: login.php");
}
$username = $_SESSION['username'];
?>

<!doctype html>
<html class="fixed sidebar-left-collapsed">

<head>

   <!-- Basic -->
   <meta charset="UTF-8">

   <title>Admin</title>
   <meta name="keywords" content="HTML5 Admin Template" />
   <meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
   <meta name="author" content="JSOFT.net">

   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

   <!-- Web Fonts  -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

   <!-- Vendor CSS -->
   <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css" />
   <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css" />
   <link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css" />
   <link rel="stylesheet" href="../assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

   <!-- Specific Page Vendor CSS -->
   <link rel="stylesheet" href="../assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
   <link rel="stylesheet" href="../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />

   <!-- Theme CSS -->
   <link rel="stylesheet" href="../assets/stylesheets/theme.css" />

   <!-- Skin CSS -->
   <link rel="stylesheet" href="../assets/stylesheets/skins/default.css" />

   <!-- Theme Custom CSS -->
   <link rel="stylesheet" href="../assets/stylesheets/theme-custom.css">

   <!-- Head Libs -->
   <script src="../assets/vendor/modernizr/modernizr.js"></script>

   <!-- Favicon -->
   <!-- <link rel="shortcut icon" href="./assets/images/favicon.ico" type="image/x-icon">
   <link rel="icon" href="./assets/images/favicon.ico" type="image/x-icon"> -->

</head>

<body>
   <section class="body">

      <!-- start: header -->
      <header class="header">
         <div class="logo-container">
            <a href="./adminHome.php" class="logo">
               <p>Admin</p>
               <!-- <img src="assets/images/logo.png" height="35" alt="JSOFT Admin" /> -->
            </a>
            <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
               <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
         </div>

         <!-- start: search & user box -->
         <div class="header-right">
            <span class="separator"></span>

            <div id="userbox" class="userbox">
               <a href="#" data-toggle="dropdown">
                  <figure class="profile-picture">
                     <img src="../assets/images/admin.png" alt="Joseph Doe" class="img-circle" data-lock-picture="../assets/images/!logged-user.jpg" />
                  </figure>
                  <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
                     <span class="name"><?php echo $username; ?></span>
                     <span class="role">administrator</span>
                  </div>

                  <i class="fa custom-caret"></i>
               </a>

               <div class="dropdown-menu">
                  <ul class="list-unstyled">
                     <li class="divider"></li>
                     <li>
                        <a role="menuitem" tabindex="-1" href="./logout.php" id="logout"><i class="fa fa-power-off"></i> Logout</a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <!-- end: search & user box -->
      </header>
      <!-- end: header -->

      <div class="inner-wrapper">
         <!-- start: sidebar -->
         <aside id="sidebar-left" class="sidebar-left">

            <div class="sidebar-header">
               <div class="sidebar-title">
                  Navigation
               </div>
               <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                  <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
               </div>
            </div>

            <!-- <div class="nano">
               <div class="nano-content">
                  <nav id="menu" class="nav-main" role="navigation">
                     <ul class="nav nav-main">
                        <li class="nav-active">
                           <a href="./homepage.php">
                              <i class="fa fa-home" aria-hidden="true"></i>
                              <span>Homepage</span>
                           </a>
                        </li>

                        <li class="nav-active">
                           <a href="./addQuiz.php">
                              <i class="fa fa-plus" aria-hidden="true"></i>
                              <span>Add New Quiz</span>
                           </a>
                        </li>
                  </nav>
               </div>
            </div> -->
         </aside>
         <!-- end: sidebar -->

         <section role="main" class="content-body">
            <header class="page-header">
               <h2>Add New Record</h2>
            </header>
            <div class="row">
               <div class="col-lg-12">
                  <section class="panel">
                     <div class="col-sm-10 col-sm-offset-1 panel-body">
                        <form>
                           <section class="panel-featured">
                              <header class="panel-heading">
                                 <h2 class="panel-title">Add New Record</h2>
                              </header>
                              <div class="panel-body">
                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">Date <span class="required"></span></label>
                                    <div class="col-sm-3">
                                       <input type="date" name="date" id="date" class="form-control" required>
                                       <!-- <input type="text" name="date" id="date" class="form-control" placeholder="2-Apr-2020" required> -->
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">Number of New Cases <span class="required"></span></label>
                                    <div class="col-sm-2">
                                       <input type="number" name="numOfCase" id="numOfCase" min="0" class="form-control" required>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">Recovered <span class="required"></span></label>
                                    <div class="col-sm-2">
                                       <input type="number" name="recovered" id="recovered" min="0" class="form-control" required>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">Death <span class="required"></span></label>
                                    <div class="col-sm-2">
                                       <input type="number" name="death" id="death" min="0" class="form-control" required>
                                    </div>
                                 </div>
                              </div>
                              <footer class="panel-footer" id="recordFooter">
                                 <div class="row">
                                    <div class="col-sm-12 text-right">
                                       <button class="btn btn-default" type="button" name="reset" id="reset">Reset</button><span> |</span>
                                       <button class="btn btn-primary" type="button" name="submit" id="submit">Submit</button>
                                    </div>
                                 </div>
                              </footer>
                           </section>
                        </form>
                     </div>
                  </section>
               </div>
            </div><br>
         </section>
      </div>
   </section>

   <script>
      const dateElem = document.getElementById("date");
      const numOfCaseElem = document.getElementById("numOfCase");
      const recoveredElem = document.getElementById("recovered");
      const deathElem = document.getElementById("death");

      const resetBtn = document.getElementById("reset").addEventListener("click", () => {
         resetFields();
      });

      const submitBtn = document.getElementById("submit").addEventListener("click", () => {
         const recordData = getFormValues();

         if (recordData === false)
            alert("Please fill out all the fields.");
         else
            //console.log("new date:" + recordData.date);
            postRequest(recordData);
      });

      function getFormValues() {
         const date = dateElem.value;
         const cases = numOfCaseElem.value;
         const recovered = recoveredElem.value;
         const death = deathElem.value;

         if (date === "" || cases === "" || recovered === "" || death === "") {
            return false;
         } else {
            const recordData = {
               date: reformatDate(date),
               cases: cases,
               recovered: recovered,
               death: death
            };
            return recordData;
         }
      }

      function postRequest(recordData) {
         fetch('./record.php', {
               method: 'POST',
               headers: {
                  'Content-Type': 'application/json',
               },
               body: JSON.stringify(recordData)
            })
            .then((response) => response.json())
            .then((data) => {
               console.log('Success:', data);
               alert("Success.");
               resetFields();
            })
            .catch((error) => {
               console.error('Error:', error);
            });
      }

      function resetFields() {
         dateElem.value = "";
         numOfCaseElem.value = "";
         recoveredElem.value = "";
         deathElem.value = "";
      }

      function reformatDate(date) {
         // raw date input from HTML is yyyy-mm-dd
         let x = date.split("-");
         let day, month, year, newDate;

         year = x[0];
         day = (x[2] < 10) ? day = x[2].charAt(1) : day = x[2];

         x[1] == 1 ? (month = "Jan") :
            x[1] == 2 ? (month = "Feb") :
            x[1] == 3 ? (month = "Mar") :
            x[1] == 4 ? (month = "Apr") :
            x[1] == 5 ? (month = "May") :
            x[1] == 6 ? (month = "Jun") :
            x[1] == 7 ? (month = "Jul") :
            x[1] == 8 ? (month = "Aug") :
            x[1] == 9 ? (month = "Sep") :
            x[1] == 10 ? (month = "Oct") :
            x[1] == 11 ? (month = "Nov") :
            x[1] == 12 ? (month = "Dec") :
            false;

         newDate = day + "-" + month + "-" + year;
         return newDate;
         //console.log("Reformatted date: " + newDate);
      }
   </script>

   <!-- Vendor -->
   <script src="../assets/vendor/jquery/jquery.js"></script>
   <script src="../assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
   <script src="../assets/vendor/bootstrap/js/bootstrap.js"></script>
   <script src="../assets/vendor/nanoscroller/nanoscroller.js"></script>
   <script src="../assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
   <script src="../assets/vendor/magnific-popup/magnific-popup.js"></script>
   <script src="../assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

   <!-- Specific Page Vendor -->
   <script src="../assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
   <script src="../assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
   <script src="../assets/vendor/jquery-appear/jquery.appear.js"></script>
   <script src="../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>

   <!-- Theme Base, Components and Settings -->
   <script src="../assets/javascripts/theme.js"></script>

   <!-- Theme Custom -->
   <script src="../assets/javascripts/theme.custom.js"></script>

   <!-- Theme Initialization Files -->
   <script src="../assets/javascripts/theme.init.js"></script>
</body>

</html>