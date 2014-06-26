<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sabinaagaeva
 * Date: 23.01.14
 * Time: 13:41
 * To change this template use File | Settings | File Templates.
 */

class OnlinePlayersEvents extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{online_players_events}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('type_event, player_id', 'required'),
            array('text','safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return OnlineMatchPlayers the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }


    public function getEventRender()
    {
        switch($this->type_event)
        {
            case 2:
                $styleProperty = "<span class='icon-sprite-online goal'></span>";

                break;

            case 4:
                $styleProperty = "<span class='icon-sprite-online yellow_card'></span>";

                break;

            case 5:
                $styleProperty = "<span class='icon-sprite-online red_card'></span>";
                break;
        }

        return $styleProperty;
    }
}
