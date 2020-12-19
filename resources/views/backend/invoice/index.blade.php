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
                                        <a href="{{ route('invoice.tambah') }}" type="button" class="btn btn-primary waves-effect waves-light">+ Tambah</a>
                                    </div>
                                    <hr>
                                    <div class="table-responsive animated bounceInUp">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Schedule</th>
                                                <th>No. Invoice</th>
                                                <th>Tanggal Invoice</th>
                                                <th>DP</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            <?php $no=0; ?>
                                            @foreach(@$invoice as $rs)
                                            <?php $no++; ?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ @$rs->kode_schedule }}</td>
                                                <td>{{ @$rs->no_invoice }}</td>
                                                <td>{{ @$rs->tanggal_invoice }}</td>
                                                <td>Rp. {{ number_format(@$rs->dp,0,',','.') }}</td>
                                                <td>{!! @$rs->keterangan !!}</td>
                                                <td>
                                                    <label class="badge badge-primary"><i class="fa fa-check"></i> INVOICE</label>
                                                </td>
                                                <td>
                                                    <a href="{{ route('invoice.edit',@$rs->id) }}" class="btn btn-info btn-xs"><i class="far fa-edit mr-1"></i> Edit</a>
                                                    <a href="{{ route('invoice.hapus',@$rs->id) }}" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i> Hapus</a>
                                                    <a href="{{ route('invoice.kwitansi',@$rs->id) }}" class="btn btn-success btn-xs"><i class="fa fa-file-pdf"></i> Kwitansi</a>
                                                    <a href="{{ route('invoice.batal',@$rs->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-times"></i> Batal</a>
                                                </td>
                                            </tr>
                                            @endforeach
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