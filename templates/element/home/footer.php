<section class="py-24 bg-light">
    <div class="d-flex justify-content-center gap-6 container-xl">
        <?= $this->Form->create(null, [
            // 'url' => ['controller' => 'Quizs', 'action' => 'checkOption'],
            'id' => 'contact-form',
            'method' => 'post',
            'class' => 'w-100 max-w-xl d-flex flex-column gap-4'
        ]) ?>
            <h2 class="text-3xl mb-10">
                Get in touch with us
            </h2>
            <?= $this->Form->control('path', [
                'type' => 'text',
                'class' => 'w-100 border text-base mt-2 rounded-2xl input--lg',
                'placeholder' => 'Enter your full name',
                'label' => 'Full Name'
            ]) ?>
             <?= $this->Form->control('path', [
                'type' => 'email',
                'class' => 'w-100 border text-base mt-2 rounded-2xl input--lg',
                'placeholder' => 'Enter your email',
                'label' => 'Email'
            ]) ?>
             <?= $this->Form->control('path', [
                'type' => 'textarea',
                'class' => 'w-100 border text-base mt-2 rounded-2xl',
                'placeholder' => 'Enter your message',
                'label' => 'Message'
            ]) ?>
            <button type="button" class="btn btn-secondary w-fit mb-12" >
                Send message
            </button>
            <div class="d-flex gap-8 text-base">
                <div class="flex-1">
                    <p class="text-lg mb-2">Email</p>
                    <p class="color-muted">contact@edugato.net</p>
                </div>
                <div class="flex-1">
                    <p class="text-lg mb-2">Address</p>
                    <p class="color-muted">Avenue Yasser Arafet, immeuble 17, 2ème étage, App20 Sousse 4054 - Tunisie</p>
                </div>
            </div>
        <?= $this->Form->end() ?>
    </div>
</section>