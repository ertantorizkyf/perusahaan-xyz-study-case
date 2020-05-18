<!-- Create team card -->
<div class="card shadow mb-4 col-lg-6 center mx-auto">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Tim Baru</h6>
        <a href="<?php echo base_url(); ?>team/list" class="float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url(); ?>team/edit_process" method="POST">
            <div class="form-group">
                <input type="hidden" name="team_id" id="team_id" value="<?php echo $team->id; ?>">
                <input type="text" name="name" id="name" class="form-control" value="<?php echo $team->name; ?>">
            </div>
            <div class="form-group">
                <input type="text" name="year_founded" id="year_founded" class="form-control" value="<?php echo $team->year_founded; ?>">
            </div>
            <div class="form-group">
                <input type="text" name="address" id="address" class="form-control" value="<?php echo $team->address; ?>">
            </div>
            <div class="form-group">
                <input type="text" name="city" id="city" class="form-control" value="<?php echo $team->city; ?>">
            </div>
            <div class="text-right">
                <input type="submit" value="Perbarui Tim" class="btn btn-primary">
            </div>
        </form>
        <br>
        <p class="text-center"><?php echo $this->session->flashdata('message');?></p>
    </div>
</div>