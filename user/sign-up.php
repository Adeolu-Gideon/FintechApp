<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
  <meta name="keywords"
    content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="pixelstrap">
  <link rel="icon" href="../assets/images/logo/logo-icon.png" type="image/x-icon">
  <link rel="shortcut icon" href="../assets/images/logo/logo-icon.png" type="image/x-icon">
  <title>Novatify Fintech</title>
  <!-- Google font-->
  <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
    rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
  <!-- ico-font-->
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/icofont.css">
  <!-- Themify icon-->
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/themify.css">
  <!-- Flag icon-->
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/flag-icon.css">
  <!-- Feather icon-->
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/feather-icon.css">
  <!-- Plugins css start-->
  <!-- Plugins css Ends-->
  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">
  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="../assets/css/custom.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
</head>

<body>
  <?php
    require('../includes/db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($conn, $username);
        $fName = mysqli_real_escape_string($conn, $_POST['fName']);
        $lName = mysqli_real_escape_string($conn, $_POST['lName']);
        $phoneNo = mysqli_real_escape_string($conn, $_POST['phoneNo']);
        $acctNo = rand();
        $defBal = 7000;
        $uBvn = mysqli_real_escape_string($conn, $_POST['uBvn']);
        $dOb = mysqli_real_escape_string($conn, $_POST['dOb']);
        $uAddress = mysqli_real_escape_string($conn, $_POST['uAddress']);
        $uState = mysqli_real_escape_string($conn, $_POST['uState']); 
        $eMail    = stripslashes($_REQUEST['eMail']);
        $eMail    = mysqli_real_escape_string($conn, $eMail);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query1 = "INSERT into `users` (username, fName, lName, eMail, phoneNo, acctNo, defBal, uBvn, dOb, uAddress, uState, password, create_datetime)
                     VALUES ('$username', '$fName', '$lName', '$eMail', '$phoneNo', '$acctNo', '$defBal', '$uBvn', '$dOb', '$uAddress', '$uState', '" . md5($password) . "', '$create_datetime')";
        $query2 = "CREATE TABLE passbook_$acctNo
					          (id INT(255) AUTO_INCREMENT PRIMARY KEY, 
					          Transaction_id VARCHAR(255) NULL,
					          Transaction_date VARCHAR(255) NULL,
					          Description VARCHAR(255) NULL,
					          Cr_amount VARCHAR(255) NULL,
					          Dr_amount VARCHAR(255) NULL,
					          Net_Balance VARCHAR(255) NULL,
					          Remark VARCHAR(255) NULL)";
        $query3 = "CREATE TABLE beneficiary_$acctNo (id INT(255) AUTO_INCREMENT PRIMARY KEY, 
					          Beneficiary_name VARCHAR(255) NULL,
					          Beneficiary_ac_no VARCHAR(255) NULL,
					          Date_added VARCHAR(255) NULL)";
        if($conn->query($query1) == TRUE && $conn->query($query2) == TRUE  && $conn->query($query3) == TRUE){
						
						$transaction_id = mt_rand(100,999).mt_rand(1000,9999).mt_rand(10,99);

						$sql = "INSERT into passbook_$acctNo (Transaction_id,Transaction_date,Description,Cr_Amount,Dr_Amount,Net_Balance) 
						VALUES ('$transaction_id','$create_datetime','Account Opening','0','0','0') ";
						$conn->query($sql);
					
					$conn->commit();
          echo '<script>alert("Account Created Successfully\n\nAccount no :'.$acctNo.'\n\nHint : Get Debit Card then register e-banking")</script>';
				
				}
				else
						{
	
							
							echo "Error Creating Account<br><br>".$conn->error;	
							$conn->rollback();	
							
	
				}
		}
		else{

			echo "<br><br>".$conn->error;

		}
	

	

