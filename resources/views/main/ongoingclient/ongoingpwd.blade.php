<!DOCTYPE html>
<html>
<head>
	<title>Progressive Form | Multi Steps Form</title>
	<link rel="stylesheet" href="{{ asset('dist/css3/style.css') }}"/>
	
	<link rel="stylesheet" href=" https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</head>
<body>
	<section>
		<div class="wrapper">
			<div class="header">
				<ul>
					<li class="active form_1_progessbar">
						<div>
							<p>1</p>
						</div>
						<label for="">Requirements</label>
					</li>
					<li class="form_2_progessbar">
						<div>
							<p>2</p>
						</div>
						<label for="">Disability</label>
					</li>
					<li class="form_3_progessbar">
						<div>
							<p>3</p>
						</div>
						<label for="">Organization</label>
					</li>
					<li class="form_4_progessbar">
						<div>
							<p>4</p>
						</div>
						<label for="">ID</label>
					</li>
					<li class="form_5_progessbar">
						<div>
							<p>5</p>
						</div>
						<label for="">Family</label>
					</li>
					
				</ul>
			</div>
			<form class="form" id="form" enctype="multipart/form-data" method="post" action="/createongoingpwd" >
				@csrf
				<div class="form_wrap">
					<div class="form_1 data_info">
						<h2>Personal Information</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">
								<div class="input_wrap">
									<label for="email">Full Name</label>
									<input type="text" name="fullname" class="input" value="{{$client->first_name}} {{$client->middle_name}} {{$client->last_name}} {{$client->extension_name}}" id="fullname" style="text-transform: capitalize;" required>
									<i class="fas fa-check-circle"></i>
									<i class="fas fa-exclamation-circle"></i>
									
								</div>
								
								<div class="input_wrap">
									<label for="email">ID Number</label>
									<input type="text"  name="idnumber" value="@foreach($client->client_applications as  $clientcard){{$clientcard->application_reference_number}}@endforeach" class="input" id="idnumber" id="email"  style="text-transform: capitalize;" required>
									<i class="fas fa-check-circle"></i>
									<i class="fas fa-exclamation-circle"></i>
									
								</div>
                                <div class="input_wrap">
									
									<input type="hidden" name="firstname" class="input" id="firstname" style="text-transform: capitalize;" required>
									<i class="fas fa-check-circle"></i>
									<i class="fas fa-exclamation-circle"></i>
									
								</div>
								<div class="input_wrap">
								
									<input type="hidden" name="firstname" class="input" id="firstname" style="text-transform: capitalize;" required>
									<i class="fas fa-check-circle"></i>
									<i class="fas fa-exclamation-circle"></i>
									
								</div>
								
								<div class="input_wrap">
									
									<input type="hidden"  name="clientid" class="input" id="clientid" id="email" value="{{$client->id}}" style="text-transform: capitalize;" required>
									<i class="fas fa-check-circle"></i>
									<i class="fas fa-exclamation-circle"></i>
									
								</div>
								<div class="input_wrap">
								
									<input type="hidden"  name="middlename" class="input"  style="text-transform: capitalize;" id="middlename" >
									
								</div>
								<div class="input_wrap">
									
									<input type="hidden" name="extensionname" class="input"  style="text-transform: capitalize;" id="extensionname">
								</div>


                                <h2>Upload Requirements</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
						<div class="form_container">
							<div class="input_wrap">
								<label for="phone">Valid ID</label>
								<input type="file" id="imageid" class="select" name="imageid" value="{{ old('c') }}" required>
								<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label for="email">Barangay certificate of residency</label>
								<input type="file" id="imagebarangay" class="select" name="imagebarangay" value="{{ old('c') }}" required>
								<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label for="email">Certificate of Disability</label>
								<input type="file" id="imagedisability" class="select" name="imagedisability" value="{{ old('c') }}" required>
								<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label for="email">Latest 1x1 picture with white background</label>
								<input type="file" id="imagepicture" class="select" name="imagepicture" value="{{ old('c') }}" required>
								<div class="error"></div>
							</div>
						</div>
							
							
								
							</div>
						
					</div>
					<div class="form_2 data_info" style="display: none;">
						<h2>Disability</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
						<div class="form_container">
							<div class="input_wrap">
								<label class="special-label">Type of Disability :</label>
												
													
													
								<label class="container">Deaf or Hard of Hearing
									<input type="checkbox"  name="type[]" value="Deaf or Hard of Hearing">
									<span class="checkmark"></span>
								</label>
								
								<label class="container">Intellectual Disability
									<input type="checkbox" name="type[]" value="Intellectual Disability">
									<span class="checkmark"></span>
								</label>
								
								<label class="container">Learning Disability
									<input type="checkbox" name="type[]" value="Learning Disability">
									<span class="checkmark"></span>
								</label>
								
								<label class="container"> Mental Disability
									<input type="checkbox" name="type[]" value="Mental Disability">
									<span class="checkmark"></span>
								</label>

								<label class="container"> Physical Disability(Orthopedic)
									<input type="checkbox" name="type[]" value="Physical Disability(Orthopedic)">
									<span class="checkmark"></span>
								</label>
								<label class="container"> Psychosocial Disability
									<input type="checkbox" name="type[]" value="Psychosocial Disability">
									<span class="checkmark"></span>
								</label>
								
								<label class="container">Speech and Language Impairment
									<input type="checkbox" name="type[]" value="Speech and Language Impairment">
									<span class="checkmark"></span>
								</label>

								<label class="container">Visual Disability
									<input type="checkbox" name="type[]" value="Visual Disability">
									<span class="checkmark"></span>
								</label>
								<label class="container">Cancer (RA11215)
									<input type="checkbox" name="type[]" value="Cancer (RA11215)">
									<span class="checkmark"></span>
								</label>
								<label class="container">Rare Disease (RA10747)
									<input type="checkbox" name="type[]" value="Rare Disease (RA10747)">
									<span class="checkmark"></span>
								</label>
								<div class="error" id="type1"></div>
							</div>
							<div class="input_wrap">
								<label class="special-label">Cause  of Disability :</label>
													<label class="container"> Congenital / Inborn
												
												</label>
												
												<label class="container">ADHD
													<input type="checkbox"  onclick="text(3)" name="inborn[]" value="ADHD">
													<span class="checkmark"></span>
												</label>
												
												<label class="container">Cerebral Palsy
													<input type="checkbox"  onclick="text(3)" name="inborn[]" value="Cerebral Palsy">
													<span class="checkmark"></span>
												</label>
												
												<label class="container"> Down Syndrome
													<input type="checkbox"  onclick="text(3)" name="inborn[]" value="Down Syndrome">
													<span class="checkmark"></span>
												</label>

												<label class="container">Others, Specify
													<input type="checkbox"  onclick="text(2)" name="inborn[]" value="Others">
													<span class="checkmark"></span>
												</label>
												<div class="error" id="inborn1"></div>

												<div id="divinborn">
													<label for="last_name">Specify</label>
													<input type="text" name="othersinborn" class="input" id="others">
												 </div>

												
												<label class="container">Acquired
												
												</label>
														
													<label class="container">Chronic Illness
													<input type="checkbox" onclick="text(5)" name="acquired[]" value="Chronic Illness">
													<span class="checkmark"></span>
												</label>
												
												<label class="container">Cerebral Palsy
													<input type="checkbox" onclick="text(5)" name="acquired[]" value="Cerebral Palsy">
													<span class="checkmark"></span>
												</label>
												
												<label class="container"> Injury
													<input type="checkbox" onclick="text(5)" name="acquired[]" value="Injury">
													<span class="checkmark"></span>
												</label>

												<label class="container">Others, Specify
													<input type="checkbox"  onclick="text(4)" name="acquired[]" value="Others, Specify">
													<span class="checkmark"></span>
												</label>

												<div class="error" id="acquired1"></div>

												<div id="divacquired">
													<label for="last_name">Specify</label>
													<input type="text" name="othersacquired" class="input" id="others">
												 </div>
							</div>
							<label for="company">Certifying Physician </label>
							<div class="input_wrap">
								<label for="designation">License No.</label>
								<input type="text" name="licensenumber" class="input" id="designation">
							</div>
							<div class="input_wrap">
								<label for="designation">First Name</label>
								<input type="text" name="physicianfirstname" class="input" id="designation">
							</div>
							<div class="input_wrap">
								<label for="designation">Last Name</label>
								<input type="text" name="physicianlastname" class="input" id="designation">
							</div>
							<div class="input_wrap">
								<label for="designation">Middle Name</label>
								<input type="text" name="physicianmiddlename" class="input" id="designation">
							</div>
						</div>
						
					</div>
					
					<div class="form_3 data_info" style="display: none;">
						<h2>Organization</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">
								<div class="input_wrap">
									<label for="company">Organization Affiliated </label>
									<input type="text" name="organizationaffiliated" class="input" id="company">
								</div>
								<div class="input_wrap">
									<label for="experience">Contact Person</label>
									<input type="text" name="contactperson" class="input" id="experience">
								</div>
								<div class="input_wrap">
									<label for="designation">Office Address</label>
									<input type="text" name="officeaddress" class="input" id="designation">
								</div>
								<div class="input_wrap">
									<label for="designation">Telephone Number</label>
									<input type="text" name="contactnumber" class="input" id="designation">
								</div>
							</div>
						
					</div>
					<div class="form_4 data_info" style="display: none;">
						<h2>Identification Card</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">
								<div class="input_wrap">
									<label for="company">SSS No </label>
									<input type="text" name="sssnumber" class="input" id="company">
								</div>
								<div class="input_wrap">
									<label for="experience">GSIS No</label>
									<input type="text" name="gsisnumber" class="input" id="experience">
								</div>
								<div class="input_wrap">
									<label for="designation">Pagibig No</label>
									<input type="text" name="pagibignumber" class="input" id="n">
								</div>
								<div class="input_wrap">
									<label for="n">PSN No</label>
									<input type="text" name="psnnumber" class="input" id="n">
								</div>
								<div class="input_wrap">
									<label for="n">PhilHealth No</label>
									<input type="text" name="philhealthnumber" class="input" id="n">
								</div>
							</div>
						
					</div>
					<div class="form_5 data_info" style="display: none;">
						<h2>Family Background </h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">
								<div id="family">
									<div class="input_wrap" >
										<label for="experience">Relationship</label>
										<input type="text" name="relationship[]" class="input" id="achievementaward">
										<label for="experience">Last Name</label>
										<input type="text" name="familylastname[]" class="input" id="type">
										<label for="experience">First Name</label>
										<input type="text" name="familyfirstname[]" class="input" id="schoolname" >
										<label for="experience">Middle Name</label>
										<input type="text" name="familymiddlename[]" class="input" id="course">
										<label for="experience">Extension Name</label>
										<input type="text" name="familyextensionname[]" class="input" id="yeargraduated">
										<div class="input_wrap">
											<label for="confirm_password">Sex</label>
											<select class="select" id="addGender" name="familygender[]" >
												<option selected="">Select Gender</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>  
											</select>
										</div>
										<div class="input_wrap">
											<label for="confirm_password">Date of Birth</label>
											<input data-format="MM/DD/YYYY" class="input" type="date" id="familybirthdate[]" name="familybirthdate[]">
										</div>
										<input type="button" class="btn btn-warning add_item_btn" name="addfamily" id="addfamily" value="add">
									</div>
								</div>
								{{-- <label for="company">Fathers Name </label>
								<div class="input_wrap">
									<label for="company">First Name </label>
									<input type="text" name="Current Company" class="input" id="company">
								</div>
								<div class="input_wrap">
									<label for="experience">Last Name</label>
									<input type="text" name="Total Experience" class="input" id="experience">
								</div>
								<div class="input_wrap">
									<label for="designation">Middle Name</label>
									<input type="text" name="Designation" class="input" id="designation">
								</div>
								<label for="company">Mothers Name </label>
								<div class="input_wrap">
									<label for="company">First Name </label>
									<input type="text" name="Current Company" class="input" id="company">
								</div>
								<div class="input_wrap">
									<label for="experience">Last Name</label>
									<input type="text" name="Total Experience" class="input" id="experience">
								</div>
								<div class="input_wrap">
									<label for="designation">Middle Name</label>
									<input type="text" name="Designation" class="input" id="designation">
								</div>

								<label for="company">Guardians Name </label>
								<div class="input_wrap">
									<label for="company">First Name </label>
									<input type="text" name="Current Company" class="input" id="company">
								</div>
								<div class="input_wrap">
									<label for="experience">Last Name</label>
									<input type="text" name="Total Experience" class="input" id="experience">
								</div>
								<div class="input_wrap">
									<label for="designation">Middle Name</label>
									<input type="text" name="Designation" class="input" id="designation">
								</div> --}}
							</div>

						
					</div>
				
				</div>

				<div class="btns_wrap">
					<div class="common_btns form_1_btns">
						<button type="button"  class="btn_next">Next  <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
					</div>
					<div class="common_btns form_2_btns" style="display: none;">
						<button type="button" class="btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
						<button type="button" class="btn_next">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
					</div>
					<div class="common_btns form_3_btns" style="display: none;">
						<button type="button" class="btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
						<button type="button" class="btn_next">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
					</div>
					<div class="common_btns form_4_btns" style="display: none;">
						<button type="button" class="btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
						<button type="button" class="btn_next">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
					</div>
					<div class="common_btns form_5_btns" style="display: none;">
						<button type="button" class="btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
						<button type="submit" class="btn_done">Done</button>
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
	
	<script src="{{ asset('dist/js3/mainongoingpwd.js') }}"></script>
	<?php
	session_start();
  if (isset($_SESSION['success']) == 'success') 
  {
	  ?>
		  <script>
		  swal({
				  
				  title: "SAVED",
				  text: "Successfully saved!",
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
				  text: "Record not found!",
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
			  
				  title: "Registered",
				  text: "You are already a registered citizen!",
				  icon: "error",
				  button: "ok",
			  })
		  
		  
		  </script>
	  <?php
	  unset($_SESSION['Error']);
  }

