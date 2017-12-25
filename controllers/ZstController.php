<?php

namespace app\controllers;

use app\models\Button;
use app\models\Caiji;
use app\models\Algorithm;
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
class ZstController extends \yii\web\Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
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
    }
    /**
     * @inheritdoc
     */
    public function behaviors2()
    {
        return [
            [
                'class' => 'yii\filters\HttpCache',
                'only' => ['index'],
                'lastModified' => function ($action, $params) {
//            dd($action);
                    $q = new \yii\db\Query();
//                    dd($q->from('caiji')->select(['time_by'])->where(['=','type',Yii::$app->request->get('type')])->one());
                    $c=$q->from('caiji')->select(['time_by'])->where(['=','type',Yii::$app->request->get('type')])->one();
//                    dd($c['time_by']);
                    if($c){
                        return strtotime($c['time_by']);
                    }
                    return time();

                },
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actionView()
    {
        //dd(Yii::$app->request->get());
        //return $this->render('index');
//        Yii::$app->cache->set('aaa', 'aaa');
//       dd(Yii::$app->cache->get('aaa')) ;
        //Yii::$app->cache->delete($key);


        $model=new Zst;
//        dd($model->load(Yii::$app->request->get(),''));

//        $model->validate();
        if($model->load(Yii::$app->request->get(),'')&&$model->validate()&&$model->__init()){
//            $model->__init();
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }

//        $model->__init();

//        $dependency = new \yii\caching\DbDependency(['sql'=>'SELECT `qihao` FROM caiji where `type`="'.$model->type.'"']);
//        $dependency = new \yii\caching\ExpressionDependency(['expression'=>'\Yii::$app->request->get("id")']);
//        $cache=Yii::$app->cache;

//        $data = $cache->get('aaa');
////            $data = false;
//        if ($data === false) {
//
//            // $data 在缓存中没有找到，则重新计算它的值
////            $data=$model->getArray1();
//            // 将 $data 存放到缓存供下次使用
//            $data = 'bb777776b7b7b';
//
//            $cache->set('aaa',$data ,60,$dependency);
//        }
//
//        dd($data);
//        dd($model);
//        dd($model->algorithmarr['style']);
//        dd($model->getArray0());
//       dd( Yii::$app->cache->get('zst_'.$model->type.'_'.$model->algorithm.'_'.$model->list.'_'.$model->page));
//        dd('zst_'.$model->type.'_'.$model->algorithm.'_'.$model->list.'_'.$model->page);

        if (Yii::$app->request->isAjax) {
            // request is ajax request
//            return  Yii::$app->request->get('page');
            $cache=Yii::$app->cache;
//            $cache->flush();
            $dependency = new \yii\caching\DbDependency(['sql'=>'SELECT `qihao` FROM caiji where `type`="'.$model->type.'"']);
//            dd($dependency);
            // 尝试从缓存中取回 $data
            $data = $cache->get('zst_'.$model->type.'_'.$model->algorithm.'_'.$model->list.'_'.$model->page);
//            $data = false;
            if ($data === false) {

                // $data 在缓存中没有找到，则重新计算它的值
                $data=$model->getArray1();
                // 将 $data 存放到缓存供下次使用
                $cache->set('zst_'.$model->type.'_'.$model->algorithm.'_'.$model->list.'_'.$model->page, $data,60*60*24,$dependency);
            }
//            $data = $cache->getOrSet('zst_'.$model->type.'_'.$model->algorithm.'_'.$model->page, function ($model) {
//                return $model->getArray1();
//            });
            return \yii\helpers\Json::encode($data);
        }
//        $model->type=$type;
//        $model->algorithm=$algorithm;
//        $model->list=$list;

//        $model->__init();
//        dd($model->getArray1());
//        $data=$model->getArray1($model->getArray0());
//dd(array_keys($model->getArray0()));
//        $query = Hgkl8::find()
//            //->asArray()
// //           ->limit($model->list)
//            ->orderBy('qihao DESC');
//           // ->all();
////
        //$model->getArray0();
//        dd($model->toArray());
//        if($model->array0===null){
//            $model->getArray0();
////        }
//        $a=array_map(array($model,'getResult'), $model->getArray0());
//dd($a);
//        dd(array_count_values ( $a['result']));

        /*        $data=Hgkl8::find()
                    ->asArray()
                    ->orderBy('qihao DESC')
                    ->limit(100)
                    ->offset($model->page*100-100)
                    ->all();*/

//        $provider = new ActiveDataProvider([
//            'query' => $query,
//        $data=array_chunk($model->array2,100);
//        dd($model->getArray1());
//        $provider = new ArrayDataProvider([
//            'allModels' => $model->getArray2(),
//             'pagination' => [
//                 'pageSize' => 1000,
//                 'pageSizeParam' => false,
//                 //'validatePage' => false,
//                 //'route' => UrlManager::createUrl(['zst/index',$type]) ,
//              ],
//            /*            'sort' => [
//                            'attributes' => ['qihao','time_by'],
//                        ],*/
//        ]);
// 获取分页和排序数据
//        dd($provider->getModels());
//
// 在当前页获取数据项的数目
        //       dd($provider->getCount());

// 获取所有页面的数据项的总数
//        dd( $provider->getTotalCount());
//        $pages = new Pagination(['totalCount' =>count($model->array1), 'pageSize' => 100,'pageSizeParam'=>false]); //分页
//        //dd($model->getArray1($model->getArray0()));

//        dd(Button::getBtn0());
//        $btn=Button::find()
//            ->where(['or',['=','uid' ,'0']])
//            ->asArray()
//            ->select(['id','i','n','c'])
//            ->all();
////        $but=ArrayHelper::index($btn, 'i');
//
//        $button=Button::find()
//            ->where(['or',['=','uid' ,Yii::$app->user->getId()]])
//            ->asArray()
//            ->select(['id','i','n','c'])
//            ->all();
//
//        $but=ArrayHelper::index($button, 'i');
        $button=Button::getBtn0($model->algorithmarr['style']);
        if($model->tid){
            $title=Zstlink::findOne($model->tid);
//                    ->one();
//            if($title){
//                $title=$title->t;
//            }else{
//                $title=null;
//            }
        }else{
            $title=null;
        }
//dd($title);
//        dd(($_COOKIE['_display']));
        if(!isset($_COOKIE['_s_'.$model->algorithmarr['style']])){

            $but0=ArrayHelper::getColumn($button,0);
            foreach ($but0 as $k=>$v){
                $but0[$k]=intval($v);
            }
            setcookie("_s_".$model->algorithmarr['style'], json_encode( $but0), time()+3600*24*30,'/');
        }

//       dd( array_keys($button));
        return $this->render('json', [
            'model' => $model,
//            't'=>$model->algorithmarr['style'],
            'button'=>$button,
            'title'=>$title,

//            'button'=>array_merge($btn,$but),
//            'pages' => $pages,
//            'cols' => $model->cols,
        ]);
    }
    /**
     * @inheritdoc
     */
    public function actionLook()
    {

        $model=new Zst;

        if($model->load(Yii::$app->request->get(),'')&&$model->validate()&&$model->__init()){
//            $model->__init();
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }


        if (Yii::$app->request->isAjax) {
            $cache=Yii::$app->cache;
            $dependency = new \yii\caching\DbDependency(['sql'=>'SELECT `qihao` FROM caiji where `type`="'.$model->type.'"']);
//            dd($dependency);
            // 尝试从缓存中取回 $data
            $data = $cache->get('zst_'.$model->type.'_'.$model->algorithm.'_'.$model->list.'_'.$model->page);
//            $data = false;
            if ($data === false) {

                // $data 在缓存中没有找到，则重新计算它的值
                $data=$model->getArray1();
                // 将 $data 存放到缓存供下次使用
                $cache->set('zst_'.$model->type.'_'.$model->algorithm.'_'.$model->list.'_'.$model->page, $data,60*60*24,$dependency);
            }
            return \yii\helpers\Json::encode($data);
        }

        $button=Button::getBtn0($model->algorithmarr['style']);

        if($model->tid){
            $title=Zstlink::findOne($model->tid);
        }else{
            $title=null;
        }
        if(!isset($_COOKIE['_s_'.$model->algorithmarr['style']])){

            $but0=ArrayHelper::getColumn($button,0);
            foreach ($but0 as $k=>$v){
                $but0[$k]=intval($v);
            }
            setcookie("_s_".$model->algorithmarr['style'], json_encode( $but0), time()+3600*24*30,'/');
        }

        return $this->render('look', [
            'model' => $model,
//            't'=>$model->algorithmarr['style'],
            'button'=>$button,
            'title'=>$title,

        ]);
    }

    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        $model=Zstlink::find()
            ->where(['or',['uid' =>[Yii::$app->user->getId(),0]]])
            ->asArray()
            ->orderBy('id')
            ->all();


        return $this->render('index', [
            'model' => $model
        ]);
    }
    /**
     * @inheritdoc
     */
    public function actionView2()
    {
        $model=Zstlink::find()
            ->where(['or',['uid' =>[Yii::$app->user->getId(),0]]])
            ->asArray()
            ->all();


        return $this->render('index', [
            'model' => $model
        ]);
    }
    /**
     * @inheritdoc
     */
    public function actionMore()
    {
        if(Yii::$app->request->get('type')){
            if(!Yii::$app->request->get('algorithm')){
                $t=Caiji::find()->where(['type'=>Yii::$app->request->get('type') ])->one();

                if($t){
                    $dataProvider = new ActiveDataProvider([
                        'query' => Algorithm::find()->where(['type'=>$t->t])
                    ]);

                    return $this->render('algorithm', [
                        'dataProvider' => $dataProvider,
                        'type'=>$t
                    ]);
                }

                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Caiji::find()
                ->where(['switch'=>0])
        ]);

        return $this->render('type', [
            'dataProvider' => $dataProvider,
        ]);



    }
    /**
     * @inheritdoc
     */
    public function actionAddlink()
    {
//        dd(Yii::$app->request->get('tid'));
        $model=Zstlink::findOne(Yii::$app->request->get('tid'));
//        dd($model);

        if ($model) {


            $model->load(Yii::$app->request->get(),'');
            $model->load(Yii::$app->request->post(),'');
//            dd($model);

            if ($model->title) {
//                dd($model->validate());
//                return $this->goBack();
//                dd($model);
//                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
//                Yii::$app->session->setFlash('success', '添加收藏成功！');

                if($model->uid===Yii::$app->user->getId()){
//                    $model->delete();
                    $model->save();
                    Yii::$app->session->setFlash('success', '修改收藏标题成功！如需删除，请提交空白的标题！');
                }else{
                    $model=new Zstlink;
                    $model->load(Yii::$app->request->get(),'');
                    $model->load(Yii::$app->request->post(),'');
                    if($model->validate()&$model->save()){
                        Yii::$app->session->setFlash('success', '复制收藏成功！');
                    }

                }

            }else{
                if($model->uid===Yii::$app->user->getId()){
                    $model->delete();
                    Yii::$app->session->setFlash('success', '删除收藏成功！');
                }else{
                    Yii::$app->session->setFlash('error', '删除收藏失败，该收藏不是你的！');
                }


            }
//            return $this->goBack();
        } else {

            $model=new Zstlink;

//            $model->load(Yii::$app->request->post(),'');
            $model->load(Yii::$app->request->get(),'');
            $model->load(Yii::$app->request->post(),'');
//            dd($model);

            if ($model->title&&$model->validate()&$model->save()) {
//                dd($model->validate());
//                return $this->goBack();
//                dd($model);
//                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
                Yii::$app->session->setFlash('success', '添加收藏成功！');

            }
        }

        return $this->redirect(['index']);

    }

}
