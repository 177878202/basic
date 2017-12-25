<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Bjkl8;
use app\models\Bjpk10;
use app\models\Jndkl8;
use app\models\Hgkl8;
use app\models\Caiji;
//use app\models\Lottery;

class Cmdcaiji extends Model
{
    public $url_arr;//采集网址
	public $preg_arr;//正则
	public $time_arr;//网址时间补差
	public $source_str;//采集到的源码
	public $source_arr;//源码处理后的数组
	public $do_arr;//数组处理缓存后得到的入库数据
	public $type;//开奖类型
	public $interval_time;//开奖类型间隔时间
	public $show;//是否显示信息
	
	
	public function sequence()
	{
		/* 判断要采集的类型进行设置网址... */
		switch ($this->type)
		{
			case 'hgkl8':
				
				if(date("H",time()-60)==5||date("H",time()+20)==6){if(isset($this->show)){echo"Time off!\n\r";return false;}}//检测时间，如果未达到采集时间则退出
				/* 设置采集网址，正则，还有时间 */
				$this->url_arr=[
					'http://lb.game.8zx118.com/KenoApi.ashx?d=16C9C71935720@7&'.time(),
					'http://lbkeno.18luck.mobi/KenoApi.ashx?d=16727E1946834@7&'.time(),
					'http://lbkeno.jxf158.net/KenoApi.ashx?d=1695762010474@7&'.time(),
				]; 			
				$preg_s='/7\^(?<qh>[^^]*)\^(?<rq>[^^]*)\^(?<n1>\d{1,2})\$(?<n2>\d{1,2})\$(?<n3>\d{1,2})\$(?<n4>\d{1,2})\$(?<n5>\d{1,2})\$(?<n6>\d{1,2})\$(?<n7>\d{1,2})\$(?<n8>\d{1,2})\$(?<n9>\d{1,2})\$(?<n10>\d{1,2})\$(?<n11>\d{1,2})\$(?<n12>\d{1,2})\$(?<n13>\d{1,2})\$(?<n14>\d{1,2})\$(?<n15>\d{1,2})\$(?<n16>\d{1,2})\$(?<n17>\d{1,2})\$(?<n18>\d{1,2})\$(?<n19>\d{1,2})\$(?<n20>\d{1,2})\^/';			
				$this->preg_arr=[$preg_s,$preg_s,$preg_s,]; 
				$this->time_arr=[-3510,	-3510,	-3510,]; 			
				$this->interval_time= (int)90;
				
				
				
				
				break;
			case 'jndkl8':
			
			
				if(date("H",time()-220)==18||date("H",time()+220)==20){if(isset($this->show)){echo"Time off!\n\r";return false;}}//检测时间，如果未达到采集时间则退出
				/* 设置采集网址，正则，还有时间 */
				$this->url_arr=[
					'http://lb.game.8zx118.com/KenoApi.ashx?d=16C9C71935720@2',
					'http://lbkeno.18luck.mobi/KenoApi.ashx?d=16727E1946834@2',
					'http://lbkeno.jxf158.net/KenoApi.ashx?d=1695762010474@2',
					'http://keno.89cmp.com/KenoApi.ashx?d=1639392010306@2',
					'http://client.iw356.com/KenoApi.ashx?d=16C9C71935720@2',
                    'http://vv28.cc/caiji2/test_jnd3.php'
				]; 			
				$preg_s='/2\^(?<qh>[^^]*)\^(?<rq>[^^]*)\^(?<n1>\d{1,2})\$(?<n2>\d{1,2})\$(?<n3>\d{1,2})\$(?<n4>\d{1,2})\$(?<n5>\d{1,2})\$(?<n6>\d{1,2})\$(?<n7>\d{1,2})\$(?<n8>\d{1,2})\$(?<n9>\d{1,2})\$(?<n10>\d{1,2})\$(?<n11>\d{1,2})\$(?<n12>\d{1,2})\$(?<n13>\d{1,2})\$(?<n14>\d{1,2})\$(?<n15>\d{1,2})\$(?<n16>\d{1,2})\$(?<n17>\d{1,2})\$(?<n18>\d{1,2})\$(?<n19>\d{1,2})\$(?<n20>\d{1,2})\^/';
				$this->preg_arr=[
					$preg_s,$preg_s,$preg_s,$preg_s,$preg_s,
                    '/{\"time\":\"(?<rq>[^"]*)\",\"qihao\":(?<qh>[^,]*),\"hm\":\[(?<n1>[^,]*),(?<n2>[^,]*),(?<n3>[^,]*),(?<n4>[^,]*),(?<n5>[^,]*),(?<n6>[^,]*),(?<n7>[^,]*),(?<n8>[^,]*),(?<n9>[^,]*),(?<n10>[^,]*),(?<n11>[^,]*),(?<n12>[^,]*),(?<n13>[^,]*),(?<n14>[^,]*),(?<n15>[^,]*),(?<n16>[^,]*),(?<n17>[^,]*),(?<n18>[^,]*),(?<n19>[^,]*),(?<n20>[^,]*)\]\}/'
				]; 
				$this->time_arr=[
					(15*60*60)+210,
					(15*60*60)+210,
					(15*60*60)+210,
					(15*60*60)+210,
					(15*60*60)+210,
                    (15*60*60)
				]; 			
				$this->interval_time= (int)210;
				
				break;
			case 'bjkl8':
				if(date("H",time()-60)<9){if(isset($this->show)){echo"Time off!\n\r";return false;}}//检测时间，如果未达到采集时间则退出
				/* 设置采集网址，正则，还有时间 */
				$this->url_arr=[
					'http://lb.game.8zx118.com/KenoApi.ashx?d=16C9C71935720@1',
					'http://lbkeno.18luck.mobi/KenoApi.ashx?d=16727E1946834@1',
					'http://lbkeno.jxf158.net/KenoApi.ashx?d=1695762010474@1',
					'http://keno.89cmp.com/KenoApi.ashx?d=1639392010306@1',
					'http://client.iw356.com/KenoApi.ashx?d=16C9C71935720@1',
					'http://www.bwlc.net/bulletin/keno.html'
				]; 			
				$preg_s='/1\^(?<qh>[^^]*)\^(?<rq>[^^]*)\^(?<n1>\d{1,2})\$(?<n2>\d{1,2})\$(?<n3>\d{1,2})\$(?<n4>\d{1,2})\$(?<n5>\d{1,2})\$(?<n6>\d{1,2})\$(?<n7>\d{1,2})\$(?<n8>\d{1,2})\$(?<n9>\d{1,2})\$(?<n10>\d{1,2})\$(?<n11>\d{1,2})\$(?<n12>\d{1,2})\$(?<n13>\d{1,2})\$(?<n14>\d{1,2})\$(?<n15>\d{1,2})\$(?<n16>\d{1,2})\$(?<n17>\d{1,2})\$(?<n18>\d{1,2})\$(?<n19>\d{1,2})\$(?<n20>\d{1,2})\^/';
				$this->preg_arr=[
					$preg_s,$preg_s,$preg_s,$preg_s,$preg_s,'/<tr[^>]*>\s*<td>(?<qh>\d{6,8})\s*<\/td>\s*<td>\s*(?<n1>\d{2}),(?<n2>\d{2}),(?<n3>\d{2}),(?<n4>\d{2}),(?<n5>\d{2}),(?<n6>\d{2}),(?<n7>\d{2}),(?<n8>\d{2}),(?<n9>\d{2}),(?<n10>\d{2}),(?<n11>\d{2}),(?<n12>\d{2}),(?<n13>\d{2}),(?<n14>\d{2}),(?<n15>\d{2}),(?<n16>\d{2}),(?<n17>\d{2}),(?<n18>\d{2}),(?<n19>\d{2}),(?<n20>\d{2})<\/td>\s*<td>[^<]*<\/td>\s*<td>(?<rq>[^<]*)<\/td>/'		
				]; 
				$this->time_arr=[300,300,300,300,300,0]; 			
				$this->interval_time= (int)300;
				break;
			case 'bjpk10':
				if(date("H",time()-60)<9){if(isset($this->show)){echo"Time off!\n\r";return false;}}//检测时间，如果未达到采集时间则退出
				/* 设置采集网址，正则，还有时间 */
				$this->url_arr=['http://www.bwlc.gov.cn/bulletin/trax.html','http://www.bwlc.net/bulletin/trax.html']; 			
				$preg_s='/<tr\s*class="[^>]*>\s*<td>(?<qh>[^<]*)<\/td>\s*<td>(?<n1>\d{1,2}),(?<n2>\d{1,2}),(?<n3>\d{1,2}),(?<n4>\d{1,2}),(?<n5>\d{1,2}),(?<n6>\d{1,2}),(?<n7>\d{1,2}),(?<n8>\d{1,2}),(?<n9>\d{1,2}),(?<n10>\d{1,2})<\/td>\s*<td>(?<rq>[^<]*)<\/td>/';
				$this->preg_arr=[$preg_s,$preg_s]; 
				$this->time_arr=[0,0]; 			
				$this->interval_time= (int)300;
				break;
		}
		
		/* 如果网址正则时间三个的数组长度不一致则退出了 */
		if(count($this->url_arr)!=count($this->preg_arr)||count($this->url_arr)!=count($this->time_arr))
		{
			if(isset($this->show)){echo"Array mismatch!\n\r";}
			return false;
		}
		
		
		/* 检查采集数据库时间是否达到采集时间 */
		if(!$this->get_caiji_time())
		{
			if(isset($this->show)){echo"Time is not up!\n\r";}
			return false;
		}
		
		
		/* 将采集到的源码存入变量 */
		$this->source_str=$this->get_source();
		
		/* 分析源码有数据，再处理成数组，保存进数组变量中 */
		if($this->source_str)
		{
			$this->source_arr=$this->process_string();
		}else{
			
			if(isset($this->show)){echo"Collection content is empty!\n\r";}
			return false;
		}
		
		/* 判断源码数组中是否有值再检查是否有未入库的数组保存在新的数组 */
		if($this->source_arr)
		{
			$this->do_arr=$this->my_array_udiff();
		}else{
			if(isset($this->show)){echo"Collection content array is empty!\n\r";}
			return false;
		}
		
		if($this->do_arr)
		{

			 print_r($this->type ."	success!".count($this->do_arr)."	".$this->do_save()."	".date("H:i:s",time())."\n\r");
			 
			//$Lottery=new Lottery;
			//$Lottery->aa();
			//$Lottery->bb();
			//$Lottery->cc();
			
		}else{
			if(isset($this->show)){echo"Data warehousing is empty\n\r";}
			return false;
		}
		
	}
	
	
	
