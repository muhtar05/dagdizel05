<?php

class m131009_065745_create_table_lookup extends CDbMigration
{
	public function up()
	{
        $this->createTable('dg_lookup',array(
            'id' => 'pk',
            'name'=>'varchar(255) NOT NULL',
            'code'=>'integer',
            'type'=>'varchar(255) NOT NULL',
            'position'=>'integer'
        ), 'ENGINE=InnoDB CHARSET=utf8');
	}

	public function down()
	{
       $this->dropTable('dg_lookup');
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