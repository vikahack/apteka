<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "statistika".
 *
 * @property int $nomer_tovara
 * @property string $data
 * @property int $prodano
 *
 * @property Sklad $nomerTovara
 */
class Statistika extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statistika';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomer_lekarstva', 'data', 'prodano'], 'required'],
            [['nomer_lekarstva', 'prodano'], 'integer'],
            [['data'], 'safe'],
            [['nomer_lekarstva', 'data'], 'unique', 'targetAttribute' => ['nomer_lekarstva', 'data']],
            [['nomer_lekarstva'], 'exist', 'skipOnError' => true, 'targetClass' => Sklad::className(), 'targetAttribute' => ['nomer_lekarstva' => 'nomer_lekarstva']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nomer_lekarstva' => 'Номер товара',
            'data' => 'Дата',
            'prodano' => 'Продано',
        ];
    }

    /**
     * Gets query for [[NomerTovara]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNomerTovara()
    {
        return $this->hasOne(Sklad::className(), ['nomer_lekarstva' => 'nomer_lekarstva']);
    }
}
