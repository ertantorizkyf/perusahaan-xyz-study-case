<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Tim</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Logo</th>
                        <th>Tahun Berdiri</th>
                        <th>Alamat Markas</th>
                        <th>Kota Markas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Logo</th>
                        <th>Tahun Berdiri</th>
                        <th>Alamat Markas</th>
                        <th>Kota Markas</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach($teams as $team){ ?>
                        <tr>
                            <td><?php echo $team->name; ?></td>
                            <td><img src="<?php echo base_url().'assets/team_logo/'.$team->logo; ?>" alt="Logo tidak tersedia" width="75" height="auto"></td>
                            <td><?php echo $team->year_founded; ?></td>
                            <td><?php echo $team->address; ?></td>
                            <td><?php echo $team->city; ?></td>
                            <td>                                
                                <a href="<?php echo base_url().'team/'.$team->id.'/edit'; ?>" data-toggle="tooltip" title="Perbarui" class="mr-1">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="<?php echo base_url().'team/'.$team->id.'/delete'; ?>" data-toggle="tooltip" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus tim ini?');">
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
