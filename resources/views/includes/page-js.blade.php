<!-- ================== BEGIN select2-js ================== -->
<script src="{{ asset('/assets/plugins/select2/dist/js/select2.min.js') }}"></script>

<!-- ================== BEGIN core-js ================== -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<!-- ================== END core-js ================== -->

{{-- <script src="{{ asset('assets/plugins/@highlightjs/cdn-assets/highlight.min.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/demo/render.highlight.js') }}"></script> --}}

<!-- ================== BEGIN page-js ================== -->
<script src="{{ asset('assets/plugins/flot/source/jquery.canvaswrapper.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.colorhelpers.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.saturated.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.browser.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.drawSeries.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.uiConstants.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.time.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.crosshair.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.navigate.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.touchNavigate.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.hover.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.touch.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.selection.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.symbol.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/source/jquery.flot.legend.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jvectormap-next/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jvectormap-content/world-mill.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>

<!-- ================== BEGIN page-js ================== -->
<script src="{{ asset('assets/plugins/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tag-it/js/tag-it.min.js') }}"></script>
<script src="{{ asset('assets/plugins/clipboard/dist/clipboard.min.js') }}"></script>
<script src="{{ asset('assets/plugins/spectrum-colorpicker2/dist/spectrum.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select-picker/dist/picker.min.js') }}"></script>
{{-- <script src="{{ asset('assets/js/demo/form-plugins.production.js') }}"></script> --}}
<script src="{{ asset('assets/plugins/@highlightjs/cdn-assets/highlight.min.js') }}"></script>
<script src="{{ asset('assets/js/demo/render.highlight.js') }}"></script>


<!-- ================== BEGIN page-js jadwal ronda ================== -->
<script src="{{ asset('/assets/plugins/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/@fullcalendar/core/index.global.js') }}"></script>
<script src="{{ asset('/assets/plugins/@fullcalendar/daygrid/index.global.js') }}"></script>
<script src="{{ asset('/assets/plugins/@fullcalendar/timegrid/index.global.js') }}"></script>
<script src="{{ asset('/assets/plugins/@fullcalendar/interaction/index.global.js') }}"></script>
<script src="{{ asset('/assets/plugins/@fullcalendar/list/index.global.js') }}"></script>
<script src="{{ asset('/assets/plugins/@fullcalendar/bootstrap/index.global.js') }}"></script>
<script src="{{ asset('/assets/js/demo/calendar.ronda.js') }}"></script>

<!-- ================== BEGIN page-js ================== -->
<script src="{{ asset('assets/plugins/datatables.net/js/dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/demo/table-manage-default.demo.js') }}"></script>

<!-- ================== BEGIN qrcode scanner ================== -->
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



@stack('scripts')




<script>
  // Untuk Print
  function printPage(url) {
    var iframe = document.getElementById('printFrame');
    iframe.src = url;
    iframe.onload = function() {
      iframe.contentWindow.print();
    };
  }
  // Untuk input format rupaih tinggal masukan class format-rupiah
  document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('.format-rupiah');

    function formatRupiah(angka) {
      const numberString = angka.replace(/[^,\d]/g, '');
      const split = numberString.split(',');
      let sisa = split[0].length % 3;
      let rupiah = split[0].substr(0, sisa);
      const ribuan = split[0].substr(sisa).match(/\d{3}/g);
      if (ribuan) {
        const separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
      return split[1] !== undefined ? 'Rp. ' + rupiah + ',' + split[1] : 'Rp. ' + rupiah;
    }

    inputs.forEach(function(input) {
      if (input.value) {
        input.value = formatRupiah(input.value.replace(/[^0-9]/g, ''));
      }

      input.addEventListener('input', function(e) {
        let cursorPosition = input.selectionStart;
        const beforeFormat = e.target.value;
        const digitsBeforeCursor = beforeFormat.slice(0, cursorPosition).replace(/[^0-9]/g, '').length;
        const raw = e.target.value.replace(/[^0-9]/g, '');
        const formatted = formatRupiah(raw);
        e.target.value = formatted;
        let newCursorPosition = 0;
        let digitsCount = 0;
        for (let i = 0; i < formatted.length; i++) {
          if (/\d/.test(formatted[i])) {
            digitsCount++;
          }
          if (digitsCount >= digitsBeforeCursor) {
            newCursorPosition = i + 1;
            break;
          }
        }
        if (digitsCount < digitsBeforeCursor) {
          newCursorPosition = formatted.length;
        }
        input.setSelectionRange(newCursorPosition, newCursorPosition);
      });
      input.closest('form').addEventListener('submit', function() {
        inputs.forEach(function(el) {
          el.value = el.value.replace(/[^0-9]/g, '');
        });
      });
    });
  });




  $(document).ready(function() {
    Dashboard.init();

    $(document).on(app.darkMode.eventName, function() {
      Dashboard.init();
    });
  });
</script>
