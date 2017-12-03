window.onload = function () {
		var chart1 = new CanvasJS.Chart("chartDayPresContainer",
		{

			title:{
				text: "Vývoj tlaku chronologicky - Dnes",
				fontSize: 30
			},
                        animationEnabled: true,
			axisX:{
            
				gridColor: "Silver",
				tickColor: "silver",
        valueFormatString: "H:mm",
        interval: 30,
         intervalType: "minute"
         
			},                        
                        toolTip:{
                          shared:true
                        },
			
      theme: "theme2",
			axisY: {
				gridColor: "Silver",
				tickColor: "silver"
			},
			legend:{                               
				verticalAlign: "center",
				horizontalAlign: "right"
			},
			data: [
			{     
				type: "line",
				showInLegend: true,
				lineThickness: 2,
				name: "Von",
				markerType: "square",
				color: "red",
        
				dataPoints: window.todaypressureoutsideallJs
			},
     
			

			
			],
          legend:{
            cursor:"pointer",
            itemclick:function(e){
              if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
              	e.dataSeries.visible = false;
              }
              else{
                e.dataSeries.visible = true;
              }
              chart1.render();
            }
          }
		});

chart1.render(); 
 		var chart2 = new CanvasJS.Chart("chartDayTempContainer",
		{

			title:{
				text: "Vývoj teplôt chronologicky - Dnes",
				fontSize: 30
			},
                        animationEnabled: true,
			axisX:{
            
				gridColor: "Silver",
				tickColor: "silver",
        valueFormatString: "H:mm",
        interval: 30,
         intervalType: "minute"

			},                        
                        toolTip:{
                          shared:true
                        },
			
      theme: "theme2",
			axisY: {
				gridColor: "Silver",
				tickColor: "silver"
			},
			legend:{                               
				verticalAlign: "center",
				horizontalAlign: "right"
			},
			data: [
			{     
				type: "line",
				showInLegend: true,
				lineThickness: 2,
				name: "Von",
				markerType: "square",
				color: "red",
				dataPoints: window.todaytemperaturesoutsideallJs
			},
      {     
				type: "line",
				showInLegend: true,
				lineThickness: 2,
				name: "Obývačka",
				markerType: "square",
				color: "blue",
				dataPoints: window.todaytemperatureslivingroomallJs
			},

			

			
			],
          legend:{
            cursor:"pointer",
            itemclick:function(e){
              if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
              	e.dataSeries.visible = false;
              }
              else{
                e.dataSeries.visible = true;
              }
              chart2.render();
            }
          }
		});

chart2.render(); 
		var chart3 = new CanvasJS.Chart("chartFullTempContainer",
		{

			title:{
				text: "Vývoj teplôt chronologicky - Doteraz",
				fontSize: 30
			},
                        animationEnabled: true,
			axisX:{
            
				gridColor: "Silver",
				tickColor: "silver",
        valueFormatString: "H:mm",
        interval: 2,
         intervalType: "hours"

			},                        
                        toolTip:{
                          shared:true
                        },
			
      theme: "theme2",
			axisY: {
				gridColor: "Silver",
				tickColor: "silver"
			},
			legend:{                               
				verticalAlign: "center",
				horizontalAlign: "right"
			},
			data: [
			{     
				type: "line",
				showInLegend: true,
				lineThickness: 2,
				name: "Von",
				markerType: "square",
				color: "red",
				dataPoints: window.todaytemperaturesoutsideFullJs
			},
      {     
				type: "line",
				showInLegend: true,
				lineThickness: 2,
				name: "Obývačka",
				markerType: "square",
				color: "blue",
				dataPoints: window.todaytemperatureslivingroomFullJs
			},
			
			],
          legend:{
            cursor:"pointer",
            itemclick:function(e){
              if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
              	e.dataSeries.visible = false;
              }
              else{
                e.dataSeries.visible = true;
              }
              chart3.render();
            }
          }
		});

chart3.render();
  
		var chart4 = new CanvasJS.Chart("chartFullPresContainer",
		{

			title:{
				text: "Vývoj tlaku chronologicky - Doteraz",
				fontSize: 30
			},
                        animationEnabled: true,
			axisX:{
            
				gridColor: "Silver",
				tickColor: "silver",
        valueFormatString: "H:mm",
        interval: 2,
         intervalType: "hours"

			},                        
                        toolTip:{
                          shared:true
                        },
			
      theme: "theme2",
			axisY: {
				gridColor: "Silver",
				tickColor: "silver"
			},
			legend:{                               
				verticalAlign: "center",
				horizontalAlign: "right"
			},
			data: [
			{     
				type: "line",
				showInLegend: true,
				lineThickness: 2,
				name: "Von",
				markerType: "square",
				color: "red",
				dataPoints: window.todaypressureoutsideFullJs
			},
     
			

			
			],
          legend:{
            cursor:"pointer",
            itemclick:function(e){
              if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
              	e.dataSeries.visible = false;
              }
              else{
                e.dataSeries.visible = true;
              }
              chart4.render();
            }
          }
		});

chart4.render(); 



 		var chart5 = new CanvasJS.Chart("chartFullHumContainer",
		{

			title:{
				text: "Vývoj vlhkosti chronologicky - Doteraz",
				fontSize: 30
			},
                        animationEnabled: true,
			axisX:{
            
				gridColor: "Silver",
				tickColor: "silver",
        valueFormatString: "H:mm",
        interval: 2,
         intervalType: "hours"

			},                        
                        toolTip:{
                          shared:true
                        },
			
      theme: "theme2",
			axisY: {
				gridColor: "Silver",
				tickColor: "silver"
			},
			legend:{                               
				verticalAlign: "center",
				horizontalAlign: "right"
			},
			data: [
			{     
				type: "line",
				showInLegend: true,
				lineThickness: 2,
				name: "Vlhkosť",
				markerType: "square",
				color: "Green",
				dataPoints: window.todayhumidityoutsideFullJs
			},
     
			

			
			],
          legend:{
            cursor:"pointer",
            itemclick:function(e){
              if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
              	e.dataSeries.visible = false;
              }
              else{
                e.dataSeries.visible = true;
              }
              chart5.render();
            }
          }
		});

chart5.render();



	var chart6 = new CanvasJS.Chart("chartDayHumContainer",
		{

			title:{
				text: "Vývoj vlhkosti chronologicky - Dnes",
				fontSize: 30
			},
                        animationEnabled: true,
			axisX:{
            
				gridColor: "Silver",
				tickColor: "silver",
        valueFormatString: "H:mm",
        interval: 30,
         intervalType: "minute"
         
			},                        
                        toolTip:{
                          shared:true
                        },
			
      theme: "theme2",
			axisY: {
				gridColor: "Silver",
				tickColor: "silver"
			},
			legend:{                               
				verticalAlign: "center",
				horizontalAlign: "right"
			},
			data: [
			{     
				type: "line",
				showInLegend: true,
				lineThickness: 2,
				name: "Vlhkosť",
				markerType: "square",
				color: "red",
        
				dataPoints: window.todayhumidityoutsideallJs
			},
     
			

			
			],
          legend:{
            cursor:"pointer",
            itemclick:function(e){
              if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
              	e.dataSeries.visible = false;
              }
              else{
                e.dataSeries.visible = true;
              }
              chart6.render();
            }
          }
		});

chart6.render(); 
  
}