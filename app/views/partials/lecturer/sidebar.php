<?php use App\Core\Url; ?>
<aside id="admin-sidebar" class="admin-sidebar" role="navigation" aria-label="Lecturer">
  <div class="sidebar-head">
    <span class="title">Navigation</span>
    <button class="icon-btn js-admin-close" aria-label="Close menu" aria-controls="admin-sidebar">
      <svg viewBox="0 0 24 24" width="22" height="22" aria-hidden="true">
        <path fill="currentColor" d="M18.3 5.71L12 12.01l-6.3-6.3-1.41 1.41 6.3 6.3-6.3 6.3 1.41 1.41 6.3-6.29 6.29 6.29 1.41-1.41-6.29-6.3 6.29-6.3z"/>
      </svg>
    </button>
  </div>

  <nav class="sidebar-nav">
    <a class="item<?= (($_GET['route'] ?? '')==='lecturer.dashboard') ? ' active':'' ?>" href="<?= Url::to('index.php?route=lecturer.dashboard') ?>">
      <span class="ico" aria-hidden="true">📊</span> Dashboard
    </a>
    <a class="item<?= (($_GET['route'] ?? '')==='lecturer.subjects') ? ' active':'' ?>" href="<?= Url::to('index.php?route=lecturer.subjects') ?>">
      <span class="ico" aria-hidden="true">📚</span> My Subjects
    </a>
    <a class="item<?= (($_GET['route'] ?? '')==='lecturer.cohorts') ? ' active':'' ?>" href="<?= Url::to('index.php?route=lecturer.cohorts') ?>">
      <span class="ico" aria-hidden="true">👥</span> Cohorts / Students
    </a>
    <a class="item<?= (($_GET['route'] ?? '')==='lecturer.assessments') ? ' active':'' ?>" href="<?= Url::to('index.php?route=lecturer.assessments') ?>">
      <span class="ico" aria-hidden="true">📝</span> Assessments
    </a>
    <a class="item<?= (($_GET['route'] ?? '')==='lecturer.marks') ? ' active':'' ?>" href="<?= Url::to('index.php?route=lecturer.marks') ?>">
      <span class="ico" aria-hidden="true">✅</span> Enter Marks
    </a>
    <a class="item<?= (($_GET['route'] ?? '')==='lecturer.messages') ? ' active':'' ?>" href="<?= Url::to('index.php?route=lecturer.messages') ?>">
      <span class="ico" aria-hidden="true">✉️</span> Messages
    </a>
    <a class="item<?= (($_GET['route'] ?? '')==='lecturer.profile') ? ' active':'' ?>" href="<?= Url::to('index.php?route=lecturer.profile') ?>">
      <span class="ico" aria-hidden="true">👤</span> Profile
    </a>
    <a class="item<?= (($_GET['route'] ?? '')==='lecturer.help') ? ' active':'' ?>" href="<?= Url::to('index.php?route=lecturer.help') ?>">
      <span class="ico" aria-hidden="true">❓</span> Help
    </a>
  </nav>

  <div class="sidebar-foot">
    <small>© <?= date('Y') ?> EduTrack</small>
  </div>
</aside>
<div class="admin-scrim js-admin-scrim" hidden></div>
