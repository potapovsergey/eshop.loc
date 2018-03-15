<?php

use yii\db\Schema;
use yii\db\Migration;

class m170516_053235_add_order_id_in_profile_order_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('profile_order', 'order_id', Schema::TYPE_INTEGER);
        $this->addForeignKey('order_profile_order', 'profile_order', 'order_id', 'order_goods', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('order_profile_order', 'profile_order');
        $this->dropColumn('profile_goods', 'order_id');
    }
}
