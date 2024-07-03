<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class AddLearningPathsTable extends AbstractMigration
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
        $this->execute("
        CREATE TABLE `allinone_bdd`.`learningpaths` (`id` INT(11) NOT NULL AUTO_INCREMENT , `path` VARCHAR(255) NULL , `picture` INT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
        ");
    }
}
