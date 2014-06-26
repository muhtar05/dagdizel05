<?php

class m131008_093128_create_table_match extends CDbMigration
{
	public function up()
	{
        $this->createTable('dg_match',array(
            'id' => 'pk',
            'label'=>'varchar(255)',
            'text'=>'text',
            'date'=>'datetime NOT NULL'
        ), 'ENGINE=InnoDB CHARSET=utf8');

	}

	public function down()
	{
      // $this->dropTable('dg_match');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}