<?php
    // Connection database
    //include("connection.php");
    // Check, for session 'user_session'
    include("session.php");

    // Set Default Time Zone for Asia/Kuala_Lumpur
    date_default_timezone_set("Asia/Kuala_Lumpur");

    // Check, if username session is NOT set then this page will jump to login page
    if (!isset($_SESSION['session'])) {
        header('Location: login.php');
        session_destroy();
    }

$role = $_SESSION["role"];
$email =$_SESSION['session'];
$name = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>On Target inventory</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <img src="Logo%20On%20Target.png" width="55" height="55" class="d-inline-block align-top" alt="">
        <a class="navbar-brand" href="dashboard.php">On Target inventory</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="dashboard.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Inventory</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="fillitem.php">Form/fill item</a>
            </li>
            <li>
              <a href="listitem.php">List all item</a>
            </li>
            <li>
              <a href="generatereport.php">Generate report</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
         <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2" data-parent="#exampleAccordion">
             <i class="fa fa-fw fa-table"></i>
             <span class="nav-link-text">Transaction</span>
            </a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2">
                <li>
                  <a href="transactionform.php">Transaction form</a>
                </li>
                <li>
                  <a href="transactionlist.php">Transaction list</a>
                </li>
                <li>
                  <a href="transactionreport.php">Transaction report</a>
                </li>
          </ul>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Admin management</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">           
            <li>
              <a href="liststaff.php">List staff</a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
 <li class="nav-item">
              <h5 style="color: white"> <?php echo $name;  ?></h5>
          </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user-o"></i>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
          
              <span class="text-dark">
              <a class="dropdown-item"  href="profilepage.php"><i class="fa fa-user-circle-o"></i> My Profile</a>
              </span>
              
              <div class="dropdown-message small"></div>
                <div class="dropdown-divider"></div>        
                <div class="dropdown-divider"></div>
              <span class="text-dark">
              <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal" href="#"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
              </span>
              
          </div>
        </li>
                <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0 mr-lg-2">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search for...">
                            <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
                        </div>
                    </form>
                </li>
                
            </ul>
    </div>
  </nav>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Admin Management</a>
                </li>
                <li class="breadcrumb-item active"></li>
            </ol>
            <!-- Example DataTables Card-->
           
            
            <?php

date_default_timezone_set("Asia/Kuala_Lumpur");

?>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>		
		
		
	</head>
	<body>
   
          <div class="table-responsive">
        <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Admin Management</div>
				<div align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add</button>
				</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="user_data" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Image</th>
							<th >Name</th>
							<th >Ic</th>
                            <th >Email</th>
                            <th >Role</th>
                            <th >Phone No.</th>
                            <th >Address</th>
                            <th >Password</th>
                            <th >Last Login</th>
							<th >Edit</th>
							<th >Delete</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Image</th>
							<th >Name</th>
							<th >Ic</th>
                            <th >Email</th>
                            <th >Role</th>
                            <th >Phone No.</th>
                            <th >Address</th>
                            <th >Password</th>
                            <th >Last Login</th>
							<th >Edit</th>
							<th >Delete</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated at <?php                        
    echo date('d-m-Y H:i:s');?>
                 </div>
      </div>
    </div>
	</body>
</html>

<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" onClick="window.location.reload()">&times;</button>
					<h4 class="modal-title">Add Staff</h4>
				</div>
				<div class="modal-body">
					<label>Name</label>
					<input type="text" name="name" id="name" class="form-control" />
					<br />
					<label>Ic</label>
					<input type="text" name="ic" id="ic" class="form-control" />
					<br />
                    <label>Email</label>
					<input type="text" name="email" id="email" class="form-control" />
					<br />
                    <label>Role</label>
                    <select type="text" name="role" id="role" class="form-control">
        <option value="">Select one </option>
        <option value="Administrator">Administrator</option>
        <option value="Staff">Staff</option>
      </select>
					<br />
                    <label>Phone No.</label>
					<input type="text" name="phone" id="phone" class="form-control" />
					<br />
                    <label>Address</label>
					<input type="text" name="address" id="address" class="form-control" />
					<br />
                    <label>Password</label>
					<input type="text" name="password" id="password" class="form-control" />
					<br />
					<label>Select User Image</label>
					<input type="file" name="user_image" id="user_image" />
					<span id="user_uploaded_image"></span>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal" onClick="window.location.reload()">Close</button>
				</div>
			</div>

		</form>
        
	</div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Add Staff");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#user_uploaded_image').html('');
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],

	});

	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var name = $('#name').val();
		var ic = $('#ic').val();
        var email = $('#email').val();
        var role = $('#role').val();
        var phone = $('#phone').val();
        var address = $('#address').val();
        var password = $('#password').val();
		var extension = $('#user_image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				alert("Invalid Image File");
				$('#user_image').val('');
				return false;
			}
		}	
		if(name != '' && ic != '')
		{
			$.ajax({
				url:"insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});
	
	$(document).on('click', '.update', function(){
		var user_id = $(this).attr("id");
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{user_id:user_id},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#name').val(data.name);
				$('#ic').val(data.ic);
                $('#email').val(data.email);
                $('#role').val(data.role);
                $('#phone').val(data.phone);
                $('#address').val(data.address);
                $('#password').val(data.password);
				$('.modal-title').text("Edit User");
				$('#user_id').val(user_id);
				$('#user_uploaded_image').html(data.user_image);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
    
    
   

	
	$(document).on('click', '.delete', function(){
		var user_id = $(this).attr("id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{user_id:user_id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
	
	
});
</script>
                 
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Group 9 Copyright © All right Reserved On-Target Inventory System 2018</small>
                </div>
            </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close" onClick="window.location.reload()">
              <span aria-hidden="true">×</span>
            </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Page level plugin JavaScript-->
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin.min.js"></script>
        <!-- Custom scripts for this page-->
        <script src="js/sb-admin-datatables.min.js"></script>
        </div>
    </div>
    </body>
</html>

<div id="user" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" onClick="window.location.reload()">&times;</button>
					<h4 class="modal-title">My Profile</h4>
				</div>
				<div class="modal-body">
					<label>Name</label>
					<input type="text" name="name" id="name" class="form-control" />
					<br />
					<label>Ic</label>
					<input type="text" name="ic" id="ic" class="form-control" />
					<br />
                    <label>Email</label>
					<input type="text" name="email" id="email" class="form-control" />
					<br />
                    <label>Role</label>
                    <select type="text" name="role" id="role" class="form-control">
        <option value="">Select one </option>
        <option value="Administrator">Administrator</option>
        <option value="Staff">Staff</option>
      </select>
					<br />
                    <label>Phone No.</label>
					<input type="text" name="phone" id="phone" class="form-control" />
					<br />
                    <label>Address</label>
					<input type="text" name="address" id="address" class="form-control" />
					<br />
                    <label>Password</label>
					<input type="text" name="password" id="password" class="form-control" />
					<br />
					<label>Select User Image</label>
					<input type="file" name="user_image" id="user_image" />
					<span id="user_uploaded_image"></span>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Update" />
					<button type="button" class="btn btn-default" data-dismiss="modal" onClick="window.location.reload()">Close</button>
				</div>
			</div>

		</form>
        
	</div>
</div>

<div id="usersetting" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Copyrights</h5>
         
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <img class="img-responsive" src="Logo%20On%20Target.png" alt="Chania" width="480" height="360">
          <h7>Group 9 Copyright © All right Reserved On-Target Inventory System 2018</h7>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="window.location.reload()">Close</button>
      </div>
    </div>
	</div>
</div>

