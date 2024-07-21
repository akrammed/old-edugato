<?php 
/**
 * @var array candostatments
 */
switch ($currentSessionUser->role_id) {
    case 1:
            echo $this->element('dashboard/user');
        break;
    case 2:
            echo $this->element('dashboard/admin');
        break;
    
    default:
       
        break;
}
?>


