<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sostav".
 *
 * @property int $nomer_lekarstva
 * @property int $nomer_ingridienta
 * @property int $kolichestvo
 *
 * @property Naznacheniya[] $naznacheniyas
 * @property Komponenti $nomerIngridienta
 * @property IzgotavlivaemieLekarstva $nomerLekarstva
 */
class Sostav extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sostav';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomer_lekarstva', 'nomer_ingridienta', 'kolichestvo'], 'required'],
            [['nomer_lekarstva', 'nomer_ingridienta', 'kolichestvo'], 'integer'],
            [['nomer_lekarstva', 'nomer_ingridienta'], 'unique', 'targetAttribute' => ['nomer_lekarstva', 'nomer_ingridienta']],
            [['nomer_ingridienta'], 'exist', 'skipOnError' => true, 'targetClass' => Komponenti::className(), 'targetAttribute' => ['nomer_ingridienta' => 'nomer_komponenta']],
            [['nomer_lekarstva'], 'exist', 'skipOnError' => true, 'targetClass' => IzgotavlivaemieLekarstva::className(), 'targetAttribute' => ['nomer_lekarstva' => 'nomer_lekarstva']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nomer_lekarstva' => 'Номер лекарства',
            'nomer_ingridienta' => 'Номер ингридиента',
            'kolichestvo' => 'Количество',
        ];
    }

    /**
     * Gets query for [[Naznacheniyas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNaznacheniyas()
    {
        return $this->hasMany(Naznacheniya::className(), ['nomer_lekarstva' => 'nomer_lekarstva']);
    }

    /**
     * Gets query for [[NomerIngridienta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNomerIngridienta()
    {
        return $this->hasOne(Komponenti::className(), ['nomer_komponenta' => 'nomer_ingridienta']);
    }

    /**
     * Gets query for [[NomerLekarstva]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNomerLekarstva()
    {
        return $this->hasOne(IzgotavlivaemieLekarstva::className(), ['nomer_lekarstva' => 'nomer_lekarstva']);
    }
}
