<?php
namespace App\Models;
use Yii;
use yii\base\Model;

class Zapross12 extends Model{
public $naimenivanie;

public function rules()
{
return[[['naimenivanie'],'required'],];
}



}