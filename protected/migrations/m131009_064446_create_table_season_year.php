<?php

class m131009_064446_create_table_season_year extends CDbMigration
{
	public function up()
	{
        $this->createTable('dg_season_year',array(
            'id' => 'pk',
            'name'=>'varchar(255)'
        ), 'ENGINE=InnoDB CHARSET=utf8');
	}

	public function down()
	{
        $this->dropTable('dg_season_year');
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