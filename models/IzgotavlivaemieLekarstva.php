<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "izgotavlivaemie_lekarstva".
 *
 * @property int $nomer_lekarstva
 * @property int $nomer_na_sklade
 * @property string $naimenovanie
 * @property string $forma
 * @property int $stoimost
 * @property string $sposob_prigotovleniya
 *
 * @property Sklad $nomerLekarstva
 */
class IzgotavlivaemieLekarstva extends \yii\db\ActiveRecord
{

    public $minimum;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'izgotavlivaemie_lekarstva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomer_lekarstva', 'nomer_na_sklade', 'naimenovanie', 'forma', 'stoimost', 'sposob_prigotovleniya'], 'required'],
            [['nomer_lekarstva', 'nomer_na_sklade', 'stoimost'], 'integer'],
            [['naimenovanie', 'forma'], 'string', 'max' => 50],
            [['sposob_prigotovleniya'], 'string', 'max' => 22],
            [['nomer_lekarstva'], 'unique'],
            [['nomer_lekarstva'], 'exist', 'skipOnError' => true, 'targetClass' => Sklad::className(), 'targetAttribute' => ['nomer_lekarstva' => 'nomer_lekarstva']],
        ];
    }


public function getInfo()
    {
        return $this->hasMany(Info::className(), ['nomer_lekarstva' => 'nomer_lekarstva']);
    }








    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nomer_lekarstva' => 'Номер лекарства',
            'nomer_na_sklade' => 'Номер на складе',
            'naimenovanie' => 'Наименование',
            'forma' => 'Форма',
            'stoimost' => 'Стоимость',
            'sposob_prigotovleniya' => 'Способ приготовления',
             'minimum' => 'Минимальное количество',
        ];
    }

    /**
     * Gets query for [[NomerLekarstva]].
     *
     * @return \yii\db\ActiveQuery
     */
  //  public function getNomerLekarstva()
    public function getSklad()
    {
        return $this->hasOne(Sklad::className(), ['nomer_lekarstva' => 'nomer_lekarstva']);
    }
}