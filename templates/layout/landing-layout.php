<?php 
$this->extend('new-default'); 
$this->assign('navbar', $this->element('Lms.Default/navbar-main' ,[
    'currentSessionUser' => $currentSessionUser
]));
$this->assign('footer', $this->element('Lms.Default/footer'));
$this->prepend('content', '<main>'); 
$this->append('content', '</main>');
echo $this->fetch('content');