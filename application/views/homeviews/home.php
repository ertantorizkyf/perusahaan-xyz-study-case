<h3>Jadwal Pertandingan Mendatang</h3>
<?php if(sizeof($upcoming_matches) > 0){ ?>
    <div class="row">
    <?php foreach($upcoming_matches as $match){ ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?php $md = new DateTime($match->match_date); echo $md->format('D, d F Y (H:i)'); ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $match->home_team.' vs '.$match->away_team; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
<?php } else{ ?>
    <p>Belum ada jadwal pertandingan mendatang</p>
<?php } ?>
<hr>
<h3>Skor Pertandingan Terbaru</h3>
<?php if(sizeof($recent_matches) > 0){ ?>
    <div class="row">
    <?php foreach($recent_matches as $match){ ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?php $md = new DateTime($match->match_date); echo $md->format('D, d F Y (H:i)'); ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $match->home_team.' vs '.$match->away_team; ?></div>
                            <div class="mb-0 font-weight-bold text-gray-800">Skor akhir: <?php echo $match->home_score.' - '.$match->away_score; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
<?php } else{ ?>
    <p>Belum ada skor pertandingan terbaru</p>
<?php } ?>
