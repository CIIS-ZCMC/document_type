<!DOCTYPE html>
<html>
<head>
	<title>Progressive Form | Multi Steps Form</title>
	
	<link rel="stylesheet" href="{{ asset('dist/css3/style2.css') }}"/>
	
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
						
						<label for="">Personal</label>
					</li>
					<li class="form_2_progessbar">
						
						<div data-title="Contact">
							<p>2</p>
						</div>
						<label for="">Occupation</label>
					</li>
					<li class="form_3_progessbar">
						<div>
							<p>3</p>
						</div>
						<label for="">Family</label>
					</li>
					<li class="form_4_progessbar">
						<div>
							<p>4</p>
						</div>
						<label for="">Education</label>
					</li>
					<li class="form_5_progessbar">
						<div>
							<p>5</p>
						</div>
						<label for="">Community</label>
					</li>
					<li class="form_6_progessbar">
						<div>
							<p>6</p>
						</div>
						<label for="">Seminars</label>
					</li>
					<li class="form_7_progessbar">
						<div>
							<p>7</p>
						</div>
						<label for="">Upload</label>
					</li>
					
				</ul>
			</div>
			<form class="form" id="form" enctype="multipart/form-data" method="post" action="/createsoloparent">
				@csrf
				<div class="form_wrap">
					<div class="form_1 data_info">
						<h2>Personal Information</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">
								<div class="input_wrap">
									<label for="email">First Name</label>
									<input type="text" name="firstname" class="input" id="firstname"  style="text-transform: capitalize;" required>
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="email">Last Name</label>
									<input type="text" name="lastname" class="input"  style="text-transform: capitalize;" id="lastname">
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="email">Middle Name</label>
									<input type="text" name="middlename" class="input"  style="text-transform: capitalize;" id="middlename">
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="text">Extension Name</label>
									<input type="text" name="extensionname" class="input" style="text-transform: capitalize;" id="extensionname">
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="confirm_text">Sex</label>
									<select class="select" id="addGender" name="gender" required>
										<option  value="0" selected>Select Sex</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>  
									</select>
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="confirm_text">Blood Type</label>
									<select class="select" id="addBlood" name="bloodtype" required>
										<option  selected>Select Blood Type</option>
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
									<label for="confirm_text">Civil Status</label>
									<select class="select" id="addCivilStatus" name="civilstatus" required>
										<option  value="0" selected>Select Civil Status</option>
										<option value="Married">Maried</option>
										<option value="Widowed">Widowed</option>  
										<option value="Separated">Separated</option>
										<option value="Divorced">Divorced</option>  
										<option value="Single">Single</option>  
									</select>
									<div class="error"></div>
								</div>
								
								<div class="input_wrap">
									<label for="confirm_text">Reason for being a solo parent</label>
									<select class="select" id="addReasonr" name="reason" required>
										<option selected>Select</option>
										<option value="Death of Spouse">Death of Spouse</option>
										<option value="Abandonment">Abandonment</option>  
										<option value="Detained">Detained</option>
									</select>
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="confirm_text">Educational Attainment</label>
									<select class="select" id="addEducation" name="educationalattainment" required>
										<option  value="0" selected>Select</option>
										<option value="None">None</option>
										<option value="Kindergarten">Kindergarten</option>  
										<option value="Elementary">Elementary</option>
										<option value="Junior High School">Junior High School</option>  
										<option value="Senior High School">Senior High School</option>  
										<option value="College">College</option>
										<option value="Vocational">Vocational</option>  
										<option value="Post Graduate">Post Graduate</option>
									</select>
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="confirm_text">Nationality</label>
									<input type="text" name="nationality" class="input"  style="text-transform: capitalize;" id="nationality">
								</div>
								<div class="input_wrap">
									<label for="confirm_text">Religion</label>
									<input type="text" name="religion" class="input"  style="text-transform: capitalize;" id="religion">
								</div>
								<div class="input_wrap">
									<label for="confirm_text">Date of Birth</label>
									<input data-format="MM/DD/YYYY" class="input" type="date" id="birthdate" name="birthdate">
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="confirm_text">Place of Birth</label>
									<input type="text" name="birthplace" class="input"  style="text-transform: capitalize;" id="birthplace">
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="confirm_text">Skill/Talent</label>
									<input type="text" name="skill" class="input"  style="text-transform: capitalize;" id="skill">
								</div>
								<div class="input_wrap">
									<label for="confirm_text">Hobbies</label>
									<input type="text" name="hobbies" class="input"  style="text-transform: capitalize;" id="hobbies">
								</div>
							</div>

							<h2></h2>
							<h2>Present Address</h2>

							<div class="input_wrap">
								<label for="user_name">Street</label>
								<input type="text" name="street" class="input" id="street" style="text-transform: capitalize;">
								<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label for="first_name">Barangay</label>
								<select class="select" id="addBarangay" name="barangay" required>
									<option value="0" selected>Select Barangay</option>
									@foreach ($barangaylist as $item)
									
										<option value="{{$item->id}}">{{$item->name}}</option>
									@endforeach
								<select>
								<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label for="last_name">City/Municipality</label>
								<input type="text" name="city" class="input" id="city" style="text-transform: capitalize;">
								<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label for="last_name">Province</label>
								<input type="text" name="province" class="input" id="province" style="text-transform: capitalize;">
								<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label for="last_name">Region</label>
								<input type="text" name="region" class="input" id="region">
								<div class="error"></div>
							</div>

							<h2></h2>
							<h2>Contact Information</h2>

							<div class="input_wrap">
								<label for="company">Mobile Number</label>
								<input type="text" name="mobilenumber" class="input" id="mobilenumber">
								<div class="error"></div>
							</div>
		
							<div class="input_wrap">
								<label for="experience">Landline Number</label>
								<input type="text" name="landlinenumber" class="input" id="landlinenumber"  style="text-transform: capitalize;">
							</div>
							<div class="input_wrap">
								<label for="designation">Email Address</label>
								<input type="text" name="emailaddress" class="input" id="emailaddress" >
								<div class="error"></div>
							</div>
						
						
					</div>
		
					<div class="form_2 data_info" style="display: none;">
						<h2>Occupation</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
						<div class="form_container">
										
							<div class="input_wrap">
								<label for="first_name">Status of Employment</label>
								<select class="select" id="addEmployment" name="employmentstatus" required>
									<option value="0" selected>Select Employment Status</option>
									<option value="Employed">Employed</option>
									<option value="Unemployed">Unemployed</option>  
									<option value="Self_employed">Self-employed</option> 
								</select>
								<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label class="special-label">Category of Employment:</label>
								<select class="select" id="addCategory" name="employmentcategory" required>
									<option value="0" selected>Select</option>
									<option value="N/A">N/A</option>
									<option value="Government">Government</option>  
									<option value="Private">Private</option> 
								</select>
								<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label class="special-label">Type of Employment:</label>
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
								<label class="special-label">Occupation</label>
													
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
								<input type="radio" name="occupation"  value="Others, specify" onclick="text(0)"> 
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
		
					<div class="form_3 data_info" style="display: none;">
						<h2>Family Composition</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
						
						<div class="form_container">
							<div id="family">
								<div class="input_wrap" >
									<label for="experience">Relationship</label>
									<input type="text" name="relationship[]" class="input" id="achievementaward" style="text-transform: capitalize;" >
									<label for="experience">Last Name</label>
									<input type="text" name="familylastname[]" class="input" id="type" style="text-transform: capitalize;" >
									<label for="experience">First Name</label>
									<input type="text" name="familyfirstname[]" class="input" id="schoolname" style="text-transform: capitalize;" >
									<label for="experience">Middle Name</label>
									<input type="text" name="familymiddlename[]" class="input" id="course" style="text-transform: capitalize;" >
									<label for="experience">Extension Name</label>
									<input type="text" name="familyextensionname[]" class="input" id="yeargraduated" style="text-transform: capitalize;" >
									<div class="input_wrap">
										<label for="confirm_text">Sex</label>
										<select class="select" id="addGender" name="familygender[]" >
											<option value="" selected="">Select Gender</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>  
										</select>
									</div>
									<div class="input_wrap">
										<label for="confirm_text">Date of Birth</label>
										<input data-format="MM/DD/YYYY" class="input" type="date" id="familybirthdate[]" name="familybirthdate[]">
									</div>
									 <!---->
									 <style>
										    
											.add_rel {
											display: flex;
											justify-content: flex-end;
											align-items: center;
											width: 80%;
											margin: auto;
											}
											#addfamily {
												background: #0083ce;
												border: none;
												cursor: pointer;
												padding: 7px 10px; 
												color: white;
												width: 100px;
												margin: 20px 0;
											}
									 </style>
									<div class="add_rel">
										<button type="button" class="btn btn-warning add_item_btn" name="addfamily" id="addfamily">ADD</button>
									</div>
								</div>
							</div>
							
						</div>	
						{{-- <div class="form_container">
							<div style="overflow-x:auto;">
								<table class="table table-bordered" id="table_field">
									<tr>
										<th>Name</th>
										<th>Sex</th>
										<th>Relationship</th>
										<th>Age</th>
										<th>Date of Birth</th>
										
										<th>Action</th>
		
									</tr>
										
									<tr>
										
										<td><input type="text" name="familyfullname"></td>
										<td><input size="5" type="text" name="familysex"></td>
										<td><input size="10" type="text" name="familyrelationship"></td>
										<td><input size="2" type="text" name="familyage"></td>
										<td><input data-format="yyyy-MM-dd" class="input" type="date" id="familybirthdate" name="familybirthdate"></td>
										
										<td><input type="button" class="btn btn-warning" name="add" id="add" value="ADD"></td>
									</tr>
								</table>
							</div>
						</div> --}}
						
					</div>
					<div class="form_4 data_info" style="display: none;">
						<h2>Educational Attainment</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">				
								{{-- <div class="input_wrap">
									<label for="company">Name of School </label>
									<input type="text" name="Current Company" class="input" id="company">
									</div>
									<div class="input_wrap">
										<label for="experience">Year Graduated</label>
										<input type="text" name="Total Experience" class="input" id="experience">
									</div>
									<div class="input_wrap">
										<label for="designation">Achievement/Award Received</label>
										<input type="text" name="Designation" class="input" id="designation">
									</div>
									
									<label for="company">High School</label>
									<div class="input_wrap">
										<label for="company">Name of School </label>
										<input type="text" name="Current Company" class="input" id="company">
									</div>
									<div class="input_wrap">
										<label for="experience">Year Graduated</label>
										<input type="text" name="Total Experience" class="input" id="experience">
									</div>
									<div class="input_wrap">
										<label for="designation">Achievement/Award Received</label>
										<input type="text" name="Designation" class="input" id="designation">
									</div>
									<label for="company">Senior High School</label>
									<div class="input_wrap">
										<label for="company">Name of School </label>
										<input type="text" name="Current Company" class="input" id="company">
									</div>
									<div class="input_wrap">
										<label for="company">Courses</label>
										<input type="text" name="Current Company" class="input" id="company">
									</div>
									<div class="input_wrap">
										<label for="experience">Year Graduated</label>
										<input type="text" name="Total Experience" class="input" id="experience">
									</div>
									<div class="input_wrap">
										<label for="designation">Achievement/Award Received</label>
										<input type="text" name="Designation" class="input" id="designation">
									</div>
		
									<label for="company">Vocational</label>
									<div class="input_wrap">
										<label for="company">Name of School </label>
										<input type="text" name="Current Company" class="input" id="company">
									</div>
									<div class="input_wrap">
										<label for="company">Courses</label>
										<input type="text" name="Current Company" class="input" id="company">
									</div>
									<div class="input_wrap">
										<label for="experience">Year Graduated</label>
										<input type="text" name="Total Experience" class="input" id="experience">
									</div>
									<div class="input_wrap">
										<label for="designation">Achievement/Award Received</label>
										<input type="text" name="Designation" class="input" id="designation">
									</div>
		
									<label for="company">College</label>
									<div class="input_wrap">
										<label for="company">Name of School </label>
										<input type="text" name="Current Company" class="input" id="company">
									</div>
									<div class="input_wrap">
										<label for="company">Courses</label>
										<input type="text" name="Current Company" class="input" id="company">
									</div>
									<div class="input_wrap">
										<label for="experience">Year Graduated</label>
										<input type="text" name="Total Experience" class="input" id="experience">
									</div>
									<div class="input_wrap">
										<label for="designation">Achievement/Award Received</label>
										<input type="text" name="Designation" class="input" id="designation">
								</div> --}}
								<div id="education">
									<div class="input_wrap" >
										<label for="experience">Type</label>
										<input type="text" name="type[]" class="input" id="type" style="text-transform: capitalize;" >
										<label for="experience">Name of School</label>
										<input type="text" name="schoolname[]" class="input" id="schoolname" style="text-transform: capitalize;"  required>
										<label for="experience">Course</label>
										<input type="text" name="course[]" class="input" id="course" style="text-transform: capitalize;"> 
										<label for="experience">Year Graduated</label>
										<input type="text" name="yeargraduated[]" class="input" id="yeargraduated" style="text-transform: capitalize;">
										<label for="experience">Achievement/Award Received</label>
										<input type="text" name="achievementaward[]" class="input" id="achievementaward
										" style="text-transform: capitalize;">
										
										<style>
										    
											.add_ed {
											display: flex;
											justify-content: flex-end;
											align-items: center;
											width: 80%;
											margin: auto;
											}
											#addeducation {
												background: #0083ce;
												border: none;
												cursor: pointer;
												padding: 7px 10px; 
												color: white;
												width: 100px;
												margin: 20px 0;
											}

									 

									 </style>
										<div class="add_ed">
											<input type="button" class="btn btn-warning add_item_btn" name="addeducation" id="addeducation" value="ADD" style="text-transform: capitalize;">
										</div>
									</div>
						 		</div>
		
		
								
							</div>
						
					</div>
		
					<div class="form_5 data_info" style="display: none;">
						<h2>Community Involvement </h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>

						<div id="table_community">
							<div class="input_wrap" >
								<label for="experience">Name</label>
								<input type="text" name="organizationname[]" class="input" id="type" style="text-transform: capitalize;">
								<label for="experience">Position</label>
								<input type="text" name="position[]" class="input" id="schoolname" style="text-transform: capitalize;" required>
								<label for="experience">Inclusive Date</label>
								<input data-format="yyyy-MM-dd" class="input" type="date" id="commmunitydate" name="commmunitydate[]">
								
								
								<style>
											.add_com {
											display: flex;
											justify-content: flex-end;
											align-items: center;
											width: 80%;
											margin: auto;
											}
											#addcommunity {
												background: #0083ce;
												border: none;
												cursor: pointer;
												padding: 7px 10px; 
												color: white;
												width: 100px;
												margin: 20px 0;
											}
									 </style>
									 <div class="add_com">
									<input type="button" class="btn btn-warning add_item_btn" name="addcommunity" id="addcommunity" value="ADD">
										</div>
							</div>
						</div>

							{{-- <div class="form_container">
								<div style="overflow-x:auto;">
									<table class="table table-bordered" id="table_community">
										<tr>
											<th>Name</th>
											<th>Position</th>
											<th>Inclusive Date</th>
											<th>Action</th>
											
										</tr>
											
										<tr>
											
											<td><input type="text" name="organizationname[]"></td>
											
											<td><input size="10" type="text" name="position[]"></td>
											
											<td><input data-format="yyyy-MM-dd" class="input" type="date" id="commmunitydate" name="commmunitydate[]"></td>
											
											<td><input type="button" class="btn btn-warning" name="addcommunity" id="addcommunity" value="ADD"></td>
										</tr>
									</table>
								</div>
							</div>
						 --}}
					</div>
					
					<div class="form_6 data_info" style="display: none;">
						<h2>Seminars</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
						<div id="table_seminar">
							<div class="input_wrap" >
								<label for="experience">Name</label>
								<input type="text" name="seminarorganizationname[]" class="input" id="type" style="text-transform: capitalize;">
								<label for="experience">Position</label>
								<input type="text" name="seminarposition[]" class="input" id="schoolname" style="text-transform: capitalize;" required >
								<label for="experience">Inclusive Date</label>
								<input data-format="yyyy-MM-dd" class="input" type="date" id="birthdaytime" name="seminardate[]">
								
								
								<style>
										    
											.add_sem {
											display: flex;
											justify-content: flex-end;
											align-items: center;
											width: 80%;
											margin: auto;
											}
											#addseminar {
												background: #0083ce;
												border: none;
												cursor: pointer;
												padding: 7px 10px; 
												color: white;
												width: 100px;
												margin: 20px 0;
											}

									 

									 </style>
									 <div class="add_sem">

									 	<input type="button" class="btn btn-warning add_item_btn" name="addseminar" id="addseminar" value="ADD">
							
									 </div>
									</div>
						</div>
							{{-- <div class="form_container">
								<div style="overflow-x:auto;">
									<table class="table table-bordered" id="table_seminar">
										<tr>
											<th>Name</th>
											<th>Position</th>
											<th>Inclusive Date</th>
											<th>Action</th>
											
										</tr>
											
										<tr>
											
											<td><input type="text" name="seminarorganizationname[]"></td>
											
											<td><input size="10" type="text" name="seminarposition[]"></td>
											
											<td><input data-format="yyyy-MM-dd" class="input" type="date" id="birthdaytime" name="seminardate[]"></td>
											
											<td><input type="button" class="btn btn-warning" name="addseminar" id="addseminar" value="ADD"></td>
										</tr>
									</table>
								</div>
							</div> --}}
						
					</div>
		
					<div class="form_7 data_info" style="display: none;">
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
									<label for="email">Birth Certificate</label>
									<input type="file" id="imagebirth" class="select" name="imagebirth" value="{{ old('c') }}" required>
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
		
				<div class="btns_wrap">
					<div class="common_btns form_1_btns">
						<a href="/main" style="text-decoration: none;">
							
							<button type="button" onclick="unsave()" class="btn_back" style="margin-right: 5px;"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
						
						</a>
						<button type="button" class="btn_next">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
					</div>
					<div class="common_btns form_2_btns" style="display: none;">
						<button type="button" class="btn btn_back "><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
						<button type="button" class="btn btn_next">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
					</div>
					<div class="common_btns form_3_btns" style="display: none;">
						<button type="button" class="btn btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
						<button type="button" class="btn btn_next">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
					</div>
					<div class="common_btns form_4_btns" style="display: none;">
						<button type="button" class="btn btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
						<button type="button" class="btn btn_next">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
					</div>
					<div class="common_btns form_5_btns" style="display: none;">
						<button type="button" class="btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
						<button type="button" class="btn_next">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
					</div>
					<div class="common_btns form_6_btns" style="display: none;">
						<button type="button" class="btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
						<button type="button" class="btn_next">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
					</div>
					<div class="common_btns form_7_btns" style="display: none;">
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

