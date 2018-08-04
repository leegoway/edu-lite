<?php
/**
 * Created by PhpStorm.
 * User: qiaozhiming
 * Date: 2018/8/4
 * Time: 上午12:51
 */

namespace app\controllers;

use leegoway\rest\RestActiveController;
use yii\rest\ActiveController;

class CourseController extends RestActiveController
{
    public $modelClass='app\models\Course';
}