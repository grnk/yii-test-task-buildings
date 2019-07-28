<?php
/**
 * @var $this yii\web\View
 * @var $model app\models\Apartments
 *
 */

use yii\bootstrap\Modal;
?>


<div class="row" style="border: 1px solid #0f0f0f">
    <div class="col-md-2">Номер квартиры - <?= $model->number_apartment ?></div>
    <div class="col-md-2">Этаж - <?= $model->floor ?></div>
    <div class="col-md-2">Кол-во комнат - <?= $model->number_of_rooms ?></div>
    <div class="col-md-2">Цена - <?= $model->price ?></div>
    <div class="col-md-2">
        <?php
        Modal::begin([
            'header' => "<h2>Квартира номер $model->number_apartment <h2>",
            'toggleButton' => ['label' => 'Заказать', 'class' => 'btn btn-info'],
        ]);
        echo $this->render('order-modal-form', [
            'apartments' => $model,
        ]);
        Modal::end();
        ?>
    </div>

</div>
