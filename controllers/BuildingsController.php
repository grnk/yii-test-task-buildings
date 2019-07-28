<?php

namespace app\controllers;

use app\models\Buildings;
use app\models\FilterForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class BuildingsController extends \yii\web\Controller
{
    /**
     * @return string
     *
     */
    public function actionIndex()
    {

        $filterModel = new FilterForm();

        $dataProvider = $filterModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'filterModel' => $filterModel,
        ]);
    }

    /**
     * @param int $id
     * @param string $url
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionDetail($url)
    {
        $model = $this->findModelByUrl($url);

        return $this->render('detail', [
            'model' => $model,
        ]);
    }


    /**
     * Finds the Buildings model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Buildings the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Buildings::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * @param string $url
     * @return Buildings|null
     * @throws NotFoundHttpException
     */
    protected function findModelByUrl($url)
    {
        $model = Buildings::find()->andWhere(['url_detail_building' => $url])->one();
        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

}
