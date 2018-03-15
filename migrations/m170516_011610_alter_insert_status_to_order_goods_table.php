<?php

use yii\db\Schema;
use yii\db\Migration;

class m170516_011610_alter_insert_status_to_order_goods_table extends Migration
{
    public function up()
    {
        $this->alterColumn('order_goods', 'status', Schema::TYPE_STRING);
        $this->alterColumn('profile_order', 'status', Schema::TYPE_STRING);
    }

    public function down()
    {

    }
}
