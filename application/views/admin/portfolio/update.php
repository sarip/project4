<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
   <?= $title; ?>
    <small><?= $judul ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('admin/portfolio'); ?>"><i class="fa fa-camera"></i> Portfolio</a></li>
    <li class="active"><?= $judul; ?></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= form_open_multipart('') ?>
          <div class="box-body">
            <div class="row">
              <div class="col-lg-6">
          
             <div class="form-group">
              <label for="foto_portfolio"> Foto Portfolio</label>
              <input type="file" name="foto_portfolio" class="form-control" id="foto" placeholder="Enter foto Portfolio"  value="<?= set_value('foto') ?>" >
              <img src="<?= base_url('assets/portfolio/').$portfolio->foto ?>" id="review" class="img img-thumbnail img-responsive" style="width: 200px; height: 200px;" />
              <script type="text/javascript">

                function bacaGambar(input) {
                     if (input.files && input.files[0]) {
                        var reader = new FileReader();
                   
                        reader.onload = function (e) {
                            $('#review').attr('src', e.target.result);
                        }
                   
                        reader.readAsDataURL(input.files[0]);
                     }
                  }

                  $("#foto").change(function(){
                     bacaGambar(this);
                  });
              </script>
            </div><br>

                
            <div class="form-group <?= form_error('title') ? 'has-error' : '' ?>">
              <label for="title"> Title Portfolio</label>
              <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title Portfolio"  value="<?= set_value('title') ? set_value('title') : $portfolio->title ?>" >
              <?= form_error('title', '<small><i class="text-danger">', '</i></small>') ?>
            </div><br>
            <!-- /.box-body -->

          <div class="box-footer text-right">
            <a href="<?= base_url('admin/portfolio') ?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary">Save <i class="fa fa-save"></i></button>
          </div>
       <?= form_close() ?>
      </div>
    </div>
  </div>
</section>