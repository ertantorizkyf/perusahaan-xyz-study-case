<div class="card shadow mb-4 col-lg-6 center mx-auto">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Perbarui Data Tim</h6>
        <a href="<?php echo base_url(); ?>team/list" class="float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url(); ?>team/edit_process" method="POST">
            <div class="form-group">
            <label for="name">Nama Tim</label>
                <input type="hidden" name="team_id" id="team_id" value="<?php echo $team->id; ?>">
                <input type="text" name="name" id="name" class="form-control" value="<?php echo $team->name; ?>" required>
            </div>
            <div class="form-group">
                <label for="year_founded">Tahun Berdiri</label>
                <input type="text" name="year_founded" id="year_founded" class="form-control" value="<?php echo $team->year_founded; ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Alamat Markas Tim</label>
                <input type="text" name="address" id="address" class="form-control" value="<?php echo $team->address; ?>" required>
            </div>
            <div class="form-group">
                <label for="city">Kota Markas Tim</label>
                <input type="text" name="city" id="city" class="form-control" value="<?php echo $team->city; ?>" required>
            </div>
            <div class="text-right">
                <input type="submit" value="Perbarui" class="btn btn-primary">
            </div>
        </form>
        <?php if($this->session->flashdata('message') != NULL){ ?>
        <br>
        <p class="text-center"><?php echo $this->session->flashdata('message');?></p>
        <?php } ?>
    </div>
</div>
