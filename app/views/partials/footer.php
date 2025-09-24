<?php
use App\Core\Url;
?>
<footer class="footer">
  <div class="container footer-inner">
    <p>© <?= date('Y') ?> EduTrack</p>
    <p class="sub">
      Supporting students, lecturers, and administrators with secure access to academic records.
    </p>
    <nav class="foot-nav">
      <a href="<?= Url::to('index.php?route=home') ?>">Home</a>
      <a href="<?= Url::to('index.php?route=about') ?>">About</a>
      <a href="<?= Url::to('index.php?route=contact') ?>">Contact</a>
    </nav>
  </div>
</footer>
