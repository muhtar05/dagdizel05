<?php

class m131004_142057_create_table_online_match extends CDbMigration
{
	public function up()
	{
        $this->createTable('dg_online_match_comment',array(
            'id' => 'pk',
            'text'=>'text',
            'create_time'=>'datetime NOT NULL',
            'match_id'=>'integer'
        ), 'ENGINE=InnoDB CHARSET=utf8');
	}

	public function down()
	{
        $this->dropTable('dg_online_match_comment');
	}
}