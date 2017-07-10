<?php

namespace common\queries;

/**
 * This is the ActiveQuery class for [[\common\models\ar\Country]].
 *
 * @see \common\models\ar\Country
 */
class CountryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ar\Country[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ar\Country|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
