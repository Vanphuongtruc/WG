
const date_picker_element = document.querySelector('.date-picker');
const selected_date_element = document.querySelector('.date-picker .selected-date');
const dates_element = document.querySelector('.date-picker .dates');
const mth_element = document.querySelector('.date-picker .dates .month .mth');
const next_mth_element = document.querySelector('.date-picker .dates .month .next-mth');
const prev_mth_element = document.querySelector('.date-picker .dates .month .prev-mth');
const days_element = document.querySelector('.date-picker .dates .days');

const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];



var day1 = new Date();
var number1 = day1.getDay()-1;
var sel = document.getElementById('mySelect').value;
dateList = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sonday']
var discount = 0;

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
    var totalPrice = ((STA*19.8 + STC*17.5 + STP*15.3 + FCA*30 + FCP*27 + FCC*24)).toFixed(2);
    
    // discount
    discountPrice = totalPrice - (totalPrice*discount).toFixed(2);
    if (totalPrice == discountPrice){
      document.getElementById('totalPrice').innerHTML = "$" + totalPrice;
    }
    else{
      document.getElementById('totalPrice').innerHTML = "$" + totalPrice +' discount price:' +"$"+discountPrice;
    }
}






// Avenger
function myFunction1(){
    // take movie name
   var movie = document.getElementById('movieName1').innerText;
   var list = movie.split('-')
   console.log(list)
   document.getElementById('movie0').innerHTML = list[0];

   // take rating
   document.getElementById('rating').innerHTML = list[1]

   // take description
   document.getElementById('description').innerHTML = "The grave course of events set in motion by Thanos that wiped out half the universe and fractured the Avengers ranks compels the remaining Avengers to take one final stand in Marvel Studios' grand conclusion to twenty-two films";

   // take trailer
   document.getElementById('trailer').src = "https://www.youtube.com/embed/TcMBFSGVi1c?fbclid=IwAR1wsJ6PaQxy7coBOBB_5obor3TqEqKrnFYfX72hwAhB0UFNcctCobtiN3Y";

   // comment
   document.getElementById('comment').innerHTML = "Action & Adventure, Drama, Science Fiction & Fantasy";
}
// dumbo
function myFunction2(){
    // take movie name
   var movie = document.getElementById('movieName2').innerText;
   var list = movie.split('-')
   console.log(list)
   document.getElementById('movie0').innerHTML = list[0];

   // take rating
   document.getElementById('rating').innerHTML = list[1]

   // take description
   document.getElementById('description').innerHTML = "From Disney and visionary director Tim Burton, the all-new grand live-action adventure Dumbo expands on the beloved classic story where differences are celebrated, family is cherished and dreams take flight Circus owner Max Medici (Danny DeVito) enlists former star Holt Farrier (Colin Farrell) and his children Milly (Nico Parker) and Joe (Finley Hobbins) to care for a newborn elephant whose oversized ears make him a laughingstock in an already struggling circus. But when they discover that Dumbo can fly, the circus makes an incredible comeback, attracting persuasive entrepreneur V.A. Vandevere (Michael Keaton), who recruits the peculiar pachyderm for his newest, larger-than-life entertainment venture, Dreamland";
   

   // take trailer
   document.getElementById('trailer').src = "https://www.youtube.com/embed/7NiYVoqBt-8";

   // comment
   document.getElementById('comment').innerHTML = "Animation, Kids & Family, Science Fiction & Fantasy";
}
// frozen
function myFunction3(){
    // take movie name
   var movie = document.getElementById('movieName3').innerText;
   var list = movie.split('-')
   console.log(list)
   document.getElementById('movie0').innerHTML = list[0];

   // take rating
   document.getElementById('rating').innerHTML = list[1]

   // take description
   document.getElementById('description').innerHTML = "Why was Elsa born with magical powers? The answer is calling her and threatening her kingdom. Together with Anna, Kristoff, Olaf and Sven, she'll set out on a dangerous but remarkable journey. In Frozen, Elsa feared her powers were too much for the world. In Frozen 2, she must hope they are enough.";

   // take trailer
   document.getElementById('trailer').src = "https://www.youtube.com/embed/Zi4LMpSDccc?start=6";

   // comment
   document.getElementById('comment').innerHTML = "PG (for action/peril and some thematic elements)";
}
// bird of grey lol
function myFunction4(){
    // take movie name
   var movie = document.getElementById('movieName4').innerText;
   var list = movie.split('-')
   console.log(list)
   document.getElementById('movie0').innerHTML = list[0];

   // take rating
   document.getElementById('rating').innerHTML = list[1]

   // take description
   document.getElementById('description').innerHTML = "You ever hear the one about the cop, the songbird, the psycho and the mafia princess? Birds of Prey (And the Fantabulous Emancipation of One Harley Quinn) is a twisted tale told by Harley herself, as only Harley can tell it. When Gotham s most nefariously narcissistic villain, Roman Sionis, and his zealous right-hand, Zsasz, put a target on a young girl named Cass, the city is turned upside down looking for her. Harley, Huntress, Black Canary and Renee Montoya's paths collide, and the unlikely foursome have no choice but to team up to take Roman down.";

   // take trailer
   document.getElementById('trailer').src = "https://www.youtube.com/embed/gq2x6OEq2JA?start=6";

   // comment
   document.getElementById('comment').innerHTML = "R (for strong violence and language throughout, and some sexual and drug material)";
}

