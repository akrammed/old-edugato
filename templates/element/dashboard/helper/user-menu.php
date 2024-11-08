<div class="dropdown">
    <a class="dropdown-toggle hide-dropdown-arrow btn-reset" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?php
        $profile =  $currentSessionUser->profile_picture != null ? '/uploads/pictures/' . $currentSessionUser->profile_picture : 'profile.jpg';
        echo $this->Html->image($profile, ['alt' => 'textalternatif', 'class' => 'w-10 h-10 rounded-circle']);
        ?>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
        <li>

            <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'edit', $currentSessionUser->id]) ?>" style="color:black">
                <i class="bx bx-user me-2"></i>
                <span class="align-middle">My Profile</span>
            </a>
        </li>
        <li>
            <div class="dropdown-divider"></div>
        </li>
        <li>
            <a class="dropdown-item" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'logout']) ?>" style="color:black">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">Log Out</span>
            </a>
        </li>
    </ul>
</div>