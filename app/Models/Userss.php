<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userss extends Model
{
    //添加属性
    //模型类对应得数据表
    protected $table="orders";
    //开启自动维护时间戳 创建消息时间字段 created_at  修改消息时间字段 updated_at
    public $timestamps=true;
    //可以被批量赋值的属性字段
   

    //获取会员模块对应得详情信息 hasOne 1对1   "App\Models\Usersinfo" 获取详情模型类  users_id 关联字段
    public function info(){
    	return $this->hasMany("App\Models\Usersinfo","order_id");
    }



}
