<footer class="bg-secondary color-background text-base">
  <div class="container-xl py-6 d-grid footer-grid-template-area">
    <div class="d-flex align-items-center gap-2 flex-shrink-0" style="grid-area: left;">
        <a href="#"><?= $this->element('icons/linkedin-icon', ['class' => 'w-6 h-6']) ?></a>
        <a href="#"><?= $this->element('icons/instagram-icon', ['class' => 'w-6 h-6']) ?></a>
        <a href="#"><?= $this->element('icons/facebook-icon', ['class' => 'w-6 h-6']) ?></a>
        <a href="#"><?= $this->element('icons/tiktok-icon', ['class' => 'w-6 h-6']) ?></a>
    </div>
    <ul class="d-flex flex-wrap justify-content-end align-items-center gap-4 flex-grow-1 reset-list" style="grid-area: center;">
        <li><a href="#">Home</a></li>
        <li><a href="#">Features</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Privacy policy</a></li>
        <li><a href="#">Terms of service</a></li>
    </ul>
    <div class="d-flex align-items-center flex-shrink-0" style="grid-area: right;">
        <p>EduGato 2024 - All rights reserved</p>
    </div>
  </div>
</footer>

<style>
  .footer-grid-template-area {
    display: grid;
    grid-template-columns: auto 1fr auto;
    grid-template-areas: "left center right";
    column-gap: 3rem;
    row-gap: 1rem;
  }
  @media (max-width: 991.98px) {
    .footer-grid-template-area {
        column-gap: 4rem;
        grid-template-columns: auto 1fr;
        grid-template-areas: "left center" "right center";
    }
  }
</style>