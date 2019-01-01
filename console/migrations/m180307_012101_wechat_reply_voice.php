<?php

use yii\db\Migration;

class m180307_012101_wechat_reply_voice extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%wechat_reply_voice}}', [
            'id' => 'int(10) NOT NULL AUTO_INCREMENT',
            'rule_id' => 'int(10) NULL',
            'mediaid' => 'varchar(255) NOT NULL',
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='微信_语音回复'");
        
        /* 索引设置 */
        
        
        /* 表数据 */
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%wechat_reply_voice}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

