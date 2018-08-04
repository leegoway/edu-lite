<?php
/**
 * Created by PhpStorm.
 * User: qiaozhiming
 * Date: 2018/8/4
 * Time: 上午12:51
 */

namespace app\controllers;

use app\models\Knowledge;
use app\models\KnowledgeType;
use leegoway\rest\RestActiveController;
use yii;

class KnowledgeController extends RestActiveController
{
    public $modelClass = 'app\models\Knowledge';

    public function actionTypes()
    {
        return KnowledgeType::find()->all();
    }

    public function actionPoints()
    {
        $type = Yii::$app->request->post('type', 1);
        $size = Yii::$app->request->post('size', 5);
        $offset = Yii::$app->request->post('offset', 0);
        return Knowledge::find()
            ->where(['type' => $type])
            ->andWhere(['>=', 'id', $offset])
            ->andWhere(['<=', 'show', date("Y-m-d")])
            ->orderBy('id desc')->
            limit($size)->
            all();
    }
}