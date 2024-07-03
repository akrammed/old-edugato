<?php
/**
 * @var array $currentSessionUser
 */

$this->assign('title', $currentSessionUser['first_name'] );
?>

<?= $this->element('Lms.Default/profile', [
            'currentSessionUser' => $currentSessionUser,
            'totalPoints' => $totalPoints
])?>


