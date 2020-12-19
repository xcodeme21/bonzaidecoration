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
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Invoie</a></li>
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
                                    {{ Form::open(['route'=>'invoice.add' ,'method' => 'post', 'class'=>'form-horizontal mt-3  animated bounceIn','enctype'=>'multipart/form-data']) }} 
                                    {{ Form::token() }}
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label text-right">Kode Schedule</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="schedule_id" id="schedule_id" required>
                                                    <option value="">-- Pilih Schedule --</option>
                                                    @foreach(@$schedule as $cl)
                                                    <option value="{{ @$cl->id }}">{{ @$cl->kode_schedule }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Nama Client</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="nama_client" name="nama_client" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Tanggal Schedule</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="tanggal_schedule" name="tanggal_schedule" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Tanggal Selesai</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="tanggal_selesai"  name="tanggal_selesai" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Package Decoration</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="nama_paket"  name="nama_paket" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">Harga</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp.</span>
                                                    </div>
                                                    <input type="text" class="form-control"  id="paket_harga" name="harga_paket" readonly>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">No. Invoice</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="{{ @$no_invoice }}" name="no_invoice" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Tanggal Invoice</label>
                                            <div class="col-sm-10">
                                                <input class="form-control mdate" type="text" name="tanggal_invoice" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">DP</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp.</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="harga_paket" name="dp" required>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label text-right">Keterangan</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control ckeditor" rows="5" name="keterangan" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row-fluid" align="right">
                                            <a href="{{ route('invoice') }}" type="button" class="btn btn-info waves-effect waves-light">Kembali</a>
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

        <script>
            $('#schedule_id').change(function(){
                var id = $(this).val();
                var url = '{{ route("invoice.detailschedule", ":id") }}';
                url = url.replace(':id', id);

                $.ajax({
                    url: url,
                    type: 'get',
                    dataType: 'json',
                    success: function(response){
                        if(response != null){
                            $('#nama_client').val(response.nama_client);
                            $('#tanggal_schedule').val(response.tanggal_schedule);
                            $('#tanggal_selesai').val(response.tanggal_selesai);
                            $('#nama_paket').val(response.nama_paket);
                            $('#paket_harga').val(response.harga_paket);
                        }
                    },
                    error: function (error) {
                        if(error != null){
                            $('#nama_client').val('');
                            $('#telepon_client').val('');
                            $('#tanggal_selesai').val('');
                            $('#nama_paket').val('');
                            $('#paket_harga').val('');
                        }
                    }
                });
            });
        </script>
       
    </body>
</html>