<script>
			window.onbeforeunload = function() {
				//Whatever
				return "WARNING! You have unsaved changes that may be lost!";
			}
	
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script src="http://parsleyjs.org/dist/parsley.js"defer></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
<script src="{{ asset('dist/js3/mainsp.js') }}"></script>
<?php
session_start();
	  if (isset($_SESSION['success']) == 'success') 
	  {
		  ?>
			  <script>
			  swal({
					  
					  title: "REGISTERED",
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
					  text: "Fail to register!",
					  icon: "error",
					  button: "ok",
				  })
			  
			  
			  </script>
		  <?php
		  unset($_SESSION['fail']);
	  }
 
?>


<script>
	function text(x)
	{
		if (x==0)
		{
			 document.getElementById("divothers").style.display="block";
		}
		else document.getElementById('divothers').style.display="none";
		return;
	}
</script>
<script>
	$(document).ready(function ()
	{
		document.getElementById('divothers').style.display="none";
		
			var html =`<tr>
									
									<td><input type="text" name="fullname"></td>
									<td><input size="5" type="text" name="sex"></td>
									<td><input size="10" type="text" name="relationship"></td>
									<td><input size="2" type="text" name="age"></td>
									<td><input data-format=""MM/DD/YYYY"" class="input" type="date" id="birthdaytime" name="birthdaytime"></td>
									
									<td><input type="button" class="btn btn-danger" name="remove" id="remove" value="remove"></td>
								</tr>`;
			var x = 1;

			var htmlcommunity =`<div class="input_wrap" >
								<label for="experience">Name</label>
								<input type="text" name="organizationname[]" class="input" id="type">
								<label for="experience">Position</label>
								<input type="text" name="position[]" class="input" id="schoolname" required>
								<label for="experience">Inclusive Date</label>
								<input data-format="yyyy-MM-dd" class="input" type="date" id="commmunitydate" name="commmunitydate[]">
								
								<style>
									#remove {
										background: #e80027;
										border: none;
										cursor: pointer;
										padding: 7px 10px; 
										color: white;
										width: 100px;
										margin: 20px 78%;
										
									}

								</style>
								<input type="button" class="btn btn-danger add_item_btn" name="remove" id="remove" value="REMOVE">
							
							</div>`;
			var x = 1;

			var htmlseminar =`<div class="input_wrap" >
								<label for="experience">Name</label>
								<input type="text" name="seminarorganizationname[]" class="input" id="type">
								<label for="experience">Position</label>
								<input type="text" name="seminarposition[]" class="input" id="schoolname" required>
								<label for="experience">Inclusive Date</label>
								<input data-format="yyyy-MM-dd" class="input" type="date" id="birthdaytime" name="seminardate[]">
								
								<style>
									#remove {
										background: #e80027;
										border: none;
										cursor: pointer;
										padding: 7px 10px; 
										color: white;
										width: 100px;
										margin: 20px 78%;
									}

								</style>
								<input type="button" class="btn btn-danger add_item_btn" name="remove" id="remove" value="REMOVE">
							</div>`;
			var x = 1;

		
			var x = 1;
			var htmleducation =`<div class="input_wrap" >
										<label for="experience">Type</label>
										<input type="text" name="type[]" class="input" id="type">
										<label for="experience">Name of School</label>
										<input type="text" name="schoolname[]" class="input" id="schoolname" required>
										<label for="experience">Course</label>
										<input type="text" name="course[]" class="input" id="course">
										<label for="experience">Year Graduated</label>
										<input type="text" name="yeargraduated[]" class="input" id="yeargraduated">
										<label for="experience">Achievement/Award Received</label>
										<input type="text" name="achievementaward[]" class="input" id="achievementaward
										">
										
										<style>
												#remove {
													background: #e80027;
													border: none;
													cursor: pointer;
													padding: 7px 10px; 
													color: white;
													width: 100px;
													margin: 20px 78%;
												}
										</style>
										<input type="button" class="btn btn-danger add_item_btn" name="remove" id="remove" value="REMOVE">
									</div>`;
			var x = 1;

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
										<label for="confirm_text">Sex</label>
										<select class="select" id="addGender" name="familygender[]">
											<option selected="">Select Gender</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>  
										</select>
									</div>
									<div class="input_wrap">
										<label for="confirm_text">Date of Birth</label>
										<input data-format=""MM/DD/YYYY" class="input" type="date" id="familybirthdate[]" name="familybirthdate[]">
									</div>
									
									<style>
											#remove {
												background: #e80027;
												border: none;
												cursor: pointer;
												padding: 7px 10px; 
												color: white;
												width: 100px;
												margin: 20px 78%;
											}

									 </style>
									<input type="button" class="btn btn-danger add_item_btn" name="remove" id="remove" value="REMOVE">
									
								</div>`;
			var x = 1;

			// var htmlseminar =`<tr>
											
			// 								<td><input type="text" name="seminarorganizationname[]"></td>
											
			// 								<td><input size="10" type="text" name="seminarposition[]"></td>
											
			// 								<td><input data-format="yyyy-MM-dd" class="input" type="date" id="birthdaytime" name="seminardate[]"></td>
											
			// 								<td><input type="button" class="btn btn-danger" name="remove" id="remove" value="remove"></td>
			// 							</tr>`;

			$("#add").click(function()
			{
				$('#table_field').append(html);
			});

			// $("#table_field").on('click','#remove',function()
			// {
			// 	$(this).closest('tr').remove();
			// });

			// $("#addcommunity").click(function()
			// {
			// 	$('#table_community').append(htmlcommunity);
			// });

			// $("#table_community").on('click','#remove',function()
			// {
			// 	$(this).closest('tr').remove();
			// });

			// $("#addseminar").click(function()
			// {
			// 	$('#table_seminar').append(htmlcommunity);
			// });

			// $("#table_seminar").on('click','#remove',function()
			// {
			// 	$(this).closest('tr').remove();
			// });

			$("#addseminar").click(function()
			{
				$('#table_seminar').append(htmlcommunity);
			});

			$("#table_seminar").on('click','#remove',function()
			{
				$(this).parent().remove();
			});

			$("#addcommunity").click(function()
			{
				$('#table_community').append(htmlcommunity);
			});

			$("#table_community").on('click','#remove',function()
			{
				$(this).parent().remove();
			});
			$("#addeducation").click(function()
			{
				$('#education').append(htmleducation);
			});

			$("#education").on('click','#remove',function()
			{
				$(this).parent().remove();
			});
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