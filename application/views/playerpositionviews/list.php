<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Posisi Pemain</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Posisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Posisi</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach($positions as $position){ ?>
                        <tr>
                            <td><?php echo $position->name; ?></td>
                            <td>                                
                                <a href="<?php echo base_url().'player-position/'.$position->id.'/edit'; ?>" data-toggle="tooltip" title="Perbarui" class="mr-1">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="<?php echo base_url().'player-position/'.$position->id.'/delete'; ?>" data-toggle="tooltip" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus posisi ini?');">
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
