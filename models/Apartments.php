<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "apartments".
 *
 * @property int $id
 * @property int $building_id ИД здания
 * @property int $number_of_rooms Количество комнат
 * @property int $floor Этаж
 * @property string $price Цена
 * @property int $number_apartment Номер квартиры
 * @property int $status Статус
 * @property int $order Сортировка
 * @property string $rent_sale
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Buildings $building
 */
class Apartments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apartments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['building_id', 'number_of_rooms', 'floor', 'number_apartment', 'status', 'order'], 'integer'],
            [['price'], 'number'],
            [['rent_sale'], 'string'],
            [['created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['building_id'], 'exist', 'skipOnError' => true, 'targetClass' => Buildings::className(), 'targetAttribute' => ['building_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'building_id' => Yii::t('app', 'ИД здания'),
            'number_of_rooms' => Yii::t('app', 'Количество комнат'),
            'floor' => Yii::t('app', 'Этаж'),
            'price' => Yii::t('app', 'Цена'),
            'number_apartment' => Yii::t('app', 'Номер квартиры'),
            'status' => Yii::t('app', 'Статус'),
            'order' => Yii::t('app', 'Сортировка'),
            'rent_sale' => Yii::t('app', 'Rent Sale'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuilding()
    {
        return $this->hasOne(Buildings::className(), ['id' => 'building_id']);
    }

    /**
     * {@inheritdoc}
     * @return ApartmentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ApartmentsQuery(get_called_class());
    }

    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }
}
