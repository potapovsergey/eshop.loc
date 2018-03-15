<?php

use yii\db\Schema;
use yii\db\Migration;

class m170507_232508_add_goods_id_in_order_goods_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('order_goods', 'goods_id', Schema::TYPE_INTEGER);
        $this->addForeignKey('order_goods_order', 'order_goods', 'goods_id', 'goods', 'id', 'cascade', 'cascade');
    }

    public function safeDown()
    {
        $this->dropForeignKey('order_goods_order', 'order_goods');
        $this->dropColumn('order_goods', 'goods_id');
    }
}
