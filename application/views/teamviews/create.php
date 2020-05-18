<!-- Create team card -->
<div class="card shadow mb-4 col-lg-6 center mx-auto">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Tim Baru</h6>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url(); ?>team/create_process" method="POST">
            <div class="form-group">
                <input type="text" name="name" id="name" class="form-control" placeholder="Nama Tim">
            </div>
            <div class="form-group">
                <input type="text" name="year_founded" id="year_founded" class="form-control" placeholder="Tahun Berdiri">
            </div>
            <div class="form-group">
                <input type="text" name="address" id="address" class="form-control" placeholder="Alamat Markas Tim">
            </div>
            <div class="form-group">
                <input type="text" name="city" id="city" class="form-control" placeholder="Kota Markas Tim">
            </div>
            <div class="text-right">
                <input type="submit" value="Tambah Tim" class="btn btn-primary">
            </div>
        </form>
        <br>
        <p class="text-center"><?php echo $this->session->flashdata('message');?></p>
    </div>
</div>
