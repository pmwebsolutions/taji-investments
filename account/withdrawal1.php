<!DOCTYPE html>
<?php
$url = $_SERVER['PHP_SELF'];
$sec = "5";
session_start();
include 'header.php';
if(!isset($_SESSION['userIsLoggedIn'])){
    header('location: ../index.php');
}?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
	<?php
date_default_timezone_set("Africa/Nairobi");
		$time=date('h:i A',time());
		if($time==date('h:i A',strtotime('04:39 PM'))){
	echo '<meta http-equiv="refresh" content="3; URL="<?php echo $url; ?>">';
	}
	?>
	<link rel="shortcut icon" type="image/x-icon" href="user/assets/images/brand/Taji.PNG" />
    <meta name="author" content="">

    <title>Taji - Withdrawals</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<?php 
if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
         <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" html="home.php" >
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-smile-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">TAJINVESTMENTS <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="deposits1.php">
                    <i class="fas fa-fw fa-upload"></i>
                    <span>Deposits</span></a>
            </li>
                

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="Investments1.php">
                      <i class="fas fa-fw fa-book"></i>
                    <span>Investments</span></a>
                
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                 <a class="nav-link" href="withdrawal1.php">
                    <i class="fas fa-fw fa-download"></i>
                    <span>Withdrawals</span></a>
                </a>
                
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="affiliate.php">
                    <i class="fas fa-fw fa-recycle"></i>
                    <span>Affiliate Center</span></a>
					
					
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <marquee><a class="nav-link" href="https://chat.whatsapp.com/IFzXxC34EN0I3EGSUtRTKf">
                    <img style="width:50px" src="img/WhatsAppGroup3.jpg" alt="...">
                    <caption>Join Official Whatsapp Group</caption></a></marquee>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex bg-gradient-success">
                <img class="sidebar-card-illustration mb-2" src="img/lnm.jpg" alt="...">
				<img class="sidebar-card-illustration mb-2" src="img/Till.png" alt="...">
                
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
	<div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
		<div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        
                       

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                        <?php 
                        $name=$_SESSION['username'];
                        $conn =mysqli_connect("localhost","root","","twiga2");
                        $sql="select * from users where `username` = '$name'";
                        $query= mysqli_query($conn,$sql);
                        $dp=mysqli_fetch_array($query);?>   <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo "Welcome " . $_SESSION['username']?></span>
                                <img class="img-profile rounded-circle"
                                    src="user/<?php echo $dp['profilepic']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile_edit.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
			<div class="container-fluid">

                    <!-- Page Heading -->
                   <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Withdrawals</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-10">

                            <!-- Overflow Hidden -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Withdrawal</h6>
                                </div><div class="card-body">
														<p class="mb-2">Withdraw Your Balance Here.</p>
														<?php if(isset($msg)){
															foreach($msg as $message){
																?>
														<div class="alert alert-success" role="alert">
														<?=$message?>
														</div>
																<?php 
															}
															} 
															 ?>
                                	 
										<form action="withdrawal2.php" method="post" class="w3-container" id="payment">
									<div class="col-lg-12">
									<div class="form-group">
									<input class="form-control" name="mobile" placeholder="Phone Number  07... / 01... (MPESA ONLY)" required>&nbsp
									<select name="frmacc" type="text" class="form-control c-input u-mb-small" required>
                                              	<option value="">Please Select an Account</option>
												<option value="Affiliate">Affiliate Balance</option>										
											<option value="Investment">Investment Balance</option>
											
											
                                    </select>&nbsp
									<input class="c-input u-mb-small" type="hidden" name="username" value="<?php echo $_SESSION['username']?>" data-required="true" readonly>
									
									<input type="number" class="form-control" min="250"   name="amount" value="" placeholder="Amount" required >
									
									</div>
									<?php
									date_default_timezone_set("Africa/Nairobi");
									$timo=date('h:i A',time());
									$startime ='09:00 AM';
									$endtime ='06:00 PM';
									if((strtotime($timo) >= strtotime($startime)) && (strtotime($timo) < strtotime($endtime))){
											echo '<button type="submit"  class="btn btn-primary mt-3 mb-0" >Withdraw</button>';
									}else{
									 echo '<button type="submit"  class="btn btn-danger mt-3 mb-0" disabled>Withdraw</button>
									 <p class="mb-2">Withdrawals Are not allowed at this time...Please Try Later</p>';
									} ?>
																
									
									</div>
									</form>
								</div>
                            </div>
                        </div>
                            <!-- Progress Small -->
						<div class="col-lg-10">
							<div class="card shadow mb-4">
								<div class="card-header py-3">
											<h6 class="m-0 font-weight-bold text-primary">Withdrawal History</h6>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-boardered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th>Id</th>
													<th>Amount </th>
													<th>Channel</th>
													<th>Disbursement</th>
													<th>Status</th>                                      
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>Id</th>
													<th>Amount </th>
													<th>Channel</th>
													<th>Disbursement</th>
													<th>Status</th>                                           
												</tr>
											</tfoot>										
											<tbody>
													<?php
													$conn =mysqli_connect("localhost","root","","twiga2");
													$username = $_SESSION['username'];
													$query = mysqli_query($conn,"select * from withdrawals WHERE username = '$username' ORDER BY id DESC"); //or die(mysqli_error());
													while ($row = mysqli_fetch_array($query)) {
														$username = $row['username'];
														?>
														<tr>
															<th><?php echo $row['id']; ?></th>
															<td><?php echo $row['Amount']; ?></td>
															<td><?php echo $row['Channel']; ?></td>
															<td><?php echo $row['Disbursment']; ?></td>
															<td><?php echo $row['Status']; ?></td>                                       
														</tr>
														<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>

		</div>
                <!-- /.container-fluid -->

           
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Taji Investments 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

	</div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true"><center>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
				 
				
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.
				</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="process.php?logout">Logout</a>
                </div>
            </div>
        </div></center>
    </div>
    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
<?php 
  include 'footer.php';
    ?>
</body>

</html>
