<?php

class m131009_095106_create_column_in_table_match extends CDbMigration
{
	public function up()
	{
        $this->addColumn('dg_match','tournament_id','integer');
        //$this->addColumn('dg_match','');
	}

	public function down()
	{

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