<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class Updat200724 extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $this->execute('
        ALTER TABLE `users` ADD `courses_user_id` INT(11) NULL AFTER `attachment_id`;
        CREATE TABLE `allinone_bdd`.`courses_users` (`id` INT(11) NOT NULL AUTO_INCREMENT , `user_id` INT(11) NULL , 
        `course_id` INT(11) NULL , `learningpath_id` INT(11) NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
        ');
    }
}
