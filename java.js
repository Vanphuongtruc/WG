var day = new Date();
var number = day.getDay();
dateList = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sonday']

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
   document.getElementById('description').innerHTML = "this is the description of avenger";

   // take trailer
   document.getElementById('trailer').src = "https://www.youtube.com/embed/TcMBFSGVi1c?fbclid=IwAR1wsJ6PaQxy7coBOBB_5obor3TqEqKrnFYfX72hwAhB0UFNcctCobtiN3Y";

   // comment
   document.getElementById('comment').innerHTML = "action, thrilling này nọ";
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
   document.getElementById('description').innerHTML = "this is the description of dumbo";

   // take trailer
   document.getElementById('trailer').src = "https://www.youtube.com/embed/7NiYVoqBt-8";

   // comment
   document.getElementById('comment').innerHTML = "action, thrilling này nọ";
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
   document.getElementById('description').innerHTML = "this is the description of frozen 2";

   // take trailer
   document.getElementById('trailer').src = "https://www.youtube.com/embed/Zi4LMpSDccc?start=6";

   // comment
   document.getElementById('comment').innerHTML = "action, thrilling này nọ";
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
   document.getElementById('description').innerHTML = "this is the description of bird of prey";

   // take trailer
   document.getElementById('trailer').src = "https://www.youtube.com/embed/gq2x6OEq2JA?start=6";

   // comment
   document.getElementById('comment').innerHTML = "action, thrilling này nọ";
}

function todayDate() {

    console.log(number)
    document.getElementById("mySelect").selectedIndex = number-1;
}

function test(){
    var sel = document.getElementById('mySelect').value;
    console.log(sel);
}
console.log('concac')