<form method="post" class="form edit_band_form">
    <fieldset class="form_fieldset">
        
        <label for="band_name">Name:</label>
        <input type="text" id="band_name" name="band_name" value="<?=$this_band->getName()?>">
        <button class="submit" name="update">Save changes</button>
        <button class="submit" name="delete">Delete band</button>
        
    </fieldset>
</form>