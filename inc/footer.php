<aside class="control-sidebar control-sidebar-dark">
    <div class="callout callout-warning">
                  <h6>Agarta Plus Bilişim Sistemleri</h6>
                  <p>Ofis yönetim ve müşteri takip sistemi Agarta Plus Bilişim Sistemleri tarafından geliştirilmiştir.<br><br>
                <b>Telefon:</b><a href="tel:+90 312 870 17 58" style="color:#fff;"> +90 312 870 17 58</a><br>
                <b>Whatsapp:</b><a href="https://api.whatsapp.com/send?phone=+903128701758&text=Ofis%20Y%C3%B6netim" style="color:#fff;">+90 312 870 17 58</a><br>
                <b>E-posta:</b><a href="mailto:info@agartaplus.com" style="color:#fff;">  info@agartaplus.com</a><br>
                <b>Web Sitesi:</b><a href="www.agartaplus.com" style="color:#fff;">  www.agartaplus.com</a><br>
 

                  </p>
                </div>

</aside>
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="https://agartaplus.com"><?php echo marka_footer; ?></a></strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Versiyon</b> 1.0.1
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<script src="theme/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="theme/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="theme/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="theme/plugins/moment/moment.min.js"></script>
<script src="theme/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="js/moment.js"></script>
<script src="js/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="theme/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="theme/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="theme/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="theme/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="theme/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="theme/dist/js/adminlte.min.js"></script>
<script src="theme/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- AdminLTE for demo purposes -->


<script src="theme/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="theme/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="theme/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="theme/plugins/jszip/jszip.min.js"></script>
<script src="theme/plugins/pdfmake/pdfmake.min.js"></script>
<script src="theme/plugins/pdfmake/vfs_fonts.js"></script>
<script src="theme/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="theme/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="theme/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script type="text/javascript">
    function bildirimKontrol(){
      var id=1;
      $.ajax({  
         type:"GET",  
         url:"ajax.php?islem=bildirimKontrol",  
         data:"",  
         success:function(response){
             if(response==1){
              $("div#audio").html('<audio autoplay="autoplay"><source src="../Slate.mp3" type="audio/ogg" /><source src="../Slate.mp3" type="audio/mpeg" /></audio>');
            }else{
              return false;
            }
           
         }  
      });
    }
    $(document).ready(function(){
      setInterval(function(){
        bildirimKontrol();
      },3000);
    });
  </script>
<script>
  /*$(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })*/
</script>

<script>
 $(document).ready(function () {
        $('.date-time').daterangepicker({
            singleDatePicker: true,
            autoUpdateInput: false,
            showDropdowns: true,
            "drops": "down",
            // minYear: parseInt(moment().subtract(30, 'years').format('YYYY'), 10),
            // maxYear: parseInt(moment().add(10, 'years').format('YYYY'), 10),
            locale: {
                format: 'DD-MM-YYYY'
            }
        });
        $('.date-time').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('DD-MM-YYYY'));
        });
        $('.date-time').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });

        $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
  })
    });
</script>
<script>
    function confirmDelete(link) {
        if (confirm("Silmek istediğinizden emin misiniz?")) {
            doAjax(link.href, "POST"); // doAjax needs to send the "confirm" field
        }
        return false;
    }
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
    $.getJSON("inc/il-bolge.json", function(sonuc){
        $.each(sonuc, function(index, value){
            var row="";
            row +='<option value="'+value.il+'">'+value.il+'</option>';
            $("#il").append(row);
        })
    });


    $("#il").on("change", function(){
        var il=$(this).val();

        $("#ilce").attr("disabled", false).html("<option value=''>Seçin..</option>");
        $.getJSON("inc/il-ilce.json", function(sonuc){
            $.each(sonuc, function(index, value){
                var row="";
                if(value.il==il)
                {
                    row +='<option value="'+value.ilce+'">'+value.ilce+'</option>';
                    $("#ilce").append(row);
                }
            });
        });
    });

</script>

</body>
</html>
