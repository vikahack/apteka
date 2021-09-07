<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "klienti".
 *
 * @property int $nomer_klienta
 * @property string $familia
 * @property string $name
 * @property string $otchestvo
 * @property string $data_rozdeniya
 * @property string $adres
 * @property string $telephone
 * @property string $kategoriya
 *
 * @property Info[] $infos
 * @property IzgotavlivaemieLekarstva[] $nomerLekarstvas
 * @property Recepti[] $receptis
 */
class Klienti extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'klienti';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['familia', 'name', 'otchestvo', 'data_rozdeniya', 'adres', 'telephone', 'kategoriya'], 'required'],
            [['data_rozdeniya'], 'safe'],
            [['familia', 'name', 'otchestvo', 'adres', 'telephone', 'kategoriya'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [


            
            'nomer_klienta' => 'Номер клиента',
            'familia' => 'Фамилия',
            'name' => 'Имя',
            'otchestvo' => 'Отчество',
            'data_rozdeniya' => 'Дата Рождения',
            'adres' => 'Адрес',
            'telephone' => 'Телефон',
            'kategoriya' => 'Категория',
        ];
    }

    /**
     * Gets query for [[Infos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInfos()
    {
        return $this->hasMany(Info::className(), ['nomer_klienta' => 'nomer_klienta']);
    }

    /**
     * Gets query for [[NomerLekarstvas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNomerLekarstvas()
    {
        return $this->hasMany(IzgotavlivaemieLekarstva::className(), ['nomer_lekarstva' => 'nomer_lekarstva'])->viaTable('info', ['nomer_klienta' => 'nomer_klienta']);
    }

    /**
     * Gets query for [[Receptis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReceptis()
    {
        return $this->hasMany(Recepti::className(), ['nomer_klienta' => 'nomer_klienta']);
    }
}
