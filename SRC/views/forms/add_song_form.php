<form method="POST" class="form add_song_form" enctype="multipart/form-data">

    <fieldset class="form_fieldset">

        <label for="song_name">Song name:</label>
        <input type="text" name="song_name" id="song_name" placeholder="Enter your song's name...">
        <p class="error hide"></p>

        <label for="drums">Drums track:</label>
        <input type="file" accept="audio/*" name="drums" id="drums">
        <p class="error hide"></p>

        <div id="new_track">
            <div>
                <label for='guitars'>Guitars track:</label>
                <input type='file' accept='audio/*' name='guitars' id='guitars'>
                <p class='error hide'></p>
            </div>
        </div>

        <div id="new_track2">
            <div>
                <label for='voices'>Voices track:</label>
                <input type='file' accept='audio/*' name='voices' id='voices'>
                <p class='error hide'></p>
            </div>
        </div>
        <button name="add_track" id="add_track">Add another track</button>

        <button type="submit" name="submit" class="submit">Add</button>

    </fieldset>

</form>