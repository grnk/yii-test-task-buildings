<?php
/**
 * @var $this yii\web\View
 * @var $filterModel app\models\FilterForm
 *
 */

use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="row">
    <?= Html::beginForm(Url::to('/buildings/index'), 'get', []); ?>

    <?php
    // echo Html::activeDropDownList($filterModel, 'typeSort', $filterModel->getItemsSort(), [
        //'prompt' => 'Без сортировки',
        //'class' => 'form-control',
    //]);
    ?>

    <div class="col-md-4">
        <?= Html::activeRadioList($filterModel, 'status', $filterModel->getListStatus(), [
            'class' => 'form-control',
        ]); ?>
    </div>

    <div class="col-md-4">
        <?= Html::activeDropDownList($filterModel, 'numberOfFloors', $filterModel->getItemsNumberOfFloors(), [
            'prompt' => 'Количество этажей',
            'class' => 'form-control',
        ]); ?>
    </div>

    <div class="col-md-4">
        <?= Html::activeDropDownList($filterModel, 'metro', $filterModel->getItemsMetro(), [
            'prompt' => 'Метро',
            'class' => 'form-control',
        ]); ?>
    </div>

    <div class="col-md-4" style="margin-top: 6px;">
        <?= Html::submitInput('Найти', [
            'class' => 'btn btn-success',
        ]); ?>

        <?= Html::a('Отменить фильтрцию', ['/buildings/index'], [
            'class' => 'btn btn-info',
        ]); ?>
    </div>

    <?= Html::endForm(); ?>

</div>

