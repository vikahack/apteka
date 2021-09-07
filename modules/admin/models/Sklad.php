<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "sklad".
 *
 * @property int $nomer_lekarstva
 * @property int $kolichestvo
 * @property int $kritich_norma
 *
 * @property Komponenti[] $komponentis
 * @property IzgotavlivaemieLekarstva $nomerLekarstva
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
            [['kolichestvo', 'kritich_norma'], 'required'],
            [['kolichestvo', 'kritich_norma'], 'integer'],
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
            'kolichestvo' => 'Количество',
            'kritich_norma' => 'Критическая норма',
        ];
    }

    /**
     * Gets query for [[Komponentis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNomerLekarstva()
    {
        return $this->hasMany(Komponenti::className(), ['nomer_lekarstva' => 'nomer_lekarstva']);
    }

    /**
     * Gets query for [[NomerLekarstva]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIzgotavlivaemieLekarstva()
    {
        return $this->hasOne(IzgotavlivaemieLekarstva::className(), ['nomer_lekarstva' => 'nomer_lekarstva']);
    }

    /**
     * Gets query for [[Statistikas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatistikas()
    {
        return $this->hasMany(Statistika::className(), ['nomer_lekarstva' => 'nomer_lekarstva']);
    }
}
