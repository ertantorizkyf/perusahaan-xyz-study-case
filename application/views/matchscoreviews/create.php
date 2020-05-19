<div class="card shadow mb-4 col-lg-6 center mx-auto">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Tambah Skor Pertandingan
            <a href="<?php echo base_url(); ?>match/list" class="float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
        </h6>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url(); ?>match_score/create_process" method="POST">
            <div class="form-group">
                <label for="home_score">Skor Tim Tuan Rumah</label>
                <input type="hidden" name="match_id" id="match_id" value="<?php echo $match_id; ?>">
                <input type="number" name="home_score" id="home_score" class="form-control" min="0" value="0" required>
            </div>
            <div class="form-group">
                <label for="away_score">Skor Tim Tamu</label>
                <input type="number" name="away_score" id="away_score" class="form-control" min="0" value="0" required>
            </div>
            <hr>
            <div id="scorer_header">
                <label>Pencetak score</label>
                <a href="#" class="pull-right" id="add_scorer" data-toggle="tooltip" title="Tambah pencetak"><i class="fa fa-plus"></i></a>
                <input type="hidden" name="scorer_counter" id="scorer_counter" value=1>
            </div>
            <div id="scorer_group">
                <div class="form-inline mb-3" id="scorer_1">
                    <select name="scorer_1_id" id="scorer_1_id" class="form-control col-4 mr-2">
                        <option value="0">Pilih pencetak</option>
                        <?php foreach($home_players as $home_player){ ?>
                        <option value="<?php echo $home_player->id; ?>"><?php echo $home_player->name; ?></option>
                        <?php } ?>
                        <?php foreach($away_players as $away_player){ ?>
                        <option value="<?php echo $away_player->id; ?>"><?php echo $away_player->name; ?></option>
                        <?php } ?>
                    </select>
                    <input type="number" name="score_1_time" id="score_1_time" class="form-control col-7 ml-auto" step="0.1" min="0" placeholder="Waktu cetak dalam menit">
                    <br>
                </div>
            </div>
            <br>
            <div class="text-right">
                <input type="submit" value="Tambah" id="submit_btn" class="btn btn-primary">
            </div>
        </form>
        <?php if($this->session->flashdata('message') != NULL){ ?>
        <br>
        <p class="text-center"><?php echo $this->session->flashdata('message');?></p>
        <?php } ?>
    </div>
</div>
