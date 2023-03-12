<script>
	$(function() {
		CountBandeja();
		CargarTema();
	});
// $(function () {
//     //Initialize Select2 Elements
//     $('.select2').select2()
//     //Initialize Select2 Elements
//     $('.select2bs4').select2({
//       theme: 'bootstrap4'
//     })
//     //Money Euro
//     $('[data-mask]').inputmask()
//     //Date picker
//     $('#reservationdate').datetimepicker({
//         format:'YYYY-MM-DD'
//     });
// 	  //Date picker
// 	  $('#reservationdate2').datetimepicker({
// 		format:'YYYY-MM-DD'
//     });
//     //Date and time picker
//     $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
//   })


  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    //Date picker
    $('#reservationdate').datetimepicker({
        format:'YYYY-MM-DD'
    });
	  //Date picker
	  $('#reservationdate2').datetimepicker({
		format:'YYYY-MM-DD'
    });
    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
  })
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    //Date picker
    $('#reservationdates').datetimepicker({
        format:'YYYY-MM-DD'
    });
	  //Date picker
	  $('#reservationdates2').datetimepicker({
		format:'YYYY-MM-DD'
    });
    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
  })
</script>
</body>

</html>


