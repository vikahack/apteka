<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "naznacheniya".
 *
 * @property int $nomer_recepta
 * @property int $nomer_lekarstva
 * @property int $kolichestvo
 * @property string $naimenivanie
 *
 * @property Statistika $nomerLekarstva
 * @property Recepti $nomerRecepta
 */
class Naznacheniya extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'naznacheniya';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomer_lekarstva', 'kolichestvo', 'naimenivanie'], 'required'],
            [['nomer_lekarstva', 'kolichestvo'], 'integer'],
            [['naimenivanie'], 'string', 'max' => 22],
            [['nomer_lekarstva'], 'exist', 'skipOnError' => true, 'targetClass' => Statistika::className(), 'targetAttribute' => ['nomer_lekarstva' => 'nomer_lekarstva']],
            [['nomer_recepta'], 'exist', 'skipOnError' => true, 'targetClass' => Recepti::className(), 'targetAttribute' => ['nomer_recepta' => 'nomer_recepta']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [

             'nomer_recepta' => 'Номер рецепта',
            'nomer_lekarstva' => 'Номер лекарства',
            'kolichestvo' => 'Количество',
            'naimenivanie' => 'Наименование',
        ];
    }

    /**
     * Gets query for [[NomerLekarstva]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNomerLekarstva()
    {
        return $this->hasOne(Statistika::className(), ['nomer_lekarstva' => 'nomer_lekarstva']);
    }

    /**
     * Gets query for [[NomerRecepta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNomerRecepta()
    {
        return $this->hasOne(Recepti::className(), ['nomer_recepta' => 'nomer_recepta']);
    }
}
