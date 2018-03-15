<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `values_characteristics`.
 */
class m170518_121610_create_values_characteristics_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('values_characteristics', [
            'id' => Schema::TYPE_PK,
            'values' => Schema::TYPE_STRING.'(512) NOT NULL'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('values_characteristics');
    }
}
