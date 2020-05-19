<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna Admin</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tipe Pengguna</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tipe Pengguna</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach($users as $user){ ?>
                        <tr>
                            <td><?php echo $user->name; ?></td>
                            <td><?php echo $user->email; ?></td>
                            <td><?php echo $user->role; ?></td>
                            <td>                                
                                <a href="<?php echo base_url().'user/'.$user->id.'/edit'; ?>" data-toggle="tooltip" title="Perbarui" class="mr-1">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="<?php echo base_url().'user/'.$user->id.'/delete'; ?>" data-toggle="tooltip" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus pengguna ini?');">
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
