<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- Google analytics script-->
     <!-- Data table plugin-->
     <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
      <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
    $('#sampleTable').DataTable();

      $("#vsFadeOff").fadeTo(3000, 500).slideUp(500, function(){
      $("#vsFadeOff").slideUp(500);
      window.location.replace("manage_product.php");
      });
       $("#brand").fadeTo(3000, 500).slideUp(500, function(){
      $("#brand").slideUp(500);
      window.location.replace("manage_brand.php");
      });
      $("#expense").fadeTo(3000, 500).slideUp(500, function(){
      $("#expense").slideUp(500);
      window.location.replace("manage_expense.php");
      });
      $("#menu").fadeTo(3000, 500).slideUp(500, function(){
      $("#menu").slideUp(500);
      window.location.replace("manage_menu.php");
      });
        CKEDITOR.replace( 'detail' );
    </script>
  </body>
</html>