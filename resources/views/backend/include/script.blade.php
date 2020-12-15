<!-- jQuery  -->
<script src="{{ asset('public/backend/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/backend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/backend/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('public/backend/js/waves.min.js') }}"></script>
<script src="{{ asset('public/backend/js/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('public/backend/plugins/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('public/backend/pages/jquery.analytics_dashboard.init.js') }}"></script>

<script src="{{ asset('public/backend/pages/jquery.animate.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('public/backend/js/app.js') }}"></script>

<!-- Required datatable js -->
<script src="{{ asset('public/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/moment/moment.js') }}"></script>
<script src="{{ asset('public/backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('public/backend/plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/timepicker/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ asset('public/backend/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>

<script src="{{ asset('public/backend/pages/jquery.forms-advanced.js') }}"></script>
<script src="{{ asset('public/backend/plugins/select2/select2.min.js') }}"></script>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>

<script>
    setTimeout(function() {
    $('.alert').fadeOut('fast');
}, 3000);
</script>

<script>
    $('#datatable').DataTable();
</script>

	<script type="text/javascript">
		
		var rupiah = document.getElementById('harga_paket');
		
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
        
        
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
		}
	</script>
