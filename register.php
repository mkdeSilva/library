<?php

session_start();
require_once('connect.php');

?> 

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="design.css">
</head>

<body>
	<header>
		<?php require_once('header.php') ?>
	</header>
    <br><br>
    <div class="container">
        <div id="allInputs">
            <center>
                <h2>Please register as one of the following:</h2>

                <h2><span id="studentRegisterButton" class="flatChoiceActive"><a>Student</a></span>|<span id="staffRegisterButton" class="flatChoiceInactive"><a>Staff</a></span></h2>

            </center>

            <?php
            $jobs = array("Pages", "Assistant", "Librarian", "Manager","Director");
            if (isset($_SESSION['flagError'])){

                if ($_SESSION['flagError']=='password'){
                    echo "<br><span style='color:red'> Passwords do not match </span> <br><br>";

                }elseif ($_SESSION['flagError']=='empty'){
                    echo "<br><span style='color:red'> Please fill in all the boxes</span> <br><br>";

                }elseif ($_SESSION['flagError'] == 'emptyPassword'){
                    echo "<br><span style='color:red'> You must have a password</span> <br><br>";

                }
            }
            ?>
          <div style="width: 100%;">
            <div style="float:left; width: 50%">

                    <h3> Please fill in the information below: </h3>
                    <form id="studentRegisterForm" action="checkRegistration.php" method="POST">
                    <!-- to prevent errors -->
                    <input type ="hidden" name = "code" value=0>

                     First Name <br> <input type = "text" name = "fName" class="flatTextbox" > <br><br>
                     Last Name <br> <input type = "text" name = "lName" class="flatTextbox" > <br><br>
                     Faculty <br> <input type = "text" name = "faculty" class="flatTextbox" > <br><br> 
                     Gender 
                     <br><input type="radio" name="gender" value="Male" CHECKED> Male
                     <br><input type="radio" name="gender" value="Female"> Female
                     <br><input type="radio" name="gender" value="Other"> Other
                     <br><br>
                     Age <br> <input type = "text" name= "age" class="flatTextbox" > <br><br> 
                     E-Mail <br> <input type = "text" name= "email" class="flatTextbox" > <br><br>
            </div>

            <div style="float:right; width: 50%">
                  <center>
                    <h3> Create Your Log-In :</h3>
                    Choose Username <br> <input type = "text" name = "username" class="flatTextbox" > <br><br>
                    Choose Password <br> <input type = "password" name = "passwd" class="flatTextbox"  ><br><br>
                    Verify Password <br> <input type = "password" name = "passwdVerify" class="flatTextbox"  ><br><br>
                    <br><br>
                                 <input type = "hidden" name = "whichMember" value = "student">

                    <input type="submit" value="Sign Up!" class="flatButton">
                  </center>
                    <br>
            </div>
                    </form>
          </div>

  <div style="width: 100%;">
      <div style="float:left; width: 50%">
        <form id="staffRegisterForm" action="checkRegistration.php" method="POST" style="display:none">
            <span style="color:red">Staff Code </span><br> <input type ="password" name = "code" class="flatTextbox" ><br><br>
            First Name <br> <input type = "text" name = "fName" class="flatTextbox" > <br><br>
            Last Name <br> <input type = "text" name = "lName" class="flatTextbox" > <br><br>
            Job <br>
            <select id="job" name ="job">
                <option value="">--Choose One--</option>
                <?php
                $q ='SELECT jobID, jobTitle FROM jobs ORDER BY jobID DESC;';
                echo $q;
                if($result=$mysqli->query($q)){
                    while($row=$result->fetch_array()){
                        echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                    }
                }else{
                    echo 'Query error: '.$mysqli->error;
                }
                ?>
            </select>
            <br><br>
            Gender 
            <br><input type="radio" name="gender" value="Male" CHECKED> Male
            <br><input type="radio" name="gender" value="Female"> Female
            <br><input type="radio" name="gender" value="Other"> Other
            <br><br>
            Age <br> <input type = "text" name = "age" class="flatTextbox" > <br><br> 
            E-Mail <br> <input type = "text" name = "email" class="flatTextbox" > <br><br>
      </div>

      <div style="float:right; width: 50%">
          <center> 
            <h3> Create Your Log-In :  </h3>
             Choose Username <br> <input type = "text" name = "username" class="flatTextbox" > <br><br>
             Choose Password <br> <input type = "password" name = "passwd" class="flatTextbox" ><br><br>
             Verify Password <br> <input type = "password" name = "passwdVerify" class="flatTextbox"  ><br><br>
             <input type = "hidden" name = "whichMember" value = "staff">
             <br><br>
            <center>
                 <input type="submit" value="Sign Up!" class="flatButton">
             </center>           
            <br>
          </center>
      </div>
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
        $("#staffRegisterButton").click(function(){
            $("#studentRegisterForm").hide();
            $("#staffRegisterForm").show();
            $(this).addClass('flatChoiceActive').removeClass('flatChoiceInactive');
            $("#studentRegisterButton").addClass('flatChoiceInactive').removeClass('flatChoiceActive');
        });
    });

    $(function(){
        $("#studentRegisterButton").click(function(){
            $("#staffRegisterForm").hide();
            $("#studentRegisterForm").show();
            $(this).addClass('flatChoiceActive').removeClass('flatChoiceInactive');
            $("#staffRegisterButton").addClass('flatChoiceInactive').removeClass('flatChoiceActive');
        });
    });
</script>
</body>
</html>