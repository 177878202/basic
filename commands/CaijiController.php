<?php
namespace app\commands;

use yii\console\Controller;
use app\models\Cmdcaiji;


class CaijiController extends Controller
{
  

    public function actionIndex()
    {
		print( "Please enter the type to be collected!" );
		return 0;
		
    }
    public function actionHgkl8()
    {
		
			$caiji=new Cmdcaiji();
			$caiji->type='hgkl8';
			$caiji->sequence();
			return 0;

    }
    public function actionJndkl8()
    {
		
			$caiji=new Cmdcaiji();
			$caiji->type='jndkl8';
			//print("\n\r");
			$caiji->sequence();
			return 0;

    }
    public function actionBjkl8()
    {
		
			$caiji=new Cmdcaiji();
			$caiji->type='bjkl8';
			//print("\n\r");
			$caiji->sequence();
			return 0;

    }
    public function actionBjpk10()
    {
		
			$caiji=new Cmdcaiji();
			$caiji->type='bjpk10';
			//$caiji->show='bjpk10';
			//print("\n\r");
			$caiji->sequence();
			return 0;

    }


}
