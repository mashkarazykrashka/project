<div>
    <form action="<?= $URL ?>" method="POST" class="form">
    Выберите предприятие:
        <?php
            echo "<br><select class='field' name='id'>";
            foreach ($users as $id => $userName) {
                if ($id != '4'){
                echo "<option value='$id'>$userName</option>";
            }
        }
        ?>
        <input class="button" type="submit" value="OK">
    </form>
</div>