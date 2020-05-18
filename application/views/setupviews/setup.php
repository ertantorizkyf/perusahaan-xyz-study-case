<!DOCTYPE html>
<html>
    <head>
        <title>Initial setup</title>
    </head>
    <body>
        <div>
            <br>
            <?php echo $this->session->flashdata('msg');?>
            <h2>Initial setup for the application</h2>
            <a href="<?php echo base_url();?>setup/create_user_table">1. Create user table</a>
            <br>
            <a href="<?php echo base_url();?>setup/create_admin">2. Create admin user</a>
            <br>
        </div>
    </body>
</html>
