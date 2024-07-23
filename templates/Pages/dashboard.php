<?php 
/**
 * @var array candostatments
 */
$id = 1;
// switch ($currentSessionUser->role_id) {
switch ($id) {
    case 2:
        echo $this->element('dashboard/admin');
        break;
    default:
        echo $this->element('dashboard/user');
        break;
}
?>


