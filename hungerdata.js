$(document).ready(function(){
  var var1 = 'http://localhost/cgi-bin/hunger.php?';
  var var2 = window.location.search.substr(1);
  var targetUrl = var1.concat(var2);

$.ajax({
    url: targetUrl,
    method: 'GET',
    dataType: 'json',
    success: function(data) {
    console.log(data);
    var yearVar = [];
    var hungerVar = [];

      for(var i in data) {
        yearVar.push(data[i].year);
        hungerVar.push(data[i].hunger);
      }

      var chartdata = {
        labels: yearVar,
        datasets : [
          {
            label: 'Hunger Percentage by Year',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: hungerVar,
          }
        ]
      };
	    
      const hungerBar = document.getElementById('hungerBarChart');

      let hungerBarChart = new Chart(hungerBar, {
        type: 'bar',
        data: chartdata,
	options: {
            responsive: true,
            maintainAspectRatio: false,
        }
      });
    },
    error: function(data) {
      console.log(data);
    }

});
});

