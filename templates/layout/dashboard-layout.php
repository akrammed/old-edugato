<?php $isAdmin = $currentSessionUser->role_id === 2 ?>
<?php $this->extend('new-default'); 
if (!empty($sidebar) && $isAdmin) {
    $this->assign('sidebar', $this->element($sidebar));
}
$this->assign('navbar', $this->element('dashboard/nav', ['layer' => isset($layer) ? $layer : '', 'sidebar' => (isset($sidebar) && $isAdmin) ? true : false]));
$this->prepend('content', '<main class="container-xl flex-grow-1 d-flex flex-column justify-content-center gap-6 py-4">'); 
$this->append('content', '</main>'); 
echo $this->fetch('content');
