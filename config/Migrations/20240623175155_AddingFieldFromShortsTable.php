<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class AddingFieldFromShortsTable extends AbstractMigration
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
        ALTER TABLE `shorts` ADD `candostatment_id` INT(11) NULL AFTER `quiz_id`;
        ");
    }
}
