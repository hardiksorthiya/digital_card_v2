<?php

require('connection.php');

$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $useremail = $_POST["useremail"];
    $uasercontact = $_POST["usercontact"];
    $exists=false;
    if(($password == $cpassword) && $exists==false){
        $sql = "INSERT INTO `user` ( `user_name`, `user_password`, `user_email`, `user_mobile`, `dt`) VALUES ('$username', '$password', '$useremail', '$uasercontact', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
        }
    }
    else{
        $showError = "Passwords do not match";
    }
}
    
?>



<body class="user-login-page">
    <section class="login">
        <div class="login_box">
            <div class="left">
                <div class="top_link">
                    <a href="/digital_card_v2" class="d-flex">
                        <img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download"
                            alt="">
                        <span>Return home</span>
                    </a>
                </div>
                <div class="contact">
                    <form action="#" method="post" autocomplete="off">
                        <h3>SIGN UP</h3>
                        <div class="form-group">
                            <!-- <label for="username">Username</label> -->
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Enter your Username" autocomplete="off">

                        </div>
                        <div class="form-group">
                            <!-- <label for="useremail">Email</label> -->
                            <input type="email" class="form-control" id="useremail" name="useremail"
                                aria-describedby="emailHelp" placeholder="Enter your E-mail" require>

                        </div>
                        <div class="form-group">
                            <!-- <label for="usercontact">Contact Number</label> -->
                            <input type="tel" class="form-control" id="usercontact" name="usercontact" placeholder="Enter your Contact Number"
                                 require>

                        </div>
                        <div class="form-group">
                            <!-- <label for="password">Password</label> -->
                            <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                        </div>
                        <div class="form-group">
                            <!-- <label for="cpassword">Confirm Password</label> -->
                            <input type="password" class="form-control" id="cpassword" placeholder="Enter Confirm Password" name="cpassword">
                            <small id="emailHelp" class="form-text text-muted">Make sure to type the same
                                password</small>
                        </div>
                        <button type="submit" class="btn btn-primary">SignUp</button>
                        
                    </form>
                </div>
                <div class="need-account"><span><a href="login.php">Sign In</a></span></div>
            </div>
            <div class="right">
                <div class="right-text">
                    <img src="/digital_card_v2/assets/images/My_Digital_Card_Logo.png" alt="My Digital Card"
                        width="100">
                    <h5>WE ARE CREATIVE AGENCEY</h5>
                </div>
                <div class="right-inductor"><img
                        src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQzYoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft"
                        alt=""></div>
            </div>
        </div>
    </section>
</body>


<?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

