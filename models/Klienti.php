<?php

namespace app\models;

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
            [['nomer_klienta', 'familia', 'name', 'otchestvo', 'data_rozdeniya', 'adres', 'telephone', 'kategoriya'], 'required'],
            [['nomer_klienta'], 'integer'],
            [['data_rozdeniya'], 'safe'],
            [['familia', 'name', 'otchestvo', 'adres', 'telephone', 'kategoriya'], 'string', 'max' => 50],
            [['nomer_klienta'], 'unique'],
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
            'data_rozdeniya' => 'Дата рождения',
            'adres' => 'Адрес',
            'telephone' => 'Телефон',
            'kategoriya' => 'Категория',
        ];
    }


public function getInfo()
    {
        return $this->hasMany(Info::className(), ['nomer_klienta' => 'nomer_klienta']);
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
