<?php
use App\Core\Url;
use App\Core\Session;
$adminName = htmlspecialchars(Session::get('user_name') ?? 'Admin');
?>
<header class="admin-topbar" role="banner">
  <button class="icon-btn js-admin-menu" aria-label="Open menu" aria-expanded="false" aria-controls="admin-sidebar">
    <!-- hamburger -->
    <svg viewBox="0 0 24 24" width="22" height="22" aria-hidden="true">
      <path fill="currentColor" d="M3 6h18v2H3zm0 5h18v2H3zm0 5h18v2H3z"/>
    </svg>
  </button>

  <a class="admin-brand" href="<?= Url::to('index.php?route=admin.dashboard') ?>">
    <span class="logo-dot"></span> EduTrack <span class="brand-sub">Admin</span>
  </a>

  <nav class="admin-top-nav">
    <a href="<?= Url::to('index.php?route=admin.notifications') ?>" class="top-nav-item" title="Notifications">🔔</a>
    <a href="<?= Url::to('index.php?route=admin.settings') ?>" class="top-nav-item" title="Settings">⚙️</a>
    <a href="<?= Url::to('index.php?route=admin.help') ?>" class="top-nav-item" title="Help">❓</a>
  </nav>

  <div class="admin-top-actions">
    <div class="admin-user">
      <span class="avatar" aria-hidden="true"><?= strtoupper(substr($adminName,0,1)) ?></span>
      <span class="name"><?= $adminName ?></span>
    </div>
    <a class="btn-logout" href="<?= Url::to('index.php?route=logout') ?>">Logout</a>
  </div>
</header>
