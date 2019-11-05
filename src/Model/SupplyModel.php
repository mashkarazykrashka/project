<?php

namespace App\Model;

use TexLab\MyDB\DbEntity;

class SupplyModel extends DbEntity
{

    public function getPage(?int $page = null): array
    {
        $this
            ->reset()
            ->setSelect("`supply`.`id`, `users`.`name` AS 'users_id', `recipt`.`nameRecipt` AS 'recipt_id', `goods`.`nameGoods` AS `goods_id`,`supply`.`quantity`")
            ->setFrom("`users`, `supply`, `goods`, `recipt`")
            ->setWhere("`users`.`id` = `supply`.`users_id` AND `recipt`.`id` = `supply`.`recipt_id` AND `goods`.`id` = `supply`.`goods_id`")
            ->setOrderBy("`supply`.`id`");
        return parent::getPage($page);
    }
}
