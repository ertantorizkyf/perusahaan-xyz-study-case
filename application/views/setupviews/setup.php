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
            <a href="<?php echo base_url();?>setup/create_team_table">3. Create team table</a>
            <br>
            <a href="<?php echo base_url();?>setup/create_player_position_table">4. Create player position table</a>
            <br>
            <a href="<?php echo base_url();?>setup/create_player_table">5. Create player table</a>
            <br>
            <a href="<?php echo base_url();?>setup/create_match_table">6. Create match table</a>
            <br>
            <a href="<?php echo base_url();?>setup/create_match_score_table">7. Create match score table</a>
            <br>
        </div>
    </body>
</html>
