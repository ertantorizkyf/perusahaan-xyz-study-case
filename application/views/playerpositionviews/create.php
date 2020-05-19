<!-- Create team card -->
<div class="card shadow mb-4 col-lg-6 center mx-auto">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Posisi Pemain</h6>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url(); ?>player_position/create_process" method="POST">
            <div class="form-group">
                <label for="name">Posisi</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="text-right">
                <input type="submit" value="Tambah" class="btn btn-primary">
            </div>
        </form>
        <br>
        <p class="text-center"><?php echo $this->session->flashdata('message');?></p>
    </div>
</div>
