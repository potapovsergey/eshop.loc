<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profile_order".
 *
 * @property integer $id
 * @property string $name
 * @property double $price
 * @property integer $quantity
 * @property integer $goods_id
 * @property integer $profile_id
 * @property integer $order_id
 * @property string $status
 *
 * @property Goods $goods
 * @property Profile $profile
 * @property OrderGoods $order
 */
class ProfileOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile_order';
    }

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
            [['quantity', 'goods_id', 'profile_id', 'order_id'], 'integer'],
            [['name', 'status'], 'string', 'max' => 255],
            [['goods_id'], 'exist', 'skipOnError' => true, 'targetClass' => Goods::className(), 'targetAttribute' => ['goods_id' => 'id']],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['profile_id' => 'user_id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderGoods::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'price' => 'Цена',
            'quantity' => 'Количество',
            'goods_id' => 'Товар',
            'profile_id' => 'Профиль',
            'status' => 'Статус'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasOne(Goods::className(), ['id' => 'goods_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'profile_id']);
    }
}
