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
const imagebirth = document.getElementById('imagebirth');
const imagebarangay = document.getElementById('imagebarangay');
const imagepicture = document.getElementById('imagepicture');










form_1_next_btn.addEventListener("click", function(){
	
	
	const firstnameValue = firstname.value.trim();
	const lastnameValue = lastname.value.trim();
	const middlenameValue = middlename.value.trim();
	const birthdateValue = birthdate.value.trim();
	const birthplaceValue = birthplace.value.trim();
	


	
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

	
	if(firstnameValue === '' || lastnameValue === '' || birthdateValue === ''|| birthplaceValue === '' || civilstatus.value === '0' || gender.value==="0" || education.value==="0") {
	
		setError(firstname, 'First Name cannot be blank');
		setError(lastname, 'Last Name cannot be blank');
		setError(birthdate, 'Date of Birth cannot be blank');
		setError(birthplace, 'Place of Birth cannot be blank');
		setError(civilstatus, 'Civil Status cannot be blank');
		setError(gender, 'Sex cannot be blank');
		
		setError(education, 'Educational attainment cannot be blank');
	}
	// if(lastnameValue === '') {
	
	// 	setError(lastname, 'Last Name cannot be blank');
		
	// }
	// if(middlenameValue === '') {
	
	// 	setError(middlename, 'Middle Name cannot be blank');
		
	// }
	
	// if(birthdateValue === '') {
	
	// 	setError(birthdate, 'Date of Birth cannot be blank');
		
	// }
	// if(birthplaceValue === '') {
	
	// 	setError(birthplace, 'Place of Birth cannot be blank');
		
	// }
	// if(civilstatus.value === '0') {
	
	// 	setError(civilstatus, 'Civil Status cannot be blank');
		
	// }

	// if(gender.value==="0") {
	
	// 	setError(gender, 'Sex cannot be blank');
		
	// }
	// if(education.value==="0") {
	
	// 	setError(education, 'Educational attainment cannot be blank');
		
	// }
	
	else {
		setSuccess(firstname);
		setSuccess(lastname);
		// setSuccess(middlename);
		setSuccess(civilstatus);
		setSuccess(gender);
		setSuccess(birthdate);
		setSuccess(birthplace);

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


	const streetValue = street.value.trim();
	
	const barangayValue = barangay.value.trim();
	const cityValue = city.value.trim();

	const provinceValue = province.value.trim();
	const regionValue = region.value.trim();
	
	
	
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

	
	if(streetValue === '' || cityValue === '' || provinceValue === '' || regionValue === '' || barangay.value === '0') {
	
		setError(street, 'Street cannot be blank');
		setError(city,'City cannot be blank');
		setError(province, 'Province cannot be blank');
		setError(region, 'Region cannot be blank');
		setError(barangay, 'Barangay cannot be blank');
	}
	
	// if(cityValue === '') {
	
	// 	setError(city,'City cannot be blank');
		
	// }
	// if(provinceValue === '') {
	
	// 	setError(province, 'Province cannot be blank');
		
	// }
	// if(regionValue === '') {
	
	// 	setError(region, 'Region cannot be blank');
		
	// }
	// if(barangay.value === '0') {
	
	// 	setError(barangay, 'Barangay cannot be blank');
		
	// }

	else {
		setSuccess(street);
		setSuccess(barangay);
		setSuccess(city);
		setSuccess(province);
		setSuccess(region);

			form_2.style.display = "none";
			form_3.style.display = "block";

			form_3_btns.style.display = "flex";
			form_2_btns.style.display = "none";

			form_3_progessbar.classList.add("active");
	}
});

form_3_next_btn.addEventListener("click", function(){

	var occupation = document.querySelector('input[name = "occupation"]:checked');
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
	var getSelectedValue = document.querySelector( 'input[name="occupation"]:checked');   
	if(Employment.value === '0' || Category.value === '0' || Type.value === '0' || getSelectedValue == null) {
	
		setError(Employment, 'Employment Status cannot be blank');
		setError(Category, 'Employment Category cannot be blank');
		setError(Type, 'Employment Type cannot be blank');
		document.getElementById('bank').innerHTML = 'Ocuupation cannot be blank';
		
	}
	// if(Category.value === '0') {
	
	// 	setError(Category, 'Employment Category cannot be blank');
		
	// }
	// if(Type.value === '0') {
	
	// 	setError(Type, 'Employment Type cannot be blank');
		
	// }
	// var getSelectedValue = document.querySelector( 'input[name="occupation"]:checked');   
	// 	if(getSelectedValue == null) {   
	// 		document.getElementById('bank').innerHTML = 'Ocuupation cannot be blank';
	// 	}
	
	else {
		setSuccess(Employment);
		setSuccess(Category);
		setSuccess(Type);
		document.getElementById('bank').innerHTML = '';

		form_3.style.display = "none";
		form_4.style.display = "block";

		form_4_btns.style.display = "flex";
		form_3_btns.style.display = "none";

		form_4_progessbar.classList.add("active");
	}
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
	const mobilenumberValue = mobilenumber.value.trim();
	const emailaddressValue = emailaddress.value.trim();

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
	if(mobilenumberValue === '' || emailaddressValue === '') {
	
		setError(mobilenumber, 'Mobile number cannot be blank');
		setError(emailaddress, 'Email address cannot be blank');
		
	}
	// if(emailaddressValue === '') {
	
	// 	setError(emailaddress, 'Email address cannot be blank');
		
	// }
	else {
		setSuccess(mobilenumber);
		setSuccess(emailaddress);
	

			form_4.style.display = "none";
			form_5.style.display = "block";

			form_5_btns.style.display = "flex";
			form_4_btns.style.display = "none";

			form_5_progessbar.classList.add("active");
	}
});

form_5_back_btn.addEventListener("click", function(){
	form_4.style.display = "block";
	form_5.style.display = "none";

	form_5_btns.style.display = "none";
	form_4_btns.style.display = "flex";

	form_5_progessbar.classList.remove("active");
});

btn_done.addEventListener("click", function(){
	const imagebirthValue = imagebirth.value.trim();
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
	if(imagebirthValue === '' || imagebarangayValue === '' ||  imagepictureValue === '') {
	
		setError(imagebirth, 'Birth Certificate cannot be blank');
		setError(imagebarangay, 'Barangay Certificate cannot be blank');
		setError(imagepicture, 'Picture cannot be blank');
		
	}
	// if(imagebarangayValue === '') {
	
	// 	setError(imagebarangay, 'Barangay Certificate cannot be blank');
		
	// }
	// if(imagepictureValue === '') {
	
	// 	setError(imagepicture, 'Picture cannot be blank');
		
	// }
	else {
		setSuccess(imagebirth);
		setSuccess(imagebarangay);
		setSuccess(imagepicture);
		modal_wrapper.classList.add("active");
	}
})

// shadow.addEventListener("click", function(){
// 	modal_wrapper.classList.remove("active");
// })

