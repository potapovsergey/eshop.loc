<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `manufactory`.
 */
class m170504_110224_create_manufactory_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('manufactory', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING.' NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('manufactory');
    }
}
