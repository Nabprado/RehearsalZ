<form method="post" name="registerForm" class="form register_form">
    <fieldset class="form_fieldset">

        <legend>Let's get you tuned !</legend>
        <span class="contact_span">*All fields are required*</span>

        <!-- server errors -->
        <?php
        if(isset($alert)):
        if($alert = 1): ?>
            <div class="alert">
                <p>You already have an acount!</p>
                <a href="/?page=login">Login</a>
            </div>

        <?php elseif($alert = 2):?>
            <p class="alert">This user is not valid. Please, try again.</p>
            
        <?php endif; endif; ?>
        <!-- end server errors -->

        <label for="nickname">Nickname:</label>
        <input type="text" name="nickname" id="nickname" placeholder="Enter your nickname...">
        <p class="error hide"></p>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email" placeholder="Enter your email...">
        <p class="error hide"></p>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Enter your password...">
        <p class="error hide"></p>

        <label for="r_password">Repeat password:</label>
        <input type="password" name="r_password" id="r_password" placeholder="Repeat your password...">
        <p class="error hide"></p>

        <input type="submit" id="submit" name="submit" value="Sign up" class="submit"/>

    </fieldset>
</form>