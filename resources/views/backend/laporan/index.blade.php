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
                                    <div class="table-responsive animated bounceInUp">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Schedule</th>
                                                <th>Nama Client</th>
                                                <th>Paket</th>
                                                <th>Tanggal Schedule</th>
                                                <th>Tanggal Selesai</th>
                                                <th>Venue</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            <?php $no=0; ?>
                                            @foreach(@$schedule as $rs)
                                            <?php $no++; ?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ @$rs->kode_schedule }}</td>
                                                <td>
                                                    {{ @$rs->nama_client }}
                                                    <br>
                                                    <span class="text-muted font-13"><span class="badge badge-soft-primary">{{ @$rs->email_client }}</span> - <span class="badge badge-soft-danger">{{ @$rs->telepon_client }}</span></span> 
                                                </td>
                                                <td>
                                                    {{ @$rs->nama_paket }}
                                                    <br>
                                                    <span class="text-muted font-13"><span class="badge badge-soft-primary">Rp. {{ number_format(@$rs->harga_paket,0,',','.') }}</span>
                                                </td>
                                                <td>{{ @$rs->tanggal_schedule }}</td>
                                                <td>{{ @$rs->tanggal_selesai }}</td>
                                                <td>{!! @$rs->venue !!}</td>
                                                <td>
                                                    @if(@$rs->status == 0)
                                                    <label class="badge badge-info"><i class="fa fa-spin fa-spinner"></i> PROGRESS</label>
                                                    @elseif(@$rs->status == 1)
                                                    <label class="badge badge-primary"><i class="fa fa-check"></i> INVOICE</label>
                                                    <br>
                                                    <span class="text-muted font-13"><span class="badge badge-soft-primary"><b>INVOICE :</b> <?php $inv=$invoice->where('kode_schedule',@$rs->kode_schedule)->first(); echo $inv->no_invoice; ?></span> - <span class="badge badge-soft-danger"><?php echo $inv->tanggal_invoice; ?></span></span> 
                                                    @elseif(@$rs->status == 2)
                                                    <label class="badge badge-success"><i class="fa fa-check"></i> LUNAS</label>
                                                    <br>
                                                    <span class="text-muted font-13"><span class="badge badge-soft-primary"><b>INVOICE :</b> <?php $inv=$invoice->where('kode_schedule',@$rs->kode_schedule)->first(); echo $inv->no_invoice; ?></span> - <span class="badge badge-soft-danger"><?php echo $inv->tanggal_invoice; ?></span></span> 
                                                    <br>
                                                    <span class="text-muted font-13"><span class="badge badge-soft-primary"><b>KWITANSI :</b> <?php echo $inv->kode_kwitansi; ?></span> - <span class="badge badge-soft-danger"><?php echo $inv->tanggal_kwitansi; ?></span></span> 
                                                    @elseif(@$rs->status == 3)
                                                    <label class="badge badge-danger"><i class="fa fa-times"></i> BATAL</label>
                                                    <br>
                                                    <span class="text-muted font-13"><span class="badge badge-soft-primary"><b>ALASAN BATAL :</b> <?php $inv=$invoice->where('kode_schedule',@$rs->kode_schedule)->first(); echo $inv->keterangan_batal; ?></span> - <span class="badge badge-soft-danger"><?php echo $inv->tanggal_batal; ?></span></span> 
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(@$rs->status == 1)
                                                    <a href="{{ route('laporan.cetakinvoice',@$rs->id) }}" target="_blank" class="btn btn-primary btn-xs btn-block" style="margin-bottom:5px;"><i class="fa fa-print"></i> Cetak Invoice</a>
                                                    @elseif(@$rs->status == 2)
                                                    <a href="{{ route('laporan.cetakinvoice',@$rs->id) }}" target="_blank" class="btn btn-primary btn-xs btn-block" style="margin-bottom:5px;"><i class="fa fa-print"></i> Cetak Invoice</a>
                                                    <a href="{{ route('laporan.cetakkwitansi',@$rs->id) }}" target="_blank" class="btn btn-success btn-xs btn-block"><i class="fa fa-print"></i>Cetak Kwitansi</a>
                                                    @else
                                                    -
                                                    @endif
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