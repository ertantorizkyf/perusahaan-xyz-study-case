<script>
$(document).ready(function(){
    // home away team validation
    $('#home_team_id').change(function(){
        var home_team_id = $('#home_team_id').val();
        var away_team_id = $('#away_team_id').val();

        if(home_team_id == away_team_id || home_team_id == 0 || away_team_id == 0){
            var message='<br>Pilihan kedua tim tidak boleh sama dan pilihan tim tuan rumah tidak boleh kosong';
            $('#form_message').css('display', 'block').html(message);
            $('#submit_btn').prop('disabled', true);
        } else{
            $('#form_message').css('display', 'none');
            $('#submit_btn').prop('disabled', false);
        }
    });
    $('#away_team_id').change(function(){
        var home_team_id = $('#home_team_id').val();
        var away_team_id = $('#away_team_id').val();

        if(home_team_id == away_team_id || home_team_id == 0 || away_team_id == 0){
            var message='<br>Pilihan kedua tim tidak boleh sama dan pilihan tim tamu tidak boleh kosong';
            $('#form_message').css('display', 'block').html(message);
            $('#submit_btn').prop('disabled', true);
        } else{
            $('#form_message').css('display', 'none');
            $('#submit_btn').prop('disabled', false);
        }
    });
});
</script>