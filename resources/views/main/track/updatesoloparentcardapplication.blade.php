<!DOCTYPE html>
<html>
<head>
	<title>Progressive Form | Multi Steps Form</title>
	
	
	
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('dist/css3/style2.css') }}"/>

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
						<label for="">Requirements</label>
					</li>
					
				</ul>
			</div>
			<form class="form" id="form" enctype="multipart/form-data" method="post" action="/updatesoloparentcardapplication">
				@csrf
				<div class="form_wrap">
					<div class="form_1 data_info">
						<h2>Personal Information</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">
								<div class="input_wrap">
									<label for="email">First Name</label>
									<input type="text" name="firstname" class="input" id="firstname" value="{{$client->first_name}}" required >
									<input type="hidden"  name="clientid" class="input" id="clientid" id="email" value="{{$client->id}}" style="text-transform: capitalize;" required>
									<input type="hidden"  name="appid" class="input" id="appid" id="email" value="@foreach ($client1->client_applications as $app){{$app->id}}@endforeach" style="text-transform: capitalize;" required>
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="email">Last Name</label>
									<input type="text" name="lastname" class="input" id="lastname" value="{{$client->last_name}}">
									<div class="error"></div>
									
								</div>
								<div class="input_wrap">
									<label for="email">Middle Name</label>
									<input type="text" name="middlename" class="input" id="middlename" value="{{$client->middle_name}}">
									
								</div>
								<div class="input_wrap">
									<label for="text">Extension Name</label>
									<input type="text" name="extensionname" class="input" id="extensionname" value="{{$client->extension_name}}">
								</div>
								<div class="input_wrap">
									<label for="confirm_text">Sex</label>
									<select class="select" id="addGender" name="gender" required>
										<option value="Male" <?php if($client->sex == "Male") echo 'selected="selected"'; ?> >Male</option>
										<option value="Female" <?php if($client->sex == "Female") echo 'selected="selected"'; ?> >Female</option>
									</select>
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="confirm_text">Blood Type</label>
									<select class="select" id="addBlood" name="bloodtype" required>
										<option value="A" <?php if($client->blood_type == "A") echo 'selected="selected"'; ?> >A</option>
										<option value="B"<?php if($client->blood_type == "B") echo 'selected="selected"'; ?> >B</option>
										<option value="AB"<?php if($client->blood_type == "AB") echo 'selected="selected"'; ?> >AB</option>
										<option value="O"<?php if($client->blood_type == "O") echo 'selected="selected"'; ?> >O</option>
									</select>
								</div>
								<div class="input_wrap">
									<label for="confirm_text">Civil Status</label>
									<select class="select" id="addCivil" name="civilstatus" required>
										<option value="Married" <?php if($client->civil_status == "Married") echo 'selected="selected"'; ?> >Married</option>
										<option value="Widowed" <?php if($client->civil_status == "Widowed") echo 'selected="selected"'; ?> >Widowed</option>
										<option value="Separated" <?php if($client->civil_status == "Separated") echo 'selected="selected"'; ?> >Separated</option>
										<option value="Divorced" <?php if($client->civil_status == "Divorced") echo 'selected="selected"'; ?> >Divorced</option>
										<option value="Single" <?php if($client->civil_status == "Single") echo 'selected="selected"'; ?> >Single</option>
									</select>
									<div class="error"></div>
								</div>
								
								<div class="input_wrap">Reason for being a solo parent
									<label for="confirm_text"></label>
									<select class="select" id="addReasonr" name="reason" required>
										<option selected="">Select</option>
										<option value="Death of Spouse" <?php if($client->reason == "Death of Spouse") echo 'selected="selected"'; ?>>Death of Spouse</option>
										<option value="Abandonment" <?php if($client->reason == "Abandonment") echo 'selected="selected"'; ?>>Abandonment</option>  
										<option value="Detained" <?php if($client->reason == "Detained") echo 'selected="selected"'; ?>> Detained</option>


									
										
									</select>
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="confirm_text">Educational Attainment</label>
									<select class="select" id="addGender" name="educationalattainment" required>
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
									<label for="confirm_text">Nationality</label>
									<input type="text" name="nationality" class="input" id="nationality" value="{{$client->nationality}}">
								</div>
								<div class="input_wrap">
									<label for="confirm_text">Religion</label>
									<input type="text" name="religion" class="input" id="religion" value="{{$client->religion}}">
								</div>
								<div class="input_wrap">
									<label for="confirm_text">Date of Birth</label>
									<input data-format="MM/DD/YYYY" class="input" type="date" id="birthdate" name="birthdate" value="{{$client->birth_date}}">
									<div class="error"></div>
								</div>
								<div class="input_wrap">
									<label for="confirm_text">Place of Birth</label>
									<input type="text" name="birthplace" class="input" id="birthplace" value="{{$client->birth_place}}">
									<div class="error"></div>
								</div>
							
							</div>
		
							<div class="input_wrap">
								<label for="user_name">Street</label>
								<input type="text" name="street" class="input" id="street" value="{{$client->street}}">
								<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label for="first_name">Barangay</label>
								<select class="select" id="addbarangay" name="barangay" required>
									<option selected="">Select Barangay</option>
									@foreach ($barangaylist as $item)
									
									<option value="{{$item->id}}"<?php if($client->barangays->name == $item->name ) echo 'selected="selected"'; ?> >{{$item->name}}</option>
									@endforeach
								<select>
									<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label for="last_name">City/Municipality</label>
								<input type="text" name="city" class="input" id="city" value="{{$client->municipality}}">
								<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label for="last_name">Province</label>
								<input type="text" name="province" class="input" id="province" value="{{$client->province}}">
								<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label for="last_name">Region</label>
								<input type="text" name="region" class="input" id="region" value="{{$client->region}}">
								<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label for="company">Mobile Number</label>
								<input type="text" name="mobilenumber" class="input" id="mobilenumber"  value="{{$client->contact_number}}">
								<div class="error"></div>
							</div>
		
							<div class="input_wrap">
								<label for="experience">Landline Number</label>
								<input type="text" name="landlinenumber" class="input" id="landlinenumber" value="{{$client->landline_number}}">
								<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label for="designation">Email Address</label>
								<input type="text" name="emailaddress" class="input" id="emailaddress" value="{{$client->email_address}}">
								<div class="error"></div>
							</div>
							<div class="input_wrap">
								<label for="confirm_text">Skill/Talent</label>
								<input type="text" name="skill" class="input" id="skill" value="{{$client->skills_talents}}">
							</div>
							<div class="input_wrap">
								<label for="confirm_text">Hobbies</label>
								<input type="text" name="hobbies" class="input" id="hobbies" value="{{$client->hobbies}}">
							</div>
					</div>
		
					<div class="form_2 data_info" style="display: none;">
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

									@foreach ($client->family_compositions as $family)
								
								
							
							
												<label for="experience">Relationship</label>
												<input type="text" name="relationship[]" class="input" id="achievementaward" value="{{$family->relationship}}">
												<label for="experience">Last Name</label>
												<input type="text" name="familylastname[]" class="input" id="type" value="{{$family->last_name}}">
												<label for="experience">First Name</label>
												<input type="text" name="familyfirstname[]" class="input" id="schoolname" value="{{$family->first_name}}" >
												<label for="experience">Middle Name</label>
												<input type="text" name="familymiddlename[]" class="input" id="course" value="{{$family->middle_name}}">
												<label for="experience">Extension Name</label>
												<input type="text" name="familyextensionname[]" class="input" id="yeargraduated" value="{{$family->extension_name}}">
												<div class="input_wrap">
													<label for="confirm_password">Sex</label>
													<select class="select" id="addGender" name="familygender[]" >
														<option value="Male" <?php if($family->sex == "Male") echo 'selected="selected"'; ?> >Male</option>
														<option value="Female" <?php if($family->sex == "Female") echo 'selected="selected"'; ?> >Female</option>
													</select>
												</div>
												<div class="input_wrap">
													<label for="confirm_password">Date of Birth</label>
													<input data-format="MM/DD/YYYY" class="input" type="date" id="familybirthdate[]" name="familybirthdate[]" value="{{$family->birth_date}}">
												</div>

											
											

									@endforeach

								

									<input type="button" class="btn btn-warning add_item_btn" name="addfamily" id="addfamily" value="add">
								</div>

							</div>
							
						</div>	
					
						
					</div>
					<div class="form_4 data_info" style="display: none;">
						<h2>Educational Attainment</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">				
								
								
								<div id="education">
									<div class="input_wrap" >
										@foreach ($client->education as $education)
											<label for="experience">Type</label>
											<input type="text" name="type[]" class="input" id="type" value="{{$education->educational_attainment}}">
											<label for="experience">Name of School</label>
											<input type="text" name="schoolname[]" class="input" id="schoolname" value="{{$education->school}}"  required>
											<label for="experience">Course</label>
											<input type="text" name="course[]" class="input" id="course" value="{{$education->course}}">
											<label for="experience">Year Graduated</label>
											<input type="text" name="yeargraduated[]" class="input" id="yeargraduated" value="{{$education->year_graduated}}">
											<label for="experience">Achievement/Award Received</label>
											<input type="text" name="achievementaward[]" class="input" id="achievementaward" value="{{$education->achievement_award}}">

											
										@endforeach

									
								
										<input type="button" class="btn btn-warning add_item_btn" name="addeducation" id="addeducation" value="add">
									</div>
								</div>


							

		
		
								
							</div>
						
					</div>
		
					<div class="form_5 data_info" style="display: none;">
						<h2>Community Involvement </h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">
								<div style="overflow-x:auto;">
									<table class="table table-bordered" id="table_community">
										<tr>
											<th>Name</th>
											<th>Position</th>
											<th>Inclusive Date</th>
											<th>Action</th>
											
										</tr>
											
										

											<tr>
												<td><input type="text" name="organizationname[]" ></td>
													
													<td><input size="10" type="text" name="position[]"></td>
													
													<td><input data-format="yyyy-MM-dd" class="input" type="date" id="commmunitydate" name="commmunitydate[]"></td>
												<td><input type="button" class="btn btn-warning" name="addcommunity" id="addcommunity" value="add"></td>
									
											
											
											</tr>

											
											@foreach ($client->community_involvements as $community)
											<tr>
												<td><input type="text" name="organizationname[]" value="{{$community->organization_name}}"></td>
												
												<td><input size="10" type="text" name="position[]" value="{{$community->position}}"></td>
												
												<td><input data-format="yyyy-MM-dd" class="input" type="date" id="commmunitydate" name="commmunitydate[]" value="{{$community->date}}"></td>
											</tr>

											@endforeach
									

												
									</table>
								</div>
							</div>
						
					</div>
					
					<div class="form_6 data_info" style="display: none;">
						<h2>Seminars</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">
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
											
											<td><input type="button" class="btn btn-warning" name="addseminar" id="addseminar" value="add"></td>

										</tr>

										<tr>
											@foreach ($client->seminar_trainings as $seminar)
											
											<td><input type="text" name="seminarorganizationname[]" value="{{$seminar->organization_name}}"></td>
											
											<td><input size="10" type="text" name="seminarposition[]" value="{{$seminar->position}}"> </td>
											
											<td><input data-format="yyyy-MM-dd" class="input" type="date" id="birthdaytime" name="seminardate[]" value="{{$seminar->date}}"></td>
											
									
											
											@endforeach

										</tr>
									</table>
								</div>
							</div>
						
					</div>
		
					<div class="form_7 data_info" style="display: none;">
						<h2>Upload Requirements</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">

								<img id="picture"  class="rounded-md" src="{{ ('/images/id/'.$client->client_application_requirements[0]->filename ) }}">
								<img id="picture"  class="rounded-md" src="{{ ('/images/barangay/'.$client->client_application_requirements[0]->filename ) }}">
								<img id="picture"  class="rounded-md" src="{{ ('/images/picture/'.$client->client_application_requirements[0]->filename ) }}">
								<img id="picture"  class="rounded-md" src="{{ ('/images/birth/'.$client->client_application_requirements[0]->filename ) }}">

								<div class="input_wrap">
									<label for="phone">Valid ID</label>
									<input type="file" id="Image" class="select" name="imageid" value="{{ old('c') }}">
								</div>
								<div class="input_wrap">
									<label for="email">Barangay certificate of residency</label>
									<input type="file" id="Image" class="select" name="imagebarangay" value="{{ old('c') }}">
								</div>
								<div class="input_wrap">
									<label for="email">Birth Certificate</label>
									<input type="file" id="Image" class="select" name="imagebirth" value="{{ old('c') }}">
								</div>
								<div class="input_wrap">
									<label for="email">Latest 1x1 picture with white background</label>
									<input type="file" id="Image" class="select" name="imagepicture" value="{{ old('c') }}">
								</div>
							</div>
						
					</div>
				</div>
		
				<div class="btns_wrap">
					<div class="common_btns form_1_btns">
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

			var htmlcommunity =`<tr>
											
											<td><input type="text" name="organizationname[]"></td>
											
											<td><input size="10" type="text" name="position[]"></td>
											
											<td><input data-format="yyyy-MM-dd" class="input" type="date" id="commmunitydate" name="commmunitydate[]"></td>
											
											<td><input type="button" class="btn btn-danger name="remove" id="remove" value="remove"></td>
										</tr>`;
			var x = 1;

			var htmlseminar =`<tr>
											
											<td><input type="text" name="seminarorganizationname[]"></td>
											
											<td><input size="10" type="text" name="seminarposition[]"></td>
											
											<td><input data-format="yyyy-MM-dd" class="input" type="date" id="birthdaytime" name="seminardate[]"></td>
											
											<td><input type="button" class="btn btn-danger" name="remove" id="remove" value="remove"></td>
										</tr>`;
			var x = 1;
			var htmleducation =`<<div class="input_wrap" >
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
										<input type="button" class="btn btn-danger add_item_btn" name="remove" id="remove" value="remove">
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
										<select class="select" id="addGender" name="familygender[]" >
											<option selected="">Select Gender</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>  
										</select>
									</div>
									<div class="input_wrap">
										<label for="confirm_text">Date of Birth</label>
										<input data-format=""MM/DD/YYYY" class="input" type="date" id="familybirthdate[]" name="familybirthdate[]">
									</div>
									<input type="button" class="btn btn-danger add_item_btn" name="remove" id="remove" value="remove">
								</div>`;
			var x = 1;



			$("#add").click(function()
			{
				$('#table_field').append(html);
			});

			$("#table_field").on('click','#remove',function()
			{
				$(this).closest('tr').remove();
			});

			$("#addcommunity").click(function()
			{
				$('#table_community').append(htmlcommunity);
			});

			$("#table_community").on('click','#remove',function()
			{
				$(this).closest('tr').remove();
			});

			$("#addseminar").click(function()
			{
				$('#table_seminar').append(htmlcommunity);
			});

			$("#table_seminar").on('click','#remove',function()
			{
				$(this).closest('tr').remove();
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