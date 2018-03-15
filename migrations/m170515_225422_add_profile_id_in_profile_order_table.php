<?php

use yii\db\Schema;
use yii\db\Migration;

class m170515_225422_add_profile_id_in_profile_order_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('profile_order', 'profile_id', Schema::TYPE_INTEGER);
        $this->addForeignKey('order_profile_profile', 'profile_order', 'profile_id', 'profile', 'user_id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('order_profile_profile', 'profile_order');
        $this->dropColumn('profile_goods', 'profile_id');
    }
}
