<?php 
switch ($currentSessionUser->role_id) {
    case 2:
        echo $this->element('dashboard/admin');
        break;
    default:
        echo $this->element('dashboard/user');
        break;
}
?>



