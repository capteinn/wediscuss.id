      </div>
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="<?= base_url() ?>public/https://www.bootstrapdash.com/" target="_blank">Bootstrap Dash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?= base_url() ?>public/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?= base_url() ?>public/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?= base_url() ?>public/js/off-canvas.js"></script>
  <script src="<?= base_url() ?>public/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?= base_url() ?>public/js/dashboard.js"></script>
  <!-- datatables -->
  <script src="<?= base_url() ?>public/js/jquery-datatables.min.js"></script>
  <script src="<?= base_url() ?>public/js/datatable.bootstrap.min.js"></script>
  <script src="<?= base_url() ?>public/js/datatable.responsive.min.js"></script>
  <script src="<?= base_url() ?>public/js/responsive.bootstrap.min.js"></script>
  <!-- wysiwyg summernote -->
  <script src="<?= base_url() ?>public/js/summernote.js"></script>
  <!-- End custom js for this page-->

  <script type="text/javascript">
    $(document).ready( function () {
      $('.wysiwyg').summernote({});
      $('.table').DataTable();
    });
  </script>
</body>

</html>
