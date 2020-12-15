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
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Client</a></li>
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
                                {{ Form::open(['route'=>'client.update' ,'method' => 'post', 'class'=>'form-horizontal mt-3  animated bounceIn','enctype'=>'multipart/form-data']) }} 
						        {{ Form::token() }}
                                <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label text-right">Nama Client</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="{{ @$rs->nama_client }}" id="example-text-input" name="nama_client" required>
                                                <input type="hidden" value="{{ @$rs->id }}" name="id" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Email</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="email" value="{{ @$rs->email_client }}" id="example-tel-input" name="email_client" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">No.Telepon</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="{{ @$rs->telepon_client }}" id="example-tel-input" name="telepon_client" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label text-right">Alamat</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" rows="5" name="alamat_client" required>{{ @$rs->alamat_client }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row-fluid" align="right">
                                            <a href="{{ route('client') }}" type="button" class="btn btn-info waves-effect waves-light">Kembali</a>
                                            <button type="submit" class="btn btn-success waves-effect waves-light">Simpan</button>
                                        </div>
                                    {{ Form::close() }}
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