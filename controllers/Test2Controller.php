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
class Test2Controller extends Controller
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
    public function actionIndex()
    {
$e=0;
        for ($a=0;$a<=9;$a++){
            for ($b=$a+1;$b<=9;$b++){
                for ($c=$b+1;$c<=9;$c++){
                    for ($d=$c+1;$d<=9;$d++){
                        print_r($a.$b.$c.$d);
                        print_r("</br>");
                        $e++;
                    }
                }
            }
        }

        dd($e);
    }

}
