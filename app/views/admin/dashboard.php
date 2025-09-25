<?php
// No role guard here (same logic as your working minimal page)
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin Dashboard · EduTrack</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- Styles -->
  <link rel="stylesheet" href="/project-root/public/assets/css/base.css">
  <link rel="stylesheet" href="/project-root/public/assets/css/admin-shell.css">
</head>
<body>

  <?php
  // Topbar + Sidebar partials (the ones you posted)
  require APP_PATH . '/views/partials/admin/topbar.php';
  ?>
  
  <div class="admin-shell">
    <?php require APP_PATH . '/views/partials/admin/sidebar.php'; ?>

    <main class="admin-content">
      <h2>Admin Dashboard</h2>
      <p>Welcome.</p>

      <div style="margin-top:16px;display:grid;gap:14px;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));">
        <div style="background:var(--card);border-radius:var(--radius);padding:16px;box-shadow:var(--shadow);">
          <div class="muted" style="margin-bottom:6px;">Total Students</div>
          <div style="font-size:1.6rem;font-weight:800;">—</div>
        </div>
        <div style="background:var(--card);border-radius:var(--radius);padding:16px;box-shadow:var(--shadow);">
          <div class="muted" style="margin-bottom:6px;">Total Lecturers</div>
          <div style="font-size:1.6rem;font-weight:800;">—</div>
        </div>
        <div style="background:var(--card);border-radius:var(--radius);padding:16px;box-shadow:var(--shadow);">
          <div class="muted" style="margin-bottom:6px;">Subjects</div>
          <div style="font-size:1.6rem;font-weight:800;">—</div>
        </div>
        <div style="background:var(--card);border-radius:var(--radius);padding:16px;box-shadow:var(--shadow);">
          <div class="muted" style="margin-bottom:6px;">Pending Enrolments</div>
          <div style="font-size:1.6rem;font-weight:800;">—</div>
        </div>
      </div>

      <p style="margin-top:22px">
        <!-- Same simple logout link you used in the working page -->
        <a href="/public/index.php?route=logout">Logout</a>
      </p>
    </main>
  </div>

  <!-- JS for hamburger + off-canvas sidebar -->
  <script src="/project-root/public/assets/js/admin-shell.js"></script>
</body>
</html>
