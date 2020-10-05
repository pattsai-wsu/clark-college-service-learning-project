$(document).ready(function(){
  var var1 = 'http://localhost/cgi-bin/poverty.php?';
  var var2 = window.location.search.substr(1);
  var targetUrl = var1.concat(var2);

$.ajax({
    url: targetUrl,
    method: 'GET',
    dataType: 'json',
    success: function(data) {
    console.log(data);
    var yearVar = [];
    var povertyVar = [];

      for(var i in data) {
        yearVar.push(data[i].year);
        povertyVar.push(data[i].poverty);
      }

      var chartdata = {
        labels: yearVar,
        datasets : [
          {
            label: 'Poverty Percentage by Year',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: povertyVar,
          }
        ]
      };

      const povertyBar = document.getElementById('povertyBarChart');

      let povertyBarChart = new Chart(povertyBar, {
        type: 'bar',
        data: chartdata
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
});
