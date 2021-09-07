<?php

namespace app\models;

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
 */
class Zakaz extends \yii\db\ActiveRecord
{      public $kolvoR;
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
            [['nomer_zakaza', 'zakaz_l', 'nomer_recepta', 'data_priema', 'data_izgotovleniya', 'data_vidachi', 'stoimost', 'status', 'zabral_v_srok'], 'required'],
            [['nomer_zakaza', 'nomer_recepta', 'stoimost'], 'integer'],
            [['data_priema', 'data_izgotovleniya', 'data_vidachi'], 'safe'],
            [['zakaz_l'], 'string', 'max' => 22],
            [['status'], 'string', 'max' => 25],
            [['zabral_v_srok'], 'string', 'max' => 4],
            [['nomer_zakaza'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nomer_zakaza' => 'Nomer Zakaza',
            'zakaz_l' => 'Zakaz L',
            'nomer_recepta' => 'Nomer Recepta',
            'data_priema' => 'Data Priema',
            'data_izgotovleniya' => 'Data Izgotovleniya',
            'data_vidachi' => 'Data Vidachi',
            'stoimost' => 'Stoimost',
            'status' => 'Status',
            'zabral_v_srok' => 'Zabral V Srok',
        ];
    }
}
