<div class="m-0">
    <div class="bg-dark col-12" style="min-height: 100px; border-bottom-right-radius: 50px;">
        <div class="row">
            <h3 class="text-light col-8">Order Reports</h3>
        </div>
    </div>
    <?php
    $pending = 0;
    $processing = 0;
    $processed = 0;
    $shipped = 0;
    $completed = 0;
    $failed = 0;
    ?>
    @foreach($orders as $order)
        @switch(lcfirst($order->order_status))
            @case('pending')
                <?php $pending++; ?>
                @break
            @case('processing')
                <?php $processing++; ?>
                @break
            @case('processed')
                <?php $processed++; ?>
                @break
            @case('shipped')
                <?php $shipped++; ?>
                @break
            @case('completed')
                <?php $completed++; ?>
                @break
            @case('failed')
                <?php $failed++; ?>
                @break
        @endswitch
    @endforeach
   <div class="d-flex justify-content-center">
       <div class="p-5 w-50 text-center">
           <h5>Order Statuses</h5>
           <canvas id="orderStatusChart" width="100" height="100"></canvas>
       </div>
   </div>
    <script>
        const ctx = document.getElementById('orderStatusChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    'Pending',
                    'Processing',
                    'Processed',
                    'Shipped',
                    'Completed',
                    'Failed',
                ],
                datasets: [{
                    label: 'Order Status',
                    data: [
                        <?php echo $pending; ?>,
                        <?php echo $processing; ?>,
                        <?php echo $processed; ?>,
                        <?php echo $shipped; ?>,
                        <?php echo $completed; ?>,
                        <?php echo $failed; ?>,
                    ],
                    backgroundColor: [
                        '#33b5e5',
                        '#ff4444',
                        '#4285F4',
                        '#0d47a1',
                        '#00C851',
                        '#CC0000',
                    ],
                    hoverOffset: 4
                }]
            }
        });
    </script>

    <?php
    $january = 0;
    $february = 0;
    $march = 0;
    $april = 0;
    $may = 0;
    $june = 0;
    $july = 0;
    $august = 0;
    $september = 0;
    $october = 0;
    $november = 0;
    $december = 0;
    ?>
    @foreach($orders as $order)
        @switch(lcfirst(date_format($order->created_at, 'm')))
            @case('01')
            <?php $january++; ?>
            @break
            @case('02')
            <?php $february++; ?>
            @break
            @case('03')
            <?php $march++; ?>
            @break
            @case('04')
            <?php $april++; ?>
            @break
            @case('05')
            <?php $may++; ?>
            @break
            @case('06')
            <?php $june++; ?>
            @break
            @case('07')
            <?php $july++; ?>
            @break
            @case('08')
            <?php $august++; ?>
            @break
            @case('09')
            <?php $september++; ?>
            @break
            @case('10')
            <?php $october++; ?>
            @break
            @case('11')
            <?php $november++; ?>
            @break
            @case('12')
            <?php $december++; ?>
            @break
        @endswitch
    @endforeach
    <div class="d-flex justify-content-center">
        <div class="w-100 p-5 text-center">
            <h5>Year Orders</h5>
            <canvas id="orderYearChart" width="1000" height="500"></canvas>
        </div>
    </div>
    <script>
        const ctx2 = document.getElementById('orderYearChart').getContext('2d');
        const myChart2 = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: [
                    'January',
                    'February',
                    'March',
                    'April',
                    'May',
                    'June',
                    'July',
                    'August',
                    'September',
                    'October',
                    'November',
                    'December',
                ],
                datasets: [{
                    label: 'Year Orders',
                    data: [
                        <?php echo $january; ?>,
                        <?php echo $february; ?>,
                        <?php echo $march; ?>,
                        <?php echo $april; ?>,
                        <?php echo $may; ?>,
                        <?php echo $june; ?>,
                        <?php echo $july; ?>,
                        <?php echo $august; ?>,
                        <?php echo $september; ?>,
                        <?php echo $october; ?>,
                        <?php echo $november; ?>,
                        <?php echo $december; ?>,
                    ],
                    fill: false,
                    borderColor: '#ffc107',
                    tension: 0.1
                }]
            }
        });
    </script>
</div>
