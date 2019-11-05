<?php

namespace App\Controller;

class GoodsController extends AbstractTableController
{
    protected $tableName = 'goods';
    protected $viewPatternsPath = 'templates/table/';
    protected $pageSize = 10;
}