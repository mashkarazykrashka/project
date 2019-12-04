<?php

namespace App\Model;

use TexLab\MyDB\DbEntity;

class FormsModel extends DbEntity
{

    public function getPage(?int $page = null): array
    {
        $this
        ->reset()
        ->setSelect("`goods_id`, `quantity`")
        ->setFrom("`supply`")
        ->setWhere("`users_id` = 2")
        ->setGroupBy("`goods_id`");
        return parent::getPage($page);
    }


}

