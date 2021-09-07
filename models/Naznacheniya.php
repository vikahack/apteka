<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "naznacheniya".
 *
 * @property int $nomer_recepta
 * @property int $nomer_lekarstva
 * @property int $kolichestvo
 *
 * @property Sostav $nomerLekarstva
 * @property Recepti $recepti
 */
class Naznacheniya extends \yii\db\ActiveRecord
{

    public $maxx;
     public $kol;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'naznacheniya';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomer_recepta', 'nomer_lekarstva', 'kolichestvo'], 'required'],
            [['nomer_recepta', 'nomer_lekarstva', 'kolichestvo'], 'integer'],
            [['nomer_recepta', 'nomer_lekarstva'], 'unique', 'targetAttribute' => ['nomer_recepta', 'nomer_lekarstva']],
            [['nomer_lekarstva'], 'exist', 'skipOnError' => true, 'targetClass' => Sostav::className(), 'targetAttribute' => ['nomer_lekarstva' => 'nomer_lekarstva']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nomer_recepta' => 'Номер рецепта',
            'nomer_lekarstva' => 'Номер лекарства',
            'kolichestvo' => 'Количество',
             'kol' => 'Название лекарства',
            'maxx' => 'Кол-во использований',
        ];
    }

    /**
     * Gets query for [[NomerLekarstva]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNomerLekarstva()
    {
        return $this->hasOne(Sostav::className(), ['nomer_lekarstva' => 'nomer_lekarstva']);
    }

    /**
     * Gets query for [[Recepti]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecepti()
    {
        return $this->hasOne(Recepti::className(), ['nomer_recepta' => 'nomer_recepta']);
    }
}
