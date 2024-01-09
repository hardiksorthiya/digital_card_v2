<?php
 session_start();
require('connection.php');
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>

<body id="create_card">
    <div class="d-flex  flex-lg-row h-lg-full bg-surface-secondary">
        <?php 
        include('sidebar.php');
    ?>
        <section class="create_card h-screen flex-grow-1 overflow-y-lg-auto">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-center">
                        <div class="card_making_step_one text-center">
                        <?php
if(isset($_GET['card_number'])){
		$_SESSION['card_id_inprocess']=$_GET['card_number'];
		$query=mysqli_query($connect,'SELECT * FROM digi_card WHERE id="'.$_SESSION['card_id_inprocess'].'" AND user_email="'.$_SESSION['user_email'].'" ');


	$row=mysqli_fetch_array($query);
	
	if(mysqli_num_rows($query)==0){echo '<div class="alert danger">Card id Removed/Not available.</div>';}else {
		
	
	// company name
	?>

                <h1>Company Name</h1>

                <form action="#" method="POST" class="close_form" enctype="multipart/form-data">
                    <div class="input_box">
                       <input type="text" name="d_comp_name" maxlength="199"
                            value="<?php echo $row['d_comp_name']; ?>" placeholder="Enter Company Name" required>
                    </div>


                    <input type="submit" class="btn-hp-style" name="process2" value="Submit & Next">


                </form>

                <?php
		}
		
	}else {
		?>
                <h1>Company Name</h1>

                <form action="#" method="POST" class="close_form" enctype="multipart/form-data">
                    <div class="input_box">
                        <input type="text" name="d_comp_name" maxlength="199" value=""
                            placeholder="Enter Company Name" required>
                    </div>


                    <input type="submit" class="btn-hp-style" name="process1" value="Submit & Next">


                </form>



                <?php
	}
	
?>
                        </div>
                        </div>
                        
                    
                    </div>
                </div>
            </div>
        </section>
    </div>


</body>