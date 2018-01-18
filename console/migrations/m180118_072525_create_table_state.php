<?php

use yii\db\Migration;

class m180118_072525_create_table_state extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{state}}', [
            'StateID' => $this->integer(11)->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'StateName' => $this->string(50)->notNull(),
            'StateCode' => $this->string(10)->notNull(),
            'StateCountryID' => $this->integer(11)->notNull(),
        ], $tableOptions);

        $this->addForeignKey('StateCountryID', '{{state}}', 'StateCountryID', '{{country}}', 'CountryID');
    }

    public function safeDown()
    {
        $this->dropTable('{{state}}');
    }
}
