<?php
/**
 * Created by PhpStorm.
 * User: qiaozhiming
 * Date: 2018/8/4
 * Time: 上午12:34
 */

namespace app\models;

use yii\db\ActiveRecord;

class Course extends ActiveRecord
{
    const STATUS_UPLOADING = 0;
    const STATUS_SIGNING = 1;
    const STATUS_CLASS = 2;
    const STATUS_FINISHED = 3;
    const STATUS_DELETED = 4;

    public function rules()
    {
        return [
            ['status', 'in', 'range' => [self::STATUS_UPLOADING, self::STATUS_SIGNING, self::STATUS_CLASS, self::STATUS_FINISHED, self::STATUS_DELETED]],
            [['title', 'picture', 'content'], 'required'],
            [['title'], 'string', 'length' => [0, 50]],
            [['picture', 'content'], 'string', 'length' => [0, 100]]
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => '课程标题',
            'content' => '课程内容',
            'picture' => '课程图标',
            'status' => '课程状态'
        ];
    }
}