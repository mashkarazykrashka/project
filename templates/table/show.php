<?php

$paginationHTML = "<nav aria-label='Page navigation example'><ul class='pagination justify-content-center' ><li class='page-item' ><a class='page-link' href='" . $paginationLink . max($currentPage - 1, 1) . "&sort=$sortedFieldName'><<</a></li>";
for ($i = 1; $i <= $pageCount; $i++) {
    $paginationHTML .= '<li class="page-item ' . (($i == $currentPage) ? "active" : "") . '"><a class="page-link " href="' . $paginationLink . $i ."&sort=$sortedFieldName\">" . $i . '</a></li>';
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
if ($isAdmin) {
    echo "<th colspan='2'></th></tr>";
}
foreach ($table as $row) {
    echo "<tr>";
    foreach ($row as $key => $value) {
        if ($key != 'id') {
            echo "<td>$value</td>";
        }
    }
    if ($isAdmin) {
        echo "<td><a href='$editLink" . $row['id'] . "' class='button_edit'>Редактировать</a></td>";
        echo "<td><a href='$delLink" . $row['id'] . "' class='button_del'>Удалить</a></td></tr>";
    }
}
echo "</table>";
echo "<a href='$addLink' class='button'>Добавить</a>";
echo "</div>";
echo $paginationHTML;
