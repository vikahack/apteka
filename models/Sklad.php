<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sklad".
 *
 * @property int $nomer_lekarstva
 * @property int $kolichestvo
 * @property int $kritich_norma
 *
 * @property GotovieLekarstva $gotovieLekarstva
 * @property IzgotavlivaemieLekarstva $izgotavlivaemieLekarstva
 * @property Komponenti[] $komponentis
 * @property Statistika[] $statistikas
 */
class Sklad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sklad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomer_lekarstva', 'kolichestvo', 'kritich_norma'], 'required'],
            [['nomer_lekarstva', 'kolichestvo', 'kritich_norma'], 'integer'],
            [['nomer_lekarstva'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nomer_lekarstva' => 'Номер лекарства',
            'kolichestvo' => 'Количество',
            'kritich_norma' => 'Критическая норма',
        ];
    }

    /**
     * Gets query for [[GotovieLekarstva]].
     *
     * @return \yii\db\ActiveQuery
     */
 

    /**
     * Gets query for [[IzgotavlivaemieLekarstva]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIzgotavlivaemieLekarstva()
    {
        return $this->hasOne(IzgotavlivaemieLekarstva::className(), ['nomer_lekarstva' => 'nomer_lekarstva']);
    }

    /**
     * Gets query for [[Komponentis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKomponenti()
    {
        return $this->hasOne(Komponenti::className(), ['nomer_lekarstva' => 'nomer_lekarstva']);
    }

    /**
     * Gets query for [[Statistikas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatistika()
    {
        return $this->hasOne(Statistika::className(), ['nomer_lekarstva' => 'nomer_lekarstva']);
    }
}