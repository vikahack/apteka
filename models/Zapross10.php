<?php
/*
namespace App\Models;
use Yii;
use yii\base\Model;

class Zapross10 extends Model{
public $forma;
public $naimenovanie;


public function rules()
{
return[[['forma','naimenovanie'],'required'],];
}

}
*/

namespace App\Models;
use Yii;
use yii\base\Model;

class Zapross10 extends Model{
public $forma;
public $statusL;


public function rules()
{
return[[['forma','statusL'],'required'],];
}

}