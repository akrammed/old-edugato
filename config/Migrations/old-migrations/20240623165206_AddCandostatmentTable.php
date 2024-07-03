<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class AddCandostatmentTable extends AbstractMigration
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
        CREATE TABLE `allinone_bdd`.`candostatments` (`id` INT(11) NOT NULL AUTO_INCREMENT , `title` VARCHAR(255) NULL , `learningpath_id` INT(11) NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
        ");
    }
}
