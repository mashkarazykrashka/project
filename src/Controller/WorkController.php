<?php

namespace App\Controller;

class WorkController extends AbstractTableController
{
    protected $tableName = 'work';
    protected $viewPatternsPath = 'templates/table/';
    protected $pageSize = 5;

    public function actionShowEditForm()
    {
        $this->view->setPatternsPath('templates/workTable/');
    }
}
