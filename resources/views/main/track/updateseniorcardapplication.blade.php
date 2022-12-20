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
			<form class="form" id="form" enctype="multipart/form-data" method="post" action="/updateseniorcardapplication" >
				@csrf
				<div class="form_wrap">
					<div class="form_1 data_info">
						<h2>Personal Information</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">
								
								<div class="input_wrap">
									<label for="email">First Name</label>
									<input type="text" name="firstname" class="input" id="firstname"  value="{{$client->first_name}}" style="text-transform: capitalize;" required>
									<i class="fas fa-check-circle"></i>
									<i class="fas fa-exclamation-circle"></i>
									<input type="hidden"  name="clientid" class="input" id="clientid" id="email" value="{{$client->id}}" style="text-transform: capitalize;" required>
									<input type="hidden"  name="appid" class="input" id="appid" id="email" value="@foreach ($client->client_applications as $app){{$app->id}}@endforeach" style="text-transform: capitalize;" required>

									<div class="error"></div>
								</div>
								
								<div class="input_wrap">
									<label for="email">Last Name</label>
									<input type="text"  name="lastname" class="input" id="lastname" id="email" value="{{$client->last_name}}"  style="text-transform: capitalize" required>
									<i class="fas fa-check-circle"></i>
									<i class="fas fa-exclamation-circle"></i>
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="email">Middle Name</label>
									<input type="text"  name="middlename" class="input" value="{{$client->middle_name}}" style="text-transform: capitalize;" id="middlename" >
									
								</div>
								<div class="input_wrap">
									<label for="password">Extension Name</label>
									<input type="text" name="extensionname" class="input" value="{{$client->extension_name}}" style="text-transform: capitalize;" id="extensionname">
								</div>

							
								<div class="input_wrap">
									<label for="confirm_password">Gender</label>
									<select class="select" id="addGender" name="gender" required>
										
										<option value="Male" <?php if($client->sex == "Male") echo 'selected="selected"'; ?> >Male</option>
										<option value="Female" <?php if($client->sex == "Female") echo 'selected="selected"'; ?> >Female</option>
										 
									</select>
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="confirm_password">Blood Type</label>
									<select class="select" id="addBloodtype" name="bloodtype" required>
										
										<option value="A" <?php if($client->blood_type == "A") echo 'selected="selected"'; ?> >A</option>
										<option value="B"<?php if($client->blood_type == "B") echo 'selected="selected"'; ?> >B</option>
										<option value="AB"<?php if($client->blood_type == "AB") echo 'selected="selected"'; ?> >AB</option>
										<option value="O"<?php if($client->blood_type == "O") echo 'selected="selected"'; ?> >O</option>
									</select>
								</div>
								<div class="input_wrap">
									<label for="confirm_password">Civil Status</label>
									<select class="select" id="addCivilStatus" name="civilstatus" required>
									
										<option value="Married" <?php if($client->civil_status == "Married") echo 'selected="selected"'; ?> >Married</option>
										<option value="Widowed" <?php if($client->civil_status == "Widowed") echo 'selected="selected"'; ?> >Widowed</option>
										<option value="Separated" <?php if($client->civil_status == "Separated") echo 'selected="selected"'; ?> >Separated</option>
										<option value="Divorced" <?php if($client->civil_status == "Divorced") echo 'selected="selected"'; ?> >Divorced</option>
										<option value="Single" <?php if($client->civil_status == "Single") echo 'selected="selected"'; ?> >Single</option>
									</select>
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="confirm_password">Educational Attainment</label>
									<select class="select" id="addEducation" name="educationalattainment" required>
										
										<option value="None" <?php if($client->educational_attainment == "None") echo 'selected="selected"'; ?> >None</option>
										<option value="Kindergarten" <?php if($client->educational_attainment == "Kindergarten") echo 'selected="selected"'; ?> >Kindergarten</option>
										<option value="Elementary" <?php if($client->educational_attainment == "Elementary") echo 'selected="selected"'; ?> >Elementary</option>
										<option value="Junior HighSchool" <?php if($client->educational_attainment == "Junior HighSchool") echo 'selected="selected"'; ?> >Junior HighSchool</option>
										<option value="Senior High School" <?php if($client->educational_attainment == "Senior High School") echo 'selected="selected"'; ?> >Senior High School</option>
										<option value="College" <?php if($client->educational_attainment == "College") echo 'selected="selected"'; ?> >College</option>
										<option value="Vocational" <?php if($client->educational_attainment == "Vocational") echo 'selected="selected"'; ?> >Vocational</option>
										<option value="Post Graduate" <?php if($client->educational_attainment == "Post Graduate") echo 'selected="selected"'; ?> >Post Graduate</option>
									
									</select>
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="confirm_password">Nationality</label>
									<input type="text" name="nationality" class="input" id="nationality"  value="{{$client->nationality}}">
								</div>
								<div class="input_wrap">
									<label for="confirm_password">Religion</label>
									<input type="text" name="religion" class="input" id="religion" value="{{$client->religion}}">
								</div>
								<div class="input_wrap">
									<label for="confirm_password">Skill/Talent</label>
									<input type="text" name="skill" class="input" id="skill" value="{{$client->skills_talents}}">
								</div>
								<div class="input_wrap">
									<label for="confirm_password">Hobies</label>
									<input type="text" name="hobbies" class="input" id="confirm_password" value="{{$client->hobbies}}">
								</div>
								<div class="input_wrap">
									<label for="confirm_password">Date of Birth</label>
									<input data-format="MM/DD/YYYY" class="input" type="date" id="birthdate" value="{{$client->birth_date}}" name="birthdate">
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="confirm_password">Place of Birth</label>
									<input type="text" name="birthplace" class="input" id="birthplace" value="{{$client->birth_place}}">
									<div class="error"></div>
								</div>
							</div>
						
					</div>
					<div class="form_2 data_info" style="display: none;">
						<h2>Present Address</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">
								<div class="input_wrap">
									<label for="user_name">Street</label>
									<input type="text" name="street" class="input" id="street" value="{{$client->street}}">
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="first_name">Barangay</label>
									<select class="select" id="addBarangay" name="barangay" required>
										
										@foreach ($barangaylist as $item)
										{{-- <option selected="">Select District Assigned</option> --}}
										

											<option value="{{$item->id}}"<?php if($client->barangays->name == $item->name ) echo 'selected="selected"'; ?> >{{$item->name}}</option>
										@endforeach
									<select>
										<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="">City/Municipality</label>
									<input type="text" name="city" class="input"  value="{{$client->municipality}}" id="city">
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="">Province</label>
									<input type="text" name="province" class="input" value="{{$client->province}}" id="province">
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="">Region</label>
									<input type="text" name="region" class="input" value="{{$client->region}}" id="region">
									<div class="error"></div>
								</div>
							</div>
						
					</div>
					<div class="form_3 data_info" style="display: none;">
						<h2>Occupation</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">
								
								<div class="input_wrap">
									<label for="first_name">Status of Employment</label>
									<select class="select" id="addEmployment" name="employmentstatus" required>
										<option value="Employed" <?php if($client->occupations->employment_status == "Employed") echo 'selected="selected"'; ?> >Employed</option>
										<option value="Unemployed" <?php if($client->occupations->employment_status == "Unemployed") echo 'selected="selected"'; ?> >Unemployed</option>
										<option value="Self Employed" <?php if($client->occupations->employment_status == "Self Employed") echo 'selected="selected"'; ?> >Self Employed</option>
									</select>
									<div class="error"></div>
								
								</div>
								<div class="input_wrap">
									<label class="special-label">Category of Employment:</label>
									<select class="select" id="addCategory" name="employmentcategory" required>
								
										<option value="N/A"<?php if($client->occupations->employment_category == "N/A") echo 'selected="selected"'; ?> >N/A</option>
										<option value="Government"<?php if($client->occupations->employment_category == "Government") echo 'selected="selected"'; ?> >Government</option>
										<option value="Private"<?php if($client->occupations->employment_category == "Private") echo 'selected="selected"'; ?> >Private</option>
									</select>
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label class="special-label">Type of Employment:</label>
									<select class="select" id="addType" name="employmenttype" required>
										<option selected="">{{$client->occupations->employment_type}}</option>
										<option value="N/A"<?php if($client->occupations->employment_type == "N/A") echo 'selected="selected"'; ?> >N/A</option>
										<option value="Permanent/Regular"<?php if($client->occupations->employment_type == "Permanent/Regular") echo 'selected="selected"'; ?> >Permanent/Regular</option>
										<option value="Seasonal"<?php if($client->occupations->employment_type == "Seasonal") echo 'selected="selected"'; ?> >Seasonal</option>
										<option value="Casual"<?php if($client->occupations->employment_type == "Casual") echo 'selected="selected"'; ?> >Casual</option>
										<option value="Emergency"<?php if($client->occupations->employment_type == "Emergency") echo 'selected="selected"'; ?> >Emergency</option>
										
									</select>
									<div class="error"></div>
								</div>

									

								<div class="input_wrap">
									<label class="special-label">Occupation</label>
									
									<label class="container1">Managers
									<input type="radio" name="occupation" value="Managers" onclick="text(1)" <?php echo ($client->occupations->occupation == "Managers" ? 'checked="checked"': ''); ?>>
									<span class="checkmark1"></span>
									</label>
									
									<label class="container1">Professionals
									<input type="radio" name="occupation" value="Professionals" onclick="text(1)"  <?php echo ($client->occupations->occupation == "Professionals" ? 'checked="checked"': ''); ?>>
									<span class="checkmark1"></span>
									</label>
									
									<label class="container1"> Technicians and Associate Professionals
									<input type="radio" name="occupation" value="Technicians and Associate Professionals" onclick="text(1)" <?php echo ($client->occupations->occupation == "Technicians and Associate Professionals" ? 'checked="checked"': ''); ?>> 
									<span class="checkmark1"></span>
									</label>

									<label class="container1">Clerical Support Workers
									<input type="radio" name="occupation" value="Clerical Support Workers" onclick="text(1)" <?php echo ($client->occupations->occupation == "Clerical Support Workers" ? 'checked="checked"': '');?> >
									<span class="checkmark1"></span>
									</label>
									
									<label class="container1">Service and Sales Workers
									<input type="radio" name="occupation"  value="Service and Sales Workers" onclick="text(1)" <?php echo ($client->occupations->occupation == "Service and Sales Workers" ? 'checked="checked"': '');?> >
									<span class="checkmark1"></span>
									</label>
									
									<label class="container1"> Skilled Agricultural, Forestry and Fishery Workers
									<input type="radio" name="occupation"  value="Skilled Agricultural, Forestry and Fishery Workers" onclick="text(1)" <?php echo ($client->occupations->occupation == "Skilled Agricultural, Forestry and Fishery Workers" ? 'checked="checked"': '');?>> 
									<span class="checkmark1"></span>
									</label>

									<label class="container1">Craft and Related Trade Workers
									<input type="radio" name="occupation" value="Craft and Related Trade Workers"  onclick="text(1)" <?php echo ($client->occupations->occupation == "Craft and Related Trade Workers" ? 'checked="checked"': '');?>>
									<span class="checkmark1"></span>
									</label>
									
									<label class="container1">Plant and MAchine Operators and Assemblers
									<input type="radio" name="occupation" value="Plant and Machine Operators and Assemblers" onclick="text(1)" <?php echo ($client->occupations->occupation == "Plant and Machine Operators and Assemblers" ? 'checked="checked"': '');?>>
									<span class="checkmark1"></span>
									</label>
									
									<label class="container1"> Elementary Occupations
									<input type="radio" name="occupation"  value="Elementary Occupations" onclick="text(1)" <?php echo ($client->occupations->occupation == "Elementary Occupations" ? 'checked="checked"': '');?>> 
									<span class="checkmark1"></span>
									</label>

									<label class="container1"> Armed Forces Occupation
									<input type="radio" name="occupation"  value="Armed Forces Occupation" onclick="text(1)" <?php echo ($client->occupations->occupation == "Armed Forces Occupation" ? 'checked="checked"': '');?>> 
									<span class="checkmark1"></span>
									</label>

									<label class="container1"> Others, specify
									<input type="radio" name="occupation"  value="Others, specify" onclick="text(0)" <?php echo ($client->occupations->occupation == "Others, specify" ? 'checked="checked"': '');?>> 
									<span class="checkmark1"></span>
									</label>

									<div class="error" id="bank"></div>

									<div id="divothers">
										<label for="">Specify</label>
										<input type="text" name="othersoccupation" class="input" id="others" value="{{$client->occupations->others}}">
									 </div>

								</div>
								<div class="input_wrap">
									<label for="">Salary</label>
									<input type="text" name="salary" class="input" id="salary" value="{{$client->occupations->salary}}">
								</div>
							</div>
						
					</div>
					<div class="form_4 data_info" style="display: none;">
						<h2>Contact Details</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">
								<div class="input_wrap">
									<label for="company">Mobile Number</label>
									<input type="text" name="mobilenumber" class="input" id="mobile" value="{{$client->contact_number}}">
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="experience">Landline Number</label>
									<input type="text" name="landlinenumber" class="input" id="landline" value="{{$client->landline_number}}">
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="designation">Email Address</label>
									<input type="text" name="emailaddress" class="input" id="email" value="{{$client->email_address}}">
									<div class="error"></div>
								</div>
							</div>
						
					</div>
					<div class="form_5 data_info" style="display: none;">
						<h2>Upload Requirements</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">

								<div class="input_wrap">
									<label for="phone">Birth Certificate/ Any VALID Documents with DATE OF BIRTH</label>
									
								
								
									
									<img id="picture"  class="rounded-md" src="{{ ('/images/picture/'.$client->client_application_requirements[0]->filename ) }}">
									<img id="picture"  class="rounded-md" src="{{ ('/images/birth/'.$client->client_application_requirements[0]->filename ) }}">
									<img id="picture"  class="rounded-md" src="{{ ('/images/barangay/'.$client->client_application_requirements[0]->filename ) }}">
								</div>
								<div class="input_wrap">
									<label for="phone">Birth Certificate/ Any VALID Documents with DATE OF BIRTH</label>
									<input type="file" id="Image" class="select" name="imagebirth" value="{{ old('c') }}">
								</div>
								<div class="input_wrap">
									<label for="email">Barangay certificate of residency</label>
									<input type="file" id="Image" class="select" name="imagebarangay" value="{{ old('c') }}">
								</div>
								<div class="input_wrap">
									<label for="email">Latest 2x2 picture with white background</label>
									<input type="file" id="Image" class="select" name="imagepicture" value="{{ old('c') }}">
								</div>
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


	{{-- <div class="modal_wrapper">
		<div class="shadow"></div>
		<div class="success_wrap">
			<span class="modal_icon"><ion-icon name="checkmark-sharp"></ion-icon></span>
			<p>You have successfully completed the process.</p>
		</div>
	</div> --}}
	
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
						text: "Successfully saved!",
						icon: "error",
						button: "ok",
					})
				
				
				</script>
			<?php
			unset($_SESSION['fail']);
		}
   
?>
 
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
</body>
</html>