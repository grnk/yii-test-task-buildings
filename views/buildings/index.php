<?php
/**
 * @var $this yii\web\View
 * @var $model app\models\Buildings
 * @var $filterModel app\models\FilterForm
 * @var $dataProvider yii\data\ActiveDataProvider
 *
 */

use yii\widgets\ListView; ?>
<h1>Здания</h1>

<?php
echo $this->render('_filter-form',[
    'filterModel' => $filterModel,
]);

echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_buildView',
    'layout' => "{summary}\n<div class='row'>{items}</div>\n<div class='row'>{pager}</div>"
]);

