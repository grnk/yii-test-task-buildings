<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Query;
use yii\helpers\Url;

/**
 * This is the model class for table "buildings".
 *
 * @property int $id
 * @property string $url_detail_building Урл здания
 * @property int $metro Метро
 * @property int $number_of_floors Количество этажей
 * @property string $name Название здания
 * @property string $image Изображение
 * @property int $status Статус
 * @property int $order Сортировка
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Apartments[] $apartments
 */
class Buildings extends \yii\db\ActiveRecord
{
    const TYPE_APARTMENT_SALE = 'sale';
    const TYPE_APARTMENT_RENT = 'rent';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'buildings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['metro', 'number_of_floors', 'status', 'order'], 'integer'],
            [['created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['url_detail_building', 'name', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'url_detail_building' => Yii::t('app', 'Урл здания'),
            'metro' => Yii::t('app', 'Метро'),
            'number_of_floors' => Yii::t('app', 'Количество этажей'),
            'name' => Yii::t('app', 'Название здания'),
            'image' => Yii::t('app', 'Изображение'),
            'status' => Yii::t('app', 'Статус'),
            'order' => Yii::t('app', 'Сортировка'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return yii\db\ActiveQuery
     */
    public function getApartments()
    {
        return $this->hasMany(Apartments::className(), ['building_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return BuildingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BuildingsQuery(get_called_class());
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

    /**
     * Возвращает урл здания
     *
     * @return string
     */
    public function getDetailUrl()
    {
        if(!empty($this->url_detail_building)){
            return Url::to([
                '/buildings/detail',
                'url' => $this->url_detail_building,
            ]);
        }

        return '#';
    }

    /**
     * @return ApartmentsQuery
     */
    public function getQueryRentApartment()
    {
        return $this->getApartments()->rent();
    }

    /**
     * @return ApartmentsQuery
     */
    public function getQuerySaleApartment()
    {
        return $this->getApartments()->sale();
    }

    public function getSrcImage()
    {

        return '/images/' . $this->image;
    }
}
