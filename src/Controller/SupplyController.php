<?php

namespace App\Controller;

use App\Model\SupplyModel;
use TexLab\MyDB\DB;
use App\Core\Conf;
use TexLab\MyDB\DbEntity;


class SupplyController extends AbstractTableController
{
    protected $tableName = 'supply';
    protected $viewPatternsPath = 'templates/table/';
    protected $pageSize = 10;


    public function __construct()
    {
        parent::__construct();
        $this->table = new SupplyModel($this->tableName, DB::Link(Conf::MYSQL));
    }

    public function actionShowEditForm()
    {
        $tableWork = new DbEntity('work', DB::Link(Conf::MYSQL));
        $tableRecipt = new DbEntity('recipt', DB::Link(Conf::MYSQL));
        $tableGoods = new DbEntity('goods', DB::Link(Conf::MYSQL));

        $this->view->setPatternsPath('templates/supplyTable/');

        $this->render("ShowAddEditForm", [
            'columnsNames' => $this->table->getColumnsNames(),
            'editValues' => $this->table->get(['id' => $_GET['id']])[0],
            'URL' => '?t=' . $this->shortClassName() . '&a=Edit&id=' . $_GET['id'],
            'work' => $tableWork->getColumn('nameWork'),
            'recipt' => $tableRecipt->getColumn('nameRecipt'),
            'goods' => $tableGoods->getColumn('nameGoods'),
            'tableHeaders' => $this->table->getColumnsComments()
        ]);
    }

    public function actionShowAddForm()
    {
        $tableWork = new DbEntity('work', DB::Link(Conf::MYSQL));
        $tableRecipt = new DbEntity('recipt', DB::Link(Conf::MYSQL));
        $tableGoods = new DbEntity('goods', DB::Link(Conf::MYSQL));

        $this->view->setPatternsPath('templates/supplyTable/');

        $this->render("ShowAddEditForm", [
            'columnsNames' => $this->table->getColumnsNames(),
            'URL' => '?t=' . $this->shortClassName() . '&a=Add',
            'work' => $tableWork->getColumn('nameWork'),
            'recipt' => $tableRecipt->getColumn('nameRecipt'),
            'goods' => $tableGoods->getColumn('nameGoods'),
            'tableHeaders' => $this->table->getColumnsComments()
        ]);
    }
}
