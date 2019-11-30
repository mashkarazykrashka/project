<div>
    <div class='form'>
        <form action="<?= $URL ?>" method="POST">
            <?php
                foreach ($columnsNames as $name) {
                    if ($name != 'id') {
                        if ($name == 'users_id') {
                                echo "<label>" . (empty($tableHeaders[$name]) ? $name : $tableHeaders[$name]);
                                echo "<br><select class='field' name='users_id'>";

                            if ($isAdmin) {
                                foreach ($users as $id => $userName) {
                                    if ($userName !== '-'){                                    
                                    echo "<option value='$id'>$userName</option>";
                                }
                              }
                            }
                            else {
                                foreach ($users as $id => $userName) {
                                    if ($userName == $currentUserName){                                    
                                        echo "<option value='$id'>$userName</option>";
                                    }
                            }}
                            echo "</select></lable><br>";
                        } elseif ($name == 'recipt_id') {

                            echo "<label>" . (empty($tableHeaders[$name]) ? $name : $tableHeaders[$name]);
                            echo "<br><select class='field' name='recipt_id'>";
                            foreach ($recipt as $id => $reciptName) {
                                echo "<option value='$id'>$reciptName</option>";
                            }

                            echo "</select></lable><br>";
                        } elseif ($name == 'goods_id') {

                            echo "<label>" . (empty($tableHeaders[$name]) ? $name : $tableHeaders[$name]);
                            echo "<br><select class='field' name='goods_id'>";
                            foreach ($goods as $id => $goodsName) {
                                echo "<option value='$id'>$goodsName</option>";
                            }

                            echo "</select></lable><br>";
                        } else {
                            echo "<label>"
                                . (empty($tableHeaders[$name]) ? $name : $tableHeaders[$name])
                                . "<input class='field' type='number' name='"
                                . $name . "' value='"
                                . ($editValues[$name] ?? '') . "'></label><br>";
                        }
                    }
                }
                ?>
            <input class="button" type="submit" value="OK">
        </form>
    </div>
</div>
</div>