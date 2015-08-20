<!DOCTYPE HTML>
<html lang="en" >
	
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  
    <title>Tamil Readers' Association</title>
        
        	 <link rel="shortcut icon" href="images/naso_icon.png">
        	<link href="css/bootstrap.min.css" rel="stylesheet">
        	<link href="css/bootstrap.css" rel="stylesheet">

            <link href="css/animate.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" type="text/css" href="css/custom2.css" media="screen">
            
    	 <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
    	 <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.0-beta.1/angular-animate.js"></script>
         <script src="js/angular.min.js"></script>
         
</head>     
   
<body>
	
	
<div id="home" >
        
  
     
        <div class="container" ng-app="" ng-controller="personController">
           
           <div class="container text-center" id="head1">
            
                <h1>TAMIL READER'S ASSOCIATION</h1>
                <p id="online" class="text-nowrap col-md-12">- Online Library portal</p>
                
                <a id="sign1" href="#signin" class="btn-lg shake anch" ng-click="clicked()" ng-show="Var">Sign In </a>
                <a id="sign2" href="#signup" class="btn-lg shake anch" ng-click="clicked2()" ng-show="Var2">Sign Up </a>
                
                <!--<button type="button" class="btn btn-default" ng-click="toggle()">Sign In</button>-->
           </div>
            
          
<div class="container" >
            	
    <form id="form1" class="form-horizontal check-element animate-show" role="form"  ng-app="" name="myForm" novalidate ng-show="myVar" ng-animate="{show: 'fadeIn'}">
        
        
        <div class="form-group">
    	
           <label class="control-label col-sm-5 col-md-5 col-lg-5" for="email">Email:</label>
            <div class="col-sm-3 col-md-3 col-lg-3" >
            <input type="email"  class="form-control" id="email" placeholder="Enter Email" name="email" ng-model="email" required>
            </div>
       
            <div id="validation" style="float:left;">
       	       <span  style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
               <span ng-show="myForm.email.$error.required">Email is required.</span>
           	   <span ng-show="myForm.email.$error.email">Invalid email address.</span>
           	   </span>
       		</div>
        
        </div>
          
        <div class="form-group">
            
            <label class="control-label col-sm-5 col-md-5 col-lg-5" for="pwd">Password:</label>
             <div class="col-sm-3 col-md-3 col-lg-3">          
             <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" ng-model="pwd" required>
             </div>
     
              <div id="validation" style="float:left;">
              	<span  style="color:red" ng-show="myForm.pwd.$dirty && myForm.pwd.$invalid">
                <span ng-show="myForm.pwd.$error.required">Password is required.</span>
                </span>
              </div>
        </div>
          
         
          <div class="form-group">        
      
              <div class="col-sm-offset-5 col-sm-5">
              <div class="checkbox">
                  <label><input type="checkbox"> Remember me</label>
              </div>
              </div>
          </div>
      
 
              
            <div class="form-group text-center">        
             
             <a  href="#" class="btn-lg shake sub submit" ng-disabled="myForm.email.$dirty && myForm.email.$invalid ||
  myForm.pwd.$dirty && myForm.pwd.$invalid ">Submit </a>
             <a  href="#" class="btn-lg shake sub back" ng-click="clicked3()">Back </a>
             
         </div>
        
    </form>
   
    </div>
   
   
   
   
   
     <div class="container" >
            	
    <form id="form2"  method="post" action="process.php" class="form-horizontal check-element animate-show" role="form"  ng-app="" name="myForm2" novalidate ng-show="myVar2" ng-animate="{show: 'fadeIn'}">
       
      
       
       <div class="form-group">
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
              	<span  style="color:red" ng-show="myForm2.pwd.$dirty && myForm.pwd.$invalid">
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
             
              <a  href="javascript: submitform()" class="btn-lg shake sub submit" >Submit </a></input>
            
             <a  href="#" class="btn-lg shake sub back" ng-click="clicked3()">Back </a>
             
           </div>
         
      </form>
   
     </div>
   
   
  </div>
  
</div>
           




<script>
function personController($scope) {

    $scope.myVar = false;
    $scope.myVar2 = false;
    
    $scope.Var=true;
    $scope.Var2=true;
    $scope.clicked = function() {
          $scope.myVar = true;
          $scope.Var=false;
          $scope.Var2=false;
    };
    
    
    
     $scope.clicked2 = function() {
          $scope.myVar2 = true;
          $scope.Var2=false;
          $scope.Var=false;
         
    };
    
    
     $scope.clicked3 = function() {
          $scope.myVar = false;
          $scope.myVar2 = false;
          
          $scope.Var2=true;
          $scope.Var=true;
         
    };
    
    
    
}



function submitform()
{
document.forms["form2"].submit();
}
</script> 
    

    <script src="js/bootstrap.min.js"></script>

    

</body>
</html>