<?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message;
        }
    }
}
?>

<div id="register-wrapper">

<!-- register form -->
<form method="post" action="register.php" name="registerform">

<table>

    <!-- the user name input field uses a HTML5 pattern check -->
    <tr>
    <td><label for="login_input_username">Käyttäjänimi (vain numeroita ja kirjaimia, 2-64 merkkiä)</label></td>
    <td><input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required placeholder="Käyttäjänimi" /></td>
    </tr>

    <!-- the email input field uses a HTML5 email type check -->
    <tr>
    <td><label for="login_input_email">Käyttäjän sähköposti</label></td>
    <td><input id="login_input_email" class="login_input" type="email" name="user_email" required placeholder="xxxx.xxxx@esim.fi"/></td>
    </tr>

    <tr>
   <td><label for="login_input_password_new">Salasana (min. 6 merkkiä)</label></td>
   <td><input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" /></td>
    </tr>

    <tr>
    <td><label for="login_input_password_repeat">Vahvista salasana</label></td>
    <td><input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" /></td>
    </tr>

    <tr>
    <td></td>
    <td><input type="submit"  name="register" value="Register" /></td>
    </tr>

</table>

</form>

<!-- backlink -->
<a href="index.php">Back to Login Page</a>

</div>