?>
<script>

	
		$(document).ready(function ()
			{
				
				document.getElementById('divinborn').style.display="none";
				document.getElementById('divacquired').style.display="none";
			
			

					

			});	

		function text(x)
			{
				


				if (x==2)
				{
					document.getElementById("divinborn").style.display="block";
				}
				if (x==3)
				{
					document.getElementById('divinborn').style.display="none";
				
				}

				if (x==4)
				{
					document.getElementById("divacquired").style.display="block";
				}
				if (x==5)
				{
					document.getElementById('divacquired').style.display="none";
				
				}
				
				
				return;
			}

	</script>	
	<script>
		$(document).ready(function ()
		{
		
			
	
				var htmlfamily =`<div class="input_wrap" >
										<label for="experience">Relationship</label>
										<input type="text" name="relationship[]" class="input" id="achievementaward">
										<label for="experience">Last Name</label>
										<input type="text" name="familylastname[]" class="input" id="type">
										<label for="experience">First Name</label>
										<input type="text" name="familyfirstname[]" class="input" id="schoolname" >
										<label for="experience">Middle Name</label>
										<input type="text" name="familymiddlename[]" class="input" id="course">
										<label for="experience">Extension Name</label>
										<input type="text" name="familyextensionname[]" class="input" id="yeargraduated">
										<div class="input_wrap">
											<label for="confirm_password">Sex</label>
											<select class="select" id="addGender" name="familygender[]" >
												<option selected="">Select Gender</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>  
											</select>
										</div>
										<div class="input_wrap">
											<label for="confirm_password">Date of Birth</label>
											<input data-format="MM/DD/YYYY" class="input" type="date" id="familybirthdate[]" name="familybirthdate[]">
										</div>
										<input type="button" class="btn btn-danger add_item_btn" name="remove" id="remove" value="remove">
									</div>`;
				var x = 1;
	
	
	
			
				$("#addfamily").click(function()
				{
					$('#family').append(htmlfamily);
				});
	
				$("#family").on('click','#remove',function()
				{
					$(this).parent().remove();
				});
				
	
		});		
	</script>
</body>
</html>