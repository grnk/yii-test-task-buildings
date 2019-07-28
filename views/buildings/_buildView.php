<?php
/**
 * @var $this yii\web\View
 * @var $model app\models\Buildings
 *
 */

use app\dictionaries\Metro;
use app\dictionaries\Status;

?>
<div class="col-md-4">
    <div class="panel panel-default">
            <div class="panel-heading"><?= $model->name ?></div>
            <div class="panel-body">
                <img height="150px" src="<?= $model->srcImage ?>">
                <div>
                    Количество этажей - <?= $model->number_of_floors ?>
                </div>
                <div>
                    Метро - <?= Metro::getItemValue($model->metro) ?>
                </div>
                <div>
                    Статус - <?= Status::getItemValue($model->status) ?>
                </div>
                <div>
                    <a href="<?= $model->getDetailUrl() ?>">Подробнее</a>
                </div>
            </div>

    </div>
</div>

