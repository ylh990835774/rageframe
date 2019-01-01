<?php

use yii\db\Migration;

class m180307_012059_wechat_fans extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%wechat_fans}}', [
            'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
            'member_id' => 'int(10) unsigned NULL DEFAULT \'0\' COMMENT \'用户id\'',
            'unionid' => 'varchar(64) NULL DEFAULT \'\' COMMENT \'唯一公众号ID\'',
            'openid' => 'varchar(50) NOT NULL DEFAULT \'\' COMMENT \'openid\'',
            'nickname' => 'varchar(50) NULL DEFAULT \'\' COMMENT \'昵称\'',
            'headimgurl' => 'varchar(255) NULL DEFAULT \'\' COMMENT \'头像\'',
            'sex' => 'tinyint(2) NULL DEFAULT \'0\' COMMENT \'性别\'',
            'follow' => 'tinyint(1) NULL DEFAULT \'1\' COMMENT \'是否关注[1:关注;0:取消关注]\'',
            'followtime' => 'int(10) unsigned NULL DEFAULT \'0\' COMMENT \'关注时间\'',
            'unfollowtime' => 'int(10) unsigned NULL DEFAULT \'0\' COMMENT \'取消关注时间\'',
            'group_id' => 'int(10) NULL DEFAULT \'0\' COMMENT \'分组id\'',
            'tag' => 'varchar(1000) NULL DEFAULT \'\' COMMENT \'标签\'',
            'last_longitude' => 'varchar(10) NULL DEFAULT \'\' COMMENT \'最后一次经纬度上报\'',
            'last_latitude' => 'varchar(10) NULL DEFAULT \'\' COMMENT \'最后一次经纬度上报\'',
            'last_address' => 'varchar(100) NULL DEFAULT \'\' COMMENT \'最后一次经纬度上报地址\'',
            'last_updated' => 'int(10) NULL DEFAULT \'0\' COMMENT \'最后更新时间\'',
            'country' => 'varchar(100) NULL DEFAULT \'\' COMMENT \'国家\'',
            'province' => 'varchar(100) NULL DEFAULT \'\' COMMENT \'省\'',
            'city' => 'varchar(100) NULL DEFAULT \'\' COMMENT \'市\'',
            'append' => 'int(10) unsigned NULL DEFAULT \'0\' COMMENT \'创建时间\'',
            'updated' => 'int(10) NULL DEFAULT \'0\' COMMENT \'修改时间\'',
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='微信_粉丝表'");
        
        /* 索引设置 */
        $this->createIndex('openid','{{%wechat_fans}}','openid',0);
        $this->createIndex('nickname','{{%wechat_fans}}','nickname',0);
        $this->createIndex('append','{{%wechat_fans}}','append',0);
        $this->createIndex('member_id','{{%wechat_fans}}','member_id',0);
        
        
        /* 表数据 */
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%wechat_fans}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

