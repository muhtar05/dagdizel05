<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 08.11.13
 * Time: 11:02
 * To change this template use File | Settings | File Templates.
 */

class BornDateWidget extends CWidget
{

    private function getBornDateMans($limit=2)
    {
        $sql = "SELECT IF( DAYOFYEAR( born_date ) < DAYOFYEAR( CURDATE( ) ) , 366 + DAYOFYEAR( born_date ) , DAYOFYEAR( born_date ) ) AS born, id, born_date,fio,'Players' AS type_model
                          FROM  `dg_players` WHERE DAYOFYEAR(born_date) IS NOT NULL
                UNION
                SELECT IF( DAYOFYEAR( born_date ) < DAYOFYEAR( CURDATE( ) ) , 366 + DAYOFYEAR( born_date ) , DAYOFYEAR( born_date ) ) AS born,id, born_date,fio,'Coaches' AS type_model
                          FROM dg_coaches WHERE DAYOFYEAR(born_date) IS NOT NULL
                UNION
                SELECT IF( DAYOFYEAR( born_date ) < DAYOFYEAR( CURDATE( ) ) , 366 + DAYOFYEAR( born_date ) , DAYOFYEAR( born_date ) ) AS born,id, born_date,fio,'Personal' AS type_model
                FROM dg_personal WHERE DAYOFYEAR(born_date) IS NOT NULL

                ORDER BY born
                LIMIT 2";

        $bornDateMans = Yii::app()->db->createCommand($sql)->queryAll();
        return $bornDateMans;




    }

    public function run()
    {
        $bornDateMans = $this->getBornDateMans();
        $this->render('bornDateWidgetTest',array(
            'bornDateMans'=>$bornDateMans,
        ));

    }
}
