<div class="card shadow mb-4 col-lg-6 center mx-auto">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Tim Baru</h6>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url(); ?>team/create_process" method="POST">
            <div class="form-group">
                <label for="name">Nama Tim</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>            
            <div class="form-group">
                <label for="year_founded">Tahun Berdiri</label>
                <input type="text" name="year_founded" id="year_founded" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">Alamat Markas Tim</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="city">Kota Markas Tim</label>
                <input type="text" name="city" id="city" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="upload_image" class="btn btn-primary">Unggah Logo Tim</label>
                <input type="hidden" name="logo" id="logo" value="">
                <input type="file" name="upload_image" id="upload_image" accept="image/*" style="opacity:0;position:absolute;z-index: -1;"><br>
                <img src="" id="logo_preview" width="150" height="auto">
            </div>
            <div class="text-right">
                <input type="submit" value="Tambah" class="btn btn-primary">
            </div>
        </form>
        <?php if($this->session->flashdata('message') != NULL){ ?>
        <br>
        <p class="text-center"><?php echo $this->session->flashdata('message');?></p>
        <?php } ?>
    </div>
</div>

<div id="uploadimageModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div id="image_to_crop" style="width:100%; margin-top:5px;height:auto"></div>
                        <br>
                        <button class="btn btn-primary crop_image">Potong dan Unggah Logo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
