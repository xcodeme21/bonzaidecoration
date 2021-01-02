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
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Schedule</a></li>
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
                                    {{ Form::open(['route'=>'schedule.add' ,'method' => 'post', 'class'=>'form-horizontal mt-3  animated bounceIn','enctype'=>'multipart/form-data']) }} 
                                    {{ Form::token() }}
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label text-right">Client</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="client_id" id="client_id" required>
                                                    <option value="">-- Pilih Client --</option>
                                                    @foreach(@$client as $cl)
                                                    <option value="{{ @$cl->id }}">{{ @$cl->nama_client }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Email</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="email" id="email_client" name="email_client" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">No.Telepon</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="telepon_client" name="telepon_client" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label text-right">Alamat</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" rows="5" id="alamat_client" name="alamat_client" readonly></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Kode Schedule</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" value="{{ @$kode_schedule }}"  name="kode_schedule" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Tanggal Schedule</label>
                                            <div class="col-sm-10">
                                                <input class="form-control mdate" type="text"  name="tanggal_schedule" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Tanggal Selesai</label>
                                            <div class="col-sm-10">
                                                <input class="form-control mdate" type="text"  name="tanggal_selesai" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label text-right">Package Decoration</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="package_decoration_id" id="package_decoration_id" required>
                                                    <option value="">-- Pilih Package Decoration --</option>
                                                    @foreach(@$package as $pak)
                                                    <option value="{{ @$pak->id }}">{{ @$pak->nama_paket }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">Harga</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp.</span>
                                                    </div>
                                                    <input type="text" class="form-control  mata-uang" id="harga_paket"  name="harga_paket" readonly>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label text-right">Item</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control editor" rows="10" id="item_paket" name="item_paket" disabled></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label text-right">Keterangan</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control editor" rows="5" id="keterangan_paket" name="keterangan_paket" ></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label text-right">Venue</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control ckeditor" rows="5" name="venue" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row-fluid" align="right">
                                            <a href="{{ route('schedule') }}" type="button" class="btn btn-info waves-effect waves-light">Kembali</a>
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
            
            $('#package_decoration_id').change(function(){
                var id = $(this).val();
                var url = '{{ route("schedule.detailpackage", ":id") }}';
                url = url.replace(':id', id);

                $.ajax({
                    url: url,
                    type: 'get',
                    dataType: 'json',
                    success: function(data){
                        if(data != null){
                            $('#harga_paket').val(data.harga_paket);
                            tinymce.get('item_paket').setContent(data.item_paket);
                            tinymce.get('keterangan_paket').setContent(data.keterangan_paket);
                        }
                    },
                    error: function (error) {
                        if(error != null){
                            $('#harga_paket').val('');
                            tinymce.get('item_paket').setContent('');
                            tinymce.get('keterangan_paket').setContent('');
                        }
                    }
                });
            });
        </script>

        <script type="text/javascript">
            function inputTerbilang() {
            //membuat inputan otomatis jadi mata uang
            $('.mata-uang').mask('0.000.000.000', {reverse: true});

            //mengambil data uang yang akan dirubah jadi terbilang
            var input = document.getElementById("terbilang-input").value.replace(/\./g, "");

            //menampilkan hasil dari terbilang
            document.getElementById("terbilang-output").value = terbilang(input).replace(/  +/g, ' ');
            } 
        </script>
       
    </body>
</html>