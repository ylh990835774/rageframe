<?php

use yii\db\Migration;

class m180307_012101_wechat_rule_keyword extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%wechat_rule_keyword}}', [
            'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
            'rule_id' => 'int(10) NULL DEFAULT \'0\' COMMENT \'规则ID\'',
            'module' => 'varchar(50) NOT NULL COMMENT \'模块名\'',
            'content' => 'varchar(255) NOT NULL COMMENT \'内容\'',
            'type' => 'tinyint(1) unsigned NOT NULL DEFAULT \'1\' COMMENT \'类别\'',
            'displayorder' => 'tinyint(3) unsigned NOT NULL DEFAULT \'1\' COMMENT \'优先级\'',
            'status' => 'tinyint(1) NULL DEFAULT \'1\' COMMENT \'状态[-1:删除;0:禁用;1启用]\'',
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='微信_回复关键字表'");
        
        /* 索引设置 */
        $this->createIndex('idx_content','{{%wechat_rule_keyword}}','content',0);
        
        
        /* 表数据 */
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%wechat_rule_keyword}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

