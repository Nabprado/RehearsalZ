<form method="post" class="form edit_user">
    <div>
        <label for="nickname">Nickname:</label>
        <input type="text" id="nickname" name="nickname" value="<?=$user->nickname?>">
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?=$user->email?>">
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="submit" id="password" name="password" value="Change password">
    </div>

    <input type="submit" value="Save changes" id="submit" name="submit">
</form>


<!-- formulaire pour le changement de mot de passe -->

<div class="change_password">
    <form method="post" class="change_pwd_form">

        <!-- server errors -->
        <?php
        if(isset($alert)):
        if($alert = 1):?>
            <p class="error">You must enter a new password.</p>
        <?php endif; endif; ?>
        <!-- end server errors -->

        <div>
            <label for="new_password">New password:</label>
            <input type="password" name="new_password" id="new_pwd">
            <p class="error hide"></p>
        </div>
        
        <input type="submit" name="save_password" id="save_password" value="Save password">
        
    </form>
</div>