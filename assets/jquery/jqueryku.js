var data = {
  labels: ["1", "2", "3", "4", "5"],
  datasets: [
    {
      label: "d1",
      backgroundColor: "rgba(182,127,0,1)",
      borderColor: "rgba(117,61,41,1)",
      borderWidth: 1,
      data: [42, 78, 64, 90, 97],
      stack: "s1"
    },
    {
      label: "d2",
      backgroundColor: "rgba(71,161,65,1)",
      borderColor: "rgba(36,93,56,1)",
      borderWidth: 1,
      data: [27, 63, 46, 64, 43],
      stack: "s1"
    },
    {
      label: "d3",
      backgroundColor: "rgba(255,141,106,1)",
      borderColor: "rgba(99,60,32,1)",
      borderWidth: 1,
      data: [18, 50, 23, 83, 35],
      stack: "s1"
    },
    {
      label: "d1",
      backgroundColor: "rgba(182,127,0,1)",
      borderColor: "rgba(117,61,41,1)",
      borderWidth: 1,
      data: [42, 78, 64, 90, 97],
      stack: "s1b"
    },
    {
      label: "d2",
      backgroundColor: "rgba(71,161,65,1)",
      borderColor: "rgba(36,93,56,1)",
      borderWidth: 1,
      data: [27, 63, 46, 64, 43],
      stack: "s1b"
    },
    {
      label: "d3",
      backgroundColor: "rgba(255,141,106,1)",
      borderColor: "rgba(99,60,32,1)",
      borderWidth: 1,
      data: [18, 50, 23, 83, 35],
      stack: "s1b"
    },
    {
      label: "d4",
      backgroundColor: "rgba(160,160,160,1)",
      borderColor: "rgba(60,60,60,1)",
      borderWidth: 1,
      data: [152, 141, 170, 194, 128],
      stack: "s2",
      barPercentage: 0.3
    }
  ]
};
var options = {
  scales: {
    xAxes: [{
      categoryPercentage: 0.6,
      barPercentage: 1
    }]
  },
  legend: {
    display: false
  }
};

var barChart = new Chart($("#myChart"), {
  type: 'bar',
  data: data,
  options: options
});
