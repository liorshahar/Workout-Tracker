
var pagePathName;
var name;
var programs;
function init() {	
    pagePathName = window.location.pathname;
    name = pagePathName.substring(pagePathName.lastIndexOf("/") + 1);
    showPopUp();
}

/*
programs ={
    sugget_programs:{
        program1:"Loss Fat",
        program2:"Loss Fat & Diet",
        program3:"12 Weeks Fat Destroyer",
        program4:"Beginner's Fat-Loss",
        program5:"Metabolic Supercharge",
        program6:"The no-cardio workout",
    }
}
*/


/*var main = $('main').css('paddig-top','20px');*/

/*var program = $('<div class="card-deck">');
var suggets_prog = programs.sugget_programs;*/

/*
function addProgram(){
    $.getJSON("data/programs.json",function(data){
        console.log("data");
        $.each(data.products,function(){
            console.log("for");
            var img = $('<img class="rounded mx-auto d-block" max-width="200px" height="148px">')
            .attr('src',`{this.img}`); 
            var card = $('<div class="card text-center">')
            .css('max-width','200px');
            var button = $('<a href="#" class="btn btn-dark">choose</a>').on('click',choose);
            card.append(img);
            card.append(
                $('<div class="card-body">')
                .append('<h4 class="card-title"><b>' + this.name + '</b></h4>')
                .append('<p class="card-text"><small class="text-muted">')
                .append(button)
            )
            $('main .row').append(card);
        });
    });
}*/
/*
function choose(){
    var element = $(this).siblings().get(0);
}*/


function showPopUp(){
    if (name == "newtrainee2.html"){
        $("#submit").click(function(){
            console.log("pop");
            $('#popup').css('visibility','visible');    
        });
        $("#ok").click(function(){
            $('#popup').css('visibility','hidden');   
        });
    }	
}


function selectedPage(){
    console.log(name);
    if (!(name == "index.html" | name== "login.html")){
        name = 'trainers.html';
    }

    var l = $("nav a");
    $('nav a[href="' + name + '"]').css("color", "#0B2CE9");
}

function showGraph(){
    var chart = new CanvasJS.Chart("chartContainer",
                                   {
        backgroundColor: "#f5f5f5",
        title:{
            text: "Last Month Weight Measure"
        },
        width:650,
        axisY:{
            maximum:110,
            minimum:90,
        },

        data: [
            {
                type: "line",

                dataPoints: [
                    { x: new Date(2017, 10, 1), y: 98.5 },
                    { x: new Date(2017, 10, 3), y: 100 },
                    { x: new Date(2017, 10, 5), y: 100.3 },
                    { x: new Date(2017, 10, 7), y: 100.6 },
                    { x: new Date(2017, 10, 9), y: 101 },
                    { x: new Date(2017, 10, 11), y: 100 },
                    { x: new Date(2017, 10, 13), y: 99.5 },
                    { x: new Date(2017, 10, 15), y: 99 },
                    { x: new Date(2017, 10, 17), y: 98.7 },
                    { x: new Date(2017, 10, 19), y: 98.3 },
                    { x: new Date(2017, 10, 21), y: 98.6 },
                    { x: new Date(2017, 10, 23), y: 98.2 },
                    { x: new Date(2017, 10, 25), y: 97.8 },
                    { x: new Date(2017, 10, 27), y: 97.2 },
                    { x: new Date(2017, 10, 29), y: 97.8 },
                    { x: new Date(2017, 10, 31), y: 97 },
                ]
            }
        ]
    });

    chart.render();
}

function showIndicesGrpah(){
    var options = {
        animationEnabled: true,
        title:{
            text: "Measure Graph"   
        },
        axisY:{
            title:"measure"
        },
        width:500,
        height:400,
        toolTip: {
            shared: true,
            reversed: true
        },
        data: [{
            type: "stackedColumn",
            name: "Current measure",
            showInLegend: "true",
            yValueFormatString: "#,##0",
            dataPoints: [
                { y: 72.2 , label: "Calories(x10)" },
                { y: 17, label: "Steps(x100)" },
                { y: 75, label: "Weight(KG)" },
                { y: 26, label: "Fat perc(%)" },
                { y: 29.32, label: "BMI" },
                { y: 2.5, label: "Distance(km)" }
            ]
        },
               {
                   type: "stackedColumn",
                   name: "Target",
                   showInLegend: "true",
                   yValueFormatString: "#,##0",
                   dataPoints: [
                       { y: 90 , label: "Calories(x10)" },
                       { y: 15, label: "Steps(x100)" },
                       { y: 80, label: "Weight(KG)" },
                       { y: 26, label: "Fat perc(%)" },
                       { y: 28, label: "BMI" },
                       { y: 5, label: "Distance(km)" }
                   ]
               }]
    };

    $("#chartContainer").CanvasJSChart(options);
}



function showTraineeGraph(){
	$.getJSON("showgraph.php",function(data1){
	   	console.log(data1);
	   	var x = [];
	   	var y = [];
	   	var z = [];
	   	var w = [];
	   	var layout = {
	   		autosize: false, 
	   		width:45 + '%', 
	   		plot_bgcolor: '#F5F5F5',
  			paper_bgcolor: '#F5F5F5',
	   	};
	   	
	   	$.each(data1,function(){
	   		x.push(this.date);
			y.push(this.weight);
			z.push(this.bmi);
			w.push(this.calories);
		});
	   		var trace1= {
				x : x,
				y : y,
				name:'weight',
				type:'scatter'
			};
			var trace2= {
				x : x,
				y : z,
				name:'bmi',
				type:'scatter'
			};
			var trace3= {
				x : x,
				y : w,
				name:'calories',
				type:'scatter'
			};					
		
		var data = [trace1,trace2,trace3];
		var layout = {barmode: 'stack'};
		Plotly.newPlot('chart-container',data,layout);
	});
}

function show30daysGraph(){
	$.getJSON("30days query.php",function(data1){
	   	console.log(data1);
	   	var x = [];
	   	var y = [];
	   	var z = [];
	   	var w = [];
	   	$.each(data1,function(){
	   		x.push(this.date);
			y.push(this.weight);
			z.push(this.bmi);
			w.push(this.calories);
		});
	   		var trace1= {
				x : x,
				y : y,
				name:'weight',
				type:'scatter'
			};
			var trace2= {
				x : x,
				y : z,
				name:'bmi',
				type:'scatter'
			};
			var trace3= {
				x : x,
				y : w,
				name:'calories',
				type:'scatter'
			};					
		
		var data = [trace1,trace2,trace3];
		var layout = {barmode: 'stack'};
		Plotly.newPlot('chart-container',data,layout);
	});
}


