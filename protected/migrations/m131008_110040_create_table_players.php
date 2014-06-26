<?php

class m131008_110040_create_table_players extends CDbMigration
{
	public function up()
	{
        $this->createTable('dg_players',array(
            'id' => 'pk',
            'fio'=>'varchar(255)',
            'born_date'=>'datetime NOT NULL',
            'amplua_id'=>'integer',
            'country'=>'varchar(100)',
            'height'=>'varchar(20)',
            'weight'=>'varchar(20)',
            'img'=>'varchar(255)',
            'info'=>'text',
            'team_type'=>'int(2)'
        ), 'ENGINE=InnoDB CHARSET=utf8');

	}

	public function down()
	{
        $this->dropTable('dg_players');
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