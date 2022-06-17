<?php
foreach($song as $s):
?>

<div class="main_title">

    <h1><?=$s->name?></h1>

</div>


<div class="main_content">

    <form method="post">

        <div class="audio_controller">
            <input class="btn" type="button" name="play_all" id="play_all" value="Play">
            <input class="btn" type="button" name="pause_all" id="pause_all" value="Pause">
            <input class="btn" type="button" name="stop_all" id="stop_all" value="Stop">
        </div>
    
        <?php foreach($tracks as $t):?>
            <div class="track">
                <label for="<?=$t->name?>"><?=$t->name?></label>
                <input type="checkbox" name="<?=$t->name?>" id="<?=$t->name?>" checked>
                <audio controls src="<?=$t->path?>" id="track" class="<?=$t->name?>"></audio>
            </div>
        <?php  endforeach; ?>

    </form>

<?php endforeach; ?>

</div>

<script src="/PUBLIC/js/player.js" type="module"></script>
<!-- <script src="/PUBLIC/js/bpm_analyzer.js" type="module"></script> -->