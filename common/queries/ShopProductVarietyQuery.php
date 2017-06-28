<?php

namespace common\queries;


use common\models\ar\ShopProductVariety;
use yii\db\ActiveQuery;

class ShopProductVarietyQuery extends ActiveQuery
{

    /***
     * @param bool $desc
     * @return static
     */
    public function priority($desc = FALSE)
    {
        return $this->orderBy([ShopProductVariety::tableName() . '.priority' => $desc ? SORT_DESC : SORT_ASC]);
    }

}