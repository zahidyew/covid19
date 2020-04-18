<?php
include_once './config/Database.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$query = 'SELECT * FROM main ORDER BY row ASC';
$stmt = $db->prepare($query);
$stmt->execute();

$totalCases = 0;
$totalRecovered = 0;
$totalDeath = 0;

$activeCases = [];
$differences = 0;
?>


<!doctype html>
<html class="fixed sidebar-left-collapsed">

<head>

   <!-- Basic -->
   <meta charset="UTF-8">

   <title>Malaysia Covid-19</title>
   <meta name="keywords" content="HTML5 Admin Template" />
   <meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
   <meta name="author" content="JSOFT.net">

   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

   <!-- Web Fonts  -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

   <!-- Vendor CSS -->
   <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
   <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
   <link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
   <link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

   <!-- Specific Page Vendor CSS -->
   <link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
   <link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />

   <!-- Specific Page Vendor CSS -->
   <link rel="stylesheet" href="assets/vendor/select2/select2.css" />
   <link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

   <!-- Theme CSS -->
   <link rel="stylesheet" href="assets/stylesheets/theme.css" />

   <!-- Skin CSS -->
   <link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

   <!-- Theme Custom CSS -->
   <link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

   <!-- Head Libs -->
   <script src="assets/vendor/modernizr/modernizr.js"></script>

   <!-- Favicon -->
   <!-- <link rel="shortcut icon" href="./assets/images/favicon.ico" type="image/x-icon">
   <link rel="icon" href="./assets/images/favicon.ico" type="image/x-icon"> -->

</head>

<body>
   <section class="body">

      <!-- start: header -->
      <header class="header">
         <div class="logo-container">
            <a href="./homepage.php" class="logo">
               <p>Malaysia Covid-19</p>
               <!-- <img src="assets/images/logo.png" height="35" alt="JSOFT Admin" /> -->
            </a>
            <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
               <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
         </div>
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

            <div class="nano">
               <div class="nano-content">
                  <nav id="menu" class="nav-main" role="navigation">
                     <ul class="nav nav-main">
                        <li class="nav-active">
                           <a href="./index.php">
                              <i class="fa fa-home" aria-hidden="true"></i>
                              <span>Homepage</span>
                           </a>
                        </li>

                        <!-- <li class="nav-active">
                           <a href="./addQuiz.php">
                              <i class="fa fa-plus" aria-hidden="true"></i>
                              <span>Add New Quiz</span>
                           </a>
                        </li> -->
                  </nav>
               </div>
            </div>
         </aside>
         <!-- end: sidebar -->

         <section role="main" class="content-body">
            <header class="page-header">
               <h2>Malaysia Covid-19</h2>
            </header>
            <div class="panel-body">
               <h2>Malaysia Covid-19</h2><br>
               <!-- <div class="row">
                  <div class="col-sm-12 text-right">
                     <button id="addQuiz" class="btn btn-primary">Add New Quiz <i class="fa fa-plus"></i></button>
                  </div>
               </div><br> -->
               <table class="table table-bordered table-striped mb-none" id="datatable-default">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Date</th>
                        <th>New Cases</th>
                        <th>Recovered</th>
                        <th>Death</th>
                        <th>Total Cases</th>
                        <th>Total Recovered</th>
                        <th>Total Deaths</th>
                        <th>Active Cases</th>
                        <th>Differences</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $num = 1;
                     while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $totalCases = $totalCases + $row['new_case'];
                        $totalRecovered = $totalRecovered + $row['recovered'];
                        $totalDeath = $totalDeath + $row['death'];

                        $activeCases[$num - 1] = $totalCases - $totalRecovered - $totalDeath;

                        if ($num > 1) {
                           $differences = $activeCases[$num - 1] - $activeCases[$num - 2];
                        }

                        echo '<tr>';
                        echo '<td>' . $num . '</td>';
                        echo '<td>' . $row['date'] . '</td>';
                        echo '<td>' . $row['new_case'] . '</td>';
                        echo '<td>' . $row['recovered'] . '</td>';
                        echo '<td>' . $row['death'] . '</td>';
                        echo '<td>' . $totalCases . '</td>';
                        echo '<td>' . $totalRecovered . '</td>';
                        echo '<td>' . $totalDeath . '</td>';
                        echo '<td>' . $activeCases[$num - 1] . '</td>';
                        echo '<td>' . $differences . '</td>';
                        echo '</tr>';
                        $num++;
                     }
                     ?>
                  </tbody>
               </table>
            </div>
            <!-- start: page -->
            <!-- end: page -->
         </section>
      </div>
   </section>

   <!-- Vendor -->
   <script src="assets/vendor/jquery/jquery.js"></script>
   <script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
   <script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
   <script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
   <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
   <script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
   <script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

   <!-- Specific Page Vendor -->
   <script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
   <script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
   <script src="assets/vendor/jquery-appear/jquery.appear.js"></script>
   <script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>

   <!-- For Table Pagination -->
   <script src="assets/vendor/select2/select2.js"></script>
   <script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
   <script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
   <script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>

   <!-- Theme Base, Components and Settings -->
   <script src="assets/javascripts/theme.js"></script>

   <!-- Theme Custom -->
   <script src="assets/javascripts/theme.custom.js"></script>

   <!-- Theme Initialization Files -->
   <script src="assets/javascripts/theme.init.js"></script>

   <!-- For Table Pagination -->
   <script src="assets/javascripts/tables/examples.datatables.default.js"></script>
   <script src="assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
   <script src="assets/javascripts/tables/examples.datatables.tabletools.js"></script>
</body>

</html>