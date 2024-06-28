<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class InsertTypeQuiz extends AbstractMigration
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
         insert into quiztypes values(1,'Choose one option');
         insert into quiztypes values(2,'Choose one image');
         insert into quiztypes values(3,'Order the words');
         insert into quiztypes values(4,'Match');
         insert into quiztypes values(5,'Carusel');
         insert into quiztypes values(6,'Listen & order');
         insert into quiztypes values(7,'Read & repeat');
         insert into quiztypes values(8,'Conversation speaking');
         insert into quiztypes values(9,'Conversation ordering');


        ");
    }
}
