<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `profile_order`.
 */
class m170515_224205_create_profile_order_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('profile_order', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'price' => Schema::TYPE_FLOAT,
            'quantity' => Schema::TYPE_INTEGER
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('profile_order');
    }
}
