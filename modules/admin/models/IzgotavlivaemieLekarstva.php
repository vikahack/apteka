<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "izgotavlivaemie_lekarstva".
 *
 * @property int $nomer_lekarstva
 * @property string $naimenovanie
 * @property string $nomer_na_sklade
 * @property string $forma
 * @property int $stoimost
 * @property string $sposob_prigotovleniya
 *
 * @property Info[] $infos
 * @property Klienti[] $nomerKlientas
 * @property Sklad $sklad
 */
class IzgotavlivaemieLekarstva extends \yii\db\ActiveRecord
{
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
            [['naimenovanie', 'nomer_na_sklade', 'forma', 'stoimost', 'sposob_prigotovleniya'], 'required'],
            [['stoimost'], 'integer'],
            [['naimenovanie'], 'string', 'max' => 55],
            [['nomer_na_sklade', 'sposob_prigotovleniya'], 'string', 'max' => 22],
            [['forma'], 'string', 'max' => 50],
        ];
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
        ];
    }

    /**
     * Gets query for [[Infos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInfos()
    {
        return $this->hasMany(Info::className(), ['nomer_lekarstva' => 'nomer_lekarstva']);
    }

    /**
     * Gets query for [[NomerKlientas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNomerKlientas()
    {
        return $this->hasMany(Klienti::className(), ['nomer_klienta' => 'nomer_klienta'])->viaTable('info', ['nomer_lekarstva' => 'nomer_lekarstva']);
    }

    /**
     * Gets query for [[Sklad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNomerLekarstva()
    {
        return $this->hasOne(Sklad::className(), ['nomer_lekarstva' => 'nomer_lekarstva']);
    }
}
