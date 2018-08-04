<?php
/**
 * Created by PhpStorm.
 * User: qiaozhiming
 * Date: 2018/8/4
 * Time: 上午12:51
 */

namespace app\controllers;

use app\models\Course;
use leegoway\rest\RestActiveController;
use yii;

class CourseController extends RestActiveController
{
    public $modelClass='app\models\Course';

    //POST
    public function actionFinished()
    {
        $size = Yii::$app->request->post('size', 3);
        $sort = Yii::$app->request->post('sort', 'desc');
        $grade = Yii::$app->request->post('offset', 'grade');
        $query = Course::find();
        if ($sort == 'asc') {
            $query->where('grade > ' . $grade);
        } else {
            $query->where('grade <' . $grade);
        }
        return $query->where(['status' => Course::STATUS_FINISHED])->orderBy('grade, id' . $sort)->limit($size)->all();
    }

    //GET
    public function actionSigning()
    {
        return Course::find()->where(['status' => Course::STATUS_SIGNING])->all();
    }


}