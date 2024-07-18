<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class EditFieldsInUsersTable extends AbstractMigration
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
        ALTER TABLE `users` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, 
        CHANGE `first_name` `first_name` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
        CHANGE `last_name` `last_name` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL, 
        CHANGE `gender` `gender` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL, 
        CHANGE `phone_number` `phone_number` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL, 
        CHANGE `email` `email` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
        CHANGE `username` `username` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL, 
        CHANGE `password` `password` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL, 
        CHANGE `profile_picture` `profile_picture` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL, 
        CHANGE `marital_status` `marital_status` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL, 
        CHANGE `is_active` `is_active` TINYINT(3) NULL, CHANGE `bio` `bio` VARCHAR(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL, 
        CHANGE `role_id` `role_id` INT(11) NULL DEFAULT 1,
        CHANGE `location_id` `location_id` INT(11) NULL, CHANGE `course_id` `course_id` INT(11) NULL, 
        CHANGE `product_id` `product_id` INT(11) NULL, CHANGE `attachment_id` `attachment_id` INT(11) NULL;');
    }
}