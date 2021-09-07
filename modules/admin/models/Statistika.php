<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "statistika".
 *
 * @property int $nomer_lekarstva
 * @property string $data
 * @property string $statusL
 * @property string $sposob_prigotovl
 *
 * @property Naznacheniya[] $naznacheniyas
 * @property Recepti[] $nomerReceptas
 * @property Sklad $nomerLekarstva
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
            [['data', 'statusL', 'sposob_prigotovl'], 'required'],
            [['data'], 'safe'],
            [['statusL', 'sposob_prigotovl'], 'string', 'max' => 22],
            [['nomer_lekarstva'], 'exist', 'skipOnError' => true, 'targetClass' => Sklad::className(), 'targetAttribute' => ['nomer_lekarstva' => 'nomer_lekarstva']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [

            'nomer_lekarstva' => 'Номер лекарства',
            'data' => 'Дата',
            'statusL' => 'Статус лекарства',
            'sposob_prigotovl' => 'Способ приготовления',
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
     * Gets query for [[NomerReceptas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNomerReceptas()
    {
        return $this->hasMany(Recepti::className(), ['nomer_recepta' => 'nomer_recepta'])->viaTable('naznacheniya', ['nomer_lekarstva' => 'nomer_lekarstva']);
    }

    /**
     * Gets query for [[NomerLekarstva]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNomerLekarstva()
    {
        return $this->hasOne(Sklad::className(), ['nomer_lekarstva' => 'nomer_lekarstva']);
    }
}
