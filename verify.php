<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CodeZone-Verification</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700i" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" href="js/sweetalert2.min.css">

  <link rel="stylesheet" href="bootsnav.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="conStyle.css">

</head>

<body>
  <header>
    <img src="logo1.png" alt="Code" height="50px" width="200px" style="padding:12px 0 0 10px; float:left">

    <div class="icons" style="right:5px">
      <a href="#!">
        <i class="fa fa-facebook fa-2x"></i>
      </a>
      <a href="#!">
        <i class="fa fa-google-plus fa-2x"></i>
      </a>
      <a href="#!">
        <i class="fa fa-github fa-2x"></i>
      </a>
    </div>

  </header>
  <div id="myContainer" class="MainContainer">

    <nav class="navbar navbar-default navbar-mobile bootsnav on">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
          <i class="fa fa-bars"></i>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="navbar-menu">
        <ul class="nav navbar-nav" data-in="fadeInDown" data-out="fadeOutUp">
          <li class="active">
            <a href="index.php" data-hover="Home">Verify Email
              <span></span>
            </a>
          </li>         
          
        </ul>
      </div>
    </nav>

    <div class="content">
      <h1 style="margin-top:0px">
          CodeZone - Online Compiler
      </h1>
      <h3 style="margin-top:0px">
          OTP Verification
      </h3>
      <form method="post">
      <input type="password" class="form-control" name="otp" placeholder="Enter your OTP..." required style="width:40%">
      <br>
      <button class="butn" name="verify" type="submit">Verify</button>      
    </form>
    </div>

    <footer id="foot">
      <div id="foot-body">
        <div id="foot-con">
          <h1>
            About Us</h1>
          <p>CodeZone is created as a platform to help programmers make it big in the world of algorithms, computer programming
            and programming assignments. Here you can show off your computer programming skills and improve yourself as a
            computer programmer.
          </p>
        </div>
        <img src="line.png" alt="Code" height="160px" width="10px">

        <div id="foot-links">
          <h4>Coding tools</h4>
          <a href="ide.php">
            Online IDE
          </a>
        </div>
        <img src="line.png" alt="Code" height="160px" width="10px">

        <div id="foot-links">
          <h4>Practice code</h4>
          <a href="">
            Easy
          </a>
          <br>
          <a href="">
            Medium
          </a>
          <br>
          <a href="">
            Hard
          </a>
        </div>
      </div>
      <div id="foot-reg">
        <h3>Register for Free</h3>
        <!--<button id="footsignupBtn" class="button" type="submit">Signup</button>-->
      </div>
      <div id="foot-icon">
        <div id="ic">
          <a href="#!">
            <i class="fa fa-facebook fa-2x"></i>
          </a>
          <a href="#!">
            <i class="fa fa-google-plus fa-2x"></i>
          </a>
          <a href="#!">
            <i class="fa fa-github fa-2x"></i>
          </a>
        </div>
      </div>
      <div id="foot-bottom">
        <h4>
          <span>Copyright &copy;2018: </span>CodeZone Team</h4>
      </div>
    </footer>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="js/sweetalert2.min.js"></script>

  <script src="bootsnav.js"></script>
</body>



<?php
	if(isset($_SESSION['email']) and isset($_SESSION['otp']) and isset($_POST['otp']))
	{
		$otp=$_SESSION['otp'];
		$otp1=$_POST['otp'];
		if($otp==$otp1 )
		{
			$mysqli=mysqli_connect("localhost","root","");
			if($mysqli)
			{
				$t=mysqli_select_db($mysqli,"online_compiler");
				if($t)
				{
					$result = $mysqli->query("SELECT * FROM `user` WHERE `email` LIKE '".$_SESSION['email']."'");
          $row_cnt = $result->num_rows;
					if($row_cnt==0)
					{
						$result=$mysqli->query("INSERT INTO user(roll,name,email,password) VALUES (".$_SESSION['roll'].", '".$_SESSION['name']."' , '".$_SESSION['email']."' , '".$_SESSION['password']."' )");
						if($result)
						{
              $_SESSION['login']=true;
              ?>
                <script>
                    swal({
  type: 'success',
  title: 'Account Created Successfully',
  text:'Account is created, now you need to signin by giving username & password',
  showConfirmButton: true,
confirmButtonColor: '#3085d6',
confirmButtonText: '<i class="fa fa-thumbs-up"></i>&nbsp Great!',
}).then((result) => {
  if (result.value) {
    window.open("out.php","_self");
  }
});
    
    </script>
                <?php
							//header('location:welcome.php');
						}
            else
            {
              ?>
                <script>
                    swal({
  type: 'error',
  title: 'Insertion error',
  text:'Data cannot be inserted into the database now. Please try later',
  showConfirmButton: true,
confirmButtonColor: '#3085d6',
confirmButtonText: 'OK',
}).then((result) => {
  if (result.value) {
    window.open("out.php","_self");
  }
});
    
    </script>
                <?php
            
              //echo("Not inserted");
            }
					}
          else
          {
            ?>
                <script>
                    swal({
  type: 'error',
  title: 'You already have an account',
  text:'Please try to login with your username & password',
  showConfirmButton: true,
confirmButtonColor: '#3085d6',
confirmButtonText: 'OK',
}).then((result) => {
  if (result.value) {
    window.open("out.php","_self");
  }
});
    
    </script>
                <?php
                //echo("You already have an account");
          }
					
				}
			}
		}
		else
		{
      ?>
                <script>
                    swal({
  type: 'error',
  title: 'Invalid OTP',
  text:'Please check your OTP and try again',
  showConfirmButton: true,
confirmButtonColor: '#3085d6',
confirmButtonText: 'OK',
});
    
    </script>
                <?php
			//echo("Invalid OTP");			
		}
	}
	?>
  </html>