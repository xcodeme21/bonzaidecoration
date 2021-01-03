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
<!-- Buttons examples -->
<script src="{{ asset('public/backend/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('public/backend/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/datatables/buttons.colVis.min.js') }}"></script>
		
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
		var config = {
        height : 280,
        width : 1000,
        fullPage : true,
        linkShowAdvancedTab : false,
        scayt_autoStartup : true,
        enterMode : Number(2),
        toolbar : [
            ['Styles','Bold', 'Italic', 'Underline', '-', 
             'NumberedList',
             'BulletedList', 'SpellChecker', '-', 'Undo',
             'Redo', '-', 'SelectAll', 'NumberedList',
             'BulletedList','FontSize' ], [ 'UIColor' ] ]
	};
	
       $('.ckeditor').ckeditor(config);
    });
</script>

<script>
    setTimeout(function() {
    $('.alert').fadeOut('fast');
}, 3000);
</script>

<script>
	$('#datatable').DataTable();
	
	//Buttons examples
	var table = $('#datatable-buttons').DataTable({
      lengthChange: false,
      buttons: ['excel','pdf']
  });

  table.buttons().container()
      .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

      $('#row_callback').DataTable( {
        "createdRow": function ( row, data, index ) {
            if ( data[5].replace(/[\$,]/g, '') * 1 > 150000 ) {
                $('td', row).eq(5).addClass('highlight');
            }
        }
    } );
    

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

	<script src="https://cdn.tiny.cloud/1/vn670tnchzrwe8giwcycvrw3x6xflmv1byubl7xccqpwyrzh/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

	<script type="text/javascript">
		tinymce.init({
			selector: 'textarea.editor',
			height: 300,
        	readonly : 1,
			menubar: false,
			plugins: [
				'advlist autolink lists link image charmap print preview anchor',
				'searchreplace visualblocks code fullscreen',
				'insertdatetime media table paste code help wordcount'
			],
			toolbar: 'undo redo | formatselect | ' +
				'bold italic backcolor | alignleft aligncenter ' +
				'alignright alignjustify | bullist numlist outdent indent | ' +
				'removeformat | help',
			content_css: '//www.tiny.cloud/css/codepen.min.css'
		});
	</script>
