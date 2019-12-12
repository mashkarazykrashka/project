<div>
    <form action="<?= $URL ?>" method="POST" class="form">
        <?php
            foreach ($columnsNames as $name) {
                if ($name == 'signFirm') {
                    echo "<legend>"
                    .(empty($tableHeaders[$name]) ? $name : $tableHeaders[$name])
                    ."</legend>
                    <input type='radio' name='".$name."' value = '1' checked>Да<br>
                    <input type='radio' name='".$name."' value = '0'>Нет<br><br>";

                }

                elseif ($name != 'id') {
                    echo "<label>"
                    .(empty($tableHeaders[$name]) ? $name : $tableHeaders[$name])
                    ."<input class='field' type='text' name='"
                    .$name."' placeholder='"
                    .(empty($tableHeaders[$name]) ? $name : $tableHeaders[$name])."' value='"
                    .($editValues[$name] ?? '')."' required></label><br/>";
                }
                
            }
        ?>
        <input class="button" type="submit" value="OK">
    </form>
</div>