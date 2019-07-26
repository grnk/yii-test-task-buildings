<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Apartments]].
 *
 * @see Apartments
 */
class ApartmentsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Apartments[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Apartments|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
