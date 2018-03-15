<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "values_characteristics".
 *
 * @property integer $id
 * @property string $values
 * @property integer $characteristics_id
 * @property integer $goods_id
 *
 * @property Characteristics $characteristics
 * @property Goods $characteristics0
 */
class ValuesCharacteristics extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'values_characteristics';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['values'], 'required'],
            [['characteristics_id', 'goods_id'], 'integer'],
            [['values'], 'string', 'max' => 512],
            [['characteristics_id'], 'exist', 'skipOnError' => true, 'targetClass' => Characteristics::className(), 'targetAttribute' => ['characteristics_id' => 'id']],
            [['goods_id'], 'exist', 'skipOnError' => true, 'targetClass' => Goods::className(), 'targetAttribute' => ['goods_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'values' => 'Values',
            'characteristics_id' => 'Characteristics ID',
            'goods_id' => 'Goods ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacteristics()
    {
        return $this->hasOne(Characteristics::className(), ['id' => 'characteristics_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacteristics0()
    {
        return $this->hasOne(Goods::className(), ['id' => 'characteristics_id']);
    }
}
