<?php
namespace App\Models;
use Yii;
use yii\base\Model;

class Zapross5 extends Model{
public $naimenivanie;
public $data_vidachi;
public $data_priema;

public function rules()
{
return[[['naimenivanie','data_vidachi','data_priema'],'required'],];
}



}