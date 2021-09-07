<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spravochnik_tehnologii".
 *
 * @property int $nomer_tehnologii
 * @property int $nomer_lekarstva
 * @property string $sposob_prigotovleniya
 * @property int $time_prigotovleniya
 *
 * @property IzgotavlivaemieLekarstva $izgotavlivaemieLekarstva
 */
class SpravochnikTehnologii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'spravochnik_tehnologii';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomer_tehnologii', 'nomer_lekarstva', 'sposob_prigotovleniya', 'time_prigotovleniya'], 'required'],
            [['nomer_tehnologii', 'nomer_lekarstva', 'time_prigotovleniya'], 'integer'],
            [['sposob_prigotovleniya'], 'string', 'max' => 100],
            [['nomer_tehnologii'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nomer_tehnologii' => 'Номер технологии',
            'nomer_lekarstva' => 'Номер лекарства',
            'sposob_prigotovleniya' => 'Способ приготовления',
            'time_prigotovleniya' => 'Время приготовления',
        ];
    }

    /**
     * Gets query for [[IzgotavlivaemieLekarstva]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIzgotavlivaemieLekarstva()
    {
        return $this->hasOne(IzgotavlivaemieLekarstva::className(), ['nomer_lekarstva' => 'nomer_lekarstva']);
    }
}