?>
  <!-- signup page start-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-7"><img class="bg-img-cover bg-center" src="../assets/images/ecommerce/mobilepay.png"
          alt="looginpage"></div>
      <div class="col-xl-5 p-0">
        <div class="login-card">
          <div>
            <div><a class="logo text-start" href="index.html"><img class="img-fluid for-light"
                  src="../assets/images/logo/nova.png" alt="looginpage"><img class="img-fluid for-dark"
                  src="../assets/images/logo/nova.png" alt="looginpage"></a>
            </div>
            
            <div class="login-main">
              <form class="theme-form" action="" method="post">
                <h4>Create your account</h4>
                <p>Enter your personal details to create account</p>
                <div class="form-group">
                  <label class="col-form-label">Username</label>
                  <div class="form-input position-relative">
                    <input class="form-control" type="text" name="username" required=""
                      placeholder="Nicky" id="username">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-form-label pt-0">Full Name</label>
                  <div class="row g-2">
                    <div class="col-6">
                      <input class="form-control" type="text" required="" placeholder="First name" name="fName" id="fName">
                    </div>
                    <div class="col-6">
                      <input class="form-control" type="text" required="" placeholder="Last name" name="lName" id="lName">
                    </div>
                  </div>
                </div>
                <div class="row g-2">
                  <div class="col-4">
                    <label class="col-form-label">Email Address</label>
                    <input class="form-control" type="email" required="" placeholder="Test@gmail.com" name="eMail" id="eMail">
                  </div>
                  <div class="col-4">
                    <label class="col-form-label">Phone Number</label>
                    <input class="form-control" type="tel" required="" placeholder="Phone Number" name="phoneNo" id="phoneNo" minlength="11" maxlength="11">
                  </div>
                  <div class="col-4">
                    <label class="col-form-label">BVN</label>
                    <input class="form-control" type="text" required="" placeholder="Enter Your BVN" name="uBvn" id="uBvn" minlength="11" maxlength="11">
                  </div>
                </div>
                <div class="row g-2">
                  <div class="col-4">
                    <label class="col-form-label">Date of Birth</label>
                    <input class="form-control" type="date" required="" placeholder="Enter Your Address" name="dOb" id="dOb">
                  </div>
                  <div class="col-4">
                    <label class="col-form-label">Address</label>
                    <input class="form-control" type="text" required="" placeholder="Enter Your State" name="uAddress" id="uAddress" minlength="3" maxlength="50">
                  </div>
                  <div class="col-4">
                    <label class="col-form-label">State</label>
                    <input class="form-control" type="text" required="" placeholder="Enter Your State" name="uState" id="uState" minlength="3" maxlength="15">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-form-label">Password</label>
                  <div class="form-input position-relative">
                    <input class="form-control" type="password" name="password" required=""
                      placeholder="*********" id="passWord">
                  </div>
                </div>
                <div class="form-group mb-0">
                  <!-- <div class="checkbox p-0">
                    <input id="checkbox1" type="checkbox">
                    <label class="text-muted" for="checkbox1">Agree with<a class="ms-2" href="#">Privacy
                        Policy</a></label>
                  </div> -->
                  <button class="btn btn-primary btn-block w-100" type="submit" name="submit">Create Account</button>
                </div>
                <!-- <h6 class="text-muted mt-4 or">Or signup with</h6>
                <div class="social mt-4">
                  <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login"
                      target="_blank"><i class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a
                      class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i
                        class="txt-twitter" data-feather="twitter"></i>twitter</a><a class="btn btn-light"
                      href="https://www.facebook.com/" target="_blank"><i class="txt-fb"
                        data-feather="facebook"></i>facebook</a></div>
                </div> -->
                <p class="mt-4 mb-0">Already have an account?<a class="ms-2" href="login.php">Sign in</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- latest jquery-->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="../assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <!-- Sidebar jquery-->
    <script src="../assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../assets/js/script.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
  </div>

  
  <!-- Tawk.to Support -->
  <script src="../assets/js/support.js"></script>

</body>

</html>