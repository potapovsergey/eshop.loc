<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `goods`.
 */
class m170411_223517_create_goods_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('goods', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING.' NOT NULL',
            'category_id' => Schema::TYPE_INTEGER.' NOT NULL',
            'tags' => Schema::TYPE_STRING.' NOT NULL',
            'description' => Schema::TYPE_STRING.' NOT NULL',
            'price' => Schema::TYPE_FLOAT.' NOT NULL',
            'rating' => Schema::TYPE_FLOAT.' NOT NULL',
            'quantity' => Schema::TYPE_INTEGER.' NOT NULL',
            'status' => Schema::TYPE_SMALLINT.'(2) DEFAULT 1',
            'created_at' => Schema::TYPE_INTEGER.' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER.' NOT NULL',
        ]);
        $this->addForeignKey('goods_category', 'goods', 'category_id', 'category', 'id', 'cascade', 'cascade');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey('goods_category', 'goods');
        $this->dropTable('goods');
    }
}
