
var totalQuestions = $('.questions').size();

var currentQuestion = 0;

$questions = $('.questions');

$questions.hide();
$('.reponse').hide();

$($questions.get(currentQuestion)).fadeIn();
//attach a click listener to the HTML element with the id of 'next'
$("#next").click(function () {
	 var a=document.getElementById("progress-bar").style.width;
	 var res=a.substr(0,(a.length)-1);

     $($questions.get(currentQuestion)).fadeOut(function () {

        
        currentQuestion = currentQuestion + 1;

        if (currentQuestion == totalQuestions) {
			$('#next').hide
			document.forms['question'].submit()

        } else {
			res=eval(res)+(100/3);
			document.getElementById("progress-bar").style.width=res+"%";
			document.getElementById("progress-bar").innerHTML=Math.floor(res)+"%";

            $($questions.get(currentQuestion)).fadeIn();
			

        }
    });

});

	

	
	
        var c = 240;
        var t;
        timedCount();

        function timedCount() {

        	var hours = parseInt( c / 3600 ) % 24;
        	var minutes = parseInt( c / 60 ) % 60;
        	var seconds = c % 60;

        	var result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);

            
        	$('#timer').html(result);
            if(c == 0 ){
            	
				document.forms['question'].submit();
            }
            c = c - 1;
            t = setTimeout(function(){ timedCount() }, 1000);
        }