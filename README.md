﻿﻿# space-php
KJ里面aaaaaaa
一人一分支!sssss
ahahah  sdgdsg
#user
用户表：user
#数据库连接
index/include/function.php
space2/lib.php
#首页
index/responsive/index.php
#入会申请流程
 公司投递申请表1 ->//管理员投递给秘书处2 -> 秘书处填写意见反馈给管理员 -> 管理员收到秘书处的反馈，并且提交给理事会 -> 理事会填写意见 -> 理事会反馈给管理员 ->公司上传缴费申请
 ->管理员看见缴费申请 ->已入会还是未入会
join_form  入会信息存储的数据表 state  
conucil_inform 投递给理事会的说明表  form_category字段 0:入会 1：膜初审 2：膜复审 3：网格初审 4 网格复审 5 企业项目莫经理
director 理事会给的意见的存储表
#category
 1 公司用户；2 秘书处用户；3是专家用户；4是理事会用户；5是管理员用户；
#膜结构等级会员初审
企业提交膜结构等级会员初审表 ->管理元选择专家，分配专家（可以是多个专家）->专家进行打分->投递给理事会->理事会进行意见反馈 ->名单汇总
#膜结构等级会员初审（有问题的情况下）
企业用户提交初审表->管理员（分配给秘书处）->秘书处形式审查->反馈意见给管理员->管理员意见反馈企业用户（修改）->企业用户重新提交->管理员分配专家->专家进行打分->投递给理事会->理事会进行意见反馈->名单汇总；
