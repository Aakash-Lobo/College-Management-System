<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>

<?php
if (isset($_POST['sub'])) {
 	$roll_no=$_POST['roll_no'];
 	$amount=$_POST['amount'];
 	$status=$_POST['status'];
		$que="insert into student_fee(roll_no,amount,status)values('$roll_no','$amount','$status')";
	$run=mysqli_query($con,$que);
	if ($run) {
			echo "Insert Successfull";
		}	
		else{
			echo " Insert Not Successfull";
		}
	}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Admin - Student Fee</title>
</head>

<body>
    <?php include('../common/common-header.php') ?>
    <?php include('../common/admin-sidebar.php') ?>

    <main class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
        <div class="sub-main">
            <div class="flex-md-no-wrap pt-3 pb-2 p-3 text-white admin-dashboard pl-3">
                <h4>Student Fee Management System </h4>
            </div>
            <div class="row ml-1">
                <div class="col-md-12">
                    <form action="student-fee.php" method="post">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Enter Roll No:</label>
                                    <div class="d-flex">
                                        <input type="text" class="form-control" name="roll_no"
                                            placeholder="Enter Roll No">
                                        <input type="submit" name="submit" class="btn btn-primary px-4 ml-4"
                                            value="Display">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 align-items-baseline pt-4">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ml-2">
                    <section>
                        <table class="w-100 table-elements table-three-tr" cellpadding="3">
                            <tr class="table-tr-head table-three text-white">
                                <th>Sr No.</th>
                                <th>Roll No.</th>
                                <th>Student Name</th>
                                <th>Program</th>
                                <th>Amount (Rs.)</th>
                            </tr>
                            <?php  
								$i=1;
									if (isset($_POST['submit'])) {
										$roll_no=$_POST['roll_no'];


										$que="select roll_no,first_name,middle_name,last_name,course_code from student_info where roll_no='$roll_no' ";
									$run=mysqli_query($con,$que);
									while ($row=mysqli_fetch_array($run)) {
									?>
                            <form action="student-fee.php" method="post">
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['roll_no'] ?></td>
                                    <input type="hidden" name="roll_no" value=<?php echo $row['roll_no'] ?>>
                                    <td><?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?>
                                    </td>
                                    <td><?php echo $row['course_code'] ?></td>
                                    <td><input type="text" name="amount" class="form-control"
                                            placeholder="Enter Amount for fee"></td>
                                    <input type="hidden" name="status" value="Paid">

                                </tr>

                                <?php		
									}
									}
								?>
                                <input type="submit" name="sub" class="btn btn-success px-5 ml-1 mb-2" value="Update">

                            </form>
                        </table>
                    </section>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>