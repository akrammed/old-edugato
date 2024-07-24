<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AddFieldsToShortsTable extends AbstractMigration
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
        $sql = "
        ALTER TABLE `learningpaths` 
        ADD `is_free` TINYINT(3) NULL DEFAULT '0' AFTER `picture`;

        ALTER TABLE `shorts` 
        ADD `is_active` TINYINT(3) NULL DEFAULT '0' AFTER `candostatment_id`, 
        ADD `is_free` TINYINT(3) NULL DEFAULT '0' AFTER `is_active`;
    ";
       $this->execute($sql);
    }
}
