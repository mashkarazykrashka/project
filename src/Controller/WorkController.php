<?php

namespace App\Controller;

class WorkController extends AbstractTableController
{
    protected $tableName = 'work';
    protected $viewPatternsPath = 'templates/table/';
    protected $pageSize = 2;
}