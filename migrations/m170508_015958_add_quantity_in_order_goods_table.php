<?php

use yii\db\Schema;
use yii\db\Migration;

class m170508_015958_add_quantity_in_order_goods_table extends Migration
{
    public function up()
    {
        $this->addColumn('order_goods', 'quantity', Schema::TYPE_INTEGER);
    }

    public function down()
    {
        $this->dropColumn('order_goods', 'quantity');
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
