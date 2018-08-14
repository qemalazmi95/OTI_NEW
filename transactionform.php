
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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- Custom styles for this page-->
  <link href="tsForm.css" rel="stylesheet">

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
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Transaction form</li>
        </ol>
        <!--ADD ITEMS-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-bar-chart"></i> Form/ Add item</div>
            <div class="card-body">
              <form>
                <div class="form-row">
                  <div class="col-lg-6 col-md-6 form-group">
                    Select Item
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">
                    Description
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-lg-6 col-md-6">
                    <label for="Item"></label>
                    <select class="select-box-1 col-lg-10 col-md-10" name="item">
                      <!--php to fetch items form db-->
                      <option></option>

                    </select>
                  </div>
                  <div class="form-group col-lg-6 col-md-6">
                    <label for="description"></label>
                    <textarea name="description" rows="3" class="col-lg-10 col-md-10" disabled autocomplete="off"></textarea>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-lg-6 col-md-6 form-group">
                    Enter Quantity
                  </div>
                  <div class="col-lg-6 col-md-6 form-group">
                    Quantity Avaliable
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-lg-6 col-md-6">
                    <label for="qtyInput"></label>
                    <input class="col-md-10 col-lg-10" type="number" name="qtyInput" min="1" disabled min=0 autocomplete="off"></input><span class="validity"></span>
                  </div>
                  <div class="form-group col-lg-6 col-md-6">
                    <label for="qtyAvaliable"></label>
                    <input class="col-md-10 col-lg-10" type="number" name="qtyAvaliable" disabled autocomplete="off"></input>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-lg-6 col-md-6">
                    Unit price
                  </div>
                  <div class="form-group col-lg-6 col-md-6">
                    Total price
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-lg-6 col-md-6">
                    <label for="unitPrice"></label>
                    <input class="col-md-10 col-lg-10" type="number" name="unitPrice" disabled autocomplete="off"></input>
                  </div>
                  <div class="form-group col-lg-6 col-md-6">
                    <label for="totalPrice"></label>
                    <input class="col-md-10 col-lg-10" type="number" name="totalPrice" disabled autocomplete="off"></input>
                  </div>
                </div>
                <div class="form-row ">
                  <div class="form-group btn-row">
                    <button class="btn btn-success btn-left-style" type="button" id="addItem">Add item</button>
                    <button class="btn btn-danger btn-reset" type="reset">Reset</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <!--LIST ITEMS-->

          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Item/ List to be transacted</div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Item name</th>
                        <th>Quantity</th>
                        <th>Unit price</th>
                        <th>Total Price</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Item name</th>
                        <th>Quantity</th>
                        <th>Unit price</th>
                        <th>Total Price</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <form class="form-margin">
                  <div class="form-row ">
                    <div class="form-group">
                      <button class="btn btn-danger btn-reset btn-left-style" type="button" id="clearRows">Clear selected items</button>
                      <button class="btn btn-danger btn-reset" type="button" id="clearTable">Clear items</button>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-lg-6 col-md-6 form-group">
                      Enter GST/SST (%)
                    </div>
                    <div class="col-lg-6 col-md-6 form-group">
                      Enter discount (%)
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-6 col-md-6">
                      <label for="tax"></label>
                      <input class="col-md-10 col-lg-10" type="number" name="tax"></input>
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                      <label for="discountPercent"></label>
                      <input class="col-md-10 col-lg-10" type="number" name="discountPercent"></input>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-lg-6 col-md-6 form-group">
                      Enter discount (RM)
                    </div>
                    <div class="col-lg-6 col-md-6 form-group">
                      Select method of payment
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-6 col-md-6">
                      <label for="discountRM"></label>
                      <input class="col-md-10 col-lg-10" type="number" name="discountRM"></input>
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                      <label for="payMethod"></label>
                      <select class="select-box-2 col-lg-10 col-md-10" name="payMethod">
                        <option></option>
                        <option value="AL">card</option>
                        <option value="WY">cash</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-lg-6 col-md-6 form-group">
                      Grand total (RM)
                    </div>
                    <div class="col-lg-6 col-md-6 form-group">
                      Enter amount tendered
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-6 col-md-6">
                      <label for="grandTotal"></label>
                      <input class="col-md-10 col-lg-10" type="number" name="grandTotal" disabled></input>
                    </div>
                    <div class="form-group col-lg-6 col-md-6">
                      <label for="amountTendered"></label>
                      <input class="col-md-10 col-lg-10" type="number" name="amountTendered"></input>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-lg-6 col-md-6 form-group">
                      Change (RM)
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-6 col-md-6">
                      <label for="changeAmount"></label>
                      <input class="col-md-10 col-lg-10" type="number" name="changeAmount" disabled></input>
                    </div>
                  </div>
                  <div class="form-row ">
                    <div class="form-group btn-row">
                      <button class="btn btn-success btn-left-style btn-confirm-style" type="button">Confirm transaction</button>
                      <button class="btn btn-danger btn-reset" type="reset">Reset</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>




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
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin.min.js"></script>
            <!-- Custom scripts for this page-->
            <script src="tsForm.js"></script>
          </div>
        </body>

        </html>
