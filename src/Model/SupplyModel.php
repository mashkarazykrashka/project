<?php

namespace App\Model;

use TexLab\MyDB\DbEntity;

class SupplyModel extends DbEntity
{

    public function getPage(?int $page = null): array
    {
        $this
            ->setSelect("`supply`.`id`, `user_group`.`description` AS 'user_group_id', `recipt`.`nameRecipt` AS 'recipt_id', `goods`.`nameGoods` AS `goods_id`,`supply`.`quantity`")
            ->setFrom("`user_group`, `supply`, `goods`, `recipt`")
            ->setWhere("`user_group`.`id` = `supply`.`user_group_id` AND `recipt`.`id` = `supply`.`recipt_id` AND `goods`.`id` = `supply`.`goods_id`");
        return parent::getPage($page);
    }
}
