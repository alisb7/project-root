<?php
use App\Core\Url;
?>
<header class="topbar">
  <div class="topbar-inner container">
    <a class="brand" href="<?= Url::to('index.php?route=home') ?>">Edu<b>Track</b></a>

    <!-- Hamburger (CSS-only) -->
    <input type="checkbox" id="nav-toggle" class="nav-toggle" aria-label="Toggle navigation">
    <label for="nav-toggle" class="nav-burger" aria-hidden="true">
      <span></span><span></span><span></span>
    </label>

    <nav class="nav">
      <a href="<?= Url::to('index.php?route=home') ?>">Home</a>
      <a href="<?= Url::to('index.php?route=about') ?>">About</a>
      <a href="<?= Url::to('index.php?route=contact') ?>">Contact</a>
    </nav>

    <div class="spacer"></div>
    <a class="btn login-btn" href="<?= Url::to('index.php?route=login') ?>">Login</a>
  </div>
</header>
