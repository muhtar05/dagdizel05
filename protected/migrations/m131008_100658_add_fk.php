<?php

class m131008_100658_add_fk extends CDbMigration
{
	public function up()
	{
        $this->addForeignKey('FK_online_match_comment_match', 'dg_online_match_comment', 'match_id', 'dg_match', 'id','CASCADE','RESTRICT');
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