<?php session_start(); 


include_once 'database.php';
if (!isset($_SESSION['user'])||$_SESSION['role']!='Teacher') {
  # code...
  header('Location:./logout.php');
}
?>
<?php


//include_once 'database.php';

?>


<!DOCTYPE html>

<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Class Room</title><link rel="icon" href="../img/favicon2.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="support_files/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="support_files/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="support_files/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="support_files/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="support_files/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="support_files/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="support_files/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="style_files/css/main_style.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="style_files/css/skins/sidehead_style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
 <?php include_once 'header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include_once 'sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Class Room
        <small>Class Room Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Class Room</a></li>
        <li class="active">Details</li>
      </ol>
    </section>

    <!-- Main content -->


    <section class="content">

 <div class="row">
 <div class="col-xs-4">

   

         <div class="alert alert-success alert-dismissible" style="display: none;" id="truemsg">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                New Class Room Successfully added
              </div>






          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">New Class Room</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" >
              <div class="box-body">

                 

                <div class="form-group">
                  <label for="exampleInputPassword1">Class Room ID</label>
                  <input name="hno" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Class Room ID" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Class Room Title</label>
                  <input name="title" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Class Room Title" required>
                </div>


                  <div class="form-group">
                  <label for="exampleInputPassword1">Location</label>
                  <input name="location" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Class Room Location" required>
                </div>
                  <div class="form-group">
                  <label for="exampleInputPassword1">Capacity</label>
                  <input name="capacity" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Class Room Capacity" required>
                </div>
                

            




       
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" value="submit" class="btn btn-info">Add Class Room</button>
              </div>
            </form>

              <?php

              if (isset($_POST['submit'])) {
                $hno = $_POST['hno'];
                $title = $_POST['title'];
                $location = $_POST['location'];
                $capacity = $_POST['capacity'];

              


                  try {


                   

                    $sql = "INSERT INTO classroom(hno,title,location,capacity) VALUES ( '".$hno."', '".$title."','".$location."',".$capacity.")";

                  if ($conn->query($sql) === TRUE) {
                         echo "<script type='text/javascript'> var x = document.getElementById('truemsg');
x.style.display='block';</script>";
                      } else {
                            }
                    
                  } catch (Exception $e) {
                    
                  }





                  
                # code...
                                            }

              ?>



          </div></div>

          <div class="col-xs-8">


          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">All Class Rooms</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Class Room ID</th>
                  <th>Title</th>
                  <th>Location</th>
                   <th>Capacity</th>
                 
                 
                </tr>
                </thead>
                <tbody>


                  <?php

                  $sql = "SELECT * FROM classroom";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                   // output data of each row
                     while($row = $result->fetch_assoc()) {
                      echo "<tr><td> " . $row["hno"]. " </td><td> " . $row["title"]. "</td><td>" . $row["location"]. "</td><td>" . $row["capacity"]. "</td></tr>";
                       }
                                  }

                  ?>


                </tbody>
                <tfoot>
                 
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
            
          </div>
          <!-- /.box -->

          

        </div>

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
   
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
 <?php include_once 'footer.php'; ?>

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="support_files/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="support_files/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="support_files/dist/js/select2.full.min.js"></script>
<!-- Select2 -->
<script src="support_files/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="support_files/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


<script src="support_files/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="support_files/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins_file/timepicker/bootstrap-timepicker.min.js"></script>

<script src="support_files/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins_file/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="support_files/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="style_files/js/main_script.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="style_files/js/demo.js"></script>
<!-- Page script -->

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>


<script>   $('.select2').select2()
  $('#datepicker').datepicker({
      autoclose: true
    });


        
            var r = document.getElementById("class"); 
            r.className += "active"; 
           
    </script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>