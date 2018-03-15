<?php

use yii\db\Schema;
use yii\db\Migration;

class m170508_015923_add_price_in_order_goods_table extends Migration
{
    public function up()
    {
        $this->addColumn('order_goods', 'price', Schema::TYPE_FLOAT);
    }

    public function down()
    {
        $this->dropColumn('order_goods', 'price');
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
