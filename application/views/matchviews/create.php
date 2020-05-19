<div class="card shadow mb-4 col-lg-6 center mx-auto">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Jadwal Pertandingan</h6>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url(); ?>match/create_process" method="POST">
            <div class="form-group">
                <label for="match_date">Tanggal Pertandingan</label>
                <input type="date" name="match_date" id="match_date" class="form-control" min="<?php echo date("Y-m-d")?>" required>
            </div>
            <div class="form-group">
                <label for="match_time">Waktu Pertandingan</label>
                <input type="time" name="match_time" id="match_time" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="home_team_id">Tim Tuan Rumah</label>
                <select name="home_team_id" id="home_team_id" class="form-control">
                    <option value="0">Pilih tim tuan rumah</option>
                    <?php foreach($teams as $team){ ?>
                    <option value="<?php echo $team->id; ?>"><?php echo $team->name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="away_team_id">Tim Tamu</label>
                <select name="away_team_id" id="away_team_id" class="form-control">
                    <option value="0">Pilih tim tamu</option>
                    <?php foreach($teams as $team){ ?>
                    <option value="<?php echo $team->id; ?>"><?php echo $team->name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="text-right">
                <input type="submit" value="Tambah" id="submit_btn" class="btn btn-primary" disabled="true">
            </div>
        </form>
        <?php if($this->session->flashdata('message') != NULL){ ?>
        <br>
        <p class="text-center"><?php echo $this->session->flashdata('message');?></p>
        <?php } ?>
        <p class="text-center" style="display: none;" id="form_message"></p>
    </div>
</div>
