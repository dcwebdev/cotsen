<?php
/**
 * Created by PhpStorm.
 * User: Laura 5
 * Date: 5/30/2016
 * Time: 11:38 AM
 */
include 'mailer.php';

if(isset($_POST['bttnSubmit'])) {
    mailer($to,$subject,$_POST['feedback']);
}
else
{
    ?>
        <form action="feedback.php" method="post">
            <label for="feedbackBox">How can the site be improved?</label>
            <textarea id="feedbackBox" name="feedback"></textarea>
            <input type="submit" name="bttnSubmit" value="Send Feedback"/>
        </form>
    <?
}