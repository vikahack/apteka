<?php
namespace App\Models;
use Yii;
use yii\base\Model;

class Zapross11 extends Model{
public $naimenovanie;
public function rules()
{
return[[['naimenovanie'],'required'],];
}

}

