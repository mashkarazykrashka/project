<?php

$paginationHTML = "<nav aria-label='Page navigation example'><ul class='pagination justify-content-center' ><li class='page-item' ><a class='page-link' style='color: #845ec2' href='" . $paginationLink . max($currentPage - 1, 1) . "'><<</a></li>";
for ($i = 1; $i <= $pageCount; $i++) {
    $paginationHTML .= '<li class="page-item ' . (($i == $currentPage) ? "active" : "") . '"><a class="page-link " style="background-color: #845ec2; border-color:#845ec2" href="' . $paginationLink . $i . '">' . $i . '</a></li>';
}
$paginationHTML .= "<li class='page-item'><a class='page-link' style='color: #845ec2' href='" . $paginationLink . min($currentPage + 1, $pageCount) . "'>>></a></li></ul></nav>";

echo $paginationHTML;

echo "<div class='row justify-content-center'>";

echo "<table class='tab'>";

echo "<tr>";
foreach ($tableHeaders as $fieldName => $th) {
    if ($fieldName != 'id') {
        echo "<th>" . (empty($th) ? $fieldName : $th) . "<a href='*" . $th . "'>▼</a></th>";
    }
}
echo "<th colspan='2'></th></tr>";

foreach ($table as $row) {
    echo "<tr>";
    foreach ($row as $key => $value) {
        if ($key != 'id') {
            echo "<td>$value</td>";
        }
    }
    foreach ($row as $key => $value) {
        if ($key == 'users_id' AND ($currentUserName == $value || $isAdmin)) {
            echo "<td><a href='$editLink" . $row['id'] . "'  class='button_edit'>Edit</a></td>";
            echo "<td><a href='$delLink" . $row['id'] . "' class='button_del'>Delete</a></td></tr>";
        }
    }
}
echo "</table>";
echo "<a href='$addLink' class='button'>Add new</a>";
echo "</div>";
echo $paginationHTML;

