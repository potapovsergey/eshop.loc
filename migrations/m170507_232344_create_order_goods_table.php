<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `order_goods`.
 */
class m170507_232344_create_order_goods_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order_goods', [
            'id' => Schema::TYPE_PK,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('order_goods');
    }
}
