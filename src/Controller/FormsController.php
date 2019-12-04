<?php

namespace App\Controller;

use App\Model\FormsModel;
use TexLab\MyDB\DB;
use App\Core\Conf;
use TexLab\MyDB\DbEntity;


class FormsController extends AbstractTableController
{
    protected $tableName = 'supply';
    protected $viewPatternsPath = 'templates/forms/';
    protected $pageSize = 10;
    
    public function __construct()
    {
        parent::__construct();
        $this->table = new FormsModel($this->tableName, DB::Link(Conf::MYSQL));
    }



}