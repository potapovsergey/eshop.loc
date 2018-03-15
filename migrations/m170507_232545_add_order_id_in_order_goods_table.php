<?php

use yii\db\Schema;
use yii\db\Migration;

class m170507_232545_add_order_id_in_order_goods_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('order_goods', 'order_id', Schema::TYPE_INTEGER);
        $this->addForeignKey('order_goods_order_tab', 'order_goods', 'order_id', 'order', 'id', 'cascade', 'cascade');
    }

    public function safeDown()
    {
        $this->dropForeignKey('order_goods_order_tab', 'order_goods');
        $this->dropColumn('order_goods', 'order_id');
    }
}
