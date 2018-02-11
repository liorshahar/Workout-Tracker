
$(document).ready(function(){
		$.getJSON("data/programs.json",function(data){
			console.log(data);
			$.each(data.products,function(){
				var image = this.img;
				var name = this.name;
				var img = $('<img class="rounded mx-auto d-block" max-width="200px" height="148px">')
					.attr('src',image); 
				var card = $('<div class="card text-center">')
					.css('max-width','200px');
				var button = $('<a href="#" class="btn btn-dark">choose</a>').on('click',choose);
				card.append(img);
				card.append(
					$('<div class="card-body">')
						.append('<h4 class="card-title"><b>' + name + '</b></h4>')
						.append('<p class="card-text"><small class="text-muted">')
						.append(button)
					)
				$('main .row').append(card);
			});
		});
});

function choose(){
	var element = $(this).siblings().get(0);
	var workout = $(element).text();
	var trainee_id = $_SESSION['trainee_id'];
	var queryString = 'workout=' + workout + '&trainee_id=' + trainee_id;
	console.log(text);
	
	
	$.ajax({
	    type: "GET",
	    url: "updateprogram.php",
	    data: queryString ,
	    success: function(response) {
	    	console.log(response); 
	    }
	});
return false; // Prevent the browser from navigating to the-script.php
};
	
