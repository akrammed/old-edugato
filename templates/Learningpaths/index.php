<?php echo $this->element('dashboard/add-course'); ?>
<?php echo $this->element('dashboard/add-short'); ?>
<?php echo $this->element('dashboard/add-quiz'); ?>
<?php echo $this->element('dashboard/add-user'); ?>
<?php echo $this->element('dashboard/add-canvas', [
    'name' => 'Learning Path',
    'url' => '/learningpaths/add',
    'id' => 'offcanvasEndAddLearningPath',
]); ?>
<?php echo $this->element('dashboard/add-canvas', [
    'name' => 'Learning Path',
    'url' => '/learningpaths/add',
    'id' => 'offcanvasEndEditLearningPath',
]); ?>
<?php echo $this->element('dashboard/add-canvas', [
    'name' => 'Learning Path',
    'url' => '/users/add',
    'id' => 'offcanvasEndCanDoS',
]); ?>
                        
<div class="flex-grow-1 d-flex flex-column" id="scContent">
    <div class="flex-grow-1 d-flex flex-column flex-xl-row gap-4">
        <div class="flex-grow-1 overflow-hidden d-flex flex-column">
            <section class="flex-grow-1 p-8" id="section">
                <div id="take-quiz-2">
                    <h3 class="text-xl mb-8">Manage learning paths</h3>
                    <div class="row row-cols-3 row-cols-lg-4 row-cols-xl-3 row-cols-xxl-4 g-4 mb-4">
                        <?php
                        foreach ($learningpaths as $lp) {
                            echo $this->element('course-card', ['img' => $lp->picture, 'title' => $lp->path, 'controller' => 'candostatments', 'id' => $lp->id, 'type' => "learningpaths"]);
                        }
                        echo $this->element('add-new', ["canvas" => "#offcanvasEndAddLearningPath"]) ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>