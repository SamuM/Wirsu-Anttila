<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            ?>
            <script type "text/javascript">
           var virheViesti ="<?php echo $error;?>";
            </script>
            <?php
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
             ?>
            <script type "text/javascript">
           var viesti ="<?php echo $message;?>";
            </script>
            <?php
        }
    }
}
?>

<!-- login form box -->
<div id="login">
<form method="post" action="index.php" name="loginform">

        <table>
            <tr>
                
                <!-- <td><label for="login_input_username">Käyttäjänimi</label></td> -->
            </tr>
            <tr>
                <td><input id="login_input_username" class="login_input" type="text" name="user_name" placeholder="Käyttäjänimi" autofocus required /></td>
            </tr>
            <tr>
               <!--  <td><label for="login_input_password">Salasana</label></td> -->
            </tr>
            <tr>    
                <td><input id="login_input_password" class="login_input" type="password" name="user_password" placeholder="Salasana" autocomplete="off" required /></td>
             </tr>
        </table>
        <button class="fa fa-sign-in fa-2x" c type="submit"  name="login" value="Log in" ></button>



</form>
<div>

<a href="register.php">Rekisteröi uusi tunnus</a>
