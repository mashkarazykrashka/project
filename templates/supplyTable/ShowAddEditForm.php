<div>
    <div class='container'>
        <div class='row justify-content-center'>
            <form action="<?= $URL ?>" method="POST" class="text-center border border-light p-3">
                <?php
                foreach ($columnsNames as $name) {
                    if ($name != 'id') {
                        if ($name == 'work_id') {

                            echo "<label>" . (empty($tableHeaders[$name]) ? $name : $tableHeaders[$name]);
                            echo "<br><select name='work_id'>";
                            foreach ($work as $id => $workName) {
                                echo "<option value='$id'>$workName</option>";
                            }

                            echo "</select></lable><br>";
                        } elseif ($name == 'recipt_id') {

                            echo "<label>" . (empty($tableHeaders[$name]) ? $name : $tableHeaders[$name]);
                            echo "<br><select name='recipt_id'>";
                            foreach ($recipt as $id => $reciptName) {
                                echo "<option value='$id'>$reciptName</option>";
                            }

                            echo "</select></lable><br>";
                        } elseif ($name == 'goods_id') {

                            echo "<label>" . (empty($tableHeaders[$name]) ? $name : $tableHeaders[$name]);
                            echo "<br><select name='goods_id'>";
                            foreach ($goods as $id => $goodsName) {
                                echo "<option value='$id'>$goodsName</option>";
                            }

                            echo "</select></lable><br>";
                        } else {
                            echo "<label>"
                                . (empty($tableHeaders[$name]) ? $name : $tableHeaders[$name])
                                . "<input class='form-control mb-4' type='text' name='"
                                . $name . "' value='"
                                . ($editValues[$name] ?? '') . "'></label><br>";
                        }
                    }
                }
                ?>
                <input class="btn btn-info my-4" type="submit" value="OK">
            </form>
        </div>
    </div>
</div>