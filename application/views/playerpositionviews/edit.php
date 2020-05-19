<div class="card shadow mb-4 col-lg-6 center mx-auto">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Perbarui Data Posisi
            <a href="<?php echo base_url(); ?>player-position/list" class="float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
        </h6>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url(); ?>player_position/edit_process" method="POST">
            <div class="form-group">
                <label for="name">Posisi</label>
                <input type="hidden" name="position_id" id="position_id" value="<?php echo $position->id; ?>">
                <input type="text" name="name" id="name" class="form-control" value="<?php echo $position->name; ?>" required>
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
