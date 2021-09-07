<?php
namespace App\Models;
use Yii;
use yii\base\Model;

class Zapross9 extends Model{
public $statusL;

public function rules()
{
return[[['statusL'],'required'],];
}



}