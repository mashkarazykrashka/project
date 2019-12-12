<?php

namespace App\Controller;

use App\Model\FormsModel;
use TexLab\MyDB\DB;
use App\Core\Conf;
use TexLab\MyDB\DbEntity;
use App\Core\Dispatcher;


class FormsController extends AbstractTableController
{
    protected $tableName = 'supply';
    protected $viewPatternsPath = 'templates/forms/';
    protected $pageSize = 10;
    
    public function __construct()
    {
        parent::__construct();
    }

    public function actionChooseFirm()
    {
        $tableUsers = new DbEntity('user_group', DB::Link(Conf::MYSQL));

        $this->view->setPatternsPath('templates/forms/');

        $this->render("chooseFirm", [
            'columnsNames' => $this->table->getColumnsNames(),
            'URL' => '?t=' . $this->shortClassName() . '&a=Show',
            'users' => $tableUsers->getColumn('description'),
            'tableHeaders' => $this->table->getColumnsComments(),

        ]);
    }

    public function actionShow()
    {

        $this->table = new FormsModel($this->tableName, DB::Link(Conf::MYSQL));

        $page = $_GET['page'] ?? 1;
        $sortedFieldName = $_GET['sort'] ?? 'id';

        $table = $this->table->setPageSize($this->pageSize);
        $table->setOrderBy($sortedFieldName);
        $sum = $this->table->getSumOfSales($_POST['id']);
        $tableUsers = new DbEntity('user_group', DB::Link(Conf::MYSQL));

        $this->render("show", [
            'table' => $table->setWhere("`supply`.`goods_id` = `goods`.`id` AND `user_group_id` = ".$_POST['id'])->getPage($page),
            'pageCount' => $table->pageCount(),
            'paginationLink' => Dispatcher::dispatcher()->encodeUri($this->shortClassName() . "/show", ['page' => '']),
            'sortedFieldName' => $sortedFieldName,
            'currentPage' => $page,
            'controllerName' => $this->shortClassName(),
            'tableHeaders' => $this->table->getColumnsComments(),
            'sum' => $sum,
            'firm' => $tableUsers->getColumn('description')[$_POST['id']],
        ]);
    }

}