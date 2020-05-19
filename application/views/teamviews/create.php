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
