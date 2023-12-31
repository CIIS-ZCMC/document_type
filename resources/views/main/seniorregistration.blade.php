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
			<div class="header">
				<ul>
					<li class="active form_1_progessbar">
						<div>
							<p>1</p>
						</div>
						<label for="">Personal</label>
					</li>
					<li class="form_2_progessbar">
						<div>
							<p>2</p>
						</div>
						<label for="">Address</label>
					</li>
					<li class="form_3_progessbar">
						<div>
							<p>3</p>
						</div>
						<label for="">Occupation</label>
					</li>
					<li class="form_4_progessbar">
						<div>
							<p>4</p>
						</div>
						<label for="">Contact</label>
					</li>
					<li class="form_5_progessbar">
						<div>
							<p>5</p>
						</div>
						<label for="">Requirements</label>
					</li>
					
				</ul>
			</div>
			<form class="form" id="form" enctype="multipart/form-data" method="post" action="/createsenior" >
				@csrf
				<div class="form_wrap">
					<div class="form_1 data_info">
						<h2>Personal Information</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">
								
								<div class="input_wrap">
									<label class="required" for="email">First Name</label>
									<input type="text" name="firstname" class="input" id="firstname" style="text-transform: capitalize;" required>
									<i class="fas fa-check-circle"></i>
									<i class="fas fa-exclamation-circle"></i>
									<div class="error"></div>
								</div>
								
								<div class="input_wrap">
									<label class="required"  for="email">Last Name</label>
									<input type="text"  name="lastname" class="input" id="lastname" id="email"  style="text-transform: capitalize;" required>
									<i class="fas fa-check-circle"></i>
									<i class="fas fa-exclamation-circle"></i>
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="email">Middle Name</label>
									<input type="text"  name="middlename" class="input"  style="text-transform: capitalize;" id="middlename" >
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="password">Extension Name</label>
									<input type="text" name="extensionname" class="input"  style="text-transform: capitalize;" id="extensionname">
								</div>
								<div class="input_wrap">
									<label class="required" for="confirm_password">Gender</label>
									<select class="select" id="addGender" name="gender" required>
										<option value="0" selected>Select Gender</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>  
									</select>
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="confirm_password">Blood Type</label>
									<select class="select" id="addBloodtype" name="bloodtype" required>
										<option value="N/A" selected="">Select Blood Type</option>
										<option value="A+">A+</option>
										<option value="A-">A-</option>
										<option value="B+">B+</option>  
										<option value="B-">B-</option>  
										<option value="AB+">AB+</option>
										<option value="AB-">AB-</option>
										<option value="O+">O+</option>  
										<option value="O-">O-</option> 
									</select>
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label class="required"  for="confirm_password">Civil Status</label>
									<select class="select" id="addCivilStatus" name="civilstatus" required>
										<option value="0" selected>Select Civil Status</option>
										<option value="Married">Married</option>
										<option value="Widowed">Widowed</option>  
										<option value="Separated">Separated</option>
										<option value="Divorced">Divorced</option>  
										<option value="Single">Single</option>  
									</select>
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label class="required"  for="confirm_password">Educational Attainment</label>
									<select class="select" id="addEducation" name="educationalattainment" required>
										<option value="0" selected>Select</option>
										<option value="None">None</option>
										<option value="Kindergarten">Kindergarten</option>  
										<option value="Elementary">Elementary</option>
										<option value="Junior HighSchool">Junior High School</option>  
										<option value="Senior High School">Senior High School</option>  
										<option value="College">College</option>
										<option value="Vocational">Vocational</option>  
										<option value="Post Graduate">Post Graduate</option>
									
									</select>
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="confirm_password">Nationality</label>
									<input type="text" name="nationality" class="input" id="nationality">
								</div>
								<div class="input_wrap">
									<label for="confirm_password">Religion</label>
									<input type="text" name="religion" class="input" id="religion">
								</div>
								<div class="input_wrap">
									<label for="confirm_password">Skill/Talent</label>
									<input type="text" name="skill" class="input" id="skill">
								</div>
								<div class="input_wrap">
									<label for="confirm_password">Hobbies</label>
									<input type="text" name="hobbies" class="input" id="confirm_password">
								</div>
								<div class="input_wrap">
									<label class="required"  for="confirm_password">Date of Birth</label>
									<input data-format="MM/DD/YYYY" class="input" type="date" id="birthdate" name="birthdate">
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label class="required"  for="confirm_password">Place of Birth</label>
									<input type="text" name="birthplace" class="input" id="birthplace">
									<div class="error"></div>
								</div>
							</div>
						
					</div>
					<div class="form_2 data_info" style="display: none;">
						<h2>Present Address</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">
								<div class="input_wrap">
									<label class="required"  for="user_name">Street</label>
									<input type="text" name="street" class="input" id="street">
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label class="required"  for="first_name">Barangay</label>
									<select class="select" id="addBarangay" name="barangay" required>
										<option value="0" selected>Select Barangay</option>
										@foreach ($barangaylist as $item)
										{{-- <option selected="">Select District Assigned</option> --}}
										

											<option value="{{$item->id}}">{{$item->name}}</option>
										@endforeach
									<select>
										<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label class="required"  for="">City/Municipality</label>
									<input type="text" name="city" class="input" id="city">
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label class="required"  for="">Province</label>
									<input type="text" name="province" class="input" id="province">
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label class="required"  for="">Region</label>
									<input type="text" name="region" class="input" id="region">
									<div class="error"></div>
								</div>
							</div>
						
					</div>
					<div class="form_3 data_info" style="display: none;">
						<h2>Occupation</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">
								
								<div class="input_wrap">
									<label class="required"  for="first_name">Status of Employment</label>
									<select class="select" id="addEmployment" name="employmentstatus" required>
										<option value="0" selected>Select Employment Status</option>
										<option value="Employed">Employed</option>
										<option value="Unemployed">Unemployed</option>  
										<option value="Self_employed">Self-employed</option> 
									</select>
									<div class="error"></div>
								
								</div>
								<div class="input_wrap">
									<label class="required" >Category of Employment:</label>
									<select class="select" id="addCategory" name="employmentcategory" required>
										<option value="0" selected>Select</option>
										<option value="N/A">N/A</option>
										<option value="Government">Government</option>  
										<option value="Private">Private</option> 
									</select>
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label class="required" >Type of Employment:</label>
									<select class="select" id="addType" name="employmenttype" required>
										<option value="0" selected>Select Employment Type</option>
										<option value="N/A">N/A</option>
										<option value="Permanent/Regular">Permanent/Regular</option>  
										<option value="Seasonal">Seasonal</option> 
										<option value="Casual">Casual</option>  
										<option value="Emergency">Emergency</option> 
										
									</select>
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label class="required">Occupation</label>
														
									<label class="container1">Managers
									<input type="radio" name="occupation" value="Managers" onclick="text(1)">
									<span class="checkmark1"></span>
									</label>
									
									<label class="container1">Professionals
									<input type="radio" name="occupation" value="Professionals" onclick="text(1)">
									<span class="checkmark1"></span>
									</label>
									
									<label class="container1"> Technicians and Associate Professionals
									<input type="radio" name="occupation" value="Technicians and Associate Professionals" onclick="text(1)"> 
									<span class="checkmark1"></span>
									</label>

									<label class="container1">Clerical Support Workers
									<input type="radio" name="occupation" value="Clerical Support Workers" onclick="text(1)">
									<span class="checkmark1"></span>
									</label>
									
									<label class="container1">Service and Sales Workers
									<input type="radio" name="occupation"  value="Service and Sales Workers" onclick="text(1)">
									<span class="checkmark1"></span>
									</label>
									
									<label class="container1"> Skilled Agricultural, Forestry and Fishery Workers
									<input type="radio" name="occupation"  value="Skilled Agricultural, Forestry and Fishery Workers" onclick="text(1)"> 
									<span class="checkmark1"></span>
									</label>

									<label class="container1">Craft and Related Trade Workers
									<input type="radio" name="occupation" value="Craft and Related Trade Workers"  onclick="text(1)">
									<span class="checkmark1"></span>
									</label>
									
									<label class="container1">Plant and MAchine Operators and Assemblers
									<input type="radio" name="occupation" value="Plant and MAchine Operators and Assemblers" onclick="text(1)">
									<span class="checkmark1"></span>
									</label>
									
									<label class="container1"> Elementary Occupations
									<input type="radio" name="occupation"  value="Elementary Occupations" onclick="text(1)"> 
									<span class="checkmark1"></span>
									</label>

									<label class="container1"> Armed Forces Occupation
									<input type="radio" name="occupation"  value="Armed Forces Occupation" onclick="text(1)"> 
									<span class="checkmark1"></span>
									</label>

									<label class="container1"> Others, specify
									<input type="radio" name="occupation"  value="thers, specify" onclick="text(0)"> 
									<span class="checkmark1"></span>
									</label>
									<div class="error" id="bank"></div>

									<div id="divothers">
										<label for="">Specify</label>
										<input type="text" name="othersoccupation" class="input" id="others">
									 </div>

								</div>
								<div class="input_wrap">
									<label for="">Salary</label>
									<input type="text" name="salary" class="input" id="salary">
								</div>
							</div>
						
					</div>
					<div class="form_4 data_info" style="display: none;">
						<h2>Contact Details</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">
								<div class="input_wrap">
									<label class="required"  for="company">Mobile Number</label>
									<input type="text" name="mobilenumber" class="input" id="mobilenumber" required>
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="experience">Landline Number</label>
									<input type="text" name="landlinenumber" class="input" id="landline">
									
								</div>
								<div class="input_wrap">
									<label class="required" for="designation">Email Address</label>
									<input type="text" name="emailaddress" class="input" id="emailaddress" required>
									<div class="error"></div>
								</div>
							</div>
						
					</div>
					<div class="form_5 data_info" style="display: none;">
						<h2>Upload Requirements</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
						<div class="form_container">
							<div class="input_wrap">
								<label class="required"  for="phone">Birth Certificate/ Any VALID Documents with DATE OF BIRTH</label>
								<input type="file" id="imagebirth" class="select" name="imagebirth" value="{{ old('c') }}" required>
								<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label class="required"  for="email">Barangay certificate of residency</label>
								<input type="file" id="imagebarangay" class="select" name="imagebarangay" value="{{ old('c') }}" required>
								<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label class="required" for="email">Latest 2x2 picture with white background</label>
								<input type="file" id="imagepicture" class="select" name="imagepicture" value="{{ old('c') }}" required>
								<div class="error"></div>
							</div>
						</div>
						
					</div>
					
				</div>

				<div class="btns_wrap">
					<div class="common_btns form_1_btns">
						<a href="/main" style="text-decoration: none;">
							
							<button type="button" onclick="unsave()" class="btn_back" style="margin-right: 5px;"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
						
						</a>
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


