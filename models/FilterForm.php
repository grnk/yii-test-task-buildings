<?php

namespace app\models;

use app\dictionaries\Metro;
use app\dictionaries\NumberOfFloors;
use app\models\Buildings;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class FilterForm extends Model
{
    public $typeSort;
    public $status = 'null';
    public $metro;
    public $numberOfFloors;

    public function rules()
    {
        return [
            [['typeSort', 'metro'], 'string'],
            [['numberOfFloors'], 'integer'],
            [['status'], 'safe'],

        ];
    }

    public function getItemsSort()
    {
        return [
            SORT_ASC => 'По возрастанию',
            SORT_DESC => 'По убыванию',
        ];
    }

    public function getListStatus()
    {

        return [
            'null' => 'Все',
            1 => 'Достроенные',
            0 => 'Недостроенные',
        ];
    }

    public function getItemsNumberOfFloors()
    {
        $mapFloor = NumberOfFloors::getItemsForList(3, 20);

        return $mapFloor;
    }

    public function getItemsMetro()
    {
        $mapMetro = Metro::$items;

        return $mapMetro;
    }

    public function search($params)
    {
        $this->load($params);

        $query = Buildings::find();
        if (!empty($this->typeSort)) {
            $query->orderBy(['order' => (int)$this->typeSort]);
        }


        if ($this->status !== 'null') {
            $query->andWhere(['status' => $this->status]);
        }

        $query->andFilterWhere(['metro' => $this->metro]);
        $query->andFilterWhere(['number_of_floors' => $this->numberOfFloors]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 9,
            ],
        ]);

        return $dataProvider;
    }

}