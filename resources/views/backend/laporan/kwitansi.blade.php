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
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Invoice</a></li>
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
                                    
                                <div class="row-fluid animated bounceInRight" align="right">    
                                        <button type="button" class="btn btn-success waves-effect waves-light">No. Invoice : {{ @$inv->no_invoice }}</button>
                                        <button onClick="javascript:window.close();" type="button" class="btn btn-danger waves-effect waves-light"><i class="fa fa-times"> Tutup</i> </button>
                                    </div>
                                    <hr>
                                    <div class="table-responsive animated bounceInUp">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>No. Invoice</th>
                                                <th>Kode Kwitansi</th>
                                                <th>Tanggal</th>
                                                <th>Nominal Pembayaran</th>
                                                <th>Keterangan</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            <?php $no=0; ?>
                                            @foreach(@$kwitansi as $rs)
                                            <?php $no++; ?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ @$rs->no_invoice }}</td>
                                                <td>{{ @$rs->kode_kwitansi }}</td>
                                                <td>{{ @$rs->tanggal_kwitansi }}</td>
                                                <td>
                                                    Rp. {{ number_format(@$rs->nominal_pembayaran,0,',','.') }}
                                                </td>
                                                <td>{!! @$rs->keterangan_pembayaran !!}</td>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr>                                                        
                                                <td colspan="4" class="border-0"></td>
                                                <td class="border-0 font-14"><b>Nominal Paket</b></td>
                                                <td class="border-0 font-14"><b>Rp. {{ number_format(@$inv->nominal_total,0,',','.') }}</b></td>
                                            </tr>
                                            <tr>                                                        
                                                <td colspan="4" class="border-0"></td>
                                                <td class="border-0 font-14"><b>Nominal Terbayar</b></td>
                                                <td class="border-0 font-14"><b>Rp. {{ number_format(@$inv->nominal_terbayar,0,',','.') }}</b></td>
                                            </tr>
                                            <tr>                                                        
                                                <td colspan="4" class="border-0"></td>
                                                <td class="border-0 font-14"><b>Sisa Harus Dibayar</b></td>
                                                <?php $sisaharusdibayar=$inv->nominal_total -  $inv->nominal_terbayar; ?>
                                                <td class="border-0 font-14"><b>Rp. {{ number_format(@$sisaharusdibayar,0,',','.') }}</b></td>
                                            </tr>
                                            </tbody>
                                        </table>    
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
       
    </body>
</html>