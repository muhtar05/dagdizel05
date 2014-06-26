<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sabinaagaeva
 * Date: 30.01.14
 * Time: 13:51
 * To change this template use File | Settings | File Templates.
 */

class PollWidget extends CWidget
{

    public function run()
    {
        $criteria = new CDbCriteria();
        $criteria->order = 'pub_date DESC';
        $criteria->limit = 1;


        $model = Question::model()->find($criteria);
        $totalVotes = Yii::app()->db->createCommand()
            ->select('sum(votes) as totalvotes')
            ->from('dg_choice')
            ->where('question_id=:question_id',array(':question_id'=>$model->id))
            ->queryRow();
        $total = $totalVotes['totalvotes'];
        $this->render('pollWidget',array(
                'model'=>$model,
                'total'=>$total,
        ));
    }

}