<?php
namespace App\Models;
use Yii;
use yii\base\Model;

class Zapross1 extends Model{
public $zabral_v_srok;

public function rules()
{
return[[['zabral_v_srok'],'required'],];
}



}