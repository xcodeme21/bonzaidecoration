<!DOCTYPE html>
<html lang="en">
    @include("backend.include.head")
    <body>
    @include("backend.include.topbar")

        <div class="page-wrapper">
            

            <!-- Page Content-->
            <div class="page-content">

                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="float-right">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">{{ config('app.name') }}</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol><!--end breadcrumb-->
                                </div><!--end /div-->
                                <h4 class="page-title">Dashboard</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                    <!-- end page title end breadcrumb -->

                    @include("backend.include.session")

                    
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="card report-card">
                                <div class="card-body">
                                    <div class="float-right">
                                        <i class="dripicons-user-group report-main-icon"></i>
                                    </div> 
                                    <span class="badge badge-danger">Total Client</span>
                                    <h3 class="my-3">{{ @$totalclient }}</h3>
                                </div><!--end card-body--> 
                            </div><!--end card--> 
                        </div> <!--end col--> 
                        <div class="col-md-3">
                            <div class="card report-card">
                                <div class="card-body">
                                    <div class="float-right">
                                        <i class="dripicons-clock report-main-icon"></i>
                                    </div> 
                                    <span class="badge badge-secondary">Schedule Tahun Ini</span>
                                    <h3 class="my-3">{{ @$scheduletahunini }}</h3>
                                </div><!--end card-body--> 
                            </div><!--end card--> 
                        </div> <!--end col--> 
                        <div class="col-md-3">
                            <div class="card report-card">
                                <div class="card-body">
                                    <div class="float-right">
                                        <i class="dripicons-meter report-main-icon"></i>
                                    </div> 
                                    <span class="badge badge-warning">Schedule Bulan Ini</span>
                                    <h3 class="my-3">{{ @$schedulebulanini }}</h3>
                                </div><!--end card-body--> 
                            </div><!--end card--> 
                        </div> <!--end col--> 
                        <div class="col-md-3">
                            <div class="card report-card">
                                <div class="card-body">
                                    <div class="float-right">
                                        <i class="dripicons-wallet report-main-icon"></i>
                                    </div> 
                                    <span class="badge badge-success">Total Pemasukan</span>
                                    <h3 class="my-3">Rp. {{ number_format(@$total_pemasukan,0,',','.') }}</h3>
                                </div><!--end card-body--> 
                            </div><!--end card--> 
                        </div> <!--end col-->                               
                    </div><!--end row-->

                       

                </div><!-- container -->
            </div>
            <!-- end page content -->

            @include("backend.include.footer")
        </div>
        <!-- end page-wrapper -->

        @include("backend.include.script")
       
    </body>
</html>