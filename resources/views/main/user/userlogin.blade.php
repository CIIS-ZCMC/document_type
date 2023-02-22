<!DOCTYPE html>
<html>
<head>
	<title>Progressive Form | Multi Steps Form</title>
	<link rel="stylesheet" href="{{ asset('dist/css3/style.css') }}"/>
	
	<link rel="stylesheet" href=" https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

        <!-- zc seal -->
        <link rel="icon" href="{{asset('dist/images/Seal.png')}}" size="10x10" />

</head>
<body>
	<section>
		<div class="wrapper">
			
			<form class="form" id="form" enctype="multipart/form-data" method="post" action="/userlogin" >
				@csrf
				<div class="form_wrap">
					<div class="form_1 data_info">
						<h2>User Login Application</h2>
						<p>  </p>
							<div class="form_container">
							
								<div class="input_wrap">
									<label class="required">Citizen ID Number</label>
									<input type="text" name="email" class="input" id="email" autocomplete="off" placeholder="Enter Citizen ID Number" required>
								</div>
								<div class="input_wrap">
									<label class="required">Password</label>
									<input type="password" name="password" class="input" id="password" autocomplete="off" placeholder="Enter Password" required>
								</div>						
							</div>				
					</div>
				</div>

				<div class="btns_wrap">

					<div class="common_btns form_1_btns d-flex flex-direction-row ">
						<a href="/main" style="text-decoration: none;">						
							<button type="button" onclick="unsave()" class="btn_back" style="margin-right: 5px;"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>				
						</a>
				
						<div class="common_btns form_1_btns">
							<button type="submit"  class="">Login</button>
						</div>

					</div>	
					
					
				</div>
			</form>
		</div>
	</section>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script src="http://parsleyjs.org/dist/parsley.js"defer></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<script>
	
	</script>
  <?php
  session_start();
		if (isset($_SESSION['success']) == 'success') 
		{
			?>
				<script>
				swal({
						
						title: "SAVED",
						text: "Successfully registered!",
						icon: "success",
						button: "ok",
					})
					
				
				</script>
			<?php
			unset($_SESSION['success']);
		}
				
		if (isset($_SESSION['fail']) == 'fail') 
		{
			?>
			<script>
				swal({
					
						title: "Fail",
						text: "No Record Found!",
						icon: "error",
						button: "ok",
					})
				
				
				</script>
			<?php
			unset($_SESSION['fail']);
		}

		if (isset($_SESSION['Error']) == 'Error') 
		{
			?>
			<script>
				swal({
					
						title: "Applied",
						text: "You already applied!",
						icon: "error",
						button: "ok",
					})
				
				
				</script>
			<?php
			unset($_SESSION['Error']);
		}
   
   
?>
 



	
</body>
</html>