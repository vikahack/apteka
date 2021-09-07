<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "komponenti".
 *
 * @property int $nomer_lekarstva
 * @property int $nomer_komponenta
 * @property string $naimenovanie_kom
 * @property string $forma
 * @property int $stoimost
 * @property int $kolvo
 * @property string $data_polycheniya
 * @property string $data_isp
 *
 * @property Sklad $nomerLekarstva
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
            [['nomer_lekarstva', 'naimenovanie_kom', 'forma', 'stoimost', 'kolvo', 'data_polycheniya', 'data_isp'], 'required'],
            [['nomer_lekarstva', 'stoimost', 'kolvo'], 'integer'],
            [['data_polycheniya', 'data_isp'], 'safe'],
            [['naimenovanie_kom', 'forma'], 'string', 'max' => 50],
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
             'data_isp' => 'Дата использования',

  
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
}
