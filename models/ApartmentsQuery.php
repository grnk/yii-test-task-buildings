<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Apartments]].
 *
 * @see Apartments
 */
class ApartmentsQuery extends \yii\db\ActiveQuery
{
    public function rent()
    {
        return $this->andWhere([
            'rent_sale' => Buildings::TYPE_APARTMENT_RENT,
        ]);
    }

    public function sale()
    {
        return $this->andWhere([
            'rent_sale' => Buildings::TYPE_APARTMENT_SALE,
        ]);
    }

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
