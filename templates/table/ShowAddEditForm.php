<div>
    <form action="<?= $URL ?>" method="POST" class="form">
        <?php
            foreach ($columnsNames as $name) {
                if ($name != 'id') {
                    echo "<label>"
                    .(empty($tableHeaders[$name]) ? $name : $tableHeaders[$name])
                    ."<input class='field' type='text' name='"
                    .$name."' placeholder='"
                    .$name."' value='"
                    .($editValues[$name] ?? '')."'></label><br/>";
                }
            }
        ?>
        <input class="button" type="submit" value="OK">
    </form>
</div>