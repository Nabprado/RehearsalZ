<form method="POST" name="contactForm" class="form contact_form">

    <fieldset class="form_fieldset">

        <legend>Get in touch with us</legend>
        <span class="contact_span">*All fields are required*</span>

        <label for="first_name">First name:</label>
        <input type="text" name="first_name" id="first_name" placeholder="Enter your first name...">
        <p class="error hide"></p>

        <label for="last_name">Last name:</label>
        <input type="text" name="last_name" id="last_name" placeholder="Enter your last name...">
        <p class="error hide"></p>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email" placeholder="Enter your email...">
        <p class="error hide"></p>

        <label for="message">Message:</label>
        <textarea name="message" cols="30" rows="10" id="message" placeholder="Your message here..."></textarea>
        <p class="error hide"></p>

        <input type="submit" value="Send" class="submit"/>

    </fieldset>

</form>