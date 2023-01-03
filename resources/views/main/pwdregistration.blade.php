<!DOCTYPE html>
<html>
<head>
	<title>Progressive Form | Multi Steps Form</title>
	<link rel="stylesheet" href="{{ asset('dist/css3/style2.css') }}"/>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

        <!-- zc seal -->
        <link rel="icon" href="{{asset('dist/images/Seal.png')}}" size="10x10" />
	<style>
		#btn-right {
			display: flex;
			justify-content: flex-end;
			align-items:center;
		}
	</style>
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
						<label for="">Organization</label>
					</li>
					<li class="form_4_progessbar">
						<div>
							<p>4</p>
						</div>
						<label for="">    ID</label>
					</li>
					<li class="form_5_progessbar">
						<div>
							<p>5</p>
						</div>
						<label for="">Family</label>
					</li>
					<li class="form_6_progessbar">
						<div>
							<p>6</p>
						</div>
						<label for="">Disability</label>
					</li>
					<li class="form_7_progessbar">
						<div>
							<p>7</p>
						</div>
						<label for="">Upload</label>
					</li>
					
					
				</ul>
			</div>
			<form class="form" id="form" enctype="multipart/form-data" method="post" action="/createpwd">
				@csrf
				<div class="form_wrap">
					<div class="form_1 data_info">
						<h2>Personal Information</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">
								<div class="input_wrap">
									<label for="email">First Name</label>
									<input type="text" name="firstname" class="input"  style="text-transform: capitalize;" id="firstname" >
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="email">Last Name</label>
									<input type="text" name="lastname" class="input"  style="text-transform: capitalize;" id="lastname">
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="email">Middle Name</label>
									<input type="text" name="middlename" class="input"   style="text-transform: capitalize;" id="middlename">
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="password">Extension Name</label>
									<input type="text" name="extensionname" class="input"  style="text-transform: capitalize;" id="extensionname">
								</div>
								<div class="input_wrap">
									<label for="confirm_password">Gender</label>
									<select class="select" id="addGender" name="gender" >
										<option value="0" selected>Select Gender</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>  
									</select>
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="confirm_password">Blood Type</label>
									<select class="select" id="" name="bloodtype" >
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
								</div>
								<div class="input_wrap">
									<label for="confirm_password">Civil Status</label>
									<select class="select" id="addCivilStatus" name="civilstatus" >
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
									<label for="confirm_text">Educational Attainment</label>
									<select class="select" id="addEducation" name="educationalattainment" required>
										<option value="0" selected>Select</option>
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
									<label for="confirm_text">Skill/Talent</label>
									<input type="text" name="skill" class="input"  style="text-transform: capitalize;" id="confirm_text">
								</div>
								<div class="input_wrap">
									<label for="confirm_text">Hobbies</label>
									<input type="text" name="hobbies" class="input"  style="text-transform: capitalize;" id="confirm_text">
								</div>

								<div class="input_wrap">
									<label for="confirm_password">Nationality</label>
									<input type="text" name="nationality" class="input"  style="text-transform: capitalize;" id="">
								</div>
								<div class="input_wrap">
									<label for="">Religion</label>
									<input type="text" name="religion" class="input"  style="text-transform: capitalize;" id="">
								</div>
								<div class="input_wrap">
									<label for="">Date of Birth</label>
									<input data-format="MM/DD/YYYY" class="input" type="date" id="birthdate"  style="text-transform: capitalize;" name="birthdate">
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="">Place of Birth</label>
									<input type="text" name="birthplace" class="input"  style="text-transform: capitalize;" id="birthplace">
									<div class="error"></div>
								</div>
							</div>
							<h2></h2>
							<h2>Present Address</h2>
							<div class="input_wrap">
								<label for="user_name">Street</label>
								<input type="text" name="street" class="input"  style="text-transform: capitalize;" id="street">
								<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label for="first_name">Barangay</label>
								<select class="select" id="addBarangay"  name="barangay" >
									<option value="0" selected>Select Barangay</option>
									@foreach ($barangaylist as $item)
									
									
										<option value="{{$item->id}}">{{$item->name}}</option>
									@endforeach
								<select>
									<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label for="last_name">City/Municipality</label>
								<input type="text" name="city" class="input"  style="text-transform: capitalize;" id="city">
								<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label for="last_name">Province</label>
								<input type="text" name="province" class="input"   style="text-transform: capitalize;" id="province">
								<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label for="last_name">Region</label>
								<input type="text" name="region" class="input"  style="text-transform: capitalize;" id="region">
								<div class="error"></div>
							</div>
							<h2></h2>
							<h2>Contact Information</h2>

							<div class="input_wrap">
								<label for="company">Mobile Number</label>
								<input type="text" name="mobilenumber" class="input"  style="text-transform: capitalize;" id="mobilenumber">
								<div class="error"></div>
							</div>

							<div class="input_wrap">
								<label for="experience">Landline Number</label>
								<input type="text" name="landlinenumber" class="input"  style="text-transform: capitalize;" id="landlinenumber">
								<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label for="designation">Email Address</label>
								<input type="text" name="emailaddress" class="input"  id="emailaddress">
								<div class="error"></div>
							</div>
						
						
					</div>
					<div class="form_2 data_info" style="display: none;">
						<h2>Occupation</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
						<div class="form_container">
								
							<div class="input_wrap">
								<label for="first_name">Status of Employment</label>
								<select class="select" id="addEmployment" name="employmentstatus" >
									<option value="0" selected>Select Employment Status</option>
									<option value="Employed">Employed</option>
									<option value="Unemployed">Unemployed</option>  
									<option value="Self-employed">Self-employed</option> 
								</select>
								<div class="error"></div>
							
							</div>
							<div class="input_wrap">
								<label class="special-label">Category of Employment:</label>
								<select class="select" id="addCategory" name="employmentcategory" >
									<option value="0" selected>Select Employment Type</option>
									<option value="N/A">N/A</option>
									<option value="Government">Government</option>  
									<option value="Private">Private</option> 
									
								</select>
								<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label class="special-label">Type of Employment:</label>
								<select class="select" id="addType" name="employmenttype" >
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
						<h2>Organization</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">
								<div class="input_wrap">
									<label for="company">Organization Affiliated </label>
									<input type="text" name="organizationaffiliated" class="input"  style="text-transform: capitalize;" id="company">
								</div>
								<div class="input_wrap">
									<label for="experience">Contact Person</label>
									<input type="text" name="contactperson" class="input"  style="text-transform: capitalize;" id="experience">
								</div>
								<div class="input_wrap">
									<label for="designation">Office Address</label>
									<input type="text" name="officeaddress" class="input"  style="text-transform: capitalize;" id="designation">
								</div>
								<div class="input_wrap">
									<label for="designation">Telephone Number</label>
									<input type="text" name="contactnumber" class="input"  style="text-transform: capitalize;" id="designation">
								</div>
							</div>
						
					</div>
					<div class="form_4 data_info" style="display: none;">
						<h2>Identification Card</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">
								<div class="input_wrap">
									<label for="company">SSS No </label>
									<input type="text" name="sssnumber" class="input"  style="text-transform: capitalize;" id="company">
								</div>
								<div class="input_wrap">
									<label for="experience">GSIS No</label>
									<input type="text" name="gsisnumber" class="input"  style="text-transform: capitalize;" id="experience">
								</div>
								<div class="input_wrap">
									<label for="designation">Pagibig No</label>
									<input type="text" name="pagibignumber" class="input"  style="text-transform: capitalize;" id="n">
								</div>
								<div class="input_wrap">
									<label for="n">PSN No</label>
									<input type="text" name="psnnumber" class="input"  style="text-transform: capitalize;" id="n">
								</div>
								<div class="input_wrap">
									<label for="n">PhilHealth No</label>
									<input type="text" name="philhealthnumber" class="input"  style="text-transform: capitalize;" id="n">
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
										<input type="text" name="relationship[]" class="input"  style="text-transform: capitalize;" id="achievementaward">
										<label for="experience">Last Name</label>
										<input type="text" name="familylastname[]" class="input"  style="text-transform: capitalize;" id="type">
										<label for="experience">First Name</label>
										<input type="text" name="familyfirstname[]" class="input"  style="text-transform: capitalize;" id="schoolname" >
										<label for="experience">Middle Name</label>
										<input type="text" name="familymiddlename[]" class="input"  style="text-transform: capitalize;" id="course">
										<label for="experience">Extension Name</label>
										<input type="text" name="familyextensionname[]" class="input"  style="text-transform: capitalize;" id="yeargraduated">
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
											<input type="button" class="btn btn-warning add_item_btn" name="addfamily" id="addfamily" value="add">
										</div>
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
					
					<div class="form_6 data_info" style="display: none;">
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
									<input type="text" name="licensenumber" class="input"  style="text-transform: capitalize;" id="designation">
								</div>
								<div class="input_wrap">
									<label for="designation">First Name</label>
									<input type="text" name="physicianfirstname" class="input"  style="text-transform: capitalize;" id="designation">
								</div>
								<div class="input_wrap">
									<label for="designation">Last Name</label>
									<input type="text" name="physicianlastname" class="input"  style="text-transform: capitalize;" id="designation">
								</div>
								<div class="input_wrap">
									<label for="designation">Middle Name</label>
									<input type="text" name="physicianmiddlename" class="input"  style="text-transform: capitalize;" id="designation">
								</div>
							</div>
						
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

				<div class="btns_wrap">
					<div class="common_btns form_1_btns">
						<button type="button" class="btn_next">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script src="http://parsleyjs.org/dist/parsley.js"defer></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
<script src="{{ asset('dist/js3/mainpwd.js') }}"></script>
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
	<script>
		$(document).ready(function ()
		{
			document.getElementById('divothers').style.display="none";
			
	
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
											<input type="button" name="remove" id="remove" value="REMOVE">
										
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