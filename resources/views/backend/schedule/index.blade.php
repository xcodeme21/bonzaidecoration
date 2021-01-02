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
                                        <a href="{{ route('schedule.tambah') }}" type="button" class="btn btn-primary waves-effect waves-light">+ Tambah</a>
                                    </div>
                                    <hr>
                                    <div class="table-responsive animated bounceInUp">
                                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('schedule.edit',@$rs->id) }}"><i class="far fa-edit text-info mr-1"></i></a>
                                                    <a href="{{ route('schedule.hapus',@$rs->id) }}"><i class="far fa-trash-alt text-danger"></i></a>
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