"use strict";

let myDate = new Date();
let date = ('0'+ myDate.getDate()).slice(-2) + '/' + ('0'+ (myDate.getMonth()+1)).slice(-2) + '/' + myDate.getFullYear();
$(".datepicker").val(date);
$('.datepicker').datepicker({
  dateFormat: "dd/mm/yy"
});

function rangeDate(startDate, endDate) {
  var datesArray = [];
  var currentDate = startDate;

  while (currentDate <= endDate) {
      datesArray.push(('0' + currentDate.getDate()).slice(-2) + '/' + ('0' + (currentDate.getMonth() + 1)).slice(-2));
      currentDate.setDate(currentDate.getDate() + 1);
  }

  return datesArray;
}

var chartColors = {
  "default": {
    primary: '#00D1B2',
    info: '#209CEE',
    danger: '#FF3860'
  }
};

$.ajax({
  url: '/admin/dashboards',
  type: 'GET',
  data: {
    startDate: '2024-03-01',
    endDate: $(".datepicker").val(),
  },
  success: function(response) {
    var result = {
      'interest': Object.values(response.data.interest),
      'revenues': Object.values(response.data.revenues),
      'expenses': Object.values(response.data.expenses)
    }

    var ctx = document.getElementById('big-line-chart').getContext('2d');
    new Chart(ctx, {
      type: 'line',
      data: {
        datasets: [{
          fill: false,
          borderColor: chartColors["default"].primary,
          borderWidth: 2,
          borderDash: [],
          borderDashOffset: 0.0,
          pointBackgroundColor: chartColors["default"].primary,
          pointBorderColor: 'rgba(255,255,255,0)',
          pointHoverBackgroundColor: chartColors["default"].primary,
          pointBorderWidth: 20,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 15,
          pointRadius: 4,
          data: result['revenues']
        }, {
          fill: false,
          borderColor: chartColors["default"].info,
          borderWidth: 2,
          borderDash: [],
          borderDashOffset: 0.0,
          pointBackgroundColor: chartColors["default"].info,
          pointBorderColor: 'rgba(255,255,255,0)',
          pointHoverBackgroundColor: chartColors["default"].info,
          pointBorderWidth: 20,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 15,
          pointRadius: 4,
          data: result['interest']
        }, {
          fill: false,
          borderColor: chartColors["default"].danger,
          borderWidth: 2,
          borderDash: [],
          borderDashOffset: 0.0,
          pointBackgroundColor: chartColors["default"].danger,
          pointBorderColor: 'rgba(255,255,255,0)',
          pointHoverBackgroundColor: chartColors["default"].danger,
          pointBorderWidth: 20,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 15,
          pointRadius: 4,
          data: result['expenses']
        }],
        labels: rangeDate(new Date('2024-03-01'), new Date('2024-03-10'))
      },
      options: {
        maintainAspectRatio: false,
        legend: {
          display: false
        },
        responsive: true,
        tooltips: {
          backgroundColor: '#f5f5f5',
          titleFontColor: '#333',
          bodyFontColor: '#666',
          bodySpacing: 4,
          xPadding: 12,
          mode: 'nearest',
          intersect: 0,
          position: 'nearest'
        },
        scales: {
          yAxes: [{
            barPercentage: 1.6,
            gridLines: {
              drawBorder: false,
              color: 'rgba(29,140,248,0.0)',
              zeroLineColor: 'transparent'
            },
            ticks: {
              padding: 20,
              fontColor: '#9a9a9a'
            }
          }],
          xAxes: [{
            barPercentage: 1.6,
            gridLines: {
              drawBorder: false,
              color: 'rgba(225,78,202,0.1)',
              zeroLineColor: 'transparent'
            },
            ticks: {
              padding: 20,
              fontColor: '#9a9a9a'
            }
          }]
        }
      }
    });
  },
  error: function(xhr, status, error) {
    console.error(error);
  }
});
