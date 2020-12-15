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
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Masterisasi</a></li>
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
                                        <a href="{{ route('client.tambah') }}" type="button" class="btn btn-primary waves-effect waves-light">+ Tambah</a>
                                    </div>
                                    <hr>
                                    <div class="table-responsive animated bounceInUp">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>No. Telepon</th>
                                                <th>Alamat</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            <?php $no=0; ?>
                                            @foreach(@$client as $rs)
                                            <?php $no++; ?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ @$rs->nama_client }}</td>
                                                <td>{{ @$rs->email_client }}</td>
                                                <td>{{ @$rs->telepon_client }}</td>
                                                <td>{{ @$rs->alamat_client }}</td>
                                                <td>
                                                    <a href="{{ route('client.edit',@$rs->id) }}"><i class="far fa-edit text-info mr-1"></i></a>
                                                    <a href="{{ route('client.hapus',@$rs->id) }}"><i class="far fa-trash-alt text-danger"></i></a>
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