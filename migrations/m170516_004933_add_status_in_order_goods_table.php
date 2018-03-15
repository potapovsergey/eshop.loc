<?php

use yii\db\Schema;
use yii\db\Migration;

class m170516_004933_add_status_in_order_goods_table extends Migration
{
    public function up()
    {
        $this->addColumn('order_goods', 'status', Schema::TYPE_INTEGER);
        $this->addColumn('profile_order', 'status', Schema::TYPE_INTEGER);
    }

    public function down()
    {
        $this->dropColumn('order_goods', 'status');
        $this->dropColumn('profile_order', 'status');
    }
}
