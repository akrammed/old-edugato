<?php $this->extend('new-default'); 
$this->assign('navbar', $this->element('dashboard/nav'));
$this->prepend('content', '<main class="container-lg flex-grow-1 d-flex flex-column justify-content-center gap-6 py-8">'); 
$this->append('content', '</main>'); 
echo $this->fetch('content');
