<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "info".
 *
 * @property int $nomer_klienta
 * @property int $nomer_lekarstva
 * @property int $kolvoZ
 *
 * @property Klienti $nomerKlienta
 * @property IzgotavlivaemieLekarstva $nomerLekarstva
 */
class Info extends \yii\db\ActiveRecord
{
    public $kolvo;
    public $zakazz;

      public $fam;
      public $kk;
      public $lek;
      public $nameK;
      public $form;
    

    /**
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {

        return 'info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomer_klienta', 'nomer_lekarstva', 'kolvoZ'], 'required'],
            [['nomer_klienta', 'nomer_lekarstva', 'kolvoZ'], 'integer'],
            [['nomer_klienta', 'nomer_lekarstva'], 'unique', 'targetAttribute' => ['nomer_klienta', 'nomer_lekarstva']],
            [['nomer_klienta'], 'exist', 'skipOnError' => true, 'targetClass' => Klienti::className(), 'targetAttribute' => ['nomer_klienta' => 'nomer_klienta']],
            [['nomer_lekarstva'], 'exist', 'skipOnError' => true, 'targetClass' => IzgotavlivaemieLekarstva::className(), 'targetAttribute' => ['nomer_lekarstva' => 'nomer_lekarstva']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nomer_klienta' => 'Номер клиента',
            'nomer_lekarstva' => 'Номер лекарства',
            'kolvoZ' => 'Количество заказов',
            'kolvo' => 'Общее количество заказов',
            'fam' => 'Фамилия',
            'nameK' => 'Имя',
            'lek' => 'Лекарство',
            'zakazz' => 'Общее количество заказов',
            'form' => 'Тип',
             'kk' => 'Количество заказов',
        ];
    }

    /**
     * Gets query for [[NomerKlienta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKlienti()
    {
        return $this->hasOne(Klienti::className(), ['nomer_klienta' => 'nomer_klienta']);
    }

    /**
     * Gets query for [[NomerLekarstva]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIzgotavlivaemieLekarstva()
    {
        return $this->hasOne(IzgotavlivaemieLekarstva::className(), ['nomer_lekarstva' => 'nomer_lekarstva']);
    }
}
