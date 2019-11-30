<?php

namespace App\Controller;

use App\Model\SupplyModel;
use TexLab\MyDB\DB;
use App\Core\Conf;
use TexLab\MyDB\DbEntity;


class SupplyController extends AbstractTableController
{
    protected $tableName = 'supply';
    protected $viewPatternsPath = 'templates/supplyTable/';
    protected $pageSize = 10;


    public function __construct()
    {
        parent::__construct();
        $this->table = new SupplyModel($this->tableName, DB::Link(Conf::MYSQL));
    }

    public function actionShowEditForm()
    {
        $tableUsers = new DbEntity('users', DB::Link(Conf::MYSQL));
        $tableRecipt = new DbEntity('recipt', DB::Link(Conf::MYSQL));
        $tableGoods = new DbEntity('goods', DB::Link(Conf::MYSQL));
        // $supply = new DbEntity('supply', DB::Link(Conf::MYSQL));

        $this->view->setPatternsPath('templates/supplyTable/');

        $this->render("ShowAddEditForm", [
            'columnsNames' => $this->table->getColumnsNames(),
            'editValues' => $this->table->get(['id' => $_GET['id']])[0],
            // 'currentUserId' => $supply->get(['id' => $_GET['id']])[0]['users_id'],
            'URL' => '?t=' . $this->shortClassName() . '&a=Edit&id=' . $_GET['id'],
            'users' => $tableUsers->getColumn('name'),
            'recipt' => $tableRecipt->getColumn('nameRecipt'),
            'goods' => $tableGoods->getColumn('nameGoods'),
            'tableHeaders' => $this->table->getColumnsComments(),
            'currentUserName' =>$_SESSION['user']['name'],
            'isAdmin' => $_SESSION['user']['cod'] == "adm" ? true : false 
        ]);
    }

    public function actionShowAddForm()
    {
        $tableUsers = new DbEntity('users', DB::Link(Conf::MYSQL));
        $tableRecipt = new DbEntity('recipt', DB::Link(Conf::MYSQL));
        $tableGoods = new DbEntity('goods', DB::Link(Conf::MYSQL));


        $this->view->setPatternsPath('templates/supplyTable/');

        $this->render("ShowAddEditForm", [
            'columnsNames' => $this->table->getColumnsNames(),
            'URL' => '?t=' . $this->shortClassName() . '&a=Add',
            'users' => $tableUsers->getColumn('name'),
            'recipt' => $tableRecipt->getColumn('nameRecipt'),
            'goods' => $tableGoods->getColumn('nameGoods'),
            'tableHeaders' => $this->table->getColumnsComments(),
            'currentUserName' => $_SESSION[user][name],
            'isAdmin' => $_SESSION['user']['cod'] == "adm" ? true : false 

        ]);
    }
}
