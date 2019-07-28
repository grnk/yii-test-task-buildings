<?php
/* @var $this yii\web\View
 * @var $model app\models\Buildings
 */

use yii\widgets\ListView;

echo ListView::widget([
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getQueryRentApartment(),
    ]),
    'itemView' => '_detailView',
]);


