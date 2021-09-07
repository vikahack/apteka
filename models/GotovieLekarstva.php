<?php 
namespace app\models;

use Yii;

/**
 * This is the model class for table "gotovie_lekarstva".
 *
 * @property int $nomer_lekarstva
 * @property string $name_lek
 * @property string $nomer_na_sklade
 * @property string $forma
 * @property int $stoimost
 *
 * @property Sklad $nomerLekarstva
 */
class GotovieLekarstva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gotovie_lekarstva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomer_lekarstva', 'name_lek', 'nomer_na_sklade', 'forma', 'stoimost'], 'required'],
            [['nomer_lekarstva', 'stoimost'], 'integer'],
            [['name_lek', 'nomer_na_sklade'], 'string', 'max' => 22],
            [['forma'], 'string', 'max' => 50],
            [['nomer_lekarstva'], 'unique'],
            [['nomer_lekarstva'], 'exist', 'skipOnError' => true, 'targetClass' => Sklad::className(), 'targetAttribute' => ['nomer_lekarstva' => 'nomer_lekarstva']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nomer_lekarstva' => 'Nomer Lekarstva',
            'name_lek' => 'Name Lek',
            'nomer_na_sklade' => 'Nomer Na Sklade',
            'forma' => 'Forma',
            'stoimost' => 'Stoimost',
        ];
    }

    /**
     * Gets query for [[NomerLekarstva]].
     *
     * @return \yii\db\ActiveQuery
     */
   
}

