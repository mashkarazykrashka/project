<?php

namespace App\Controller;

class ReciptController extends AbstractTableController
{
    protected $tableName = 'recipt';
    protected $viewPatternsPath = 'templates/table/';
    protected $pageSize = 10;
}
