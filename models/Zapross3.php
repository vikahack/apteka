<?php
namespace App\Models;
use Yii;
use yii\base\Model;

class Zapross3 extends Model{
public $forma;
public function rules()
{
return[[['forma'],'required'],];
}

}