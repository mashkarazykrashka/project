<?php

namespace App\Controller;

class SupplyController extends AbstractTableController
{
    protected $tableName = 'supply';
    protected $viewPatternsPath = 'templates/table/';
    protected $pageSize = 2;
}