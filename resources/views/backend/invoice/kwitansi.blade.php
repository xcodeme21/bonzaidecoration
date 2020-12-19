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
                                {{ Form::open(['route'=>'invoice.buatkwitansi' ,'method' => 'post', 'class'=>'form-horizontal mt-3  animated bounceIn','enctype'=>'multipart/form-data']) }} 
						        {{ Form::token() }}
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Kode Schedule</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="{{ @$rs->kode_schedule }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">No. Invoice</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="{{ @$rs->no_invoice }}" readonly>
                                                <input type="hidden" name="id" value="{{ @$rs->id }}">
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Kode Kwitansi</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="{{ @$kode_kwitansi }}" name="kode_kwitansi" readonly>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Tanggal Kwitansi</label>
                                            <div class="col-sm-10">
                                                <input class="form-control mdate" type="text" name="tanggal_kwitansi" required>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">Sisa Pembayaran</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp.</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="sisa_pembayaran" value="{{ number_format(@$sisa_pembayaran,0,',','.') }}" readonly>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label text-right">Keterangan Pembayaran</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control ckeditor" rows="5" name="keterangan_pembayaran" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row-fluid" align="right">
                                            <a href="{{ route('invoice') }}" type="button" class="btn btn-info waves-effect waves-light">Kembali</a>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Buat Kwitansi</button>
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

        <script>
            $('#client_id').change(function(){
                var id = $(this).val();
                var url = '{{ route("schedule.detailclient", ":id") }}';
                url = url.replace(':id', id);

                $.ajax({
                    url: url,
                    type: 'get',
                    dataType: 'json',
                    success: function(response){
                        if(response != null){
                            $('#email_client').val(response.email_client);
                            $('#telepon_client').val(response.telepon_client);
                            $('#alamat_client').val(response.alamat_client);
                        }
                    },
                    error: function (error) {
                        if(error != null){
                            $('#email_client').val('');
                            $('#telepon_client').val('');
                            $('#alamat_client').val('');
                        }
                    }
                });
            });
        </script>
       
    </body>
</html>