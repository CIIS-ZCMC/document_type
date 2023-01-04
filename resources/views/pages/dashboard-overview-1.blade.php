@extends('../layout/' . $layout)

<link rel="stylesheet" href=" https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<!-- font awesome icon 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
box icon 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
 material icon 
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
      rel="stylesheet">-->

@section('subhead')
    <title>Dashboard | Social Welfare Registration and Benefits System</title>
@endsection

@section('subcontent')
 
              <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Registered
                       
                    </h2>
                    <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="user" class="report-box__icon text-primary"></i> 
                                    <div class="ml-auto">
                                        <div class="report-box__indicator btn-primary tooltip cursor-pointer" title="{{$citizencount}}-Citizen">  <i data-lucide="" class="w-4 h-4 ml-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">{{$citizencount}}</div>
                                <div class="text-base text-slate-500 mt-1">Citizen</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="user" class="report-box__icon text-primary"></i> 
                                    <div class="ml-auto">
                                        <div class="report-box__indicator btn-primary tooltip cursor-pointer" title="{{$seniorcount}}-Senior Citizen"> <i  class="w-4 h-4 ml-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">{{$seniorcount}}</div>
                                <div class="text-base text-slate-500 mt-1">Senior Citizen</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="user" class="report-box__icon text-primary"></i> 
                                    <div class="ml-auto">
                                        <div class="report-box__indicator btn-primary tooltip cursor-pointer" title="{{$pwdcount}}-PWD"> <i  class="w-4 h-4 ml-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">{{$pwdcount}}</div>
                                <div class="text-base text-slate-500 mt-1">PWD</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="user" class="report-box__icon text-primary"></i> 
                                    <div class="ml-auto">
                                        <div class="report-box__indicator btn-primary tooltip cursor-pointer" title="{{$soloparentcount}}-Solo Parent">  <i  class="w-4 h-4 ml-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">{{$soloparentcount}}</div>
                                <div class="text-base text-slate-500 mt-1">Solo Parent </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Pending Applicants
                    </h2>
                   
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="user" class="report-box__icon text-primary"></i> 
                                    <div class="ml-auto">
                                        <div class="report-box__indicator btn-primary tooltip cursor-pointer" title="{{$pendingcitizencount}}-Citizen (Pending)">  <i data-lucide="" class="w-4 h-4 ml-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">{{$pendingcitizencount}}</div>
                                <div class="text-base text-slate-500 mt-1">Citizen</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="user" class="report-box__icon text-primary"></i> 
                                    <div class="ml-auto">
                                        <div class="report-box__indicator btn-primary tooltip cursor-pointer" title="{{$pendingseniorcount}}-Senior Citizen (Pending)"> <i  class="w-4 h-4 ml-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">{{$pendingseniorcount}}</div>
                                <div class="text-base text-slate-500 mt-1">Senior Citizen</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="user" class="report-box__icon text-primary"></i> 
                                    <div class="ml-auto">
                                        <div class="report-box__indicator btn-primary tooltip cursor-pointer" title="{{$pendingpwdcount}}-PWD (Pending)"> <i  class="w-4 h-4 ml-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">{{$pendingpwdcount}}</div>
                                <div class="text-base text-slate-500 mt-1">PWD</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="user" class="report-box__icon text-primary"></i> 
                                    <div class="ml-auto">
                                        <div class="report-box__indicator btn-primary tooltip cursor-pointer" title="{{$pendingsoloparentcount}}-Solo Parent (Pending)">  <i  class="w-4 h-4 ml-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">{{$pendingsoloparentcount}}</div>
                                <div class="text-base text-slate-500 mt-1">Solo Parent</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
           
    

        

      

    
            


    
   
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

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
<script type="text/javascript">
    $(document).ready(function()
    {

        // $('#datatable tr > *:nth-child(6)').hide();
        // $('#datatable tr > *:nth-child(7)').hide();
        // $('#datatable tr > *:nth-child(8)').hide();
        // $('#datatable tr > *:nth-child(9)').hide();
        // $('#datatable tr > *:nth-child(10)').hide();
        // $('#datatable tr > *:nth-child(11)').hide();
        // $('#datatable tr > *:nth-child(12)').hide();
        // $('#datatable tr > *:nth-child(13)').hide();
        // $('#datatable tr > *:nth-child(14)').hide();
       
        $('#evaluateclient').on('hidden.bs.modal', function(e){
           $(this).find('editform')[0].reset();           
    });
        $("#datatable").on('click', '.edit', function()
        {
            $tr=$(this).closest('tr');
            if ($($tr).hasClass('child'))
            {
                $tr = $tr.prev('.parent');
            }
          

            var data = $('#datatable').DataTable(
                {
                    "retrieve": true,
                    "bPaginate": false,
                      "bFilter": false,
       
                }
            ).row($tr).data();
           
            // document.getElementById('fullname').innerHTML
            //     = data[1];
                document.getElementById('type').innerHTML
                    = "Citizen: "+data[3];
                document.getElementById('date').innerHTML
                = "Date Applied: "+data[4];
                document.getElementById('firstname').innerHTML
                = "First Name: " + data[6];
                document.getElementById('lastname').innerHTML
                = "Last Name: " + data[7];
                document.getElementById('middlename').innerHTML
                = "Middle Name: " + data[8];
                document.getElementById('middlename1').innerHTML
                = "Extension Name: " + data[9];
                document.getElementById('street').innerHTML
                = "Street: " + data[10];
                document.getElementById('barangay').innerHTML
                = "Barangay: " + data[2];
                document.getElementById('city').innerHTML
                = "City: " + data[11];
                document.getElementById('province').innerHTML
                = "Province: " + data[12];
                document.getElementById('sex').innerHTML
                = "Sex: " + data[13];
                var dob=data[14];
                document.getElementById('birthdate').value
                =  data[14];
                const ageInYears = moment().diff(new Date(dob), 'years');
                document.getElementById('age').innerHTML
                = "Age: " + ageInYears;
                document.getElementById('birthplace').value
                =  data[15];
                document.getElementById('civilstatus').value
                =  data[16];
                document.getElementById('educational').value
                =  data[17];
                document.getElementById('religion').value
                =  data[18];
                document.getElementById('nationality').value
                =  data[19];
                document.getElementById('skills').value
                =  data[20];
                document.getElementById('hobbies').value
                =  data[21];  
                document.getElementById('status').value
                =  data[22];
                document.getElementById('category').value
                =  data[23];
                document.getElementById('typeemp').value
                =  data[24];
                document.getElementById('occupation').value
                =  data[25];
                document.getElementById('salary').value
                =  data[26];



                $("#family").empty();
                $("#fam").empty();

                var arrayname = new Array();
                var arraylastname = new Array();
                var arraymiddlename = new Array();
                var arrayextensionname = new Array();
                var arraysex = new Array();
                var arrayrelationship = new Array();
                var arrayage = new Array();
                var arraybirthdate = new Array();

                var names = data[29];
                var lastname = data[30];
                var middlename = data[31];
                var extensionname = data[32];
                var sex = data[33];
                var relationship = data[34];
                var age = data[35];
                var birthdate = data[36];

                arrayname = names.split(',');
                arraylastname = lastname.split(',');
                arraymiddlename = middlename.split(',');
                arrayextensionname = extensionname.split(',');
                arraysex = sex.split(',');
                arrayrelationship = relationship.split(',');
                arrayage = age.split(',');
                arraybirthdate = birthdate.split(',');

                for (let i = 0; i < arrayname.length - 1; i++) {
                    var name =  arrayname[i];
                    var lastname =  arraylastname[i];
                    var middlename =  arraymiddlename[i];
                    var extensionname =  arrayextensionname[i];
                    var sex =  arraysex[i];
                    var relationship =  arrayrelationship[i];
                    var age =  arrayage[i];
                    var birthdate =  arraybirthdate[i];


                  
                    let birthDate = moment(birthdate);
                    let famage = moment().diff(birthDate, 'years');

                   
                        $("#family").append($('<label for="update-profile-form-6" class="form-label">First name</label><input id="familyfirstname[]" type="text" class="form-control"  value="" disabled>').val(name),$('<label for="update-profile-form-6" class="form-label">Last name</label><input id="familyfirstname[]" type="text" class="form-control" value="" disabled>').val(lastname),$('<label for="update-profile-form-6" class="form-label">Middle name</label><input id="familyfirstname[]" type="text" class="form-control"  value="" disabled>').val(middlename),$('<label for="update-profile-form-6" class="form-label">Extension name</label><input id="familyfirstname[]" type="text" class="form-control"  value="" disabled>').val(extensionname),'<div class="p-5""></div>')
                        $("#fam").append($('<label for="update-profile-form-6" class="form-label">Sex</label><input id="familyfirstname[]" type="text" class="form-control"  value="" disabled>').val(sex),$('<label for="update-profile-form-6" class="form-label">Relationship</label><input id="familyfirstname[]" type="text" class="form-control" value="" disabled>').val(relationship),$('<label for="update-profile-form-6" class="form-label">Age</label><input id="familyfirstname[]" type="text" class="form-control"  value="" disabled>').val(famage),$('<label for="update-profile-form-6" class="form-label">Date of Birth</label><input id="familyfirstname[]" type="text" class="form-control"  value="" disabled>').val(birthdate),'<div class="p-5""></div>')
                        
                    }



                $("#education").empty();
                $("#edu").empty();

                var arraytype = new Array();
                var arrayschool = new Array();
                var arraycourse = new Array();
                var arrayyeargraduated = new Array();
                var arrayachievement = new Array();

                var type = data[37];
                var school = data[38];
                var course = data[39];
                var yeargraduated = data[40];
                var achievement = data[41];

                arraytype = type.split(',');
                arrayschool = school.split(',');
                arraycourse = course.split(',');
                arrayyeargraduated = yeargraduated.split(',');
                arrayachievement = achievement.split(',');
               

                for (let i = 0; i < arraytype.length - 1; i++) {
                    var type =  arraytype[i];
                    var school =  arrayschool[i];
                    var course =  arraycourse[i];
                    var yeargraduated =  arrayyeargraduated[i];
                    var achievement =  arrayachievement[i];
                 

                  
                   

                   
                        $("#education").append($('<label for="update-profile-form-6" class="form-label">Education Level</label><input id="familyfirstname[]" type="text" class="form-control"  value="" disabled>').val(type),$('<label for="update-profile-form-6" class="form-label">Name of School</label><input id="familyfirstname[]" type="text" class="form-control" value="" disabled>').val(school),$('<label for="update-profile-form-6" class="form-label">Courses</label><input id="familyfirstname[]" type="text" class="form-control"  value="" disabled>').val(course),'<div class="p-5""></div>')
                        $("#edu").append($('<label for="update-profile-form-6" class="form-label">Year Graduated</label><input id="familyfirstname[]" type="text" class="form-control"  value="" disabled>').val(yeargraduated),$('<label for="update-profile-form-6" class="form-label">Achievement/Award Received</label><input id="familyfirstname[]" type="text" class="form-control" value="" disabled>').val(achievement),'<div class="p-5""></div>','<div class="p-5""></div>','<div class="p-5""></div>')
                        
                    }


                    
                $("#community").empty();
                $("#com").empty();

                var arrayorganizationname = new Array();
                var arrayposition = new Array();
                var arraydate = new Array();
               
                var organizationname = data[42];
                var position = data[43];
                var date = data[44];
             
                arrayorganizationname = organizationname.split(',');
                arrayposition = position.split(',');
                arraydate = date.split(',');
            
               

                for (let i = 0; i < arrayorganizationname.length - 1; i++) {
                    var organizationname =  arrayorganizationname[i];
                    var position =  arrayposition[i];
                    var date =  arraydate[i];
                 
                        $("#community").append($('<label for="update-profile-form-6" class="form-label">Name of Organization</label><input id="familyfirstname[]" type="text" class="form-control"  value="" disabled>').val(organizationname),$('<label for="update-profile-form-6" class="form-label">Position</label><input id="familyfirstname[]" type="text" class="form-control" value="" disabled>').val(position),'<div class="p-5""></div>')
                        $("#com").append($('<label for="update-profile-form-6" class="form-label">Inclusive Date</label><input id="familyfirstname[]" type="text" class="form-control"  value="" disabled>').val(date),'<div class="p-5""></div>','<div class="p-5""></div>','<div class="p-5""></div>')
                        
                    }



                 
                $("#seminar").empty();
                $("#sem").empty();

                var arraysemorganizationname = new Array();
                var arraysemposition = new Array();
                var arraysemdate = new Array();
               
                var semorganizationname = data[45];
                var semposition = data[46];
                var semdate = data[47];
             
                arraysemorganizationname = semorganizationname.split(',');
                arraysemposition = semposition.split(',');
                arraysemdate = semdate.split(',');
            
               

                for (let i = 0; i < arraysemorganizationname.length - 1; i++) {
                    var semorganizationname =  arraysemorganizationname[i];
                    var semposition =  arraysemposition[i];
                    var semdate =  arraysemdate[i];
                 
                        $("#seminar").append($('<label for="update-profile-form-6" class="form-label">Name of Organization</label><input id="familyfirstname[]" type="text" class="form-control"  value="" disabled>').val(semorganizationname),$('<label for="update-profile-form-6" class="form-label">Position</label><input id="familyfirstname[]" type="text" class="form-control" value="" disabled>').val(semposition),'<div class="p-5""></div>')
                        $("#sem").append($('<label for="update-profile-form-6" class="form-label">Inclusive Date</label><input id="familyfirstname[]" type="text" class="form-control"  value="" disabled>').val(semdate),'<div class="p-5""></div>','<div class="p-5""></div>')
                        
                    }
                  
                  
                
                  
                  
                
                    

                 
                            
           

             
                                
             
               
            $('#editform').attr('action','/approvesoloparent/' + data[27]+'/'+data[28]);
            $('#userphoto').attr("src","/images/picture/"+data[5]);
            $('#picture').attr("src","/images/picture/"+data[5]);
            $('#birth').attr("src","/images/birth/"+data[5]);
            $('#barangaycert').attr("src","/images/barangay/"+data[5]);
            $('#declineform').attr('action','/declinesoloparentapproval/' + data[27]+'/'+data[28]);
           
          
        })
       

    })

   

</script>

