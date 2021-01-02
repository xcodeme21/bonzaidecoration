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
                                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg">+ Buat Kwitansi</button>
                                        <button onClick="javascript:window.close();" type="button" class="btn btn-danger waves-effect waves-light"><i class="fa fa-times"> Tutup</i> </button>
                                    </div>
                                    <hr>
                                    
                                        <!--  Modal content for the above example -->
                                        <div class="modal fade bs-example-modal-lg animated bounceIn" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="myLargeModalLabel">+ Buat Kwitansi</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    {{ Form::open(['route'=>'invoice.buatkwitansi' ,'method' => 'post', 'class'=>'form-horizontal mt-3','enctype'=>'multipart/form-data']) }} 
                                                    {{ Form::token() }}
                                                    <div class="modal-body">
                                                        <div class="form-group row">
                                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Kode Schedule</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text" value="{{ @$inv->kode_schedule }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">No. Invoice</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text" value="{{ @$inv->no_invoice }}" readonly>
                                                                <input type="hidden" name="id" value="{{ @$inv->id }}">
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
                                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">Nominal Pembayaran</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Rp.</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="harga_paket"  name="nominal_pembayaran" required>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <div class="form-group row">
                                                            <label for="example-password-input" class="col-sm-2 col-form-label text-right">Keterangan Pembayaran</label>
                                                            <div class="col-sm-10">
                                                                <textarea class="form-control ckeditor" rows="5" name="keterangan_pembayaran" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success btn-xs"><i class="fa fa-save"></i> Simpan</button>
                                                        <button type="button" class="btn btn-info btn-xs" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Batal</button>
                                                    </div>
                                                    {{ Form::close() }}
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->


                                    <div class="table-responsive animated bounceInUp">
                                        <table id="" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>No. Invoice</th>
                                                <th>Kode Kwitansi</th>
                                                <th>Tanggal</th>
                                                <th>Nominal Pembayaran</th>
                                                <th>Keterangan</th>
                                                <th>Action</th>
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
                                                <td>
                                                    <a href="{{ route('invoice.hapuskwitansi',@$rs->id) }}" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i> Hapus</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr>                                                        
                                                <td colspan="5" class="border-0"></td>
                                                <td class="border-0 font-14"><b>Nominal Paket</b></td>
                                                <td class="border-0 font-14"><b>Rp. {{ number_format(@$inv->nominal_total,0,',','.') }}</b></td>
                                            </tr>
                                            <tr>                                                        
                                                <td colspan="5" class="border-0"></td>
                                                <td class="border-0 font-14"><b>Nominal Terbayar</b></td>
                                                <td class="border-0 font-14"><b>Rp. {{ number_format(@$inv->nominal_terbayar,0,',','.') }}</b></td>
                                            </tr>
                                            <tr>                                                        
                                                <td colspan="5" class="border-0"></td>
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