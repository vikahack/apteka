<?php 
namespace app\components;
use yii\base\Widget;
use app\models\Naznacheniya;

class Mywidget extends Widget{
public $options; 
public $count ;

public function run(){

	 $query = Naznacheniya::find()
         ->select(['max(naimenivanie) as kol','count(nomer_lekarstva) as maxx' ])
        ->GroupBy('naimenivanie')
        ->orderBy('naimenivanie')->all();

	return  $this->render('my',['query'=>$query]) ;
 }
}

?>