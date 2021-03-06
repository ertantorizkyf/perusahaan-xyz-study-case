<div class="card shadow mb-4 col-lg-6 center mx-auto">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Pemain Baru</h6>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url(); ?>player/create_process" method="POST">
            <div class="form-group">
                <label for="name">Nama Pemain</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="height">Tinggi Badan</label>
                <input type="number" name="height" id="height" class="form-control" step="0.1" min="0" required>
            </div>
            <div class="form-group">
                <label for="weight">Berat Badan</label>
                <input type="number" name="weight" id="weight" class="form-control" step="0.1" min="0" required>
            </div>
            <div class="form-group">
                <label for="team_id">Tim Pemain</label>
                <select name="team_id" id="team_id" class="form-control">
                    <option value="0">Pilih tim pemain</option>
                    <?php foreach($teams as $team){ ?>
                    <option value="<?php echo $team->id; ?>"><?php echo $team->name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="position_id">Posisi Pemain</label>
                <select name="position_id" id="position_id" class="form-control">
                    <option value="0">Pilih posisi pemain</option>
                    <?php foreach($positions as $position){ ?>
                    <option value="<?php echo $position->id; ?>"><?php echo $position->name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="jersey_no">Nomor Punggung</label>
                <input type="number" name="jersey_no" id="jersey_no" class="form-control" min="0" required>
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
