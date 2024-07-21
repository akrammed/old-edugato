<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Edugato';
?>
<!DOCTYPE html>
<html>



<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_csrfToken" content="<?= $this->request->getAttribute('csrfToken') ?>">
    <title>
        <?= $cakeDescription  ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <?= $this->Html->css([]) ?>
    <?= $this->Html->script([]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <script>
        const formDataQuiz = new FormData();
    </script>


</head>

<body>
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
</body>

</html>