<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
//use yii\widgets\GridView;
use yii\grid\GridView;
use yii\widgets\LinkPager;
//use app\assets\AppAsset;
//
//AppAsset::register($this);
//
//AppAsset::addCss($this,Yii::$app->request->baseUrl."/css/zst.css");

$this->registerCssFile('@web/css/zst.css' , ['depends' => 'app\assets\AppAsset']);
if (is_array($model['cs'])){
//    $html_bz='';
    $html_cs=array();
    $html_bz='';
    $html_bz_cs='<td colspan="2">标准次数</td>';
    $html_bz_jg='<td colspan="2">标准遗漏</td>';
    $html_dc_cs='<td colspan="2">当前次数</td>';
    $html_dc_jg='<td colspan="2">当前遗漏</td>';
    foreach ($model['bz'] as $a=>$b){

        $html_bz.='<td>'.$b.'</td>';
        if(!($b==='时间')&&!($b==='期号')){

            $html_bz_cs.='<td>'.$model['cs'][1][$a].'</td>';
            $html_dc_cs.='<td>'.$model['cs'][0][$a].'</td>';
            $html_bz_jg.='<td>'.$model['jg'][0][$a].'</td>';
            $html_dc_jg.='<td>'.$model['jg'][1][$a].'</td>';
            foreach ($model['cs'][2] as $c=>$d){
                isset($html_cs[$c])?
                    $html_cs[$c].='<td>'.$d[$a].'</td>'
                    :$html_cs[$c]='<td colspan="2">'.$c.'期出现次数</td>'.'<td>'.$d[$a].'</td>';
            }
        }

    }
}
?>

<table class="table  table-condensed">
    <tbody>
        <tr data-key="dcjg" class="r2"><?=$html_dc_jg?></tr>
        <tr data-key="bzjg" class="r2"><?=$html_bz_jg?></tr>
        <?php
            foreach ($html_cs as $b){
//                dd($b);
                echo('<tr class="r2">');
//                foreach ($b as $c=>$d){
//                    echo('<td>');
//                    echo($c);
//                    echo('</td>\n');
//                }
                echo($b);
                echo('</tr>');
            }
        ?>
        <tr data-key="dccs" class="r2"><?=$html_dc_cs?></tr>
        <tr data-key="bzcs" class="r2"><?=$html_bz_cs?></tr>
        <tr data-key="bz" class="r1"><?=$html_bz?></tr>
    </tbody>
</table>

<?php
//dd($model);
//dd(GridView::widget());

//dd($cols);
//
//echo GridView::widget([
//    'dataProvider' => $model,
//    'tableOptions' => ['class' => 'table table-striped table-bordered table-condensed'],
//    'showHeader'=>false,
////    'rowOptions' => function($model, $key, $index, $grid) {
////        //dd($model);
////        return ['class' => $model['期号']  =='' ? 'success' : 'warning'];
////    },
////    'columns' =>$cols,
////    'columns' =>[
//////        'headerOptions' => [
//////            //'width' => '10%'
//////            ],
////        'contentOptions' => [
////            'width'=>'10'
////        ],
////    ],
//
////    'columns' => function($model, $key, $index, $column) {
////        dd($column);
////        return [$column];
////    },
//
//   // 'layout' => "{items}",
//    //'summary'=>false,
//    //'headerRowOptions' => ['a'],
///*    'columns' => ['qihao','time_by',
//        [
//            'attribute' => 'dw',
//            'value' => function ($model, $key, $index, $column) {
//                return $model['dw'][0].'+'.$model['dw'][1].'+'.$model['dw'][2].'='.array_sum($model['dw']);
//            }
//        ],
//        [
//            'attribute' => 'hm',
//            'value' => function ($model, $key, $index, $column) {
//                return array_sum($model['dw']);
//            }
//        ],
//
//    ],*/
//]);
echo LinkPager::widget([
    'pagination' => $pages,
    'nextPageLabel' => '&rsaquo;',
    'prevPageLabel' => '&lsaquo;',
    'firstPageLabel' => '&laquo;',
    'lastPageLabel' => '&raquo;',
    'maxButtonCount' =>10,
]);
?>