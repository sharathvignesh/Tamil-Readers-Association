<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../img/photo.jpg">

    <title>{$username} profile</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
      <link href="css/registration.css" rel="stylesheet">
      <link href="css/font-awesome.min.css" rel="stylesheet">

   
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/try.js"></script>
    <script src="js/registration.js"></script>
    

  </head>

  <body>
        <div class="container"> 
         <div class="row">
          <div class="col-lg-8 col-xs-12 heading" style="margin-left: 294px;">
           <h1 class="admin_heading" style="color:rgb(83, 145, 153); font-size: 50px; font-weight: 800;">{$username} profile </h1>
          </div>
         </div>
            <br>
            <form action="update.php" method="post">
            <div class="row" style="margin-top: 88px;">
             <div class="col-lg-3 col-lg-push-3">
             <pre style="font-size:22px;">First Name           </pre>
             </div>
            <div class="col-lg-6 col-lg-push-3">    
            <input type="text" name="firstname" required="required" placeholder="" value={$firstname} class="form-control" style="width:43%;">
            </div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-3">
             <pre style="font-size:22px;"> Last Name           </pre>
             </div>
            <div class="col-lg-6 col-lg-push-3">    
            <input type="text" name="lastname" required="required" placeholder="" value={$lastname} class="form-control" style="width:43%;">
            </div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-3">
             <pre style="font-size:22px;"> User Name</pre>
             </div>
            <div class="col-lg-6 col-lg-push-3">    
            <input type="text" name="username" required="required" placeholder="" value={$username} class="form-control" style="width:43%;">
            </div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-3">
             <pre style="font-size:22px;">      Role</pre>
             </div>
            <div class="col-lg-6 col-lg-push-3">    
            <input type="text" name="role" required="required" placeholder="" disabled value={$role} class="form-control" style="width:43%;">
            </div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-3">
             <pre style="font-size:22px;">   Address</pre>
             </div>
            <div class="col-lg-6 col-lg-push-3">    
            <input type="text" name="address" required="required" placeholder="" value={$address} class="form-control" style="width:43%; height:100px;">
            </div>
            </div>
            <br>
            <div class="row">
             <div class="col-lg-3 col-lg-push-2">
             <pre style="font-size:22px;">      Phone Number</pre>
             </div>
            <div class="col-lg-6 col-lg-push-3">    
            <input type="text" name="phone" required="required" placeholder="" value={$phone} class="form-control" style="width:43%;">
            </div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-3">
             <pre style="font-size:22px;">  Email-id</pre>
             </div>
            <div class="col-lg-6 col-lg-push-3">    
            <input type="text" name="email" required="required" placeholder="" value={$email} class="form-control" style="width:43%;">
            </div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-2">
             <pre style="font-size:22px;">    Account Status</pre>
             </div>
            <div class="col-lg-6 col-lg-push-3">    
            <input type="text" name="status" value={$status} placeholder="" class="form-control" style="width:43%;">
            </div>
            </div>
                
            <div class="row" style="margin-top: 36px;">
                <div class="col-md-6 col-md-push-5">
                 <button type="submit" class="btn btn-info">UPDATE</button>
                </div>
                <div class="col-md-6">
                <a href="index.php"><button type="button" class="btn btn-info">CANCEL</button></a>
                </div>
            </div>
            </form>    
        </div>
 

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
