<?php

namespace app\controllers;

use Yii;
use app\models\Caiji;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TimeController implements the CRUD actions for Caiji model.
 */
class TimeController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Caiji models.
     * @return mixed
     */
    public function actionIndex($t)
    {
//        dd($this->findModel($t));
        $model=$this->findModel($t);
        Yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
        $aa[]= $model->qihao;
        $aa[]= $model->interval_time-(time()-strtotime($model->time_by));
//        $model->load(Yii::$app->request->get(),'');
//

        return $aa;
    }


    /**
     * Finds the Caiji model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Caiji the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($t)
    {
        if (($model = Caiji::findOne(['type'=>$t])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
