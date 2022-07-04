<div class="m-0">
 <div class="bg-dark col-12" style="min-height: 100px; border-bottom-right-radius: 50px;">
     <div class="row">
         <h3 class="text-light col-8">Dashboard</h3>
     </div>
 </div>
    <div class="row position-relative text-center m-0" style="margin-top: -40px !important;">
        <div class="col-lg-3 m-0">
            <div class="card ms-5 me-5 bg-success text-light p-2">
                <div class=""><span class="">Total Orders </span><i class="fas fa-luggage-cart bg-dark p-2 rounded-circle" aria-hidden="true"></i></div>
                <div class="card-body p-0"><h4>@if(isset($order_count)){{ $order_count }} @else 0 @endif</h4></div>
            </div>
        </div>
        <div class="col-lg-3 m-0">
            <div class="card ms-5 me-5 bg-primary p-2 text-light">
                <div class=""><span class="">Total Products </span><i class="fas fa-shopping-bag bg-dark p-2 rounded-circle" aria-hidden="true"></i></div>
                <div class="card-body p-0"><h4>@if(isset($product_count)){{ $product_count }} @else 0 @endif</h4></div>
            </div>
        </div>
        <div class="col-lg-3 m-0">
            <div class="card ms-5 me-5 bg-info p-2 text-light">
                <div class=""><span class="">Total Customers </span><i class="fa fa-users bg-dark p-2 rounded-circle" aria-hidden="true"></i></div>
                <div class="card-body p-0"><h4>@if(isset($customer_count)){{ $customer_count }} @else 0 @endif</h4></div>
            </div>
        </div>
        <div class="col-lg-3 m-0">
            <div class="card ms-5 me-5 bg-warning p-2 text-light">
                <div class=""><span class="">Total Suppliers </span><i class="fas fa-people-carry bg-dark p-2 rounded-circle" aria-hidden="true"></i></div>
                <div class="card-body p-0"><h4>@if(isset($supplier_count)){{ $supplier_count }} @else 0 @endif</h4></div>
            </div>
        </div>
    </div>


    <div class="row">

            <div class="p-5 col-lg-6 text-center">
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
                <h5>Order Statuses</h5>
                <canvas id="orderStatusChart" width="100" height="100"></canvas>
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
            </div>
            <div class="p-5 col-lg-6 text-center">
            <?php
            $pending = 0;
            $success = 0;
            $failed = 0;
            ?>
            @foreach($orders as $order)
                @switch(lcfirst($order->payment_status))
                    @case('success')
                    <?php $success++; ?>
                    @break
                    @case('pending')
                    <?php $pending++; ?>
                    @break
                    @case('failed')
                    <?php $failed++; ?>
                    @break
                @endswitch
            @endforeach
                <h5>Payment Statuses</h5>
                <canvas id="paymentStatusChart" width="100" height="100"></canvas>
                    <script>
                        const ctx2 = document.getElementById('paymentStatusChart').getContext('2d');
                        const myChart2 = new Chart(ctx2, {
                            type: 'doughnut',
                            data: {
                                labels: [
                                    'Pending',
                                    'Success',
                                    'Failed',
                                ],
                                datasets: [{
                                    label: 'Order Status',
                                    data: [
                                        <?php echo $pending; ?>,
                                        <?php echo $success; ?>,
                                        <?php echo $failed; ?>,
                                    ],
                                    backgroundColor: [
                                        '#33b5e5',
                                        '#00C851',
                                        '#CC0000',
                                    ],
                                    hoverOffset: 4
                                }]
                            }
                        });
                    </script>
            </div>
    </div>

</div>