function todayDate() {

    console.log(number1)
    document.getElementById("mySelect").selectedIndex = number1;
}



function discountedPrice1(){
  sel = document.getElementById("mySelect").value;
  console.log(sel);
  sel1 = document.getElementById('demo1').innerHTML;
  console.log(sel1)
  document.getElementById('today').innerHTML = sel+'-'+sel1;
	if ( sel == "Saturday"){
    discount = 0;
    console.log(discount);
	}else if(sel == "Sunday"){
		discount = 0;
	}else if( sel1=="12pm") {
		discount = 0.2;
		console.log(discount);
  }

  var STA = document.getElementById('seats-STA').value;
  var STP = document.getElementById('seats-STP').value;
  var STC = document.getElementById('seats-STC').value;
  var FCA = document.getElementById('seats-FCA').value;
  var FCP = document.getElementById('seats-FCP').value;
  var FCC = document.getElementById('seats-FCC').value;
  //no discount
  var totalPrice = ((STA*19.8 + STC*17.5 + STP*15.3 + FCA*30 + FCP*27 + FCC*24)).toFixed(2);
  
  // discount
  discountPrice = totalPrice - (totalPrice*discount).toFixed(2);
  if (totalPrice == discountPrice){
    document.getElementById('totalPrice').innerHTML = "$" + totalPrice;
  }
  else{
    document.getElementById('totalPrice').innerHTML = "$" + totalPrice +' discount price:' +"$"+discountPrice;
  }
}

function discountedPrice2(){
  sel = document.getElementById("mySelect").value;
  console.log(sel);
  sel1 = document.getElementById('demo2').innerHTML;
  console.log(sel1)
  document.getElementById('today').innerHTML = sel+sel1;
  discount=0;
  totalPrice()

}
function discountedPrice3(){
  sel = document.getElementById("mySelect").value;
  console.log(sel);
  sel1 = document.getElementById('demo3').innerHTML;
  console.log(sel1)
  document.getElementById('today').innerHTML = sel+sel1;

  discount=0;
  totalPrice()
}
function discountedPrice4(){
  sel = document.getElementById("mySelect").value;
  console.log(sel);
  sel1 = document.getElementById('demo4').innerHTML;
  console.log(sel1)
  document.getElementById('today').innerHTML = sel+sel1;

  discount=0;
  totalPrice()
}

