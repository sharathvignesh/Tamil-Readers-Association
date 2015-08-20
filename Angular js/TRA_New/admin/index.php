<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
 <link rel="shortcut icon" href="../img/photo.jpg">
    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
      <link rel="stylesheet" href="../css/ng-scrollbar.min.css" >
      


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
    .scrollme {
      max-height: 200px;
    }
  </style>
  
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>
         <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
         <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.0-beta.1/angular-animate.js"></script>
         <script src="../js/angular.min.js"></script>
           <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular-sanitize.min.js"></script>
          
    <script src="../js/ng-scrollbar.js"></script>
          <script src="../js/jquery.js"></script>
      <script src="../js/dashboard.js"></script>

    
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
          <a class="navbar-brand" href="../index.php"><img src="../img/photo.jpg"/ style="height:38px;">&nbsp;Tamil Reader's Association</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Username</a></li>
            <li><a href="#">Role</a></li>
            <li><a href="#">Logout</a></li>
          </ul>
          
        </div>
      </div>
    </nav>

    <div class="container-fluid" ng-app="myApp" ng-controller="mainController">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li id="admin_button"><a href="#">Admin<span class="sr-only">(current)</span></a></li>
            <li id="user_button"><a href="#">User</a></li>
          </ul>
        </div>
        <div class="admin">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>
          <h2 class="sub-header">Admins</h2>
            
          <a href="admin_reg.html"> <button type="button" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add New Admin
            </button></a>
            <button type="button" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete User
            </button>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>FirstName</th>
                  <th>LastName</th>
                  <th>Role</th>
                  <th>Email id</th>
                  <th>Contact#</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>Lorem</td>
                  <td>ipsum</td>
                  <td>dolor</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>1,002</td>
                  <td>amet</td>
                  <td>consectetur</td>
                  <td>adipiscing</td>
                  <td>elit</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>Integer</td>
                  <td>nec</td>
                  <td>odio</td>
                  <td>Praesent</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>libero</td>
                  <td>Sed</td>
                  <td>cursus</td>
                  <td>ante</td>
                </tr>
                <tr>
                  <td>1,004</td>
                  <td>dapibus</td>
                  <td>diam</td>
                  <td>Sed</td>
                  <td>nisi</td>
                </tr>
                <tr>
                  <td>1,005</td>
                  <td>Nulla</td>
                  <td>quis</td>
                  <td>sem</td>
                  <td>at</td>
                </tr>
                <tr>
                  <td>1,006</td>
                  <td>nibh</td>
                  <td>elementum</td>
                  <td>imperdiet</td>
                  <td>Duis</td>
                </tr>
          
              </tbody>
            </table>
          </div>
        </div>
        </div>
          
       <div class="user" ng-app="" ng-show="myVar">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>
          <h2 class="sub-header">Users</h2>
            
          
            <button type="button" class="btn btn-default btn-lg" ng-click="deluser()">
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete User
            </button>

          <div class="table-responsive scrollme">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>FirstName</th>
                  <th>LastName</th>
                  <th>Role</th>
                  <th>Email id</th>
                  <th>Contact#</th>
                </tr>
              </thead>
              <tbody>
        
                <tr ng-repeat="x in names">
    <td>{{ x.id }}</td>
    <td>{{ x.first_name }}</td>
    <td>{{ x.last_name }}</td>
    <td>{{ x.role}}</td>
    <td>{{ x.email }}</td>
    <td>{{ x.phone }}</td>
  </tr>
              </tbody>
            </table>
          </div>
        </div>
       </div>
       
       
         
        
         <form id="formdel" class="form-horizontal check-element animate-show" method="post" action="../Delete.php" role="form"  ng-app="" name="myForm3" novalidate ng-show="formdel" ng-animate="{show: 'fadeIn'}" style="position:relative;top:50px;">
       
            <h2 class="sub-header text-center" style="position:relative;bottom:40px;">Delete User</h2>
       
      
      
      
       <div class="form-group">
            <label class="control-label col-sm-5 col-md-5 col-lg-5" for="id1">id:</label>
            
             <div class="col-sm-3 col-md-3 col-lg-3">          
             <input type="text"  style="background-color:white;" class="form-control" id="id1" placeholder="Enter Id" name="id1" ng-model="id1" required>
             </div>
     
              <div id="validation" style="float:left;">
                <span  style="color:red" ng-show="myForm3.id1.$dirty && myForm3.id1.$invalid">
                <span ng-show="myForm3.id1.$error.required">Id is required.</span>
               </span>
              </div>
          </div>
      
      
       <div class="form-group" >
            <label class="control-label col-sm-5 col-md-5 col-lg-5" for="fnd2">First Name:</label>
            
             <div class="col-sm-3 col-md-3 col-lg-3">          
             <input type="text"  style="background-color:white;" class="form-control" id="fnd2" placeholder="Enter First Name" name="fnd2" ng-model="fnd2" required>
             </div>
     
              <div id="validation" style="float:left;">
                <span  style="color:red" ng-show="myForm3.fnd2.$dirty && myForm3.fnd2.$invalid">
                <span ng-show="myForm3.fnd2.$error.required">Optional.</span>
                </span>
              </div>
          </div>
          
          
          
           
       
       
          
     
             
            <div class="form-group text-center">        
             
             <a  href="javascript: submitform2()" class="btn-lg shake sub submit" >Submit </a>
             <a  href="#" class="btn-lg shake sub back" ng-click="clickback()">Back </a>
             
           </div>
         
      </form>
        
      </div>
    </div>

   <footer class="footer">
      <div class="container">
        <p class="text-muted">Copyright ©2015 Nasotech LLC | All Rights Reserved</p>
      </div>
   </footer>
   
   
   <script>

var app = angular.module("myApp", ['ngSanitize', 'ngScrollbar']);

app.controller("mainController", function($scope,$http) {
        $scope.$on('scrollbar.show', function(){
      console.log('Scrollbar show');
    });

    $scope.$on('scrollbar.hide', function(){
      console.log('Scrollbar hide');
    });
    
    
           $scope.deluser = function() {
        
       $scope.myVar = false;
    $scope.formdel = true;
    
    
    };
    
      
  
     $scope.clickback = function() {
        
    $scope.myVar = true;

     $scope.formdel = false;
    
    };
    

   $http.get("test_json.php")
    .success(function(response) {$scope.names = response;});
});


function submitform2()
{
document.forms["formdel"].submit();
}
</script> 
  </body>
</html>
