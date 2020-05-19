<div class="card shadow mb-4 col-lg-6 center mx-auto">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Perbarui Data Pemain</h6>
        <a href="<?php echo base_url(); ?>player/list" class="float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url(); ?>player/edit_process" method="POST">
            <div class="form-group">
                <label for="name">Nama Pemain</label>
                <input type="hidden" name="player_id" id="player_id" value="<?php echo $player->id; ?>">
                <input type="text" name="name" id="name" class="form-control" value="<?php echo $player->name; ?>" required>
            </div>
            <div class="form-group">
                <label for="height">Tinggi Badan</label>
                <input type="number" name="height" id="height" class="form-control" step="0.1" min="0" value="<?php echo $player->height; ?>" required>
            </div>
            <div class="form-group">
                <label for="weight">Berat Badan</label>
                <input type="number" name="weight" id="weight" class="form-control" step="0.1" min="0" value="<?php echo $player->weight; ?>" required>
            </div>
            <div class="form-group">
                <label for="team_id">Tim Pemain</label>
                <select name="team_id" id="team_id" class="form-control">
                    <option value="0">Pilih tim pemain</option>
                    <?php foreach($teams as $team){ ?>
                    <option value="<?php echo $team->id; ?>" <?php if($team->id==$player->team_id) echo "selected"; ?>><?php echo $team->name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="position_id">Posisi Pemain</label>
                <select name="position_id" id="position_id" class="form-control">
                    <option value="0">Pilih posisi pemain</option>
                    <?php foreach($positions as $position){ ?>
                    <option value="<?php echo $position->id; ?>" <?php if($position->id==$player->position_id) echo "selected"; ?>><?php echo $position->name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="jersey_no">Nomor Punggung</label>
                <input type="number" name="jersey_no" id="jersey_no" class="form-control" min="0" value="<?php echo $player->jersey_number; ?>" required>
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
