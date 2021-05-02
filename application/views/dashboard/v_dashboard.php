<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2 text-center text-sm-left">
            <div class="flex-sm-fill">
                <h1 class="h3 font-w700 mb-2">
                    <?php echo $title ?>
                </h1>
            </div>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Overview -->
    <div class="row row-deck">
        <div class="col-sm-6 col-xl-3">
            <!-- Pending Orders -->
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="font-size-h2 font-w700" id="omzet">_</dt>
                        <dd class="text-muted mb-0">Omzet</dd>
                    </dl>
                    <div class="item item-rounded bg-body">
                        <i class="fa fa-dollar-sign font-size-h3 text-primary"></i>
                    </div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                    <!-- <a class="font-w500 d-flex align-items-center" href="javascript:void(0)">
                        View all orders
                        <i class="fa fa-arrow-alt-circle-right ml-1 opacity-25 font-size-base"></i>
                    </a> -->
                </div>
            </div>
            <!-- END Pending Orders -->
        </div>
        <div class="col-sm-6 col-xl-3">
            <!-- New Customers -->
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="font-size-h2 font-w700" id="countSewa">_</dt>
                        <dd class="text-muted mb-0">Semua Sewa</dd>
                    </dl>
                    <div class="item item-rounded bg-body">
                        <i class="fa fa-shopping-cart font-size-h3 text-primary"></i>
                    </div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                    <!-- <a class="font-w500 d-flex align-items-center" href="javascript:void(0)">
                        View all customers
                        <i class="fa fa-arrow-alt-circle-right ml-1 opacity-25 font-size-base"></i>
                    </a> -->
                </div>
            </div>
            <!-- END New Customers -->
        </div>
        <div class="col-sm-6 col-xl-3">
            <!-- Messages -->
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="font-size-h2 font-w700" id="countBackOnly">_</dt>
                        <dd class="text-muted mb-0">Hanya Kembali</dd>
                    </dl>
                    <div class="item item-rounded bg-body">
                        <i class="fa fa-cart-arrow-down font-size-h3 text-primary"></i>
                    </div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                    <!-- <a class="font-w500 d-flex align-items-center" href="javascript:void(0)">
                        View all messages
                        <i class="fa fa-arrow-alt-circle-right ml-1 opacity-25 font-size-base"></i>
                    </a> -->
                </div>
            </div>
            <!-- END Messages -->
        </div>
        <div class="col-sm-6 col-xl-3">
            <!-- Conversion Rate -->
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="font-size-h2 font-w700" id="countSepeda">_</dt>
                        <dd class="text-muted mb-0">Sepeda</dd>
                    </dl>
                    <div class="item item-rounded bg-body">
                        <i class="fa fa-bicycle font-size-h3 text-primary"></i>
                    </div>
                </div>
                <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                    <!-- <a class="font-w500 d-flex align-items-center" href="javascript:void(0)">
                        View statistics
                        <i class="fa fa-arrow-alt-circle-right ml-1 opacity-25 font-size-base"></i>
                    </a> -->
                </div>
            </div>
            <!-- END Conversion Rate-->
        </div>
    </div>
    <!-- END Overview -->

    <!-- Statistics -->
    <!-- <div class="row">
        <div class="col-xl-8 d-flex flex-column"> -->
            <!-- Earnings Summary -->
            <!-- <div class="block block-rounded flex-grow-1 d-flex flex-column">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Earnings Summary</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option">
                            <i class="si si-settings"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content block-content-full flex-grow-1 d-flex align-items-center"> -->
                    <!-- Earnings Chart Container -->
                    <!-- Chart.js Chart is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _es6/pages/be_pages_dashboard.js -->
                    <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                    <!-- <canvas class="js-chartjs-earnings"></canvas>
                </div>
                <div class="block-content bg-body-light">
                    <div class="row items-push text-center w-100">
                        <div class="col-sm-4">
                            <dl class="mb-0">
                                <dt class="font-size-h3 font-w700">
                                    <i class="fa fa-arrow-up font-size-lg text-success"></i> 2.5%
                                </dt>
                                <dd class="text-muted mb-0">Customer Growth</dd>
                            </dl>
                        </div>
                        <div class="col-sm-4">
                            <dl class="mb-0">
                                <dt class="font-size-h3 font-w700">
                                    <i class="fa fa-arrow-up font-size-lg text-success"></i> 3.8%
                                </dt>
                                <dd class="text-muted mb-0">Page Views</dd>
                            </dl>
                        </div>
                        <div class="col-sm-4">
                            <dl class="mb-0">
                                <dt class="font-size-h3 font-w700">
                                    <i class="fa fa-arrow-up font-size-lg text-success"></i> 1.7%
                                </dt>
                                <dd class="text-muted mb-0">New Products</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- END Earnings Summary -->
        <!-- </div>
        <div class="col-xl-4 d-flex flex-column"> -->
            <!-- Last 2 Weeks -->
            <!-- Sparkline Charts (.js-sparkline class is initialized in Helpers.sparkline() -->
            <!-- For more info and examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
            <!-- <div class="row row-deck flex-grow-1">
                <div class="col-md-6 col-xl-12">
                    <div class="block block-rounded d-flex flex-column">
                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between">
                            <dl class="mb-0">
                                <dt class="font-size-h2 font-w700">570</dt>
                                <dd class="text-muted mb-0">Total Orders</dd>
                            </dl>
                            <div>
                                <div class="d-inline-block px-2 py-1 rounded-lg font-size-sm font-w600 text-danger bg-danger-light">
                                    <i class="fa fa-caret-down mr-1"></i>
                                    2.2%
                                </div>
                            </div>
                        </div>
                        <div class="block-content p-1 text-center overflow-hidden"> -->
                            <!-- Sparkline Line: Orders -->
                            <!-- <span class="js-sparkline" data-type="line"
                                  data-points="[33,29,32,37,38,30,34,28,43,45,26,45,49,39]"
                                  data-width="100%"
                                  data-height="70px"
                                  data-chart-range-min="20"
                                  data-line-color="rgba(210, 108, 122, .4)"
                                  data-fill-color="rgba(210, 108, 122, .15)"
                                  data-spot-color="transparent"
                                  data-min-spot-color="transparent"
                                  data-max-spot-color="transparent"
                                  data-highlight-spot-color="#D26C7A"
                                  data-highlight-line-color="#D26C7A"
                                  data-tooltip-suffix="Orders"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-12">
                    <div class="block block-rounded d-flex flex-column">
                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between">
                            <dl class="mb-0">
                                <dt class="font-size-h2 font-w700">$5,234.21</dt>
                                <dd class="text-muted mb-0">Total Earnings</dd>
                            </dl>
                            <div>
                                <div class="d-inline-block px-2 py-1 rounded-lg font-size-sm font-w600 text-success bg-success-light">
                                    <i class="fa fa-caret-up mr-1"></i>
                                    4.2%
                                </div>
                            </div>
                        </div>
                        <div class="block-content p-1 text-center oveflow-hidden"> -->
                            <!-- Sparkline Line: Earnings -->
                            <!-- <span class="js-sparkline" data-type="line"
                                  data-points="[716,1185,750,1365,956,890,1200,968,1158,1025,920,1190,720,1352]"
                                  data-width="100%"
                                  data-height="70px"
                                  data-chart-range-min="300"
                                  data-line-color="rgba(70,195,123, .4)"
                                  data-fill-color="rgba(70,195,123, .15)"
                                  data-spot-color="transparent"
                                  data-min-spot-color="transparent"
                                  data-max-spot-color="transparent"
                                  data-highlight-spot-color="#46C37B"
                                  data-highlight-line-color="#46C37B"
                                  data-tooltip-prefix="$"></span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="block block-rounded d-flex flex-column">
                        <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between">
                            <dl class="mb-0">
                                <dt class="font-size-h2 font-w700">264</dt>
                                <dd class="text-muted mb-0">New Customers</dd>
                            </dl>
                            <div>
                                <div class="d-inline-block px-2 py-1 rounded-lg font-size-sm font-w600 text-success bg-success-light">
                                    <i class="fa fa-caret-up mr-1"></i>
                                    9.3%
                                </div>
                            </div>
                        </div>
                        <div class="block-content p-1 text-center oveflow-hidden"> -->
                            <!-- Sparkline Line: New Customers -->
                            <!-- <span class="js-sparkline" data-type="line"
                                  data-points="[25,15,36,14,29,19,36,41,28,26,29,33,23,41]"
                                  data-width="100%"
                                  data-height="70px"
                                  data-chart-range-min="0"
                                  data-line-color="rgba(70,195,123, .4)"
                                  data-fill-color="rgba(70,195,123, .15)"
                                  data-spot-color="transparent"
                                  data-min-spot-color="transparent"
                                  data-max-spot-color="transparent"
                                  data-highlight-spot-color="#46C37B"
                                  data-highlight-line-color="#46C37B"
                                  data-tooltip-prefix="$"></span>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- END Last 2 Weeks -->
        <!-- </div>
    </div> -->
    <!-- END Statistics -->
</div>
<!-- END Page Content -->
<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('helper/getomzet/') ?>",
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if(data.status == true) {
                    $('#omzet').text(data.data);
                }
            }
        });

        $.ajax({
            method: "POST",
            url: "<?= base_url('helper/getallsewa/') ?>",
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if(data.status == true) {
                    $('#countSewa').text(data.data.sewa);
                }
            }
        });

        $.ajax({
            method: "POST",
            url: "<?= base_url('helper/getonlykembali/') ?>",
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if(data.status == true) {
                    $('#countBackOnly').text(data.data.back);
                }
            }
        });

        $.ajax({
            method: "POST",
            url: "<?= base_url('helper/getqtysepeda/') ?>",
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if(data.status == true) {
                    $('#countSepeda').text(data.data.qtysepeda);
                }
            }
        });
        
    })
</script>