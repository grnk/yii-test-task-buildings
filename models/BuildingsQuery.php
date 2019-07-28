<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Buildings]].
 *
 * @see Buildings
 */
class BuildingsQuery extends \yii\db\ActiveQuery
{

    /**
     * {@inheritdoc}
     * @return Buildings[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Buildings|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
