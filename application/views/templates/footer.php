    <!--<footer-->
    <footer style="background-color: #990900; height: 100px; padding-top: 20px; margin-top:40%;">
      <div class="container text-center">
        <div class="row">
          <div class="col-sm-12">
            <p1>&copy; copyright 2020 | built <i class="glyphicon glyphicon-map-marker"></i> by. <a href="">WISATA SULAWESI TENGAH</a>.</p1>
          </div>
        </div>
      </div>
      <div class="container text-center">
        <div class="row">
          <div class="col-sm-12">
            <p2> <i class="glyphicon glyphicon-bookmark"></i> Keindahan Yang Tersembunyi Digaris Khatulistiwa <i class="glyphicon glyphicon-time"></i></p2>
          </div>
        </div>
      </div>
    </footer>
    <!--akhir footer-->



    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
    </a>


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded mr-5" href="#page-top" data-toggle="modal" data-target="#newsidebarModal">
    <i class="fa fa-bars"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Ingin Keluar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body text-center"><strong>Kepercayaan Anda Adalah Prioritas Utama Kami</strong> <br> Terima Kasih Atas Kunjungan Anda...</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>



    <script src="<?= base_url('assets/'); ?>jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/config.js"></script>
    <script src="<?= base_url('assets/'); ?>js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/'); ?>jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/desain-utama.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/jquery.dataTables.js"></script>
    <script src="<?= base_url('assets/'); ?>js/dataTables.bootstrap4.js"></script>
    <script src="<?= base_url('assets/'); ?>js/datatables-demo.js"></script>


            <script>
                $('.custom-file-input').on('change', function() {
                    let fileName = $(this).val().split('\\').pop();
                    $(this).next('.custom-file-label').addClass("selected").html(fileName);
                });



                $('.form-check-input').on('click', function() {
                    const menuId = $(this).data('menu');
                    const roleId = $(this).data('role');

                    $.ajax({
                        url: "<?= base_url('admin/changeaccess'); ?>",
                        type: 'post',
                        data: {
                            menuId: menuId,
                            roleId: roleId
                        },
                        success: function() {
                            document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                        }
                    });

                });
            </script>

  </body>
</html>
