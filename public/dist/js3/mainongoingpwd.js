var form_1 = document.querySelector(".form_1");
var form_2 = document.querySelector(".form_2");
var form_3 = document.querySelector(".form_3");
var form_4 = document.querySelector(".form_4");
var form_5 = document.querySelector(".form_5");




var form_1_btns = document.querySelector(".form_1_btns");
var form_2_btns = document.querySelector(".form_2_btns");
var form_3_btns = document.querySelector(".form_3_btns");
var form_4_btns = document.querySelector(".form_4_btns");
var form_5_btns = document.querySelector(".form_5_btns");

var form_1_next_btn = document.querySelector(".form_1_btns .btn_next");
var form_2_back_btn = document.querySelector(".form_2_btns .btn_back");
var form_2_next_btn = document.querySelector(".form_2_btns .btn_next");
var form_3_back_btn = document.querySelector(".form_3_btns .btn_back");
var form_3_next_btn = document.querySelector(".form_3_btns .btn_next");
var form_4_back_btn = document.querySelector(".form_4_btns .btn_back");
var form_4_next_btn = document.querySelector(".form_4_btns .btn_next");
var form_5_back_btn = document.querySelector(".form_5_btns .btn_back");


var form_2_progessbar = document.querySelector(".form_2_progessbar");
var form_3_progessbar = document.querySelector(".form_3_progessbar");
var form_4_progessbar = document.querySelector(".form_4_progessbar");
var form_5_progessbar = document.querySelector(".form_5_progessbar");

var btn_done = document.querySelector(".btn_done");
var modal_wrapper = document.querySelector(".modal_wrapper");
var shadow = document.querySelector(".shadow");

// const form = document.getElementById('form');
const firstname = document.getElementById('firstname');
const lastname = document.getElementById('lastname');
const middlename = document.getElementById('middlename');
const gender = document.getElementById('addGender');
const civilstatus = document.getElementById('addCivilStatus');
const education = document.getElementById('addEducation');
const birthdate = document.getElementById('birthdate');
const birthplace = document.getElementById('birthplace');
const street = document.getElementById('street');
const barangay = document.getElementById('addBarangay');
const city = document.getElementById('city');
const province = document.getElementById('province');
const region = document.getElementById('region');
const Employment = document.getElementById('addEmployment');
const Category = document.getElementById('addCategory');
const Type = document.getElementById('addType');



const occupation = document.getElementById('occupation');


const mobilenumber = document.getElementById('mobilenumber');
const emailaddress = document.getElementById('emailaddress');
const imagedisability = document.getElementById('imagedisability');
const imagebarangay = document.getElementById('imagebarangay');
const imagepicture = document.getElementById('imagepicture');










form_1_next_btn.addEventListener("click", function(){
    const imageidValue = imageid.value.trim();
	const imagedisabilityValue = imagedisability.value.trim();
	const imagebarangayValue = imagebarangay.value.trim();
	const imagepictureValue = imagepicture.value.trim();
	const setError = (element, message) => {
		const inputControl = element.parentElement;
		const errorDisplay = inputControl.querySelector('.error');
	
		errorDisplay.innerText = message;
		inputControl.classList.add('error');
		inputControl.classList.remove('success')
	}
	
	const setSuccess = element => {
		const inputControl = element.parentElement;
		const errorDisplay = inputControl.querySelector('.error');
	
		errorDisplay.innerText = '';
		inputControl.classList.add('success');
		inputControl.classList.remove('error');
	};
	if(imagedisabilityValue === '' || imagebarangayValue === '' || imagepictureValue === '' || imageidValue === '') {
	
		setError(imagedisability, 'Birth Certificate cannot be blank');
		setError(imagebarangay, 'Barangay Certificate cannot be blank');
		setError(imagepicture, 'Picture cannot be blank');
		setError(imageid, 'Picture cannot be blank');
		
	}
	// if(imagebarangayValue === '') {
	
	// 	setError(imagebarangay, 'Barangay Certificate cannot be blank');
		
	// }
	// if(imagepictureValue === '') {
	
	// 	setError(imagepicture, 'Picture cannot be blank');
		
	// }
	// if(imageidValue === '') {
	
	// 	setError(imageid, 'Picture cannot be blank');
		
	// }
	else {
		setSuccess(imageid);
		setSuccess(imagebarangay);
		setSuccess(imagepicture);
		setSuccess(imagedisability);

		form_1.style.display = "none";
		form_2.style.display = "block";

		form_1_btns.style.display = "none";
		form_2_btns.style.display = "flex";

		form_2_progessbar.classList.add("active");
	

    }
	

		
	
	
});

