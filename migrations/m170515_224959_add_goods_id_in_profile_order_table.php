<?php

use yii\db\Schema;
use yii\db\Migration;

class m170515_224959_add_goods_id_in_profile_order_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('profile_order', 'goods_id', Schema::TYPE_INTEGER);
        $this->addForeignKey('order_profile', 'profile_order', 'goods_id', 'goods', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('order_profile', 'profile_order');
        $this->dropColumn('profile_goods', 'goods_id');
    }
}
