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
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../assets/css/vendors/animate.css">
  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
  <style>
    .b-example-divider {
  height: 3rem;
  background-color: rgba(0, 0, 0, .1);
  border: solid rgba(0, 0, 0, .15);
  border-width: 1px 0;
  box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
}

.bi {
  vertical-align: -.125em;
  fill: currentColor;
}

.rounded-4 { border-radius: .5rem; }
.rounded-5 { border-radius: .75rem; }
.rounded-6 { border-radius: 1rem; }

.modal-sheet .modal-dialog {
  width: 380px;
  transition: bottom .75s ease-in-out;
}
.modal-sheet .modal-footer {
  padding-bottom: 2rem;
}

.modal-alert .modal-dialog {
  width: 380px;
}

.border-right { border-right: 1px solid #eee; }

.modal-tour .modal-dialog {
  width: 380px;
}


  </style>
</head>

<body>
  <?php
    require('../includes/db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            // Redirect to user login page
            header("Location: login.php");
        }
    } else {
?>
  <!-- login page start-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-7 animated easeIn"><img class="bg-img-cover bg-center" src="../assets/images/login/login.png" alt="looginpage"></div>
      <div class="col-xl-5 p-0">
        <div class="login-card">
          <div>
            <div><a class="logo text-start" href="dashboard.html"><img class="img-fluid for-light"
                  src="../assets/images/logo/nova.png" alt="looginpage"><img class="img-fluid for-dark"
                  src="../assets/images/logo/nova.png" alt="looginpage"></a></div>
            <div class="login-main">
              <form class="theme-form" method="post" action="" name="login">
                <h4>Sign in to account</h4>
                <p>Enter your Username & password to login</p>
                <div class="form-group">
                  <label class="col-form-label">Username</label>
                  <input class="form-control" type="text" required="" placeholder="Nicky" name="username" id="username">
                </div>
                <div class="form-group">
                  <label class="col-form-label">Password</label>
                  <div class="form-input position-relative">
                    <input class="form-control" type="password" name="password" required=""
                      placeholder="*********" id="passWord">
                  </div>
                </div>
                <div class="form-group mb-0">
                  <div class="checkbox p-0">
                    <input id="checkbox1" type="checkbox">
                    <label class="text-muted" for="checkbox1">Remember password</label>
                  </div><a class="link" href="forget-password.html">Forgot password?</a>
                  <div class="text-end mt-3">
                    <button class="btn btn-primary btn-block w-100" type="submit" name="submit">Sign In</button>
                  </div>
                </div>
                <!-- <h6 class="text-muted mt-4 or">Or Sign in with</h6>
                <div class="social mt-4">
                  <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login"
                      target="_blank"><i class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a
                      class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i
                        class="txt-twitter" data-feather="twitter"></i>twitter</a><a class="btn btn-light"
                      href="https://www.facebook.com/" target="_blank"><i class="txt-fb"
                        data-feather="facebook"></i>facebook</a></div>
                </div> -->
                <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="sign-up.php">Create
                    Account</a></p>
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
  <script>
    //Checking if user is logged in
    // let userCheck = JSON.parse(localStorage.getItem("loggedUdetails"))
    // if (userCheck != null) {
    //   history.back()
    // }
    function sendDetails() {

      details = JSON.parse(localStorage.getItem("userDetails"))
      var mail = eMail.value;
      var loggedInUser = details.find((myDetails)=>myDetails.mail == mail)
      var logedUser = details.indexOf(loggedInUser)
      firstName = details[logedUser].firstName
      lastName = details[logedUser].lastName
      acctNo = details[logedUser].acctNo
      phoneNumber = details[logedUser].phoneNumber
      defBal = details[logedUser].defBal
      userBvn = details[logedUser].userBvn
      dOfbirth = details[logedUser].dOfbirth
      userAddress = details[logedUser].userAddress;
      userState = details[logedUser].userState;
      user={mail, firstName, lastName, acctNo, phoneNumber, defBal, userBvn, dOfbirth, userAddress, userState}
      //alert(logedUser)
      logUserd = localStorage.setItem("loggedUdetails",JSON.stringify(user))


      if (loggedInUser) {
        //alert("Its okay")
      }
      var pasword = passWord.value;
      // var details = [];
      // console.log(details[0].pasword);
      // console.log(details); 
      for(u=0; u < details.length; u++) {
        if((details[u].mail==mail) && (details[u].pasword==pasword)) {
         alert('login is successful')
         // console.log(details[u].pasword);
         location.href = "dashboard.html"
         // console.log("wrong");
         break;
       }
       
       else if ((details[u].mail != mail) && ( details[u].pasword!= pasword)) {
          alert("You have entered invalid details");
          // console.log("right");
        
        }
      }
    }
  </script>
  <!-- Tawk.to Support -->
  <script src="../assets/js/support.js"></script>
  <script src="../assets/js/animation/animate-custom.js"></script>
<?php
  }
?>
</body>

</html>