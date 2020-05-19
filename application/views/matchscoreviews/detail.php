<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Daftar Pencetak Skor (Skor Akhir: <?php echo $score->home_score.' - '.$score->away_score; ?>)
            <a href="<?php echo base_url(); ?>match/list" class="float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tim</th>
                        <th>Pencetak (Nomor Punggung)</th>
                        <th>Posisi</th>
                        <th>Waktu Gol</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tim</th>
                        <th>Pencetak (Nomor Punggung)</th>
                        <th>Posisi</th>
                        <th>Waktu Gol</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach($scorers as $scorer){ ?>
                        <tr>
                            <td><?php echo $scorer->team; ?></td>
                            <td><?php echo $scorer->name.' ('.$scorer->jersey_number.')'; ?></td>
                            <td><?php echo $scorer->position; ?></td>
                            <td><?php echo $scorer->score_time; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
