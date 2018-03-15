<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property integer $id
 * @property string $name
 * @property integer $category_id
 * @property string $tags
 * @property string $description
 * @property double $price
 * @property double $rating
 * @property integer $quantity
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $image
 * @property integer $manufactory_id
 * @property string $small_description
 *
 * @property Category $category
 * @property Manufactory $manufactory
 * @property OrderGoods[] $orderGoods
 * @property ProfileOrder[] $profileOrders
 * @property ValuesCharacteristics[] $valuesCharacteristics
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'category_id', 'tags', 'description', 'price', 'rating', 'quantity', 'created_at', 'updated_at', 'small_description'], 'required'],
            [['category_id', 'quantity', 'status', 'created_at', 'updated_at', 'manufactory_id'], 'integer'],
            [['price', 'rating'], 'number'],
            [['name', 'tags', 'image'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 4096],
            [['small_description'], 'string', 'max' => 512],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['manufactory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Manufactory::className(), 'targetAttribute' => ['manufactory_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'category_id' => 'Category ID',
            'tags' => 'Tags',
            'description' => 'Description',
            'price' => 'Price',
            'rating' => 'Rating',
            'quantity' => 'Quantity',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'image' => 'Image',
            'manufactory_id' => 'Manufactory ID',
            'small_description' => 'Small Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManufactory()
    {
        return $this->hasOne(Manufactory::className(), ['id' => 'manufactory_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderGoods()
    {
        return $this->hasMany(OrderGoods::className(), ['goods_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfileOrders()
    {
        return $this->hasMany(ProfileOrder::className(), ['goods_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getValuesCharacteristics()
    {
        return $this->hasMany(ValuesCharacteristics::className(), ['goods_id' => 'id']);
    }
}
