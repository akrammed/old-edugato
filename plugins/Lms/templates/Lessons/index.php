<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $lessons
 */
?>

  


<div class="panel-content">

<section class="cart-banner position-relative text-center">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-12 col-md-9 col-lg-7">
                    <h1 class="font-30 text-white font-weight-bold"><?= __('Lessons List')?></h1>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-35">
        <h2 class="section-title">Filter </h2>

        <div class="panel-section-card py-20 px-25 mt-20">
            <form action="/panel/manage/students" method="get" class="row">


                <div class="col-12 col-lg-10">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="form-group">
                                <label class="input-label">lesson</label>
                                <input type="text" name="lesson" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="form-group">
                                <label class="input-label">description</label>
                                <input type="text" name="description" value="" class="form-control">
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="form-group">
                                <label class="input-label">course</label>
                                <input type="text" name="course" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-2 d-flex align-items-center justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary w-100 mt-2">Show Results</button>
                </div>
            </form>
        </div>
    </section>



    <section class="mt-35">
    <h2 class="section-title"><?= __('Lessons List')?></h2>



        <div class="panel-section-card py-20 px-25 mt-20">
            <div class="row">
                <div class="col-12 ">
                    <div class="table-responsive">
                        <table class="table text-center custom-table">
                            <thead>
                                <tr>
                                    <th class="text-left"><?= $this->Paginator->sort('id') ?></th>
                                    <th class="text-center"><?= $this->Paginator->sort('lesson') ?></th>
                                    <th class="text-center"><?= $this->Paginator->sort('description') ?></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($lessons as $lesson): ?>
                                <tr>
                                    <td class="text-left">
                                        <span class="d-block"><?= $this->Number->format($lesson->id) ?></span>
                                    </td>
                                    <td class="text-center align-middle">
                                        <?= h($lesson->lesson) ?>
                                    </td>
                                    <td class="text-center align-middle"><?= h($lesson->description) ?></td>

                                    <td class="text-center align-middle">
                                        <div class="btn-group dropdown table-actions">
                                            <button type="button" class="btn-transparent dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-vertical">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu font-weight-normal">
                                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lesson->id],['class'=>'webinar-actions d-block mt-10']) ?>
                                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lesson->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lesson->id),'class'=>'webinar-actions d-block mt-10']
                                        
                                            ) ?>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>

    </section>

    <div class="my-30">

    </div>
</div>