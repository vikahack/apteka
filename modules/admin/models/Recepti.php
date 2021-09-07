<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "recepti".
 *
 * @property int $nomer_recepta
 * @property int $nomer_klienta
 * @property string $fio_vracha
 * @property string $diagnoz
 *
 * @property Naznacheniya[] $naznacheniyas
 * @property Statistika[] $nomerLekarstvas
 * @property Klienti $nomerKlienta
 * @property Zakaz[] $zakazs
 */
class Recepti extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recepti';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomer_klienta', 'fio_vracha', 'diagnoz'], 'required'],
            [['nomer_klienta'], 'integer'],
            [['fio_vracha', 'diagnoz'], 'string', 'max' => 50],
            [['nomer_klienta'], 'exist', 'skipOnError' => true, 'targetClass' => Klienti::className(), 'targetAttribute' => ['nomer_klienta' => 'nomer_klienta']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [

               'nomer_recepta' => 'Номер рецепта',
            'nomer_klienta' => 'Номер клиента',
            'fio_vracha' => 'ФИО врача',
            'diagnoz' => 'Диагноз',
        ];
    }

    /**
     * Gets query for [[Naznacheniyas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNaznacheniyas()
    {
        return $this->hasMany(Naznacheniya::className(), ['nomer_recepta' => 'nomer_recepta']);
    }

    /**
     * Gets query for [[NomerLekarstvas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNomerLekarstvas()
    {
        return $this->hasMany(Statistika::className(), ['nomer_lekarstva' => 'nomer_lekarstva'])->viaTable('naznacheniya', ['nomer_recepta' => 'nomer_recepta']);
    }

    /**
     * Gets query for [[NomerKlienta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNomerKlienta()
    {
        return $this->hasOne(Klienti::className(), ['nomer_klienta' => 'nomer_klienta']);
    }

    /**
     * Gets query for [[Zakazs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getZakazs()
    {
        return $this->hasMany(Zakaz::className(), ['nomer_recepta' => 'nomer_recepta']);
    }
}
