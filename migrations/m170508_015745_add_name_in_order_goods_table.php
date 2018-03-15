<?php

use yii\db\Schema;
use yii\db\Migration;

class m170508_015745_add_name_in_order_goods_table extends Migration
{
    public function up()
    {
        $this->addColumn('order_goods', 'name', Schema::TYPE_STRING);
    }

    public function down()
    {
        $this->dropColumn('order_goods', 'name');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
