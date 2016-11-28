<?php

session_start();
require_once('connect.php'); //dont’ know if I need this, check once this page is completed

?> 

<!DOCTYPE html>
<html>


<head>
    <title>Sign In</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="design.css">
</head>


<body>
	<header>
		<?php require_once('header.php') ?>
	</header>

    <br><br><br>

    
    <div class="container">
        <div id="allInputs">
            <center>
                
                <h2><span id="studentLoginButton" class="flatChoiceActive"><a>Student Login</a></span>|<span id="staffLoginButton" class="flatChoiceInactive"><a>Staff Login</a></span></h2>
                <br>
                <!-- STUDENT LOGIN FORM -->
                <form id="studentLoginForm" action="studentCheckLogin.php" method="POST">
                    
                    <label>Username</label>
                    <input type="text" name="username" class="flatTextbox">
                    <br><br>
                    <label>Password</label>
                    <input type="password" name="passwd" class="flatTextbox">
                    <br><br>		
                    <input type="submit" value="Login" class="flatButton">					
                    <br>
                    <br>
                    <input type="reset" class="flatButton">
                    <br><br>
                    <div class = "flat">
                       <ul>
                          <li><a href="forgot.php">Forgot Password?</a></li>
                          <li><a href="register.php">Don't have an account? Register here</a></li>
                      </ul>
                  </div> <!-- end of flat -->
              </div>
          </form>

          <!-- STAFF LOGIN FORM -->
          <div id="staffLoginForm" style="display:none;">
            <center>
                <form  id="staffLoginForm" action="staffCheckLogin.php" method="POST">
                    
                    <label>Staff Username</label>
                    <input type="text" name="username" class="flatTextbox">
                    <br><br>
                    <label>Staff Password</label>
                    <input type="password" name="passwd" class="flatTextbox">
                    <br><br>        
                    <input type="submit" value="Login" class="flatButton">                  
                    <br>
                    <br>
                    <input type="reset" class="flatButton">
                    <br><br>
                    <div class = "flat">
                        <ul>
                            <li><a href="forgot.php">Forgot Password?</a></li>
                            <li><a href="register.php">Don't have an account? Register here</a></li>
                        </ul>
                    </div> <!-- end of flat -->
                </div>
            </form>
        </center>
    </div>

</center>
</div>
</div>

<script src = 'jQuery.js'></script>
<script>
    $(function(){
        $("#staffLoginButton").click(function(){
            $("#studentLoginForm").hide();
            $("#staffLoginForm").show();
            $(this).addClass('flatChoiceActive').removeClass('flatChoiceInactive');
            $("#studentLoginButton").addClass('flatChoiceInactive').removeClass('flatChoiceActive');
        });
    });

    $(function(){
        $("#studentLoginButton").click(function(){
            $("#staffLoginForm").hide();
            $("#studentLoginForm").show();
            $(this).addClass('flatChoiceActive').removeClass('flatChoiceInactive');
            $("#staffLoginButton").addClass('flatChoiceInactive').removeClass('flatChoiceActive');
        });
    });
</script>

</body>


</html>
