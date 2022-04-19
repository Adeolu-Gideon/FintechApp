$("#bal").hide();
      $("#hide").on("click", 
      function(){
        $("#bal, #hidebal").toggle();
      }
        
      );
    

   //Checking if user is logged in
  let userCheck = JSON.parse(localStorage.getItem("loggedUdetails"))
  if (userCheck == null) {
    location.href = "login.html"
  }
  
  var dLogU = JSON.parse(localStorage.getItem("loggedUdetails"))
  var user = JSON.parse(localStorage.getItem("userDetails"))
  var loggedInUser = user.find((myDetails) => myDetails.mail == mail)
  var logedUser = user.indexOf(loggedInUser) +1
  console.log(logedUser)
    // var User = user[0].firstName+" "+user[0].lastName 
    greetings.innerHTML = `Welcome dear ${dLogU.firstName+" "+dLogU.lastName} `

  var user = JSON.parse(localStorage.getItem("userDetails"))
    // var User = user[0].acctNo 
    Acct.innerHTML = `${dLogU.acctNo} `
    bal.innerHTML = `N${dLogU.defBal} `
  function logOut(){
    if(confirm("Are You Sure You Want To Logout?")){
      location.href = "login.html"
    }
       
  }