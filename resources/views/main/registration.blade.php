<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>form-v1 by Colorlib</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="{{ asset('dist/css3/opensans-font.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('dist/fonts3/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="{{ asset('dist/css3/style.css') }}"/>


        <!-- zc seal -->
        <link rel="icon" href="{{asset('dist/images/Seal.png')}}" size="10x10" />
</head>
<body>
	<style>
		body {}
	</style>
	<div class="page-content">
		<div class="form-v1-content">
			<div class="wizard-form ">
		        <form class="form-register" action="#" method="post">
		        	<div id="form-total">
		        		<!-- SECTION 1 -->
			            <h2>
			            	<p class="step-icon"><span>01</span></p>
			            	<span class="step-text">Personal Infomation</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">Personal Infomation</h3>
									<p>Please enter your infomation and proceed to the next step so we can build your accounts.  </p>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<fieldset>
											<legend>First Name</legend>
											<input type="text" class="form-control" id="first-name" name="first-name" placeholder="First Name" required>
										</fieldset>
									</div>
									<div class="form-holder">
										<fieldset>
											<legend>Middle Name</legend>
											<input type="text" class="form-control" id="last-name" name="last-name" placeholder="Middle Name">
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<fieldset>
											<legend>Last Name</legend>
											<input type="text" class="form-control" id="first-name" name="first-name" placeholder="Last Name" required>
										</fieldset>
									</div>
									<div class="form-holder">
										<fieldset>
											<legend>Ext Name</legend>
											<input type="text" class="form-control" id="last-name" name="last-name" placeholder="Extension Name" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Nationality</legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Nationality"  required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Religion</legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Religion"   required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										{{-- <p>Gender</p> --}}
									
											<select class="form-control" id="addGender" name="gender" required>
												<option selected="">Select Gender</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>  
											</select>
										
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
									
											{{-- <p>Blood Type</p> --}}
											<select class="form-control" id="addGender" name="gender" required>
												<option selected="">Select Blood Type</option>
												<option value="Male">A</option>
												<option value="Female">B</option>  
												<option value="Male">AB</option>
												<option value="Female">O</option>  
											</select>
										
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										{{-- <p>Gender</p> --}}
									
											<select class="form-control" id="addGender" name="gender" required>
												<option selected="">Select Civil Status</option>
												<option value="Male">Maried</option>
												<option value="Female">Widowed</option>  
												<option value="Separated">Separated</option>
												<option value="Female">Divorced</option>  
												<option value="Female">Single</option>  
											</select>
										
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Date of Birth</legend>
											<input data-format="MM/DD/YYYY" type="datetime-local" id="birthdaytime" name="birthdaytime">
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Place of Birth</legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"  placeholder="Place of Birth" required>
										</fieldset>
									</div>
								</div>
								
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Your Email</legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"  placeholder="Email Address" required>
										</fieldset>
									</div>
								</div>      
									<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Phone Number</legend>
											<input type="text" class="form-control" id="phone" name="phone" required placeholder="Phone Number" >
										</fieldset>
									</div>
								</div>
								<div class="form-row form-row-date">
									<div class="form-holder form-holder-2">
										<label class="special-label">Present Address:</label>
										<fieldset>
											<legend> Street </legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"  placeholder="Email Address" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend> Barangay </legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"  placeholder="Email Address" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend> City/Municipality</legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"  placeholder="Email Address" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend> Province </legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"  placeholder="Email Address" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend> Region </legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"  placeholder="Email Address" required>
										</fieldset>
									</div>
								</div>
							</div>
			            </section>
						<!-- SECTION 2 -->
			            <h2>
			            	<p class="step-icon"><span>02</span></p>
			            	<span class="step-text">Educational Attainment</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">Educational Attainment</h3>
									<p>Please enter your infomation and proceed to the next step so we can build your accounts.</p>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="special-label">Educational Attainment:</label>
										<select class="form-control" id="addGender" name="gender" required>
											<option selected="">Select Educational Attainment</option>
											<option value="Male">None</option>
											<option value="Female">Kindergarten</option>  
											<option value="Male">Elementary</option>
											<option value="Female">Junior High School</option>  
											<option value="Male">Senior High School</option>
											<option value="Female">College</option>  
											<option value="Male">Vocational</option>
											<option value="Female">Post Graduate</option>  
										</select>
										
									</div>
									
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="special-label">Elementary:</label>
										<fieldset>
											<legend>School</legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"  placeholder="Email Address" required>
										</fieldset>
										<fieldset>
											<legend>Year Graduated</legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"  placeholder="Email Address" required>
										</fieldset>
										<fieldset>
											<legend>Awards</legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"  placeholder="Email Address" required>
										</fieldset>
									</div>
									
								</div>
								<div class="form-row">
								
									<div class="form-holder form-holder-2">
										<label class="special-label">Junior Highschool:</label>
										<fieldset>
											<legend>School</legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"  placeholder="Email Address" required>
										</fieldset>
										<fieldset>
											<legend>Year Graduated</legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"  placeholder="Email Address" required>
										</fieldset>
										<fieldset>
											<legend>Awards</legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"  placeholder="Email Address" required>
										</fieldset>
									</div>
									
								</div>
								<div class="form-row">
								
									<div class="form-holder form-holder-2">
										<label class="special-label">Senior Highschool:</label>
										<fieldset>
											<legend>School</legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"  placeholder="Email Address" required>
										</fieldset>
										<fieldset>
											<legend>Year Graduated</legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"  placeholder="Email Address" required>
										</fieldset>
										<fieldset>
											<legend>Awards</legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"  placeholder="Email Address" required>
										</fieldset>
									</div>
									
								</div>
								<div class="form-row">
									
									<div class="form-holder form-holder-2">
										<label class="special-label">College:</label>
										<fieldset>
											<legend>School</legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"  placeholder="Email Address" required>
										</fieldset>
										<fieldset>
											<legend>Course</legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"  placeholder="Email Address" required>
										</fieldset>
										<fieldset>
											<legend>Year Graduated</legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"  placeholder="Email Address" required>
										</fieldset>
										<fieldset>
											<legend>Awards</legend>
											<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"  placeholder="Email Address" required>
										</fieldset>
									</div>
									
								</div>
							</div>
			            </section>
			            <!-- SECTION 3 -->
			            <h2>
			            	<p class="step-icon"><span>03</span></p>
			            	<span class="step-text">Occupation</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">Occupation</h3>
									<p>Please enter your infomation and proceed to the next step so we can build your accounts.</p>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										
											{{-- <p>Gender</p> --}}
											<label class="special-label">Employment Status:</label>
												<select class="form-control" id="addGender" name="gender" required>
													<option selected="">Select Employment Status</option>
													<option value="Male">Employed</option>
													<option value="Female">Unemployed</option>  
													<option value="Female">Self-employed</option> 
												</select>
												<label class="special-label">Type of Employment:</label>
												<select class="form-control" id="addGender" name="gender" required>
													<option selected="">Select Employment Type</option>
													<option value="Male">N/A</option>
													<option value="Female">Permanent/Regular</option>  
													<option value="Female">Seasonal</option> 
													<option value="Female">Casual</option>  
													<option value="Female">Emergency</option> 
													
												</select>
												<label class="special-label">Occupation:</label>
												<select class="form-control" id="addGender" name="gender" required>
													<option selected="">Select Employment Type</option>
													<option value="Male">N/A</option>
													<option value="Female">Managers</option>  
													<option value="Female">Professionals</option> 
													<option value="Female">Technicians and Associate Professionals</option>  
													<option value="Female">Emergency</option> 
													
												</select>
												<label class="special-label">Salary:</label>
												<fieldset>
													<legend>Salary</legend>
													<input type="text" name="your_email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"  placeholder="Email Address" required>
												</fieldset>
											
										
										
									</div>
									
								</div>
							</div>
			            </section>
		        	</div>
		        </form>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script src="http://parsleyjs.org/dist/parsley.js"defer></script>
	
	<script src="{{ asset('dist/js3/main.js') }}"></script>

	<script>

	
		$(document).ready(function ()
			{
				document.getElementById('divothers').style.display="none";
				document.getElementById('divinborn').style.display="none";
				document.getElementById('divacquired').style.display="none";
			
			

					

			});	

		function text(x)
			{
				if (x==0)
				{
					document.getElementById("divothers").style.display="block";
				}

				if(x==1)
				{
					document.getElementById('divothers').style.display="none";
				}


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
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>