	public function process_string()
	{
		if(!count($this->source_str)){return false;}
		//$time_=0;
		$arr_txt=Yii::$app->cache->get($this->type.'arr_txt');
		foreach ($this->source_str as $aa=>$bb){//根据传递过来的多线程采集结果
			
			preg_match_all($this->preg_arr[$aa],$this->source_str[$aa],$mat);
			
			foreach ($mat['qh'] as $key=>$aaa){//根据正则得到的数组组成新的数组
				if(!isset($arr_txt[$mat['qh'][$key]])){
					$arr_txt[$mat['qh'][$key]]['time']=date("Y-m-d H:i:s",(strtotime($mat['rq'][$key])+$this->time_arr[$aa]));//将时间记录在变量键值为对应的期号中
					
					for($a=1;$a<=20;$a++){//有20个开奖号码，所以从1-20循环
						isset($mat['n'.$a][$key])&&$arr_txt[$mat['qh'][$key]]['hm'][]=(int)$mat['n'.$a][$key];//开奖号码添加
					};
					
				}
			};
			$mat=null;
		}
		
		if(count($arr_txt)){
			
			krsort($arr_txt) ;//将数组排序
			$arr_txt_=array_chunk($arr_txt,100,true) ;//将数组分割为100个一组，最后一组肯定不足的，其实只需要100期就够了，将多余的移除
			$arr_txt=$arr_txt_[0];//取第一组
			
		}
		//Yii::$app->cache->set('arr_txt',$arr_txt);
		return $arr_txt;//输出数组
	}
	
	
	public function get_source()
    {
			if (!is_array($this->url_arr) or count($this->url_arr) == 0) {
				return false;
			}
			$curl = $text = array();
			$handle = curl_multi_init();
			foreach($this->url_arr as $k => $v) {
				//$nurl[$k]= preg_replace('~([^:\/\.]+)~ei', "rawurlencode('\\1')", $v);
				$curl[$k] = curl_init($v);
				curl_setopt($curl[$k], CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($curl[$k], CURLOPT_HEADER, 0);
				curl_setopt($curl[$k], CURLOPT_TIMEOUT, 3);
				curl_multi_add_handle ($handle, $curl[$k]);
			}
			
			do {
				$mrc = curl_multi_exec($handle, $active);
			} while ($active );

			foreach ($curl as $k => $v) {
				if (curl_error($curl[$k]) == "") {
				$text[$k] = (string) curl_multi_getcontent($curl[$k]);
				}
				curl_multi_remove_handle($handle, $curl[$k]);
				curl_close($curl[$k]);
			}
			curl_multi_close($handle);
			return $text;
	}

	
	
	public function get_caiji_time()
	{
		
        $model = Caiji::findOne(['type' => $this->type]);
		
		//return($model->time_by);
		
		if((strtotime($model->time_by)+($this->interval_time))<time()){
			return true;
		}
		return false;
	}
	
	
	public function do_save()
	{
		
		$m=0;
		/* 判断要采集的类型进行设置网址... */
		switch ($this->type)
		{
			case 'hgkl8':
				foreach ($this->do_arr as $k=>$v){//根据传递过来的多线程采集结果
						$m<$k&&$m=$k;
						$model = Hgkl8::findOne($k);
						if ($model === null) {
							$model = new Hgkl8;
							$model->qihao=$k;
							$model->time_by=date('Y-m-d H:i:s',strtotime($v['time']));
							$model->count=json_encode($v['hm']);
							$model->save();
						}
										
				}
				break;
			case 'jndkl8':
				foreach ($this->do_arr as $k=>$v){//根据传递过来的多线程采集结果
						$m<$k&&$m=$k;
						$model = Jndkl8::findOne($k);
						if ($model === null) {
							$model = new Jndkl8;
							$model->qihao=$k;
							$model->time_by=date('Y-m-d H:i:s',strtotime($v['time']));
							$model->count=json_encode($v['hm']);
							$model->save();
						}
										
				}
				break;
			case 'bjkl8':
				foreach ($this->do_arr as $k=>$v){//根据传递过来的多线程采集结果
						$m<$k&&$m=$k;
						$model = Bjkl8::findOne($k);
						if ($model === null) {
							$model = new Bjkl8;
							$model->qihao=$k;
							$model->time_by=date('Y-m-d H:i:s',strtotime($v['time']));
							$model->count=json_encode($v['hm']);
							$model->save();
						}
										
				}
				break;
			case 'bjpk10':
				foreach ($this->do_arr as $k=>$v){//根据传递过来的多线程采集结果
						$m<$k&&$m=$k;
						$model = Bjpk10::findOne($k);
						if ($model === null) {
							$model = new Bjpk10;
							$model->qihao=$k;
							$model->time_by=date('Y-m-d H:i:s',strtotime($v['time']));
							$model->count=json_encode($v['hm']);
							$model->save();
						}
										
				}
				break;
		}
		
		
		 $caiji = Caiji::findOne(['type' => $this->type]);
		 $caiji ->qihao=$m;
		 $caiji ->time_by=date('Y-m-d H:i:s',strtotime($this->source_arr[$m]['time']));
		 
		$caiji ->save();
		Yii::$app->cache->set($this->type.'arr_txt',$this->source_arr);
		return $m;
	}
	
	public function my_array_udiff()
	{		
		$c=[];
		$b=Yii::$app->cache->get($this->type.'arr_txt');
		foreach ($this->source_arr as $k=>$v){
			isset($b[$k])||$c[$k]=$v;
		}
		return $c;
	}

}