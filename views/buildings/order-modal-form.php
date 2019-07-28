<?php

/**
 * @var $this yii\web\View
 * @var $apartments app\models\Apartments
*/

use yii\helpers\Html;
use yii\helpers\Url;
use app\dictionaries\Metro;

?>

<div class="">
    <p><?= 'Этаж - ' . $apartments->floor ?></p>
    <p><?= 'Кол-во комнат - ' . $apartments->number_of_rooms ?></p>
    <p><?= 'Цена - ' . $apartments->price ?> руб.</p>
    <p><?= 'Здание - ' . $apartments->building->name ?></p>
    <p><?= 'Метро - ' . Metro::getItemValue($apartments->building->metro) ?></p>
    <?= Html::beginForm(Url::to('#'), 'post', []); ?>

    <div class="form-group">
        <?= Html::input('fio', 'fio', '', [
            'placeholder' => 'ФИО',
            'class' => 'form-control',
        ]); ?>
    </div>
    <div class="form-group">
        <?= Html::textInput('phone', '', [
            'placeholder' => 'Телефон',
            'class' => 'form-control',
        ]); ?>
    </div>
    <div class="form-group">
        <?= Html::textInput('email', '', [
            'placeholder' => 'Емейл',
            'class' => 'form-control',
        ]); ?>
    </div>
    <div class="form-group">
        <?= Html::submitInput('Заказать', [
            'class' => 'btn btn-success',
        ]); ?>
    </div>

    <?= Html::endForm(); ?>
</div>
