<?php
namespace App\Models;
use Yii;
use yii\base\Model;

class Zapross100 extends Model{
public $naimenovanie_kom;
public $data_polycheniya;
public $data_isp;

public function rules()
{
return[[['naimenovanie_kom','data_polycheniya','data_isp'],'required'],];
}

}