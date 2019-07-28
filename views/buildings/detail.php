<?php
/* @var $this yii\web\View
 * @var $model app\models\Buildings
 */

use yii\bootstrap\Tabs;
use app\dictionaries\Metro;
use app\dictionaries\Status;
?>
<h1><?= $model->name ?></h1>

<div class="row">
    <div class="col-md-6">
        <img height="150px" src="<?= $model->srcImage ?>">
    </div>
    <div class="col-md-6">
        <div>Метро - <?= Metro::getItemValue($model->metro) ?></div>
        <div>Кол-во этажей - <?= $model->number_of_floors ?></div>
        <div>Статус - <?= Status::getItemValue($model->status) ?></div>
    </div>
</div>

<?php

echo Tabs::widget([
    'items' => [
        [
            'label' => 'Продажа',
            'content' => $this->render('_sale-list-view', [
                'model' => $model,
            ]),
            'active' => true
        ],
        [
            'label' => 'Аренда',
            'content' => $this->render('_rent-list-view', [
                'model' => $model,
            ]),
        ],
    ],
]);

