<?php

use yii\db\Migration;

class m160803_160112_new_collumn_into_chocolate extends Migration
{
    public function up()
    {
        $this->addColumn('candy', 'image', 'string');
    }

    public function down()
    {
        $this->dropColumn('candy', 'image');
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
