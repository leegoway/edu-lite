<?php
/**
 * Created by PhpStorm.
 * User: qiaozhiming
 * Date: 2018/8/4
 * Time: 上午12:34
 */

namespace app\models;

use yii\db\ActiveRecord;

class KnowledgeType extends ActiveRecord
{
    const INUSE_TRUE = 1;
    const INUSE_FALSE = 0;

    public function rules()
    {
        return [
            [['name'], 'required'],
            ['name', 'string', 'length' => [0, 20]],
            [['in_use'], 'default', 'value' => self::INUSE_TRUE],
            [['in_use', 'in', 'range' => [self::INUSE_TRUE, self::INUSE_FALSE]]]
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => '分类名称'
        ];
    }
}