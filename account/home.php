<?php
session_start();
include 'header.php';
if(!isset($_SESSION['userIsLoggedIn'])){
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
     <link rel="shortcut icon" type="image" href="http://localhost/taji.or.ke/account/img/Taji.png" />
	 <!--link rel="shortcut icon" type="image/x-icon" href="user/assets/images/brand/Taji.PNG" /-->
    <title>Taji - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
 <?php 

if(isset($_SESSION['userdata'])){
    $user = $_SESSION['userdata'][0];
    
} 
 require('functions.php');
$data['ref_code']=$user['user_code'];
$reflist = getRefList($data);
$kata['username']=$user['username'];
$pending = pendingInvestment($kata);
$rata ['username']=$user['username'];
$withdrawT= Withdrawtot($rata);

?>
 
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" html="home.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-smile-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">TAJINVESTMENTS <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
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
            <li class="nav-item">
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
                                            <button class="btn btn-info" type="button">
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
                        $dp=mysqli_fetch_array($query);?>
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
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
                        <h2 class="h5 mb-0 text-gray-800">Dashboard</h2>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Earnings</div><?php 
												$conn =mysqli_connect("localhost","root","","twiga2");
												$username = $user['username'];
												$query = mysqli_query($conn,"select * from wallet WHERE username = '$username'");
												while ($row = mysqli_fetch_array($query)) {
												$username = $row['username'];
												$bal= $row['affiliate'] + $row['investment'];
												
												?>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800">KSH <?php if($bal >0){
												echo $bal ;
											}
											else { 
												echo 0 ;
											}															
											 ?></div>
											<?php } ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
									
                                </div>
                            </div>
                        </div>
						
						<!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                User Wallet</div><?php 
												$conn =mysqli_connect("localhost","root","","twiga2");
												$username = $user['username'];
												$query = mysqli_query($conn,"select * from wallet WHERE username = '$username'");
												while ($row = mysqli_fetch_array($query)) {
												$bal= $row['user_deposit'];
												
												?>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800">KSH <?php if($bal >0){
												echo $bal ;
											}
											else { 
												echo 0 ;
											}								
											 ?></div>
											<?php } ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
									
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Tot. Amount Withdrawn</div><?php
									$conn =mysqli_connect("localhost","root","","twiga2");
									$username = $user['username'];
									$query = "select sum(Amount) AS 'tot_with' from withdrawals WHERE username = '$username' AND Status='Paid'";
									$runQuery=mysqli_query($db,$query);
									$values=mysqli_fetch_assoc($runQuery);
									$tot= $values['tot_with'];
									?>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800">KSH <?php if($tot >0){
												echo $tot ;
											}
											else { 
												echo 0 ;
											} ?></div>
											
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-download fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                Total Referrals</div>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800"><?=count($reflist)?> people</div>
                                        </div>
                                       <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                Referal Earnings</div>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800">KSH <?=count($reflist)*150?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa- fa-user 2x text-gray-300"></i>
											<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Pending Investments</div>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800"> <?=count($pending)?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Pending Invested Returns</div><?php
									$conn =mysqli_connect("localhost","root","","twiga2");
									$username = $user['username'];
									$query = "select sum(Expectedamount) AS 'tot_inv' from investments WHERE username = '$username' AND Status='Invested'";
									$runQuery=mysqli_query($db,$query);
									$values=mysqli_fetch_assoc($runQuery);
									$tota= $values['tot_inv'];
									?>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800">KSH <?php 
											if($tota >0){
												echo $tota ;
											}
											else { 
												echo 0 ;
											}
											?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Withdrawals</div>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800"> <?=count($withdrawT)?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-download fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
					<div class="row">

                        <!-- Content Column -->
						<div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            

                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Referral link</h6>
                                </div>
                                <div class="card-body">
                                    <p class="mg-b-20">Click Copy to get your Referral Link</p>
                                      <input id="myInput" type="text" class="form-control form-control-user" style="color: black !important;background-color: #5053f852;" value="https://tajinvestments.org/?refcode=<?=$user['user_code']?>" readonly >
											<br>
                                    <div class="col-md mg-t-12 mg-md-t-0">
										<button type="submit" class="btn btn-info btn-user btn-block" onclick="myFunction2()">Copy link</button>
										<br>
										<br>
									</div>
                                </div>
                            
							</div>
                        </div>
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Progress Reports</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Refferral Earnings <span
                                            class="float-right"><?=count($reflist)?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?=count($reflist)?>%"
                                            aria-valuenow="750" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Affiliate Tracking <span
                                            class="float-right"><?=count($reflist)?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?=count($reflist)?>%"
                                            aria-valuenow="<?=count($reflist)?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Investments Progress<span
                                            class="float-right"><?=count($pending)?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: <?=count($pending)?>%"
                                            aria-valuenow="<?=count($pending)?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Account Setup <span
                                            class="float-right">Complete!</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                     
						



                            <!-- Color System -->
                            

                        </div>
                        
                        
						
                    </div>
					

                    
                    

                </div>
                <!-- /.container-fluid -->

            </div>
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

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
	<script src="js/zoza.js"></script>
	<?php 
  include 'footer.php';
    ?>
</body>

</html>