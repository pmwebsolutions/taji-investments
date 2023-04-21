<?php
session_start();
if(!isset($_SESSION['userIsLoggedIn'])){
    header('location: ./index.php');
}?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
     <link rel="shortcut icon" type="image/x-icon" href="user/assets/images/brand/Taji.PNG" />
    <title>Taji - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="/sizla/Multi_Edit/js/DT_bootstrap.js"></script>
</head>
<?php 
include('dbcon.php');
if(isset($_SESSION['userdata'])){
    $user = $_SESSION['userdata'][0];
    
} 
 require('functions.php');
 //require('../account/functions.php');
//$data['ref_code']=$user['user_code'];
$reflist = getRefList();
//$kata['username']=$user['username'];
$pending = pendingInvestment();
//$mata ['username']=$user['username'];
$verified= sysUsersVer();
$unverified= sysUsersUnver();
//$rata ['username']=$user['username'];
$withdrawT= Withdrawtot();
?>
 
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-smile-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">TAJINVESTMENTS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="users.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>All Users</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="deposit_confirm.php">
                    <i class="fas fa-fw fa-upload"></i>
                    <span>Deposits</span></a>
            </li>
                
            

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="invest_pay.php">
                      <i class="fas fa-fw fa-book"></i>
                    <span>Investments</span></a>
                </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                 <a class="nav-link" href="withdraw_confirm.php">
                    <i class="fas fa-fw fa-download"></i>
                    <span>Withdrawals</span></a>
                </a>
                
            </li>
			<li class="nav-item">
                <a class="nav-link" href="active_check.php">
                      <i class="fas fa-fw fa-book"></i>
                    <span>Activations</span></a>
                </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
			<li class="nav-item">
                <a class="nav-link" href="mail.php">
                      <i class="fas fa-fw fa-book"></i>
                    <span>Message Centre</span></a>
                </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
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
						<li class="nav-item dropdown no-arrow">
        <?php 
        $sql ="SELECT * from messages where status='unread'  ORDER BY id DESC ";
        $query = mysqli_query($db,$sql);
		$results=mysqli_fetch_all($query);
		$newmails=mysqli_num_rows($query);
        ?>
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" data-toggle="dropdown">
          <i class="fas fa-bell text-dark"></i>
          <span class="count-symbol text-dark"><sup class="text-danger"> <?php echo $newmails;?></sup> Messages</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
          <h6 class="p-3 mb-0">You have <?php echo $newmails;?> new notification<?php if($newmails >1){echo 's';}?></h6>
          <div class="dropdown-divider"></div>
          <?php 
          $sql ="SELECT * from messages  where status='unread'  ORDER BY ID DESC LIMIT 3";
          $query = mysqli_query($db,$sql);
          $results=mysqli_fetch_all($query);
		  $mail=mysqli_fetch_assoc($query);
          ?>
          <?php if (mysqli_num_rows($query) > 0)
          {
            foreach($results as $row)
            {              
              ?>
              <a class="dropdown-item preview-item">
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <p class="preview-subject font-weight-normal mb-1"> Name: <?php  echo substr($row[1],0,5).'...';?></p>
				  <p class="preview-subject font-weight-normal text-gray ellipsis mb-0"> Message: <?php  echo substr($row[3],0,7).'...';?></p>
                </div>
				
			</a>
			<div class="dropdown-divider"></div>
              <?php 
            }
          } else {?>
            <a class="dropdown-item">No New Notification(s) Received</a>
            <?php
          } ?>
          
          <h6 class="p-3 mb-0 text-center"> <a href="notifications.php">See all new notification<?php if($newmails >1){echo 's';}?></a></h6>
        </div>
      </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo "Welcome " . $_SESSION['username']?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a><?php include 'modals.php'; ?>
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
	                   <div class="container">
