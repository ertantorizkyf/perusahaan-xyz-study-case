<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pemain</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tim</th>
                        <th>Nama</th>
                        <th>Posisi</th>
                        <th>No Punggung</th>
                        <th>Tinggi Badan</th>
                        <th>Berat Badan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tim</th>
                        <th>Nama</th>
                        <th>Posisi</th>
                        <th>No Punggung</th>
                        <th>Tinggi Badan</th>
                        <th>Berat Badan</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach($players as $player){ ?>
                        <tr>
                            <td><?php echo $player->team; ?></td>
                            <td><?php echo $player->name; ?></td>
                            <td><?php echo $player->position; ?></td>
                            <td><?php echo $player->jersey_number; ?></td>
                            <td><?php echo $player->height; ?></td>
                            <td><?php echo $player->weight; ?></td>
                            <td>                                
                                <a href="<?php echo base_url().'player/'.$player->id.'/edit'; ?>" data-toggle="tooltip" title="Perbarui" class="mr-1">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="<?php echo base_url().'player/'.$player->id.'/delete'; ?>" data-toggle="tooltip" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus pemain ini?');">
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