form_2_back_btn.addEventListener("click", function(){

	
		form_1.style.display = "block";
		form_2.style.display = "none";

		form_1_btns.style.display = "flex";
		form_2_btns.style.display = "none";

		form_2_progessbar.classList.remove("active");
	
});

form_2_next_btn.addEventListener("click", function(){


	const setError = (element, message) => {
		const inputControl = element.parentElement;
		const errorDisplay = inputControl.querySelector('.error');
	
		errorDisplay.innerText = message;
		inputControl.classList.add('error');
		inputControl.classList.remove('success')
	}
	
	const setSuccess = element => {
		const inputControl = element.parentElement;
		const errorDisplay = inputControl.querySelector('.error');
	
		errorDisplay.innerText = '';
		inputControl.classList.add('success');
		inputControl.classList.remove('error');
	};

	var getSelectedValue = document.querySelector( 'input[name="type[]"]:checked');   
	var getacquiredValue = document.querySelector( 'input[name="acquired[]"]:checked');   
	var getinbornValue = document.querySelector( 'input[name="inborn[]"]:checked');   
	if(getSelectedValue == null || getacquiredValue == null && getinbornValue == null) {   
			document.getElementById('type1').innerHTML = 'Disability Type cannot be blank';
			document.getElementById('acquired1').innerHTML = 'Disability Type cannot be blank';
		document.getElementById('inborn1').innerHTML = 'Disability Type cannot be blank';
	}
	// if(getacquiredValue == null && getinbornValue == null) {   

	// 	document.getElementById('acquired1').innerHTML = 'Disability Type cannot be blank';
	// 	document.getElementById('inborn1').innerHTML = 'Disability Type cannot be blank';
	// }
	
	
	else { 
		
		document.getElementById('type').innerHTML = '';
		document.getElementById('acquired1').innerHTML = '';
		document.getElementById('inborn1').innerHTML = '';

			form_2.style.display = "none";
			form_3.style.display = "block";

			form_3_btns.style.display = "flex";
			form_2_btns.style.display = "none";

			form_3_progessbar.classList.add("active");
	}
	
});

form_3_next_btn.addEventListener("click", function(){

	
	
		form_3.style.display = "none";
		form_4.style.display = "block";

		form_4_btns.style.display = "flex";
		form_3_btns.style.display = "none";

		form_4_progessbar.classList.add("active");
	
});
form_3_back_btn.addEventListener("click", function(){
	form_2.style.display = "block";
	form_3.style.display = "none";

	form_3_btns.style.display = "none";
	form_2_btns.style.display = "flex";

	form_3_progessbar.classList.remove("active");
});

form_4_back_btn.addEventListener("click", function(){
	form_3.style.display = "block";
	form_4.style.display = "none";

	form_4_btns.style.display = "none";
	form_3_btns.style.display = "flex";

	form_4_progessbar.classList.remove("active");
});
form_4_next_btn.addEventListener("click", function(){


			form_4.style.display = "none";
			form_5.style.display = "block";

			form_5_btns.style.display = "flex";
			form_4_btns.style.display = "none";

			form_5_progessbar.classList.add("active");
	
});

form_5_back_btn.addEventListener("click", function(){
	form_4.style.display = "block";
	form_5.style.display = "none";

	form_5_btns.style.display = "none";
	form_4_btns.style.display = "flex";

	form_5_progessbar.classList.remove("active");
});

btn_done.addEventListener("click", function(){
  

		modal_wrapper.classList.add("active");
    
	
})

// shadow.addEventListener("click", function(){
// 	modal_wrapper.classList.remove("active");
// })

