<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>User Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/userprofile.css" rel="stylesheet">
      
      <script src="js/jquery.js"></script>
      <script src="js/userprofile.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      
      
      
      
    <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #00ba8b;">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="img/photo.jpg"/ style="height:38px;"> WELCOME TO YOUR PROFILE!</a>
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

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li id="account_button"><a href="#">Account<span class="sr-only">(current)</span></a></li>
            <li id="books_button"><a href="#">My Books</a></li>
            <li id="search_button"><a href="#">Search</a></li>  
          </ul>
        </div>
        <div class="account">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Account Info</h1>  
            <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="img/download.svg" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>User Name</h4>
             <div class="table-responsive" style="margin-top: 36px;">
            <table class="table table-striped">
              <tbody>
                <tr>
                  <td>Username </td>
                  <td>sharath</td>
                </tr>
                  <tr>
                  <td>Address </td>
                  <td>65,12th cross street,
                      senthil nagar,
                      kolathur,
                      chennai-99</td>
                </tr>
                  <tr>
                  <td>Phone number </td>
                  <td>sharath</td>
                </tr>
                  <tr>
                  <td>E-mail id </td>
                  <td>sharath</td>
                </tr>
              </tbody>
            </table>
          </div>
            </div>
          </div>
          </div>
        </div>
        </div>
          
       <div class="books">
         <div class="row">
           <div class="col-lg-6 col-lg-push-6">
            <h3>Add a book</h3>
            <input type="text" id="book_name" class="form-control" placeholder="Book name" required autofocus style="width: 50%; margin-left: -95px;">
            <input type="text" id="author_name" class="form-control" placeholder="Author name" required autofocus style="width: 50%; margin-left: -95px;">
            <input type="text" id="publication_name" class="form-control" placeholder="Publication name" required autofocus style="width: 50%; margin-left: -95px;">
               
                <button type="button" class="btn btn-default btn-lg" style="margin-top: 20px;
">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Book
            </button>
            </div>
             
             <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
             
             <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Book Name</th>
                  <th>Author Name</th>
                  <th>Publication Name</th>
                  <th>Visibility</th>
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
                <tr>
                  <td>1,007</td>
                  <td>sagittis</td>
                  <td>ipsum</td>
                  <td>Praesent</td>
                  <td>mauris</td>
                </tr>
                <tr>
                  <td>1,008</td>
                  <td>Fusce</td>
                  <td>nec</td>
                  <td>tellus</td>
                  <td>sed</td>
                </tr>
                <tr>
                  <td>1,009</td>
                  <td>augue</td>
                  <td>semper</td>
                  <td>porta</td>
                  <td>Mauris</td>
                </tr>
                <tr>
                  <td>1,010</td>
                  <td>massa</td>
                  <td>Vestibulum</td>
                  <td>lacinia</td>
                  <td>arcu</td>
                </tr>
                <tr>
                  <td>1,011</td>
                  <td>eget</td>
                  <td>nulla</td>
                  <td>Class</td>
                  <td>aptent</td>
                </tr>
                <tr>
                  <td>1,012</td>
                  <td>taciti</td>
                  <td>sociosqu</td>
                  <td>ad</td>
                  <td>litora</td>
                </tr>
                <tr>
                  <td>1,013</td>
                  <td>torquent</td>
                  <td>per</td>
                  <td>conubia</td>
                  <td>nostra</td>
                </tr>
                <tr>
                  <td>1,014</td>
                  <td>per</td>
                  <td>inceptos</td>
                  <td>himenaeos</td>
                  <td>Curabitur</td>
                </tr>
                <tr>
                  <td>1,015</td>
                  <td>sodales</td>
                  <td>ligula</td>
                  <td>in</td>
                  <td>libero</td>
                </tr>
              </tbody>
            </table>
          </div>
             </div>  
       </div>
       
       
       </div>
        
        <div class="search">
        
        <div class="row">
           <div class="col-lg-6 col-lg-push-6 col-sm-12 col-xs-12">
            <h3>Search by Book Name</h3>
            <input type="text" id="book_name" class="form-control" placeholder="Book name" required autofocus style="width: 50%; margin-left: -29px;">
            </div>
       </div>
           
           <div class="row" style="margin-top: 35px;">
           <div class="col-lg-6 col-lg-push-7 col-sm-12 col-xs-12">
               <span>or</span>
           </div>
           </div>
           
           <div class="row">
           <div class="col-lg-6 col-lg-push-6 col-sm-12 col-xs-12">
            <h3>Search by Author name</h3>
            <input type="text" id="book_name" class="form-control" placeholder="Author name" required autofocus style="width: 50%; margin-left: -29px;">
            </div>
       </div>
           
            <div class="row" style="margin-top: 35px;">
           <div class="col-lg-6 col-lg-push-7 col-sm-12 col-xs-12">
               <span>or</span>
           </div>
           </div>
           
           <div class="row">
           <div class="col-lg-6 col-lg-push-6 col-sm-12 col-xs-12">
            <h3>Search by Publication Name</h3>
            <input type="text" id="book_name" class="form-control" placeholder="Publication name" required autofocus style="width: 50%; margin-left: -29px;">
            </div>
               </div>
            <div class="row" style="margin-top: 43px;">
               <div class="col-lg-6 col-lg-push-6 col-sm-12 col-xs-12">
                <button type="button" class="btn btn-default btn-lg" style="margin-left: 25px;">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search
            </button> 
               </div>
            </div>
        </div>
      </div>
   <footer class="footer">
      <div class="container">
        <p class="text-muted">Copyright ©2015 Nasotech LLC | All Rights Reserved</p>
      </div>
   </footer>
  </body>
</html>
