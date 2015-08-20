<!DOCTYPE html>
<!-- saved from url=(0044)http://getbootstrap.com/examples/dashboard/# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/naso_icon.png">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
   <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
         <link rel="stylesheet" type="text/css" href="css/customdash.css" media="screen">
    <link href="http://getbootstrap.com/examples/sticky-footer/sticky-footer.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/dashboard/dashboard.css" rel="stylesheet">
    
 <link href="css/animate.css" rel="stylesheet" type="text/css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./Dashboard Template for Bootstrap_files/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style type="text/css"></style>
  
  
     	 <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
    	 <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.0-beta.1/angular-animate.js"></script>
         <script src="js/angular.min.js"></script>
  
 
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index2.html"><img id="naso " style="height:35px;width:40px; display:inline-block;"src="images/naso_icon.png"/>&nbsp;Tamil Reader's Association</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="./Dashboard Template for Bootstrap_files/Dashboard Template for Bootstrap.html">Welcome Admin!</a></li>
  
            <li><a href="./Dashboard Template for Bootstrap_files/Dashboard Template for Bootstrap.html">logout</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid" ng-app="" ng-controller="mainController" >
      
      
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
         
            <li class="active"><a  href="#listuser" ng-click="clicked1()">TRA Users</a></li>
            <li class="active"><a  href="#listadmin" ng-click="clicked2()">TRA Admins</a></li>
    
          </ul>
   
        </div>
        
        
        
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" ng-app="" ng-show="myVar">
          

          

          <h2 class="sub-header">List of Users</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Role</th>
                  <th>Contact Number</th>
                  <th>Email id</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>Lorem</td>
                  <td>ipsum</td>
                  <td>dolor</td>
                  <td>sit</td>
                  <td>ash@gmail.com</td>
                </tr>
                <tr>
                  <td>1,002</td>
                  <td>amet</td>
                  <td>consectetur</td>
                  <td>adipiscing</td>
                  <td>elit</td>
                  <td>ram@gmail.com</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>Integer</td>
                  <td>nec</td>
                  <td>odio</td>
                  <td>Praesent</td>
                  <td>priya@gmail.com</td>
                </tr>
               
                <tr>
                  <td>1,004</td>
                  <td>dapibus</td>
                  <td>diam</td>
                  <td>Sed</td>
                  <td>nisi</td>
                  <td>ash@gmail.com</td>
                </tr>
                <tr>
                  <td>1,005</td>
                  <td>Nulla</td>
                  <td>quis</td>
                  <td>sem</td>
                  <td>at</td>
                  <td>ash@gmail.com</td>
                </tr>
                <tr>
                  <td>1,006</td>
                  <td>nibh</td>
                  <td>elementum</td>
                  <td>imperdiet</td>
                  <td>Duis</td>
                  <td>ash@gmail.com</td>
                </tr>
               
              </tbody>
            </table>
          </div>
                 <button class="btn btn-success" style="position:relative; top:70px;" ng-click="clickuser()">
                 Create New User
                 </button>
                 
                 <button class="btn btn-success" style="position:relative; left:70px; top:70px">
                 <span class="glyphicon"></span> Delete Existing User
                 </button>
        </div>
        
        
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" ng-app="" ng-show="myVar2">
          

          

          <h2 class="sub-header">List of Admins</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Role</th>
                  <th>Contact Number</th>
                  <th>Email id</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Aswin</td>
                  <td>Kumar</td>
                  <td>dolor</td>
                  <td>sit</td>
                  <td>ash@gmail.com</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Ram</td>
                  <td>Kartik</td>
                  <td>adipiscing</td>
                  <td>elit</td>
                  <td>ram@gmail.com</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>Integer</td>
                  <td>nec</td>
                  <td>odio</td>
                  <td>Praesent</td>
                  <td>ash@gmail.com</td>
                </tr>
               
                <tr>
                  <td>1,004</td>
                  <td>dapibus</td>
                  <td>diam</td>
                  <td>Sed</td>
                  <td>nisi</td>
                  <td>ash@gmail.com</td>
                </tr>
                <tr>
                  <td>1,005</td>
                  <td>Nulla</td>
                  <td>quis</td>
                  <td>sem</td>
                  <td>at</td>
                  <td>ash@gmail.com</td>
                </tr>
                <tr>
                  <td>1,006</td>
                  <td>nibh</td>
                  <td>elementum</td>
                  <td>imperdiet</td>
                  <td>Duis</td>
                  <td>ash@gmail.com</td>
                </tr>
               
              </tbody>
            </table>
          </div>
                <a href="adminreg.html"> <button class="btn btn-success" style="position:relative; top:70px; ">
                 Create New Admin
                 </button>
                </a> 
                 <button class="btn btn-success" style="position:relative; left:70px; top:70px">
                 <span class="glyphicon"></span> Delete Existing User
                 </button>
        </div><!--second div-->
        
        
        
     
        
         <form id="form2" class="form-horizontal check-element animate-show" role="form"  ng-app="" name="myForm2" novalidate ng-show="form2" ng-animate="{show: 'fadeIn'}" style="position:relative;top:100px;">
       
            <h2 class="sub-header text-center" style="position:relative;bottom:30px;">User Registration form</h2>
       
       <div class="form-group" >
            <label class="control-label col-sm-5 col-md-5 col-lg-5" for="fnd">First Name:</label>
            
             <div class="col-sm-3 col-md-3 col-lg-3">          
             <input type="text"  style="background-color:white;" class="form-control" id="fnd" placeholder="Enter First Name" name="fnd" ng-model="fnd" required>
             </div>
     
              <div id="validation" style="float:left;">
              	<span  style="color:red" ng-show="myForm2.fnd.$dirty && myForm2.fnd.$invalid">
                <span ng-show="myForm2.fnd.$error.required">First Name is required.</span>
                </span>
              </div>
          </div>
          
          
          
            <div class="form-group">
            <label class="control-label col-sm-5 col-md-5 col-lg-5" for="lnd">Last Name:</label>
            
             <div class="col-sm-3 col-md-3 col-lg-3">          
             <input type="text"  style="background-color:white;" class="form-control" id="lnd" placeholder="Enter Last Name" name="lnd" ng-model="lnd" required>
             </div>
     
              <div id="validation" style="float:left;">
              	<span  style="color:red" ng-show="myForm2.lnd.$dirty && myForm2.lnd.$invalid">
                <span ng-show="myForm2.lnd.$error.required">Last Name is required.</span>
               </span>
              </div>
          </div>
       
        <div class="form-group">
    	
           <label class="control-label col-sm-5 col-md-5 col-lg-5" for="email">Email:</label>
            
            <div class="col-sm-3 col-md-3 col-lg-3" >
            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" ng-model="email" required>
            </div>
       
            <div id="validation" style="float:left;">
       	       <span  style="color:red" ng-show="myForm2.email.$dirty && myForm2.email.$invalid">
               <span ng-show="myForm2.email.$error.required">Email is required.</span>
           	   <span ng-show="myForm2.email.$error.email">Invalid email address.</span>
           	   </span>
       		</div>
        
          </div>
          
         <div class="form-group">
            <label class="control-label col-sm-5 col-md-5 col-lg-5" for="pwd">Password:</label>
            
             <div class="col-sm-3 col-md-3 col-lg-3">          
             <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" ng-model="pwd" required>
             </div>
     
              <div id="validation" style="float:left;">
              	<span  style="color:red" ng-show="myForm2.pwd.$dirty && myForm2.pwd.$invalid">
                <span ng-show="myForm2.pwd.$error.required">Password is required.</span>
                </span>
              </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-sm-5 col-md-5 col-lg-5" for="rol">Role:</label>
            
             <div class="col-sm-3 col-md-3 col-lg-3">          
             <input type="text"  style="background-color:white;" class="form-control" id="lnd" placeholder="Enter Role" name="rol" ng-model="rol" required>
             </div>
     
              <div id="validation" style="float:left;">
              	<span  style="color:red" ng-show="myForm2.rol.$dirty && myForm2.rol.$invalid">
                <span ng-show="myForm2.rol.$error.required">Optional.</span>
               </span>
              </div>
          </div>
          
          
          <div class="form-group">
            <label class="control-label col-sm-5 col-md-5 col-lg-5" for="cnt">Contact Number:</label>
            
             <div class="col-sm-3 col-md-3 col-lg-3">          
             <input type="text"  style="background-color:white;" class="form-control" id="cnt" placeholder="Enter Contact Number" name="cnt" ng-model="cnt" required>
             </div>
     
              <div id="validation" style="float:left;">
              	<span  style="color:red" ng-show="myForm2.cnt.$dirty && myForm2.cnt.$invalid">
                <span ng-show="myForm2.cnt.$error.required">Contact Number is required.</span>
               </span>
              </div>
          </div>
          
          
     
             
            <div class="form-group text-center">        
             
             <a  href="#" class="btn-lg shake sub submit" >Submit </a>
             <a  href="#" class="btn-lg shake sub back" ng-click="clickback()">Back </a>
             
           </div>
         
      </form>
        
        
        
        
        
        
        
        
        
        </div>
    </div>
    
    
    
    
    
    
    
    
      <footer class="footer">
      <div class="container">
        <p class="text-center text-muted">Copyrights Nasotech 2015</p>
      </div>
    </footer>
    
<script>
function mainController($scope) {

    $scope.myVar = true;
    $scope.myVar2 = false;
    $scope.form2 = false;
    

    $scope.clicked2 = function() {
        
    $scope.myVar = false;
    $scope.myVar2 = true;
    $scope.form2 = false;
    
    };
    
      $scope.clicked1 = function() {
        
    $scope.myVar2 = false;
    $scope.myVar = true;
    
    };
  
     $scope.clickuser = function() {
        
    $scope.myVar2 = false;
    $scope.myVar = false;
    $scope.form2 = true;
    
    };
  
  
  
  
     $scope.clickback = function() {
        
    $scope.myVar = true;
    $scope.myVar2 = false;
    $scope.form2 = false;
    
    };
  
}
</script> 
    
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./Dashboard Template for Bootstrap_files/jquery.min.js"></script>
    <script src="./Dashboard Template for Bootstrap_files/bootstrap.min.js"></script>
    <script src="./Dashboard Template for Bootstrap_files/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./Dashboard Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
  
    


</body>
</html>