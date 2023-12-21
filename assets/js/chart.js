chart = {
	initDashboardPageCharts: function() {
		gradientChartOptionsConfigurationWithTooltipGreen = {
	      maintainAspectRatio: false,
	      legend: {
	        display: false
	      },
	      tooltips: {
	        backgroundColor: '#f5f5f5',
	        titleFontColor: '#333',
	        bodyFontColor: '#666',
	        bodySpacing: 4,
	        xPadding: 12,
	        mode: "nearest",
	        intersect: 0,
	        position: "nearest"
	      },
	      responsive: true,
	      scales: {
	        yAxes: [{
	          barPercentage: 1.6,
	          gridLines: {
	            drawBorder: false,
	            color: 'rgba(29,140,248,0.0)',
	            zeroLineColor: "transparent",
	          },
	          ticks: {
	            suggestedMin: 0,
	            suggestedMax: 25,
	            padding: 20,
	            fontColor: "#9e9e9e"
	          }
	        }],
	        xAxes: [{
	          barPercentage: 1.6,
	          gridLines: {
	            drawBorder: false,
	            color: 'rgba(0,242,195,0.1)',
	            zeroLineColor: "transparent",
	          },
	          ticks: {
	            padding: 20,
	            fontColor: "#9e9e9e"
	          }
	        }]
	      }
	    };
	    
		gradientChartOptionsConfigurationWithTooltipPurple = {
	      maintainAspectRatio: false,
	      legend: {
	        display: false
	      },

	      tooltips: {
	        backgroundColor: '#f5f5f5',
	        titleFontColor: '#333',
	        bodyFontColor: '#666',
	        bodySpacing: 4,
	        xPadding: 12,
	        mode: "nearest",
	        intersect: 0,
	        position: "nearest"
	      },
	      responsive: true,
	      scales: {
	        yAxes: [{
	          barPercentage: 1.6,
	          gridLines: {
	            drawBorder: false,
	            color: 'rgba(29,140,248,0.0)',
	            zeroLineColor: "transparent",
	          },
	          ticks: {
	            suggestedMin: 0,
	            suggestedMax: 25,
	            padding: 20,
	            fontColor: "#9a9a9a"
	          }
	        }],

	        xAxes: [{
	          barPercentage: 1.6,
	          gridLines: {
	            drawBorder: false,
	            color: 'rgba(225,78,202,0.1)',
	            zeroLineColor: "transparent",
	          },
	          ticks: {
	            padding: 20,
	            fontColor: "#9a9a9a"
	          }
	        }]
	      }
	    };
	    
		var ctx = document.getElementById("TotalP").getContext("2d");

	    var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

	    gradientStroke.addColorStop(1, 'rgba(72,72,176,0.2)');
	    gradientStroke.addColorStop(0.4, 'rgba(66,134,121,0.0)'); //green colors
	    gradientStroke.addColorStop(0, 'rgba(66,134,121,0)'); //green colors

	    var data = {
	      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
	      datasets: [{
	        label: "Total Printers",
	        fill: true,
	        backgroundColor: gradientStroke,
	        borderColor: '#d048b6',
	        borderWidth: 2,
	        borderDash: [],
	        borderDashOffset: 0.0,
	        pointBackgroundColor: '#d048b6',
	        pointBorderColor: 'rgba(255,255,255,0)',
	        pointHoverBackgroundColor: '#d048b6',
	        pointBorderWidth: 20,
	        pointHoverRadius: 4,
	        pointHoverBorderWidth: 15,
	        pointRadius: 4,
	        data: [<?php foreach ($chartp as $data) { echo $data->total . ",";}?>],
	      }]
	    };

	    var myChart = new Chart(ctx, {
	      type: 'line',
	      data: data,
	      options: gradientChartOptionsConfigurationWithTooltipGreen
	    });
	}	
};