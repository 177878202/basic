<?php

namespace app\controllers;

use Yii;
use app\models\Button;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ButtonController implements the CRUD actions for Button model.
 */
class ButtonController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
//                'only' => ['logout', 'signup','index','update'],
                'rules' => [
                    [
                        'actions' => ['view','index','update','create','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Button models.
     * @return mixed
     */
    public function actionIndex($t=28)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Button::find()
                ->where(['uid' =>Yii::$app->user->getId(),'t'=>$t]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            't'=>$t,
        ]);
    }

    /**
     * Displays a single Button model.
     * @param integer $id
     * @return mixed
     */
/*    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }*/

    /**
     * Creates a new Button model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($t=28)
    {
        $model = new Button();
//dd(Yii::$app->request->post());
        $model->t=$t;
        if($t==36){
            $a=[0,1,2,3,4];
        }elseif($t==16){
            $a=[3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18];
        }elseif($t==11){
            $a=[2,3,4,5,6,7,8,9,10,11,12];
        }elseif($t==10){
            $a=[1,2,3,4,5,6,7,8,9,10];
        }elseif($t==22){
            $a=[6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27];
        }elseif($t==17){
            $a=[3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19];
        }else{
            $a=[0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27];
            $model->t=28;
        }
        $ba=["#FFFFFF","#FFFFCC","#FFFF99","#FFFF66","#FFFF33","#FFFF00","#FFCCFF","#FFCCCC","#FFCC99","#FFCC33","#FFCC00","#FF99CC","#FF9999","#FF9966","#FF9933","#FF9900","#FF6666","#FF6600","#FF33CC","#FF3399","#FF0033","#F00000","#CCFFFF","#CCFFCC","#CCFF99","#CCFF66","#CCFF00","#CCCCFF","#CCCCCC","#CCCC99","#CCCC66","#CCCC44","#CCCC33","#CCCC00","#CC99CC","#CC9999","#CC9966","#CC9933","#CC9900","#CC6699","#CC6666","#CC6633","#CC6600","#CC3399","#CC3366","#CC3333","#CC0066","#CC0033","#ABCDEF","#99CCFF","#99CCCC","#99CC99","#99CC66","#99CC33","#99CC00","#9999FF","#9999CC","#999999","#999966","#999933","#999900","#9966CC","#996699","#996666","#996633","#996600","#9933FF","#9933CC","#993399","#993366","#993333","#990066","#990033","#66CCFF","#66CCCC","#66CC99","#66CC66","#66CC00","#6699FF","#6699CC","#669999","#669966","#669933","#6666FF","#6666CC","#666699","#666666","#666633","#666600","#663399","#663366","#663333","#663300","#660099","#660066","#660033","#660000","#33CC99","#33CC33","#3399CC","#339999","#339966","#339933","#3366CC","#336699","#336666","#336633","#336600","#333399","#333366","#333333","#333300","#330033","#00CC00","#0099FF","#0099CC","#009999","#009966","#009933","#0066CC","#006699","#006633","#006600","#003399","#003366","#003333","#003300","#0000FF","#0000CC","#000066","#000000"];
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['index','t'=>$t]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'a' => $a,
                'ba' => $ba,
                't'=>$t,
            ]);
        }
    }

    /**
     * Updates an existing Button model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $t=$model->t;
        if($t==36){
            $a=[0,1,2,3,4];
        }elseif($t==16){
            $a=[3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18];
        }elseif($t==11){
            $a=[2,3,4,5,6,7,8,9,10,11,12];
        }elseif($t==10){
            $a=[1,2,3,4,5,6,7,8,9,10];
        }elseif($t==22){
            $a=[6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27];
        }elseif($t==17){
            $a=[3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19];
        }else{
            $a=[0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27];
            $model->t=28;
        }
        $model->a=json_decode($model->c,true);
        $ba=["#FFFFFF","#FFFFCC","#FFFF99","#FFFF66","#FFFF33","#FFFF00","#FFCCFF","#FFCCCC","#FFCC99","#FFCC33","#FFCC00","#FF99CC","#FF9999","#FF9966","#FF9933","#FF9900","#FF6666","#FF6600","#FF33CC","#FF3399","#FF0033","#F00000","#CCFFFF","#CCFFCC","#CCFF99","#CCFF66","#CCFF00","#CCCCFF","#CCCCCC","#CCCC99","#CCCC66","#CCCC44","#CCCC33","#CCCC00","#CC99CC","#CC9999","#CC9966","#CC9933","#CC9900","#CC6699","#CC6666","#CC6633","#CC6600","#CC3399","#CC3366","#CC3333","#CC0066","#CC0033","#ABCDEF","#99CCFF","#99CCCC","#99CC99","#99CC66","#99CC33","#99CC00","#9999FF","#9999CC","#999999","#999966","#999933","#999900","#9966CC","#996699","#996666","#996633","#996600","#9933FF","#9933CC","#993399","#993366","#993333","#990066","#990033","#66CCFF","#66CCCC","#66CC99","#66CC66","#66CC00","#6699FF","#6699CC","#669999","#669966","#669933","#6666FF","#6666CC","#666699","#666666","#666633","#666600","#663399","#663366","#663333","#663300","#660099","#660066","#660033","#660000","#33CC99","#33CC33","#3399CC","#339999","#339966","#339933","#3366CC","#336699","#336666","#336633","#336600","#333399","#333366","#333333","#333300","#330033","#00CC00","#0099FF","#0099CC","#009999","#009966","#009933","#0066CC","#006699","#006633","#006600","#003399","#003366","#003333","#003300","#0000FF","#0000CC","#000066","#000000"];
//        $model->load(Yii::$app->request->post());
//        dd($model->a);
//        $dd=array_flip(array_flip($ba));
//        arsort($dd);
//        dd(json_encode(array_values($dd)));

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index','t'=>$t]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'a' => $a,
                'ba' => $ba,
                't'=>$t,
            ]);
        }
    }

    /**
     * Deletes an existing Button model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Button model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Button the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Button::findOne(['id'=>$id,'uid'=>Yii::$app->user->getId()])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
