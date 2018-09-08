<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = "article";
}
/*create table article(
	id int(10) unsigned AUTO_INCREMENT comment'主键id',
    title varchar(20) not null COMMENT '标题',
    author varchar(20) COMMENT '作者',
    content text COMMENT'文章内容',
    hits int(10)  default 0 comment'点赞数',
    created_at timestamp default  CURRENT_TIMESTAMP comment '添加时间',
    PRIMARY KEY (id)
)ENGINE = MYISAM DEFAULT charset=utf8 COLLATE=utf8_general_ci;


create table click_record(
	id int(10) unsigned AUTO_INCREMENT comment'主键id',
    a_id int(10)unsigned comment '文章id',
    user_id int(10) unsigned comment'用户id',
	 PRIMARY KEY (id)
)ENGINE = MYISAM DEFAULT charset=utf8 COLLATE=utf8_general_ci;*/