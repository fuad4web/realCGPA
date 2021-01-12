$(document).ready(function() {

  $(`.message a`).click(function(){
    $(`form`).animate({height: "toggle", opacity:"toggle"}, "slow");
 });

// clear all button
$("#table_field").on("click", "#clear", function() {
  $('.insert-form')[0].reset();
});

// reset cgpa form
$("#cgpaTable").on('click', '#clear', function() {
  $('.cgpaForm').reset();
});

 // calculating of unit and point
 $("#table_field").on("click", "#unit", function() {
   // not necessary
  // "use strict";
   var row = $(this).closest("tr");
   var unit = parseFloat(row.find(".unit option:selected").val());
   var point = parseFloat(row.find(".point").val());
   var total = unit * point;
   row.find(".unitPoint").val(isNaN(total) ? "" : total);
 });


 // inputing course point automatically after inputing course score
 $("#table_field").on("change, paste, keyup", ".score", function() {
   // not necessary
   "use strict";
   var row = $(this).closest("tr");
   var score = parseFloat(row.find(".score").val());
 //  var pointScore = score;
   if((score >= 75) && (score <= 100)) {
     row.find(".point").val(isNaN(score) ? "" : 4.00);
   } else if((score >= 70) && (score <= 74)) {
     row.find(".point").val(isNaN(score) ? "" : 3.50);
   } else if((score >= 65) && (score <= 69)) {
     row.find(".point").val(isNaN(score) ? "" : 3.25);
   } else if((score >= 60) && (score <= 64)) {
     row.find(".point").val(isNaN(score) ? "" : 3.00);
   } else if((score >= 55) && (score <= 59)) {
     row.find(".point").val(isNaN(score) ? "" : 2.75);
   } else if((score >= 50) && (score <= 54)) {
     row.find(".point").val(isNaN(score) ? "" : 2.50);
   } else if((score >= 45) && (score <= 49)) {
     row.find(".point").val(isNaN(score) ? "" : 2.25);
   } else if((score >= 40) && (score <= 44)) {
     row.find(".point").val(isNaN(score) ? "" : 2.00);
   } else {
     row.find(".point").val(isNaN(score) ? "" : 0.00);
   };
 });

 // inputing grade automatically after inputing course score
 $("#table_field").on("change, paste, keyup", ".score", function() {
   // not necessary
   "use strict";
   var row = $(this).closest("tr");
   var score = parseFloat(row.find(".score").val());
 //  var pointScore = score;
   if((score >= 75) && (score <= 100)) {
     row.find(".grade").val("A");
   } else if((score >= 70) && (score <= 74)) {
     row.find(".grade").val("AB");
   } else if((score >= 65) && (score <= 69)) {
     row.find(".grade").val("B");
   } else if((score >= 60) && (score <= 64)) {
     row.find(".grade").val("BC");
   } else if((score >= 55) && (score <= 59)) {
     row.find(".grade").val("C");
   } else if((score >= 50) && (score <= 54)) {
     row.find(".grade").val("CD");
   } else if((score >= 45) && (score <= 49)) {
     row.find(".grade").val("D");
   } else if((score >= 40) && (score <= 44)) {
     row.find(".grade").val("E");
   } else {
     row.find(".grade").val("F");
   };
 });

   // calculating of total unit
 $("#calcCUGP").click(function(e) {
  e.preventDefault();
  // not necessary
  "use strict";
  var row = $(this).closest("tr");
  var sum = 0;
  $('select.unit').each(function(){
    var unit = parseFloat($(this).children("option:selected").val());
    //$(this).children("option:selected").val();
    sum += unit;
  });

  //calculating of a single semester cgpa
  var sumPoint = 0;
  $('.unitPoint').each(function(){
    var unitPoint = parseFloat($(this).val());
    sumPoint += unitPoint;
  });
  $answer = sumPoint/sum;
  $(".gpascore").val($answer);
  //$(".gpascore").val(Math.round(sumPoint/sum)).toFixed(1);
});

// to get savedata active after calculating
$(".gpascore").change(function(){
  $("#savegpa").removeAttr("disabled");
});
/*
$('#savegpa').attr('disabled',true);

$('.gpascore').change(function(){
    if($(this).val().length !=0){
        $('#savegpa').attr('disabled', false);
    }
    else
    {
        $('#savegpa').attr('disabled', true);        
    }
});
*/





/*
$('.cgpa').click(function() {
  alert("I won't let you down Insha Allah");
})

copied from google(stack overflow) on calculating total unit
$(document).on("change", "qty1", function() {
  var sum = 0;
  $("input[class *= 'qty1']").each(function(){
      sum += +$(this).val();
  });
  $(".total").val(sum);
});

 // this is not working to all the input box
   // var unit = $("input[name='unit']").val();
   // var point = $("input[name='point']").val();
   // var unitpoint = $("input[name='unitpoint']").val(unit * point);

 // the click event is in the html code
 function calcUnitpoint() {
   const unit = document.querySelector('.unit').value;
   const point = document.querySelector('.point').value;
   document.querySelector(`.unitPoint`).value = unit*point;
 } */
});