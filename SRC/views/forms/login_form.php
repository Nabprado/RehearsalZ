<form method="post" name="loginForm" class="form login_form">
    <fieldset class="form_fieldset">

        <legend>Let's rock !</legend>
        <span class="contact_span">*All fields are required*</span>

        <!-- server errors -->
        <?php if(isset($alert)): 
        if($alert = 1): ?>
            <div class="alert">
                <p>Invalid credentials. Not a member yet?</p>
                <a href="/?page=register">Sign up</a>
            </div>

        <?php elseif($alert = 2):?>
            <div class="alert">
                <p>This user doesn't exist. Please, <a href="/?page=sign_up">sign up</a>.</p>
            </div>

        <?php elseif($alert = 3):?>
            <div class="alert">
                <p>This email is not valid. Please, try again.</p>
            </div>
            
        <?php elseif($alert = 4):?>
            <div class="alert">
                <p>All fields are required.</p>
            </div>

        <?php endif; endif; ?>
        <!-- end server errors -->
        
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" placeholder="Enter your email...">
        <p class="error hide"></p>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Enter your password...">
        <p class="error hide"></p>

        <input type="submit" id="submit" name="submit" value="Log in" class="submit"/>

    </fieldset>
</form>