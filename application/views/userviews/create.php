<div class="card shadow mb-4 col-lg-6 center mx-auto">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Pengguna Admin</h6>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url(); ?>user/create_process" method="POST">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="role">Tipe</label>
                <input type="text" name="role" id="role" class="form-control" value="user" readonly>
            </div>
            <div class="text-right">
                <input type="submit" value="Tambah" class="btn btn-primary">
            </div>
        </form>
        <?php if($this->session->flashdata('message') != NULL){ ?>
        <br>
        <p class="text-center"><?php echo $this->session->flashdata('message');?></p>
        <?php } ?>
    </div>
</div>
