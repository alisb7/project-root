<?php
use App\Core\Auth;
Auth::requireRole(['student']);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Student Dashboard · EduTrack</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/project-root/public/assets/css/base.css">
  <link rel="stylesheet" href="/project-root/public/assets/css/student.css">
</head>
<body class="student-shell">
  <?php include APP_PATH.'/views/partials/student/topbar.php'; ?>
  <?php include APP_PATH.'/views/partials/student/sidebar.php'; ?>

  <main class="student-main container" role="main">
    <h1 class="page-title">Student Dashboard</h1>

    <section class="cards-row">
      <article class="mini-card"><h3>My Subjects —</h3></article>
      <article class="mini-card"><h3>My Marks —</h3></article>
      <article class="mini-card"><h3>My Enrolments —</h3></article>
      <article class="mini-card"><h3>Notifications —</h3></article>
    </section>
  </main>

  <script src="/project-root/public/assets/js/student-ui.js" defer></script>
</body>
</html>
