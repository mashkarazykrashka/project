<?php

/** @var string $loginURL */
?>
<br>
<br>
<div>
    <form action="<?= $loginURL ?>" method="POST" class="form">
        <label>
            <input class="field"type="text" name="user" placeholder="User">
        </label><br/>
        <label>
            <input class="field"type="password" name="pass" placeholder="Password">
        </label><br/>
        <input class="button" type="submit" value="Login">
    </form>
</div>