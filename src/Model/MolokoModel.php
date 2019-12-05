<?php

namespace App\Model;

use TexLab\MyDB\DbEntity;

class MolokoModel extends DbEntity
{

    public function getPage(?int $page = null): array
    {
        $this
        ->reset()
        ->setSelect("`goods`.`nameGoods`, SUM(`quantity`) AS 'SUM'")
        ->setFrom("`supply`, `goods`")
        ->setWhere("`supply`.`goods_id` = `goods`.`id` AND `users_id` = 5")
        ->setGroupBy("`goods`.`nameGoods`");
        return parent::getPage($page);
    }

    public function getSumOfSales()
    {
        return $this->reset()->runSQL("SELECT SUM(`quantity`) AS 'SUM' FROM `supply` WHERE `users_id` = 5")[0]['SUM'];
    }

    // public function pageCount()
    // {
    //     return $this->reset()->runSQL("SELECT COUNT(*) FROM (SELECT `goods`.`nameGoods`, SUM(`quantity`) AS 'SUM' FROM `supply`, `goods` WHERE `supply`.`goods_id` = `goods`.`id` AND `users_id` = 2 GROUP BY `goods`.`nameGoods`) AS T1")[0]['COUNT'];
    // }

}