<!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">USER WALLETS
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Tot user deposits</div><?php 
												$query3 = mysqli_query($db,"select sum(user_deposit) AS 'tot_bal3' from wallet");
												$values3=mysqli_fetch_assoc($query3);
												$fullbal3= $values3['tot_bal3'];
												//$bal= $row['affiliate'] + $row['investment'];
												
												?>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800">KSH <?php echo $fullbal3 ?></div>
											                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">USER WALLETS
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                tot Referal Earnings</div><?php 
												$query = mysqli_query($db,"select sum(affiliate) AS 'tot_bal1' from wallet");
												$values=mysqli_fetch_assoc($query);
												$fullbal= $values['tot_bal1'];
												?>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800">KSH <?php echo $fullbal ?></div>
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
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">USER WALLETS
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                tot invest Earnings</div><?php 
												$query2 = mysqli_query($db,"select sum(investment) AS 'tot_bal2' from wallet");
												$values=mysqli_fetch_assoc($query);
												$values2=mysqli_fetch_assoc($query2);
												$fullbal2= $values2['tot_bal2'];
												?>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800">KSH <?php echo $fullbal2 ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa- fa-user 2x text-gray-300"></i>
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
                                        <div class="col mr-2">SYSTEM
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Tot. Amount Withdrawn</div><?php
									$query = "select sum(Amount) AS 'tot_with' from withdrawals WHERE Status='Processing'";
									$runQuery=mysqli_query($db,$query);
									$values=mysqli_fetch_assoc($runQuery);
									$tot= $values['tot_with'];
									?>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800">KSH <?php if ($tot>0){
												echo $tot ;
											}
											else { 
												echo 0 ;
											}?>
											</div>											
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-download fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">SYSTEM
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Deposits
                                            </div><?php
									$username = $user['username'];
									$query = "select sum(Amount) AS 'tot_depo' from deposits WHERE status='Processed'";
									$runQuery=mysqli_query($db,$query);
									$values=mysqli_fetch_assoc($runQuery);
									$total= $values['tot_depo'];
									?>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h4 mb-0 mr-3 font-weight-bold text-gray-800">KSH <?php if($total>0){
												echo $total ;
											}
											else { 
												echo 0 ;
											} ?></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
													<i class="fas fa-upload fa-2x text-gray-300"></i>
												</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">SYSTEM
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Referrals</div>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800"><?=count($reflist)?> people.</div>
                                        </div>
                                       <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">SYSTEM
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
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
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">SYSTEM
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
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
                                        <div class="col mr-2">SYSTEM
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Pending Invested Returns</div><?php
									$username = $user['username'];
									$query = "select sum(Expectedamount) AS 'tot_inv' from investments WHERE Status='Matured'";
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
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">SYSTEM
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
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
						<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">SYSTEM
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Total Verified Users</div>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800"> <?=count($verified)?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">SYSTEM
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Total Unverified Users</div>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800"> <?=count($unverified)?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <span>Taji Investments&copy;  2023</span>
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
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="process.php?logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
<!-- update_admin_wallet modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><center>
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<h4 class="modal-title"><b>Admin Profile Update</b></h4>
          	</div><?php
		include 'dbcon.php';
        $user = $_SESSION['username'];
        $sql = "select * from `admin` where `username`='$user'";
        $query = mysqli_query($con,$sql);
        if($query){
            $row=mysqli_fetch_array($query);
            $name= $row['username'];
            $pass= $row['password'];
            $_SESSION['oldpass']= $pass;
           ?>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="profile_update.php" enctype="multipart/form-data">
          		<div class="form-group">
                  	<label for="email" class="col-sm-3 control-label">Username</label>
                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="username" name="username" value="<?php echo $name; ?>">
                  	</div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9"> 
                      <input type="password" class="form-control" id="password" name="password" value="<?php echo $pass; ?>">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Current Password:</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="Input current password to save changes" required>
                    </div>
                </div>
          	</div><?php } ?>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="save"> Save</button>
            	</form>
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
</body>
</html>