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
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Laporan</a></li>
                                        <li class="breadcrumb-item active">{{ @$indexPage }}</li>
                                    </ol><!--end breadcrumb-->
                                </div><!--end /div-->
                                <h4 class="page-title">{{ @$indexPage }}</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                    <!-- end page title end breadcrumb -->

                    @include("backend.include.session")

                
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row animated bounceInUp">
                                        <div class="col-md-6">
                                            <div class="">
                                                <h6 class="mb-0"><b>No. Invoice :</b> {{ @$inv->no_invoice }}</h6>
                                                <h6 class="mb-0"><b>Tgl. Invoice :</b> {{ @$inv->tanggal_invoice }}</h6>
                                                <h6 class="mb-0"><b>Keterangan :</b> {{ @$inv->keterangan }}</h6>
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-md-6">   
                                                <h6 class="mb-0"><b>Nama Client :</b> {{ @$sch->nama_client }}</h6>
                                                <h6 class="mb-0"><b>No. Telepon :</b> {{ @$sch->telepon_client }}</h6>
                                                <h6 class="mb-0"><b>Email :</b> {{ @$sch->email_client }}</h6>
                                                <h6 class="mb-0"><b>Alamat :</b> {{ @$sch->alamat_client }}</h6>
                                        </div><!--end col-->
                                        <!-- <div class="col-md-3">
                                            <div class="text-center bg-light p-3 mb-3">
                                                <h5 class="bg-info mt-0 p-2 text-white d-sm-inline-block">{{ @$sch->status_pembelian }}</h5>
                                                <h6 class="font-13">Tanggal Pelunasan :</h6>
                                                <p class="mb-0 text-muted">@if(@$sch->tgl_pelunasan == null) - @else {{ @$sch->tgl_pelunasan }} @endif</p>
                                            </div>                                              
                                        </div>                -->
                                    </div>
                                    
                                    <br>
                                    <div class="row animated bounceInUp">
                                        <div class="col-lg-12">
                                            <div class="table-responsive project-invoice">
                                                <table class="table table-bordered mb-0">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Nama Paket</th>
                                                            <th>Item</th> 
                                                            <th>Keterangan</th>
                                                            <th>Harga</th>
                                                        </tr><!--end tr-->
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ @$sch->nama_paket }}</td>
                                                            <td>{!! @$sch->item_paket !!}</td>
                                                            <td>{!! @$sch->keterangan_paket !!}</td>
                                                            <td>Rp.{{ number_format(@$sch->harga_paket,0,',','.') }}</td>
                                                        </tr>
                                                        <tr>                                                        
                                                            <td colspan="2" class="border-0"></td>
                                                            <td class="border-0 font-14"><b>DP</b></td>
                                                            <td class="border-0 font-14"><b>Rp. {{ number_format(@$inv->dp,0,',','.') }}</b></td>
                                                        </tr>
                                                        <tr>                                                        
                                                            <td colspan="2" class="border-0"></td>
                                                            <td class="border-0 font-14"><b class="text-danger">Sisa Belum Dibayar</b></td>
                                                            <td class="border-0 font-14">
                                                            <?php $sisabelumdibayar=$sch->harga_paket - $inv->dp; ?>
                                                            <b class="text-danger">Rp. {{ number_format(@$sisabelumdibayar,0,',','.') }}</b>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table><!--end table-->
                                            </div>  <!--end /div-->                                          
                                        </div>  <!--end col-->                                      
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->

                    </div><!--end row-->   

                </div><!-- container -->
            </div>
            <!-- end page content -->

            @include("backend.include.footer")
        </div>
        <!-- end page-wrapper -->

        @include("backend.include.script")

        <script>window.print();</script>

    </body>
</html>