<!DOCTYPE html>
<html>
<head>
	<title>Progressive Form | Multi Steps Form</title>
	<link rel="stylesheet" href="{{ asset('dist/css3/style2.css') }}"/>
	
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
						<label for="">Family</label>
					</li>
					<li class="form_3_progessbar">
						<div>
							<p>3</p>
						</div>
						<label for="">Education</label>
					</li>
					<li class="form_4_progessbar">
						<div>
							<p>4</p>
						</div>
						<label for="">Community</label>
					</li>
					<li class="form_5_progessbar">
						<div>
							<p>5</p>
						</div>
						<label for="">Seminars</label>
					</li>
					
				</ul>
			</div>
			<form class="form" id="form" enctype="multipart/form-data" method="post" action="/createregisteredsoloparent" >
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
					<div class="form_2 data_info" style="display: none;">
						<h2>Family Composition</h2>
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
										<label for="confirm_text">Sex</label>
										<select class="select" id="addGender" name="familygender[]" >
											<option selected="">Select Gender</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>  
										</select>
									</div>
									<div class="input_wrap">
										<label for="confirm_text">Date of Birth</label>
										<input data-format="MM/DD/YYYY" class="input" type="date" id="familybirthdate[]" name="familybirthdate[]">
									</div>
									<input type="button" class="btn btn-warning add_item_btn" name="addfamily" id="addfamily" value="add">
								</div>
							</div>
							
						</div>	
					
						
					</div>
					<div class="form_3 data_info" style="display: none;">
						<h2>Educational Attainment</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
							<div class="form_container">				
							
								<div id="education">
									<div class="input_wrap" >
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
										<input type="button" class="btn btn-warning add_item_btn" name="addeducation" id="addeducation" value="add">
									</div>
								</div>
		
		
								
							</div>
						
					</div>
					<div class="form_4 data_info" style="display: none;">
						<h2>Community Involvement </h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
						<div id="table_community">
							<div class="input_wrap" >
								<label for="experience">Name</label>
								<input type="text" name="organizationname[]" class="input" id="type">
								<label for="experience">Position</label>
								<input type="text" name="position[]" class="input" id="schoolname" required>
								<label for="experience">Inclusive Date</label>
								<input data-format="yyyy-MM-dd" class="input" type="date" id="commmunitydate" name="commmunitydate[]">
								<input type="button" class="btn btn-warning add_item_btn" name="addcommunity" id="addcommunity" value="add">
							</div>
						</div>

					</div>
					
					<div class="form_5 data_info" style="display: none;">
						<h2>Seminars</h2>
						<p>Please enter your infomation and proceed to the next step so we can process your identiication card.  </p>
						<div id="table_seminar">
							<div class="input_wrap" >
								<label for="experience">Name</label>
								<input type="text" name="seminarorganizationname[]" class="input" id="type">
								<label for="experience">Position</label>
								<input type="text" name="seminarposition[]" class="input" id="schoolname" required>
								<label for="experience">Inclusive Date</label>
								<input data-format="yyyy-MM-dd" class="input" type="date" id="birthdaytime" name="seminardate[]">
								<input type="button" class="btn btn-warning add_item_btn" name="addseminar" id="addseminar" value="add">
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



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script src="http://parsleyjs.org/dist/parsley.js"defer></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
<script src="{{ asset('dist/js3/mainongoingsoloparent.js') }}"></script>
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
	$(document).ready(function ()
	{
		
		var x = 1;

var htmlcommunity =`<div class="input_wrap" >
					<label for="experience">Name</label>
					<input type="text" name="organizationname[]" class="input" id="type">
					<label for="experience">Position</label>
					<input type="text" name="position[]" class="input" id="schoolname" required>
					<label for="experience">Inclusive Date</label>
					<input data-format="yyyy-MM-dd" class="input" type="date" id="commmunitydate" name="commmunitydate[]">
					<input type="button" class="btn btn-danger add_item_btn" name="remove" id="remove" value="remove">
				</div>`;
var x = 1;

var htmlseminar =`<div class="input_wrap" >
					<label for="experience">Name</label>
					<input type="text" name="seminarorganizationname[]" class="input" id="type">
					<label for="experience">Position</label>
					<input type="text" name="seminarposition[]" class="input" id="schoolname" required>
					<label for="experience">Inclusive Date</label>
					<input data-format="yyyy-MM-dd" class="input" type="date" id="birthdaytime" name="seminardate[]">
					<input type="button" class="btn btn-danger add_item_btn" name="remove" id="remove" value="remove">
				</div>`;
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