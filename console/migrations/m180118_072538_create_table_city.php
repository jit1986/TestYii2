<?php

use yii\db\Migration;

class m180118_072538_create_table_city extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{city}}', [
            'CityID' => $this->integer(11)->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'CityName' => $this->string(50)->notNull(),
            'CityCode' => $this->string(10),
            'StateID' => $this->integer(11)->notNull(),
        ], $tableOptions);

        $this->addForeignKey('CityStateID', '{{city}}', 'StateID', '{{state}}', 'StateID');
    }

    public function safeDown()
    {
        $this->dropTable('{{city}}');
    }
}
