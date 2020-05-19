<script>
    $(document).ready(function(){
        var counter = 2;

        $('#add_scorer').click(function(){
            var new_scorer = $(document.createElement('div')).attr('class', 'form-inline mb-3').attr('id', 'scorer_' + counter);
            new_scorer.after().html('<select name="scorer_' + counter + '_id" id="scorer_' + counter + '_id" class="form-control col-4 mr-2"> <option value="0">Pilih pencetak</option> <?php foreach($home_players as $home_player){ ?> <option value="<?php echo $home_player->id; ?>"><?php echo $home_player->name; ?></option> <?php } ?> <?php foreach($away_players as $away_player){ ?> <option value="<?php echo $away_player->id; ?>"><?php echo $away_player->name; ?></option> <?php } ?> </select> <input type="number" name="score_' + counter + '_time" id="score_' + counter + '_time" class="form-control col-7 ml-auto" step="0.1" min="0" placeholder="Waktu cetak dalam menit">');
            new_scorer.appendTo("#scorer_group");

            $('#scorer_counter').val(counter);

            console.log(counter);
            counter++;
        });

    });
</script>
