<?php

namespace App\Controller;

use App\Model\MolokoModel;
use App\Model\BellaktModel;
use App\Model\GmzModel;
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

        switch ($_POST['id']) {
            case '5':
                $this->table = new BellaktModel($this->tableName, DB::Link(Conf::MYSQL));
            break;
            
            case '6':
                $this->table = new MolokoModel($this->tableName, DB::Link(Conf::MYSQL));
            break;

            case '7':
                $this->table = new GmzModel($this->tableName, DB::Link(Conf::MYSQL));
            break;

        }

        $page = $_GET['page'] ?? 1;
        $sortedFieldName = $_GET['sort'] ?? 'id';

        $table = $this->table->setPageSize($this->pageSize);
        $table->setOrderBy($sortedFieldName);
        $sum = $this->table->getSumOfSales();
        $tableUsers = new DbEntity('user_group', DB::Link(Conf::MYSQL));

        $this->render("show", [
            'table' => $table->getPage($page),
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