<?php
use App\Core\Url;
?>
<aside id="admin-sidebar" class="admin-sidebar" role="navigation" aria-label="Admin">
  <div class="sidebar-head">
    <span class="title">Navigation</span>
    <button class="icon-btn js-admin-close" aria-label="Close menu" aria-controls="admin-sidebar">
      <svg viewBox="0 0 24 24" width="22" height="22" aria-hidden="true"><path fill="currentColor" d="M18.3 5.71L12 12.01l-6.3-6.3-1.41 1.41 6.3 6.3-6.3 6.3 1.41 1.41 6.3-6.29 6.29 6.29 1.41-1.41-6.29-6.3 6.29-6.3z"/></svg>
    </button>
  </div>

  <nav class="sidebar-nav">
    <a class="item<?= ($_GET['route'] ?? '')==='admin.dashboard' ? ' active':'' ?>" href="<?= Url::to('index.php?route=admin.dashboard') ?>">
      <span class="ico" aria-hidden="true">📊</span> Dashboard
    </a>
    <a class="item<?= ($_GET['route'] ?? '')==='admin.users' ? ' active':'' ?>" href="<?= Url::to('index.php?route=admin.users') ?>">
      <span class="ico" aria-hidden="true">👤</span> Manage Users
    </a>
    <a class="item<?= ($_GET['route'] ?? '')==='admin.subjects' ? ' active':'' ?>" href="<?= Url::to('index.php?route=admin.subjects') ?>">
      <span class="ico" aria-hidden="true">📚</span> Subjects
    </a>
    <a class="item<?= ($_GET['route'] ?? '')==='admin.enrolments' ? ' active':'' ?>" href="<?= Url::to('index.php?route=admin.enrolments') ?>">
      <span class="ico" aria-hidden="true">📝</span> Enrolments
    </a>
    <a class="item<?= ($_GET['route'] ?? '')==='admin.marks' ? ' active':'' ?>" href="<?= Url::to('index.php?route=admin.marks') ?>">
      <span class="ico" aria-hidden="true">✅</span> Marks
    </a>
    <a class="item<?= ($_GET['route'] ?? '')==='admin.audit' ? ' active':'' ?>" href="<?= Url::to('index.php?route=admin.audit') ?>">
      <span class="ico" aria-hidden="true">🔍</span> Audit Log
    </a>
    <a class="item<?= ($_GET['route'] ?? '')==='admin.settings' ? ' active':'' ?>" href="<?= Url::to('index.php?route=admin.settings') ?>">
      <span class="ico" aria-hidden="true">⚙️</span> Settings
    </a>
  </nav>

  <div class="sidebar-foot">
    <small>© <?= date('Y') ?> EduTrack</small>
  </div>
</aside>
<div class="admin-scrim js-admin-scrim" hidden></div>
