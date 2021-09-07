<?php
namespace App\Models;
use Yii;
use yii\base\Model;

class Zapross4 extends Model{
public $data_polycheniya;



public function rules()
{
return[[['data_polycheniya'],'required'],];
}

}