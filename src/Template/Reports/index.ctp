<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Reports: tags used in the products. </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <!-- <div class="btn-group mr-2">
            <button class="btn btn-sm btn-outline-secondary">Share</button>
            <button class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
        </button>-->
    </div>
</div>

<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

<!-- Graphs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script>
    
    function getTags() {
        return <?= (isset($tagsMostUsed)) ? json_encode($tagsMostUsed) : json_encode([]) ?>
    }
    
    var tags = {
        names: [],
        values: [],
    }
    
    $.each(getTags(), function( index, value ) {
        tags.names.push(value.tag);
        tags.values.push(value.total);
    });
    
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: tags.names,
            datasets: [{
                    data: tags.values,
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    borderWidth: 4,
                    pointBackgroundColor: '#007bff'
                }]
        },
        options: {
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            },
            legend: {
                display: false,
            }
        }
    });
</script>
