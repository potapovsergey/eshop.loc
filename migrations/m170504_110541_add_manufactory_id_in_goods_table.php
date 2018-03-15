<?php

use yii\db\Schema;
use yii\db\Migration;

class m170504_110541_add_manufactory_id_in_goods_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('goods', 'manufactory_id', Schema::TYPE_INTEGER);
        $this->addForeignKey('goods_manu', 'goods', 'manufactory_id', 'manufactory', 'id', 'cascade', 'cascade');
    }

    public function safeDown()
    {
        $this->dropForeignKey('goods_manu', 'goods');
        $this->dropColumn('goods', 'manufactory_id');
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
