<?php use App\Core\Url; ?>
<aside id="student-sidebar" class="student-sidebar" role="navigation" aria-label="Student">
  <div class="sidebar-head">
    <span class="title">Navigation</span>
    <!-- Close (mobile only) -->
    <button class="icon-btn js-stu-close" aria-label="Close menu" aria-controls="student-sidebar">
      <svg viewBox="0 0 24 24" width="22" height="22" aria-hidden="true">
        <path fill="currentColor" d="M18.3 5.71 12 12.01 5.71 5.71 4.3 7.12l6.29 6.29-6.29 6.3 1.41 1.41 6.29-6.29 6.29 6.29 1.41-1.41-6.29-6.3 6.29-6.29z"/>
      </svg>
    </button>
  </div>

  <nav class="sidebar-nav">
    <a class="item active" href="<?= Url::to('index.php?route=student.dashboard') ?>">
      <span class="ico" aria-hidden="true">🏠</span> Dashboard
    </a>
    <a class="item" href="#">
      <span class="ico" aria-hidden="true">📚</span> My Subjects
    </a>
    <a class="item" href="#">
      <span class="ico" aria-hidden="true">✅</span> My Marks
    </a>
    <a class="item" href="#">
      <span class="ico" aria-hidden="true">📝</span> Enrolments
    </a>
    <a class="item" href="#">
      <span class="ico" aria-hidden="true">🔔</span> Notifications
    </a>
    <a class="item" href="#">
      <span class="ico" aria-hidden="true">👤</span> Profile
    </a>
  </nav>

  <div class="sidebar-foot">
    <small>© <?= date('Y') ?> EduTrack</small>
  </div>
</aside>
<!-- Scrim for the drawer -->
<div class="student-scrim js-stu-scrim" hidden></div>
