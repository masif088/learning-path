<div>
    <div class="card">
        <div class="card-header">
            <h4>Akses Bulan Ini</h4>
        </div>
    </div>
    <canvas id="myChart3"></canvas>
    <div class="p-4">
        <h1 class="text-xl">Total akses selama ini {{$total}}</h1>
        <h1 class="text-xl">Total akses bulan ini :{{$totalMonth}}</h1>

    </div>

    <script>
        document.addEventListener('livewire:load', function () {
            var ctx = document.getElementById("myChart3").getContext('2d');
            var myRadarChart = new Chart(ctx, {
                type: 'radar',
                minBarLength: 2,

                options: {
                    scale: {
                        ticks: {
                            beginAtZero: true,
                            @if($minStep)
                            stepSize:1,
                            @endif
                        }
                    }
                },
                data: {
                    datasets: [
                        {
                            data: [@foreach($a as $d) {{$d['access']}}, @endforeach],
                            backgroundColor: 'rgba(255,240,10,.3)',
                            borderColor: 'rgba(255,240,10,.9)',
                            pointHitRadius: 3,
                            label: 'Total Akses',
                        },
                        {
                            data: [@foreach($a as $d) {{$d['month']}}, @endforeach],
                            backgroundColor: 'rgba(0,240,10,.3)',
                            borderColor: 'rgba(0,240,10,.9)',
                            label: 'Total Akses Bulan ini'

                        }
                    ],
                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: [@foreach($a as $d) '{{$d['title']}}', @endforeach],
                }

            });
        });
    </script>
</div>
