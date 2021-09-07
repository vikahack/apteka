<?php
namespace App\Models;
use Yii;
use yii\base\Model;

class Zapross2 extends Model{
public $forma;

public function rules()
{
return[[['forma'],'required'],];
}

}