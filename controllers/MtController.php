<?php

namespace app\controllers;

use app\models\Button;
use app\models\Caiji;
use app\models\Algorithm;
use app\models\Gametype;
use app\models\Plan;
use app\models\Zst;
use yii\data\ArrayDataProvider;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\UrlManager;
use YII;
use app\models\Hgkl8;
use app\models\Zstlink;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

/**
 * @inheritdoc
 */
class MtController extends \yii\web\Controller
{

    /**
     * @inheritdoc
     */
/*    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['addlink'],
                'rules' => [
                    [
                        'actions' => ['addlink'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }*/



    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        $model=Gametype::find()
//            ->where(['or',['uid' =>[Yii::$app->user->getId(),0]]])
            ->asArray()
//            ->orderBy('id')
            ->all();

        $dataProvider = new ActiveDataProvider([
            'query' => Plan::find()
                ->where(['h' =>0]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);

    }

    /**
     * @inheritdoc
     */
    public function actionList($t)
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Plan::find()
                ->where(['and',['t' =>$t,'uid'=>Yii::$app->user->getId()]]),
        ]);

        return $this->render('list', [
            'dataProvider' => $dataProvider,
            't' => $t
        ]);

    }

    /**
     * Creates a new Button model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($t=28)
    {
        $model = new Plan();

        if ($model->load(Yii::$app->request->post()) && $model->save() &&0===1) {
            return $this->redirect(['list','t'=>$t]);
        } else {
            return $this->render('create', [
                'model' => $model,
//                'a' => $a,
                't'=>$t,
            ]);
        }
    }
    /**
     * @inheritdoc
     */
    public function actionOption()
    {
        $dId=Yii::$app->request->get('dId');

//        dd($dId);
        $t=Yii::$app->request->get('t');

        $dId=Caiji::findOne($dId);

        $dId&&
        $model=Algorithm::find()
            ->where(['and',['type'=>$dId->t,'style'=>$t]])
            ->select(['name','id'])
            ->indexBy('id')
            ->column();

        if( $dId&&$model){
            $_tmp = '';
            foreach ($model as $key => $val) {
                $_tmp .= "<option value='" . $key . "'>{$val}</option>";
            }
            return  $_tmp;
        }
        return '<option value>选择的数据没有'.$t.'算法</option>';

    }

}
