<?php
/**
 * @var $this yii\web\View
 * @var $model app\models\Apartments
 *
 */
?>
<div class="row" style="border: 1px solid #0f0f0f">
    <div class="col-md-2">Номер квартиры - <?= $model->number_apartment ?></div>
    <div class="col-md-2">Этаж - <?= $model->floor ?></div>
    <div class="col-md-2">Кол-во комнат - <?= $model->number_of_rooms ?></div>
    <div class="col-md-2">Цена - <?= $model->price ?></div>
    <div class="col-md-2"> <button class="btn btn-info">Заказать</button> </div>

</div>
