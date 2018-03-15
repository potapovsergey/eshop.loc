<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property integer $id
 * @property string $name
 * @property integer $category_id
 * @property integer $manufactory_id
 * @property string $tags
 * @property string $small_description
 * @property string $description
 * @property double $price
 * @property double $rating
 * @property integer $quantity
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $min_price
 * @property integer $max_price
 * @property string $image
 *
 * @property Category $category
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
            [['name', 'category_id', 'manufactory_id', 'tags', 'small_description', 'description', 'price', 'quantity'], 'required'],
            [['category_id', 'quantity', 'status', 'created_at', 'updated_at'], 'integer'],
            [['price', 'rating'], 'number'],
            [['name', 'tags', 'image'], 'string', 'max' => 255],
            [['small_description'], 'string', 'max' => 512],
            [['description'], 'string', 'max' => 4096],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'category_id' => 'Category ID',
            'tags' => 'Теги',
            'small_description' => 'Общее описание',
            'description' => 'Описание',
            'price' => 'Цена',
            'rating' => 'Рейтинг',
            'quantity' => 'Кол-во',
            'status' => 'Статус',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'manufactory_id' => 'Производители'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
    public function getManufactory()
    {
        return $this->hasOne(Manufactory::className(), ['id' => 'manufactory_id']);
    }

    public function getValuesCharacteristics()
    {
        return $this->hasMany(ValuesCharacteristics::className(), ['goods_id' => 'id']);
    }
}
