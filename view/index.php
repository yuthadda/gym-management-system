<?php

session_start();

if(isset($_POST['logout']))
{
    unset($_SESSION['username']);
    session_destroy();
    header('location:../login.php');
}

include_once "../layouts/header.php";

?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include_once "../layouts/sidebar.php" ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

        
        
        <?php include_once "../layouts/main.php" ?>
        
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

        $.ajax({
            url:'getData.php',
            method:'POST',
            data:{income:'true'},
            success:function(response)
            {
               
                let data =JSON.parse(response)
                console.log(data)
                let label = [];
                //console.log(label)
                let data_value = []
                let i =0;
                data.forEach(element =>{
                    console.log(element.month);
                    label[i] =element.month;
                    data_value[i] = element.total_income;
                    console.log("This is for btb"+data_value[i]);
                    i++;
                });
                console.log(label)
                console.log(data_value)
                

                var monthLabels =label.map(function(month){
                var monthNames= ['Jan','Feb','March','April','May','June','July','August','Sep','Oct','Nov','Dec'];
                return monthNames[month-1];
               })
                //alert(response);
                       // Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: monthLabels,
    datasets: [{
      label: "Income",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: data_value,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

            }
        })
 //--------------------------------------------------------End Line Chart-----------------------------------------------------------------------
</script>

<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

        $.ajax({
            url:'getMemberData.php',
            method:'POST',
            data:{member:'true'},
            success:function(response)
            {
               
                let data =JSON.parse(response)
                console.log(data)
                let label = [];
                //console.log(label)
                let data_value = []
                let i =0;
                data.forEach(element =>{
                    console.log("This is for btb"+element.month);
                    label[i] =element.month;
                    data_value[i] = element.total_member;
                    i++;
                });
                console.log(label)
                console.log(data_value)

               var monthLabels =label.map(function(month){
                var monthNames= ['Jan','Feb','March','April','May','June','July','August','Sep','Oct','Nov','Dec'];
                return monthNames[month-1];
               })
                //alert(response);
                       // Area Chart Example
 var ctx = document.getElementById("myAreaChart2");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: monthLabels,
    datasets: [{
      label: "Members",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: data_value,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 10,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
         }
        })
 
</script>

<script>
  // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';


$.ajax({
            url:'getPlanData.php',
            method:'POST',
            data:{plan:'true'},
            success:function(response)
            {
               
                let data =JSON.parse(response)
                console.log(data)
                let label = [];
                console.log(label)
                let data_value = []
                let i =0;
                data.forEach(element =>{
                    console.log("This is for btb"+element.month);
                    label[i] =element.planName;
                    data_value[i] = element.planCount;
                    i++;
                });
        
                console.log(data_value)

  
// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: label,
    datasets: [{
      data: data_value,
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#ffc107','#800080','#DC143C',"#000000","#FF69B4"],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
}
})

</script>

        <?php include_once "../layouts/footer.php" ?>
