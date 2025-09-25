<?php
use App\Core\Url;
use App\Core\Session;
$studentName = htmlspecialchars(Session::get('user_name') ?? 'Student');
?>
<header class="student-topbar" role="banner">
  <!-- Hamburger (mobile) -->
  <button class="icon-btn js-stu-menu"
          aria-label="Open menu"
          aria-controls="student-sidebar"
          aria-expanded="false">
    <svg viewBox="0 0 24 24" width="22" height="22" aria-hidden="true">
      <path fill="currentColor" d="M3 6h18v2H3zm0 5h18v2H3zm0 5h18v2H3z"/>
    </svg>
  </button>

  <a class="student-brand" href="<?= Url::to('index.php?route=student.dashboard') ?>">
    EduTrack <span class="brand-sub">Student</span>
  </a>

  <!-- Topbar nav (hidden on small screens) -->
  <nav class="student-topnav" aria-label="Primary">
    <a href="<?= Url::to('index.php?route=student.dashboard') ?>">Dashboard</a>
    <a href="#">My Subjects</a>
    <a href="#">My Marks</a>
    <a href="#">Notifications</a>
  </nav>

  <div class="student-top-actions">
    <div class="student-user">
      <span class="avatar" aria-hidden="true"><?= strtoupper(substr($studentName,0,1)) ?></span>
      <span class="name"><?= $studentName ?></span>
    </div>
    <a class="btn-logout" href="<?= Url::to('index.php?route=logout') ?>">Logout</a>
  </div>
</header>
