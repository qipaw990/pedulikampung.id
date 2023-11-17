  <footer class="main-footer">
      <strong>Copyright &copy;2023 <a href="https://adminlte.io">Brownite IT Solution</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.1.0
      </div>
  </footer>

  </div>
  <!-- ./wrapper -->
  <script src="{{asset('templates_backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('templates_backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('templates_backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('templates_backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{asset('templates_backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('templates_backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{asset('templates_backend/plugins/jszip/jszip.min.js')}}"></script>
  <script src="{{asset('templates_backend/plugins/pdfmake/pdfmake.min.js')}}"></script>
  <script src="{{asset('templates_backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
  <script src="{{asset('templates_backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('templates_backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('templates_backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
  <!-- jQuery -->
  <!-- Bootstrap 4 -->
  <script src="{{asset('templates_backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('templates_backend/dist/js/adminlte.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script>
      $(function() {
          $("#example1").DataTable({
              "responsive": true,
              "lengthChange": false,
              "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
              "paging": true,
              "lengthChange": true,
              "searching": true, // Mengaktifkan fitur pencarian
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
          });

      });
  </script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
  </body>

  </html>
  