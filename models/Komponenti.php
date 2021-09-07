<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "komponenti".
 *
 * @property int $nomer_lekarstva
 * @property int $nomer_komponenta
 * @property int $nomer_na_sklade
 * @property string $naimenovanie_kom
 * @property string $forma
 * @property int $stoimost
 * @property int $kolvo
 * @property string $data_polycheniya
 *
 * @property Sklad $nomerLekarstva
 * @property Naznacheniya[] $naznacheniyas
 */
class Komponenti extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'komponenti';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomer_lekarstva', 'nomer_komponenta', 'nomer_na_sklade', 'naimenovanie_kom', 'forma', 'stoimost', 'kolvo', 'data_polycheniya','data_isp'], 'required'],
            [['nomer_lekarstva', 'nomer_komponenta', 'nomer_na_sklade', 'stoimost', 'kolvo'], 'integer'],
            [['data_polycheniya','data_isp'], 'safe'],
            [['naimenovanie_kom', 'forma'], 'string', 'max' => 50],
            [['nomer_komponenta'], 'unique'],
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
            'nomer_komponenta' => 'Номер компонента',
            'nomer_na_sklade' => 'Номер на складе',
            'naimenovanie_kom' => 'Наименование компонента',
            'forma' => 'Форма',
            'stoimost' => 'Стоимость',
            'kolvo' => 'Количество',
            'data_polycheniya' => 'Дата получения',
             'data_isp' => 'Дата исп',
        ];
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

    /**
     * Gets query for [[Naznacheniyas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNaznacheniyas()
    {
        return $this->hasMany(Naznacheniya::className(), ['nomer_lekarstva' => 'nomer_lekarstva']);
    }
}