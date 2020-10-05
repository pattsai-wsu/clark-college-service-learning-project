$(document).ready(function(){
  var var1 = 'http://localhost/cgi-bin/imports.php?';
  var var2 = window.location.search.substr(1);
  var targetUrl = var1.concat(var2);

$.ajax({
    url: targetUrl,
    method: 'GET',
    dataType: 'json',
    success: function(data) {
    console.log(data);
    var yearVar = [];
    var importVar = [];

      for(var i in data) {
        yearVar.push(data[i].year);
        importVar.push(data[i].import);
      }

      var chartdata = {
        labels: yearVar,
        datasets : [
          {
            label: 'Imports by Year',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: importVar,
          }
        ]
      };
	    
      const importBar = document.getElementById('importBarChart');

      let importBarChart = new Chart(importBar, {
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


