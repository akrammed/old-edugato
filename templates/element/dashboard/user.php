<?php 
$count  = 0 ;
foreach ($candostatments as $value) {
    if($value->is_done){
        $count++;
    }
}
?>
<div class="d-flex justify-content-stretch gap-6">
    <div class="d-flex flex-column justify-content-between gap-8 flex-grow-1">
        <div class="w-100 d-flex align-items-center gap-4">
            <?php
        $profile =  $currentSessionUser->profile_picture != null ? '/uploads/pictures/' . $currentSessionUser->profile_picture : 'profile.jpg';
        echo $this->Html->image($profile, ['alt' => 'textalternatif', 'class' => 'w-20 h-20 rounded-circle']);
        ?>
            <div class="space-y-1">
                <p class="text-2xl lh-1">Welcome, <?= $currentSessionUser->first_name ?>!</p>
                <p class="text-base opacity-75">
                    <?= $currentSessionUser->first_name .' '. $currentSessionUser->last_name ?> - <?= $currentLearningPath->path ?></p>
            </div>
        </div>
        <div class="w-100 d-flex flex-wrap gap-2">
            <?= $this->element('dashboard/helper/pstatus-detailed-card', ['icon' => 'energy-icon', 'text' => '26', 'description' => 'Daily streaks']) ?>
            <?= $this->element('dashboard/helper/pstatus-detailed-card', ['icon' => 'cup-icon', 'text' => '115', 'description' => 'Quiz points']) ?>
            <?= $this->element('dashboard/helper/pstatus-detailed-card', ['icon' => 'filter-icon', 'text' => '2', 'description' => 'Conversations with Gato AI']) ?>
        </div>
    </div>
    <div class="flex-shrin-0 card justify-content-center align-items-center gap-4"
        style="width: 220px; min-height: 300px;">
        <?= $this->element('dashboard/helper/circular-progress-bar', ['value' => 60]) ?>
        <p class="text-base opacity-60 px-4 text-center">Language level progression</p>
    </div>
</div>
<div class="d-flex justify-content-between gap-6 card p-8 flex-row">
    <div class="d-flex flex-column justify-content-between gap-20 flex-shrink-0">
        <div class="space-y-1.5">
            <h2 class="text-xl lh-1"><?= $currentLearningPath->path ?></h2>
            <p class="text-base opacity-60">  
            <?= $count ?>/<?= count($candostatments)?> Candos completed</p>
        </div>
        <a href="<?= $this->Url->build(['controller' => 'Shorts', 'action' => 'watch',$activeCandostatments->id]) ?>" class="link color-primary d-flex align-items-center gap-2 text-lg">Continue playing <i
                class="fa-solid fa-arrow-right-long"></i></a>
    </div>
    <div class="d-flex flex-wrap gap-1.5 h-fit max-w-9/12 max-w-xl-9/14">
        <?php foreach ($candostatments as $key => $value) {
          echo  $this->element('dashboard/helper/cando-status-card', ['status' => ($value->is_active ? 'in-progress' : ($value->is_done == 1 ? 'done' : 'pending')), 'description' => $value->title ]);
        } ?>
    </div>
</div>
<script>
$(function() {
    $('[data-bs-toggle="tooltip"]').tooltip()
})
</script>