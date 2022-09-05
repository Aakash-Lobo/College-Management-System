 <!---------------- Session starts form here ----------------------->
 <?php  
	session_start();
	if (!$_SESSION["LoginTeacher"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
 <!---------------- Session Ends form here ------------------------>

 <?php
	$_SESSION["LoginAdmin"]="";
	$teacher_email=$_SESSION['LoginTeacher'];
	$query1="select * from teacher_info where email='$teacher_email'";
	$run1=$run=mysqli_query($con,$query1);
	while($row=mysqli_fetch_array($run1)) {
		$teacher_id=$row["teacher_id"];
	}
	$_SESSION['teacher_id']=$teacher_id;
?>


 <html lang="en">

 <head>
     <title>Teacher - Dashboard</title>
 </head>

 <body>
     <?php include('../common/common-header.php') ?>
     <?php include('../common/teacher-sidebar.php') ?>

     <main class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 main-background mb-2 w-100">
         <div class="sub-main">
             <div class="flex-md-no-wrap pt-3 pb-2 p-3 text-white admin-dashboard pl-3">
                 <h4 class="">Welcome To <?php $roll_no=$_SESSION['LoginTeacher'];
					$query="select * from teacher_info where email='$teacher_email'";
					$run=mysqli_query($con,$query);
					while ($row=mysqli_fetch_array($run)) {
						echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'];
					}
					?> Dashboard </h4>
                 </h4>
             </div>
             <div class="row">

                 <div class="col-lg-12 col-md-12">
                     <div>
                         <section class="mt-3">
                             <div class="btn btn-block table-one text-light d-flex">
                                 <span class="font-weight-bold"><i class="fa fa-bell-o mr-3" aria-hidden="true"></i>
                                     Notifications</span>

                             </div>
                             <div class="collapse show mt-2">
                                 <table class="w-100 table-elements table-one-tr" cellpadding="2">
                                     <tr>
                                         <td>Notification for teacher</td>
                                     </tr>
                                     <tr>
                                         <td>Notification for teacher</td>
                                     </tr>
                                     <tr>
                                         <td>Notification for teacher</td>
                                     </tr>
                                     <tr>
                                         <td>Notification for teacher</td>
                                     </tr>
                                     <tr>
                                         <td>Notification for teacher</td>
                                     </tr>
                                 </table>
                             </div>
                         </section>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-12 mt-4">
                     <table class="w-100 table-elements table-three-tr" cellpadding="2">
                         <div class="btn btn-block table-three text-light d-flex mb-2">
                             <span class="font-weight-bold"><i class="fa fa-asterisk mr-2"></i> Attendance Report
                                 Detail</span>


                         </div>
                         <tr class="pt-5 table-three text-white">
                             <th>Month</th>
                             <th>Working Days</th>
                             <th>Presents</th>
                             <th>Absents</th>
                             <th>L.A</th>
                             <th>C.L</th>
                             <th>M.L</th>
                             <th>S.L</th>
                         </tr>

                         <?php
								$query="select month(attendance_date) as attendance_date,sum(attendance) as present from teacher_attendance  where teacher_id='$teacher_id' group by month(attendance_date) ";
								$run=mysqli_query($con,$query);
								while ($row=mysqli_fetch_array($run)) {?>
                         <tr>
                             <td><?php echo $row['attendance_date'] ?></td>
                             <td><?php echo $row['present'] ?></td>
                             <td><?php echo $row['present'] ?></td>
                             <td><?php echo $row['present']-$row['present'] ?></td>
                             <td>00</td>
                             <td>15</td>
                             <td>15</td>
                             <td>15</td>
                         </tr>
                         <?php }
							?>
                     </table>
                 </div>
             </div>
         </div>
     </main>
     <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
     <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
 </body>

 </html>