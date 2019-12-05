<?php

namespace App\Controller;

use App\Model\MolokoModel;
use TexLab\MyDB\DB;
use App\Core\Conf;
use TexLab\MyDB\DbEntity;
use App\Core\Dispatcher;


class MolokoController extends AbstractTableController
{
    protected $tableName = 'supply';
    protected $viewPatternsPath = 'templates/forms/';
    protected $pageSize = 10;
    
    public function __construct()
    {
        parent::__construct();
        $this->table = new MolokoModel($this->tableName, DB::Link(Conf::MYSQL));
    }

    public function actionShow()
    {

        $page = $_GET['page'] ?? 1;
        $sortedFieldName = $_GET['sort'] ?? 'id';

        $table = $this->table->setPageSize($this->pageSize);
        $table->setOrderBy($sortedFieldName);
        $sum = $this->table->getSumOfSales();


        $this->render("show", [
            'table' => $table->getPage($page),
            'pageCount' => $table->pageCount(),
            'editLink' => Dispatcher::dispatcher()->encodeUri($this->shortClassName() . "/showeditform", ['id' => '']),
            'addLink' => Dispatcher::dispatcher()->encodeUri($this->shortClassName() . "/showaddform"),
            'delLink' => Dispatcher::dispatcher()->encodeUri($this->shortClassName() . "/delete", ['id' => '']),
            'paginationLink' => Dispatcher::dispatcher()->encodeUri($this->shortClassName() . "/show", ['page' => '']),
            'sortedFieldName' => $sortedFieldName,
            'currentPage' => $page,
            'controllerName' => $this->shortClassName(),
            'tableHeaders' => $this->table->getColumnsComments(),
            'isAdmin' => ($_SESSION['user']['cod'] == "adm" ? true : false),
            'currentUserName' => $_SESSION['user']['name'],
            'sum' => $sum,
            'firm' => 'ООО "Молоко"',
        ]);
    }

}