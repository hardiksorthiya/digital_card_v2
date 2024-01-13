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
		$query=mysqli_query($conn,'SELECT * FROM digi_card WHERE id="'.$_SESSION['card_id_inprocess'].'" AND user_email="'.$_SESSION['user_email'].'" ');


	$row=mysqli_fetch_array($query);
	
	if(mysqli_num_rows($query)==0){echo '<div class="alert danger">Card id Removed/Not available.</div>';}else {
		
	
	// company name
	?>

                <h1>Company Name</h1>
                <form action="#" method="POST" class="close_form" enctype="multipart/form-data">
                    <div class="input_box">
                       <input type="text" name="company_name" maxlength="199"
                            value="<?php echo $row['company_name']; ?>" placeholder="Enter Company Name" required>
                    </div>
                    <input type="submit" class="btn-hp-style" name="process2" value="Submit & Next">
                </form>
                <?php
                }
            }else{
                ?>
                <h1>Company Name</h1>
                <form action="#" method="POST" class="close_form" enctype="multipart/form-data">
                    <div class="input_box">
                        <input type="text" name="company_name" maxlength="199" value=""
                            placeholder="Enter Company Name" required>
                    </div>
                    <input type="submit" class="btn-hp-style" name="process1" value="Submit & Next">
                </form>
                <?php
                }
                ?>


<!-- button process -->



<?php
// u[pdate comp name funtion

	if(isset($_POST['process2'])){	
	$query=mysqli_query($connt,'SELECT * FROM digi_card WHERE company_name="'.$_POST['company_name'].'"  ORDER BY id DESC');
	$row=mysqli_fetch_array($query);
	
	if(mysqli_num_rows($query)==0){
		
		 $card_id=str_replace(array(' ','.','&','/','','[',']'),array('-','','','-','',''),$_POST['company_name']);
		
		$update=mysqli_query($conn,'UPDATE digi_card SET company_name="'.$_POST['company_name'].'", card_id="'.$card_id.'" WHERE id="'.$_SESSION['card_id_inprocess'].'"');
				echo '<meta http-equiv="refresh" content="1;URL=select_theme.php">';
				echo '<style>  form {display:none;} </style>';
				echo '<div class="alert success">Company Name Updated</div>';
	}else {
		
			if($row['company_name']=$_POST['company_name'] && $row['id']=$_SESSION['card_id_inprocess']){
				echo '<style>  form {display:none;} </style>';
				echo '<meta http-equiv="refresh" content="1;URL=select_theme.php">';
				echo '<div class="alert info">Redirecting...</div>';
			}else{
		// if comp name is not availble in the same id then create new one
		
		$count=mysqli_num_rows($query);
			
		 $card_id=str_replace(array(' ','.','&','/','','[',']'),array('-','','','-','',''),$_POST['company_name']).($count+1);
			$update=mysqli_query($conn,'UPDATE digi_card SET company_name="'.$_POST['company_name'].'", card_id="'.$card_id.'" WHERE id="'.$_SESSION['card_id_inprocess'].'"');
				echo '<meta http-equiv="refresh" content="1;URL=select_theme.php">';
				echo '<style>  form {display:none;} </style>';
				echo '<div class="alert info">Company/Business Name Updated. </div>';
		
				
			}
			
		
		
		}
	
	}

?>






<?php
if(isset($_POST['process1'])){

    $company_name=$_POST['company_name'];

    $insert_company_name = "SELECT * FROM user_card WHERE company_name = '$company_name'";
    $insert_query=mysqli_query($conn,$insert_company_name);
	if(mysqli_num_rows($query)==0){
        $card_id=str_replace(array(' ','.','&','/','','[',']'),array('-','','','-','',''),$_POST['company_name']);
		$insert=mysqli_query($conn,'INSERT INTO user_card (company_name,card_making_date,user_email,d_card_status,card_id,f_user_email) VALUES ("'.$_POST['company_name'].'","'.$date.'","Created","'.$_SESSION['useremail'].'","'.$card_id.'","'.$franchisee_email.'")');
		if($insert){
			// inser data in 2nd database 
			
			
			$query=mysqli_query($conn,'SELECT * FROM digi_card WHERE company_name="'.$_POST['company_name'].'" AND user_email="'.$_SESSION['user_email'].'" order by id desc limit 1');
			$row=mysqli_fetch_array($query);
			
			$insert_digi2=mysqli_query($conn,'INSERT INTO digi_card2 (id,user_email) VALUES ("'.$row['id'].'","'.$_SESSION['user_email'].'")');
			$insert_digi3=mysqli_query($conn,'INSERT INTO digi_card3 (id,user_email) VALUES ("'.$row['id'].'","'.$_SESSION['user_email'].'")');
			
			
				echo '<a href="select_theme.php"><div class="alert success">Company Name Added. CARD Number is:'.$row['id'].'<br> Wait... For next page.</div></a>';
				$_SESSION['card_id_inprocess']=$row['id'];
				echo '<meta http-equiv="refresh" content="1;URL=select_theme.php">';
				echo '<style>  form {display:none;} </style>';
  
exit; 
				
		}
	}else {
		// if card id is already available then this function will run
		$query=mysqli_query($conn,'SELECT * FROM digi_card WHERE company_name="'.$_POST['company_name'].'" ');
		$count=mysqli_num_rows($query);
			$row=mysqli_fetch_array($query);
			
			
			
					$card_id=str_replace(array(' ','.','&','/','','[',']'),array('-','','','-','',''),$_POST['company_name']).($count+1);
			
			
			$insert=mysqli_query($conn,'INSERT INTO digi_card (company_name,uploaded_date,d_payment_status,user_email,d_card_status,card_id,f_user_email) VALUES ("'.$_POST['company_name'].'","'.$date.'","Created","'.$_SESSION['useremail'].'","Active","'.$card_id.'","'.$franchisee_email.'")');
		if($insert){
			// inser data in 2nd database 
			
			echo '<style>  form {display:none;} </style>';
			$query=mysqli_query($conn,'SELECT * FROM digi_card WHERE company_name="'.$_POST['company_name'].'" AND user_email="'.$_SESSION['useremail'].'" order by id desc limit 1');
			$row=mysqli_fetch_array($query);
			
			$insert_digi2=mysqli_query($conn,'INSERT INTO digi_card2 (id,user_email,card_id) VALUES ("'.$row['id'].'","'.$_SESSION['useremail'].'","'.$card_id.'")');
			$insert_digi3=mysqli_query($conn,'INSERT INTO digi_card3 (id,user_email,card_id) VALUES ("'.$row['id'].'","'.$_SESSION['useremail'].'","'.$card_id.'")');
			
			
				echo '<a href="select_theme.php"><div class="alert success">Company Name Added. CARD Number is:'.$row['id'].'<br> Wait... For next page.</div></a>';
				$_SESSION['card_id_inprocess']=$row['id'];
				echo '<meta http-equiv="refresh" content="0;URL=select_theme.php">';
				echo '<style>  form {display:none;} </style>';
		}
		
	
}
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