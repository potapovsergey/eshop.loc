<?php

use yii\db\Schema;
use yii\db\Migration;

class m170426_231710_add_image_in_goods_table extends Migration
{
    public function up()
    {
        $this->addColumn('goods', 'image', Schema::TYPE_STRING);
    }

    public function down()
    {
        echo "m170426_231710_add_image_in_goods_table cannot be reverted.\n";

        return false;
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
