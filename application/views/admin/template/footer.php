</div>
  <!-- /.content-wrapper -->

  <!-- Modal Profil -->

    <div class="modal fade" id="update_profil">
     
      <div class="modal-dialog modal-sm">
       <div class="modal-content">
          <div class="modal-header bg-blue text-center"><i class="fa fa-user"></i> Profil</div>
          <form action="<?= base_url('admin/edit_profil') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
             <label for="username" class="small">Username : </label>
            <input type="text" name="username" class="form-control" required placeholder="Username" value="<?= $this->session->userdata('username'); ?>" autofocus="on">
            <br>
            <label for="full_name" class="small">Nama Lengkap : </label>
            <input type="text" name="fullname" class="form-control" required placeholder="Nama Lengkap" value="<?= $this->session->userdata('fullname'); ?>" >
            <br>

             <label class="small">Foto Profil : </label>
            <img src="<?= base_url('assets/img/'). $this->session->userdata('foto'); ?>" class="img img-responsive img-thumbnail" style="width: 100%;">
            <input type="file" name="foto" class="form-control">
            <i class="text-info">*kosongkan Jika Tidak Akan Merubah Foto</i><br><br>
            <label for="password" class="small">Confirm Password : </label>
            <input type="password" name="password"  class="form-control" required placeholder="Password">
            <br><br>
            <small class="text-info">*Jika ini berhasil akan di minta login kembali !</small>

          </div>
          <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default pull-left"><i class="fa fa-remove"></i> Cancel</button>
            <button type="submit"  class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- #modalProfil -->
    
    <!-- modalpassword -->
    <div class="modal fade" id="update_password">
      <div class="modal-dialog modal-sm">
       <div class="modal-content">
          <div class="modal-header bg-blue text-center"><i class="fa fa-lock"></i> Ganti Password</div>
          <form action="<?= base_url('admin/setting_password') ?>" method="post">
          <div class="modal-body">

            <input type="password" name="pw1"  class="form-control" required placeholder="Password Baru">
            <br>
            <input type="password" name="pw2" class="form-control" required placeholder="Confirm Password Baru">
            <br>
            <input type="password" name="password_lama"  class="form-control" required placeholder="Confirm Password Lama">
            <br><br>
            <small class="text-info">*Jika ini berhasil akan di minta login kembali !</small>

          </div>
          <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default pull-left"><i class="fa fa-remove"></i> Cancel</button>
            <button type="submit" name="update_password" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
          </div>
          </form>
        </div>
      </div>
    </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2018-2010 <a href="https://adminlte.io">Lamun Coding</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>

<script src="<?= base_url() ?>assets/bower_components/ckeditor/ckeditor.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  function notifikasi(status, text) {
      if (status == 'success') {
        $.toast({
                  heading: 'Success',
                  text: text,
                  showHideTransition: 'slide',
                  icon: 'success',
                  hideAfter: 5000,
                  position: 'top-right'
        });
         var audio = new Audio('<?= base_url(); ?>assets/sound/1.mp3');
      }else{
        $.toast({
                  heading: 'error',
                  text: text,
                  showHideTransition: 'slide',
                  icon: 'error',
                  hideAfter: 5000,
                  position: 'top-right'
            });
        var audio = new Audio('<?= base_url() ?>assets/sound/1.mp3');
      }

        audio.play();
  }
   //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
      //Date picker
    $('.datepicker').datepicker({
       autoclose: true,
      format : "yyyy-mm-dd",
      todayHighlight: true,
      orientation : "top auto",
      todayBtn : true,
      todayHighlight : true
    })

    $('#example').DataTable();
    $('.textarea').wysihtml5()
</script>


</body>
</html>