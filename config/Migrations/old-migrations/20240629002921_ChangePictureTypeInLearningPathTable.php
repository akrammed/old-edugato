<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class ChangePictureTypeInLearningPathTable extends AbstractMigration
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
            ALTER TABLE `learningpaths` CHANGE `picture` `picture` VARCHAR(255) NULL DEFAULT NULL;
        ');
    }
}
