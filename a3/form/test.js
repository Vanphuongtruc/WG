
const date_picker_element = document.querySelector('.date-picker');
const selected_date_element = document.querySelector('.date-picker .selected-date');
const dates_element = document.querySelector('.date-picker .dates');
const mth_element = document.querySelector('.date-picker .dates .month .mth');
const next_mth_element = document.querySelector('.date-picker .dates .month .next-mth');
const prev_mth_element = document.querySelector('.date-picker .dates .month .prev-mth');
const days_element = document.querySelector('.date-picker .dates .days');

const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

let date = new Date();
let day = date.getDate();
let month = date.getMonth();
let year = date.getFullYear();

let selectedDate = date;
let selectedDay = day;
let selectedMonth = month;
let selectedYear = year;

mth_element.textContent = months[month] + ' ' + year;

selected_date_element.textContent = formatDate(date);
selected_date_element.dataset.value = selectedDate;

populateDates();

// EVENT LISTENERS
date_picker_element.addEventListener('click', toggleDatePicker);
next_mth_element.addEventListener('click', goToNextMonth);
prev_mth_element.addEventListener('click', goToPrevMonth);

// FUNCTIONS
function toggleDatePicker (e) {
	if (!checkEventPathForClass(e.path, 'dates')) {
		dates_element.classList.toggle('active');
	}
}

function goToNextMonth (e) {
	month++;
	if (month > 11) {
		month = 0;
		year++;
	}
	mth_element.textContent = months[month] + ' ' + year;
	populateDates();
}

function goToPrevMonth (e) {
	month--;
	if (month < 0) {
		month = 11;
		year--;
	}
	mth_element.textContent = months[month] + ' ' + year;
	populateDates();
}

function populateDates (e) {
	days_element.innerHTML = '';
	let amount_days = 31;

	if (month == 1) {
		amount_days = 28;
	}

	for (let i = 0; i < amount_days; i++) {
		const day_element = document.createElement('div');
		day_element.classList.add('day');
		day_element.textContent = i + 1;

		if (selectedDay == (i + 1) && selectedYear == year && selectedMonth == month) {
			day_element.classList.add('selected');
		}

		day_element.addEventListener('click', function () {
			selectedDate = new Date(year + '-' + (month + 1) + '-' + (i + 1));
			selectedDay = (i + 1);
			selectedMonth = month;
			selectedYear = year;

			selected_date_element.textContent = formatDate(selectedDate);
			selected_date_element.dataset.value = selectedDate;

			populateDates();
		});

		days_element.appendChild(day_element);
	}
}

// HELPER FUNCTIONS
function checkEventPathForClass (path, selector) {
	for (let i = 0; i < path.length; i++) {
		if (path[i].classList && path[i].classList.contains(selector)) {
			return true;
		}
	}
	
	return false;
}
function formatDate (d) {
	let day = d.getDate();
	if (day < 10) {
		day = '0' + day;
	}

	let month = d.getMonth() + 1;
	if (month < 10) {
		month = '0' + month;
	}

	let year = d.getFullYear();

	return day + ' / ' + month + ' / ' + year;
}


//form
const  form = document.getElementById('form1');
const username = document.getElementById('username');
const email = document.getElementById('email');
const mobile = document.getElementById('mobile');

form.addEventListener('submit', e => {
	e.preventDefault();
    checkInputs();
});
function checkInputs() {
	// trim to remove the whitespaces
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const mobileValue = mobile.value.trim();
    const creditcardValue = creditcard.value.replace(/ /g,'');
    //check name
    if(usernameValue === '') {
		setErrorFor(username, 'Username cannot be blank');
    } else if (!isWesternName(usernameValue)) {
		setErrorFor(username, 'Not a Western name');
    } else {
		setSuccessFor(username);
    }
    //check email although there are no regex
    if(emailValue === '') {
		setErrorFor(email, 'Email cannot be blank');
    }  else {
		setSuccessFor(email);
    }
    //check mobile
    if(mobileValue === '') {
		setErrorFor(mobile, 'Username cannot be blank');
    } else if (!isAustralianMobile(mobileValue)) {
		setErrorFor(mobile, 'Australian mobile number only');
    } else {
		setSuccessFor(mobile);
    }
    //check credit card
    if(creditcardValue === '') {
		setErrorFor(creditcard, 'credit card cannot be blank');
    } else if (!isCreditcard(creditcardValue)) {
		setErrorFor(creditcard, 'Credit card not valid');
    } else {
		setSuccessFor(creditcard);
    }
}

    function setErrorFor(input, message) {
        const formControl = input.parentElement;
        const small = formControl.querySelector('small');
        formControl.className = 'form-control error';
        small.innerText = message;
    }

    function setSuccessFor(input) {
        const formControl = input.parentElement;
        formControl.className = 'form-control success';
    }

    //regex functions
    function isWesternName(username) {
        return /^[a-zA-Z \-.']{1,100}$/.test(username);
    }

    function isAustralianMobile(mobile) {
        return /^(\(04\)|04|\+614)( ?\d){8}$/.test(mobile);
    }

    function isCreditcard(creditcard){
        return /^[0-9]{14,19}$/.test(creditcard)
    }


//total price
function totalPrice(){
    var STA = document.getElementById('seats-STA').value;
    var STP = document.getElementById('seats-STP').value;
    var STC = document.getElementById('seats-STC').value;
    var FCA = document.getElementById('seats-FCA').value;
    var FCP = document.getElementById('seats-FCP').value;
    var FCC = document.getElementById('seats-FCC').value;
    //no discount
    var totalPrice = (STA*19.8 + STC*17.5 + STP*15.3 + FCA*30 + FCP*27 + FCC*24).toFixed(2);
    document.getElementById('totalPrice').innerHTML = "$" + totalPrice;
}


