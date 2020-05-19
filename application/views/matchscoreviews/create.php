<div class="card shadow mb-4 col-lg-6 center mx-auto">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Skor Pertandingan</h6>
        <a href="<?php echo base_url(); ?>match/list" class="float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
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
