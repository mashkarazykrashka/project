        <div class='form'>
            <form action="<?= $URL ?>" method="POST" >
                <?php
                foreach ($columnsNames as $name) {
                    if ($name != 'id') {
                        if ($name == 'user_group_id') {

                            echo "<label>" . (empty($tableHeaders[$name]) ? $name : $tableHeaders[$name]);
                            echo "<br><select class='field' name='user_group_id'>";
                            foreach ($userGroup as $id => $groupName) {                                
                                echo "<option value='$id'>$groupName</option>";
                            }

                            echo "</select></lable><br>";
                        } else {
                            echo "<label>"
                                . (empty($tableHeaders[$name]) ? $name : $tableHeaders[$name])
                                . "<input class='field' type='text' name='"
                                . $name . "' value='"
                                . ($editValues[$name] ?? '') . "'></label><br>";
                        }
                    }
                }
                ?>
                <input class="button" type="submit" value="OK">
            </form>
        </div>
