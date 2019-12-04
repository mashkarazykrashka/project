<div>
    <form action="<?= $URL ?>" method="POST" class="form">
        <label>
            <input class="field"type="text" name="firm" placeholder="Поставщик">
        </label><br/>
        <input class="button" type="submit" value="Выбрать">
    </form>
</div>
<br/>
<?php

$paginationHTML = "<nav aria-label='Page navigation example'><ul class='pagination justify-content-center' ><li class='page-item' ><a class='page-link' href='" . $paginationLink . max($currentPage - 1, 1) . "&sort=$sortedFieldName'><<</a></li>";
for ($i = 1; $i <= $pageCount; $i++) {
    $paginationHTML .= '<li class="page-item ' . (($i == $currentPage) ? "active" : "") . '"><a class="page-link" id="number" href="' . $paginationLink . $i . "&sort=$sortedFieldName\">" . $i . '</a></li>';
}
$paginationHTML .= "<li class='page-item'><a class='page-link' href='" . $paginationLink . min($currentPage + 1, $pageCount) . "&sort=$sortedFieldName'>>></a></li></ul></nav>";

echo $paginationHTML;

echo "<div class='row justify-content-center'>";

echo "<table class='table table-hover'>";

echo "<tr>";

foreach ($tableHeaders as $fieldName => $th) {
    if ($fieldName != 'id') {
        echo "<th><a href='" . $paginationLink . $currentPage . "&sort=$fieldName'>".(empty($th) ? $fieldName : $th). "</a></th>";
    }
}
foreach ($table as $row) {
    echo "<tr>";
    foreach ($row as $key => $value) {
        if ($key != 'id') {
            echo "<td>$value</td>";
        }
    }
}
echo "</table>";
echo "</div>";
echo $paginationHTML;
