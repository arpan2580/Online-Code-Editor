<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CodeZone-Coding IDE</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" href="js/sweetalert2.min.css">

  <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  <link href='http://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
  <link href="codeArea.css" type="text/css" rel="stylesheet" />

  <link rel="stylesheet" href="bootsnav.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <img src="logo1.png" alt="Code" height="50px" width="200px" style="padding:12px 0 0 10px; float:left">
    <a id="loginBtn" class="shineBtn">Login</a>
    <a id="signupBtn" class="shineBtn">Signup</a>

    <!--Show the username using session here-->

    <div class="icons">
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
    <img src="line.png" alt="Code" height="65px" style="position:absolute; right:300px">

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
          <li>
            <a href="index.php" data-hover="Home">Home
              <span></span>
            </a>
          </li>

          <li class="dropdown active">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="Practice codes">Practice Codes
              <span></span>
            </a>

            <ul class="dropdown-menu animated">
              <li>
                <a href="ide.php">Code & Compile</a>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Web Development</a>

                <ul class="dropdown-menu animated">
                  <li>
                    <a href="webide.php">HTML, CSS, JavaScript</a>
                  </li>
                  <li>
                    <a href="webide.php">Node Js</a>
                  </li>
                  <li>
                    <a href="webide.php">PHP</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>

          <li>
            <a href="about.php" data-hover="About">About Us
              <span></span>
            </a>
          </li>

          <li>
            <a href="contact.php" data-hover="Contact us">Contact Us
              <span></span>
            </a>
          </li>
          
          <?php
      if(!empty($_SESSION['email']))
      {
        ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="Username"><?php echo $_SESSION['email']; ?>
              <span></span>
            </a>

            <ul class="dropdown-menu animated">
              <li>
                <a href="logout.php">Logout</a>
              </li>
            </ul>
          </li>
          <?php
      }
      ?>
        </ul>
      </div>
    </nav>

    <div class="content">
      <div>
        <h1 style="font-family: Orbitron;font-weight: bold;">Output Window</h1>
      </div>
     
			<?php
	$CC="python";
	$code=$_POST["code"];
	$input=$_POST["input"];
	$filename_code="main.py";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$command=$CC." ".$filename_code;
	$command_error=$command." 2>".$filename_error;

	//if(trim($code)=="")
	//die("The code area is empty");

	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,$code);
	fclose($file_code);
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);
	
	exec("chmod 777 $filename_error");

	shell_exec($command_error);
	$error=file_get_contents($filename_error);

	if(trim($error)=="")
	{
		if(trim($input)=="")
		{
			$output=shell_exec($command);
		}
		else
		{
			$command=$command." ".file_get_contents($filename_in);
			$output=shell_exec($command);
		}
		?>
        <div style="width: 60%">
          <textarea class="lined" name="code" readonly><?php echo $output ?></textarea>
					<a href="ide.php"><button class="button">Go Back</button></a>
        </div>
	<?php
		//echo "<pre>$output</pre>";
	}
	else
	{
	?>
		<div style="width: 60%">
          <textarea class="lined" name="code" readonly><?php echo $error ?></textarea>
            <a href="ide.php"><button class="button">Go Back</button></a>
        </div>
	<?php
  //	echo "<pre>$error</pre>";
	}
	exec("del $filename_code");
	exec("del *.txt");
?>
     

    </div>

    <!--<footer id="foot">Copyright CodeZone Team &copy;2018</footer>-->
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
        <button id="footsignupBtn" class="button" type="submit">Signup</button>
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


    <!--<button type="button" id="myBtn">Open Modal</button>-->
  </div>

	<div id="loginModal" class="Modal is-hidden is-visuallyHidden">
    <!-- Modal content -->
    <div class="Modal-content">
      <div class="modal-header">
        <span id="closeModal" class="Close">&times;</span>
        <h2>CodeZone-Login</h2>
      </div>
      <div class="modal-body">
        <form class="form-group" action="" method="post" id="loginFrm">
          <p>User ID</p>
          <input type="email" class="form-control" name="username" placeholder="Enter your email..." required="required">
          <p>Password</p>
          <input type="password" class="form-control" name="password" placeholder="Enter your password..." required="required">
        </form>
      </div>
      <div class="modal-footer">
        <button class="butn" form="loginFrm" type="submit">Login</button>
      </div>
    </div>
  </div>

  <div id="signupModal" class="Modal is-hidden is-visuallyHidden">
    <!-- Modal content -->
    <div class="Modal-content">
      <div class="modal-header">
        <span id="closeSModal" class="Close">&times;</span>
        <h2>CodeZone-Signup</h2>
      </div>
      <div class="modal-body">
        <form class="form-group" action="" method="post" name="form1" id="signupFrm">
          <p>University Roll</p>
          <input type="text" class="form-control" name="roll" placeholder="Enter your roll no..." required="required">
          <p>Name</p>
          <input type="text" class="form-control" name="name" placeholder="Enter your name..." required="required">
          <p>Email</p>
          <input type="email" class="form-control" name="email" placeholder="Enter your email..." required="required">
          <p>Password</p>
          <input type="password" class="form-control" name="pass" placeholder="Enter a password..." required="required">
          <p>Confirm Password</p>
          <input type="password" class="form-control" name="conpass" placeholder="Confirm your password..." required="required">
        </form>
      </div>
      <div class="modal-footer">
        <button class="butn" form="signupFrm" type="submit">Signup</button>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="blurmodal.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="bootsnav.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="codeNo.js"></script>
  <script>
    $(function () {
      $(".lined").linedTextEditor();
    });
  </script>

<script src="js/sweetalert2.min.js"></script>

</body>

</html>

<?php
include 'logsign.php';
?>