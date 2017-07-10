<?php

namespace common\queries;
use common\models\ar\Partner;

/**
 * This is the ActiveQuery class for [[\common\models\ar\Partner]].
 *
 * @see \common\models\ar\Partner
 */
class PartnerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ar\Partner[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ar\Partner|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /***
     * @param bool $asc
     * @return static
     */
    public function priority($asc = FALSE)
    {
        return $this->orderBy([Partner::tableName() . '.priority' => $asc ? SORT_ASC : SORT_DESC]);
    }
}
