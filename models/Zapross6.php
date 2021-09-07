<?php
namespace App\Models;
use Yii;
use yii\base\Model;

class Zapross6 extends Model{
public $kritich_norma;
public $kolichestvo;
public $naimenovanie;

public function rules()
{
return[[['kritich_norma','kolichestvo','naimenovanie'],'required'],];
}

}