{{-- 
	<script>
			window.onbeforeunload = function() {
				//Whatever
				return "WARNING! You have unsaved changes that may be lost!";
			}
	
	</script> --}}
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script src="http://parsleyjs.org/dist/parsley.js"defer></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script src="{{ asset('dist/js3/main.js') }}"></script>
	
	<script>
	
	</script>
  <?php
  session_start();
		if (isset($_SESSION['success']) == 'success') 
		{
			?>
				<script>
				swal({
						
						title: "REGISTERED",
						text: "Successfully registered! We sent the application reference number to your provided email. Please use your reference number to track your application.Thank you! ",
						icon: "success",
						buttons: ["Register Again!","Main Menu"],
						type: "success"}).then(okay => {
						if (okay) {
							window.location.href = "http://127.0.0.1:8000/main";
						}
						else{
							window.location.href = "http://127.0.0.1:8000/registration";
						}
						});
				
					
				
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
						text: "Fail to register!",
						icon: "error",
						type: "error"}).then(okay => {
						if (okay) {
							window.location.href = "http://127.0.0.1:8000/main";
						}
						});
				
				
				</script>
			<?php
			unset($_SESSION['fail']);
		}
   
?>
 

 
<script src="{{ asset('dist/js3/main.js') }}"></script>


	<script>

var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();

if (dd < 10) {
   dd = '0' + dd;
}

if (mm < 10) {
   mm = '0' + mm;
} 
    
today = yyyy + '-' + mm + '-' + dd;
document.getElementById("birthdate").setAttribute("max", today);

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
</body>
</html>