<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usersinfo extends Model
{
    //设置属性
    //模型类对应得数据表
    protected $table="order_goods";
    //规定主键
    protected $primaryKey="id";
    //关闭自动维护时间戳 创建消息时间字段 created_at  修改消息时间字段 updated_at
    public $timestamps=false;

}
