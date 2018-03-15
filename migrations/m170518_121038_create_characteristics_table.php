<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `characteristics`.
 */
class m170518_121038_create_characteristics_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('characteristics', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING.' NOT NULL'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('characteristics');
    }
}
