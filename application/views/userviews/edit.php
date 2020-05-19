<div class="card shadow mb-4 col-lg-6 center mx-auto">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Perbarui Data Posisi
            <a href="<?php echo base_url(); ?>user/list" class="float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
        </h6>
    </div>
    <div class="card-body">
        <form action="<?php echo base_url(); ?>user/edit_process" method="POST">
            <div class="form-group">
                <label for="name">Posisi</label>
                <input type="hidden" name="user_id" id="user_id" value="<?php echo $user->id; ?>">
                <input type="text" name="name" id="name" class="form-control" value="<?php echo $user->name; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $user->email; ?>" required>
            </div>
            <div class="form-group">
                <label for="role">Tipe</label>
                <input type="text" name="role" id="role" class="form-control" value="<?php echo $user->role; ?>" readonly>
            </div>
            <div class="text-right">
                <input type="submit" value="Perbarui" class="btn btn-primary">
            </div>
        </form>
        <?php if($this->session->flashdata('message') != NULL){ ?>
        <br>
        <p class="text-center"><?php echo $this->session->flashdata('message');?></p>
        <?php } ?>
    </div>
</div>
