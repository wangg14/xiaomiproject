<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
	//模型类对应的数据表
	protected $table = 'users';
	//开启自动维护时间戳 创建消息时间字段 created_at  修改消息时间字段 updated_at
    public $timestamps=false;
	
    //判断static
	public function getStatusAttribute($value){
		$status=[0=>'未激活',1=>"启用",2=>"禁用"];
		return $status[$value];
	}
}
