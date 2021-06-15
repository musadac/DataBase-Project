<html lang="en">
<head>
  <title>FITME-USER</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="user.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
</div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Create Workout Plan <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="/user.php">Home</a>
  <a href="#">REPORTS</a>
  <a href="/progress.php">Create Workout Plan</a>
</div>


<div id="main-wrapper" class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="mb-5">
                                    <h3 class="h4 font-weight-bold text-theme">Create Workout</h3>
                                </div>
                                <h6 class="h5 mb-0">Just Do.</h6>
                                <p class="text-muted mt-2 mb-5">Create a Plan</p>
                                <form method="POST">
                                    <div class="form-group">
                                        <label for="fatintake">Fats Intake</label>
                                        <input type="text" class="form-control" id="fatintake" />
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="prointake">Protein Intake</label>
                                        <input type="text" class="form-control" id="prointake" />
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="carbointake">Carbohydrtae Intake</label>
                                        <input type="text" class="form-control" id="carbointake" />
                                    </div>

                                    <h6 class="h5 mb-0">Excercises</h6>
                                    <h6 class="h5 mb-0">-----------------------------------------</h6>
                                    <div class="form-group">
                                        <label for="Name">Name</label>
                                        <input type="text" class="form-control" id="Name" />
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="prointake">Target Muscle</label>
                                        <input type="text" class="form-control" id="prointake" />
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="Duration">Duration</label>
                                        <input type="text" class="form-control" id="Duration" />
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="Equipment">Equipment</label>
                                        <input type="text" class="form-control" id="Equipment" />
                                    </div>
                                    
                                    <h6 class="h5 mb-0">-----------------------------------------</h6>

                                    </div>
                                    <div class="aaa" >
                                    <button type="button" onclick='add()' name="add" id="add" class="btn btn-theme">Add More</button>
                                    <br><p>&nbsp;</p>
                                    <button type="button" class="btn btn-theme">Remove</button>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-theme">CREATE</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
          
        </div>
    </div>
</div>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
   
</body>

</html>
