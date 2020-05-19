<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Jadwal Pertandingan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal Pertandingan</th>
                        <th>Waktu Pertandingan</th>
                        <th>Tim Tuan Rumah</th>
                        <th>Tim Tamu</th>
                        <th>Skor akhir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tanggal Pertandingan</th>
                        <th>Waktu Pertandingan</th>
                        <th>Tim Tuan Rumah</th>
                        <th>Tim Tamu</th>
                        <th>Skor akhir</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach($matches as $match){ ?>
                        <tr>
                            <td><?php $md = new DateTime($match->match_date); echo $md->format('D, d F Y'); ?></td>
                            <td><?php $mt = new DateTime($match->match_date); echo $mt->format('H:i'); ?></td>
                            <td><?php echo $match->home_team; ?></td>
                            <td><?php echo $match->away_team; ?></td>
                            <td>
                                <?php if(isset($match->match_score_id)){ ?>
                                    <?php echo $match->home_score.' - '.$match->away_score;?>
                                    <a href="<?php echo base_url().'match/'.$match->id.'/score'; ?>">(Lihat detail)</a>
                                <?php } else{ ?>
                                    <a href="<?php echo base_url().'match/'.$match->id.'/score/create'; ?>">Tambahkan data skor akhir</a>
                                <?php } ?>
                            </td>
                            <td>                                
                                <a href="<?php echo base_url().'match/'.$match->id.'/edit'; ?>" data-toggle="tooltip" title="Perbarui" class="mr-1">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="<?php echo base_url().'match/'.$match->id.'/delete'; ?>" data-toggle="tooltip" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus jadwal ini?');">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
