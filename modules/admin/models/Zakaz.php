<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "zakaz".
 *
 * @property int $nomer_zakaza
 * @property string $zakaz_l
 * @property int $nomer_recepta
 * @property string $data_priema
 * @property string $data_izgotovleniya
 * @property string $data_vidachi
 * @property int $stoimost
 * @property string $status
 * @property string $zabral_v_srok
 *
 * @property Recepti $nomerRecepta
 */
class Zakaz extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zakaz';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['zakaz_l', 'nomer_recepta', 'data_priema', 'data_izgotovleniya', 'data_vidachi', 'stoimost', 'status', 'zabral_v_srok'], 'required'],
            [['nomer_recepta', 'stoimost'], 'integer'],
            [['data_priema', 'data_izgotovleniya', 'data_vidachi'], 'safe'],
            [['zakaz_l'], 'string', 'max' => 22],
            [['status'], 'string', 'max' => 25],
            [['zabral_v_srok'], 'string', 'max' => 4],
            [['nomer_recepta'], 'exist', 'skipOnError' => true, 'targetClass' => Recepti::className(), 'targetAttribute' => ['nomer_recepta' => 'nomer_recepta']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nomer_zakaza' => 'Номер заказа',
            'zakaz_l' => 'Заказ',
            'nomer_recepta' => 'Номер рецепта',
            'data_priema' => 'Дата приема',
            'data_izgotovleniya' => 'Дата изготовления',
            'data_vidachi' => 'Дата выдачи',
            'stoimost' => 'Стоимость',
            'status' => 'Статус',
            'zabral_v_srok' => 'Забрал в срок',
        ];
    }
    
     
     // Gets query for [[NomerRecepta]].
     
    //  @return \yii\db\ActiveQuery
     

    public function getNomerRecepta()
    {
        return $this->hasOne(Recepti::className(), ['nomer_recepta' => 'nomer_recepta']);
    }
}
