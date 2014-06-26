<?php

class m131009_081115_create_insert_data_in_lookup extends CDbMigration
{
	public function up()
	{
        $this->insert('dg_lookup',array(
                        'name'=>'Goalkeeper',
                        'type'=>'PlayerAmplua',
                        'code'=>1,
                        'position'=>1
        ));

        $this->insert('dg_lookup',array(
                        'name'=>'Defence',
                        'type'=>'PlayerAmplua',
                        'code'=>2,
                        'position'=>2
        ));

        $this->insert('dg_lookup',array(
                        'name'=>'Midfield',
                        'type'=>'PlayerAmplua',
                        'code'=>3,
                        'position'=>3
        ));
        $this->insert('dg_lookup',array(
                        'name'=>'Forward',
                        'type'=>'PlayerAmplua',
                        'code'=>4,
                        'position'=>4
        ));

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