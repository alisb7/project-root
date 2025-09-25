<?php
// Same minimal logic as your simple page (no guards)
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Lecturer Dashboard · EduTrack</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Reuse the admin shell styles & behavior -->
  <link rel="stylesheet" href="/project-root/public/assets/css/base.css">
  <link rel="stylesheet" href="/project-root/public/assets/css/admin-shell.css">
  <style>
    /* Optional: small accent tweak so Lecturers feel distinct */
    .admin-topbar .brand-sub { color: var(--primary); }
    .lecturer-accent .card { border-left: 4px solid var(--primary); }
  </style>
</head>
<body>

  <?php require APP_PATH . '/views/partials/lecturer/topbar.php'; ?>

  <div class="admin-shell lecturer-accent">
    <?php require APP_PATH . '/views/partials/lecturer/sidebar.php'; ?>

    <main class="admin-content">
      <h2>Lecturer Dashboard</h2>
      <p>Welcome.</p>

      <!-- Quick stats -->
      <div style="margin-top:16px;display:grid;gap:14px;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));">
        <div class="card" style="background:var(--card);border-radius:var(--radius);padding:16px;box-shadow:var(--shadow);">
          <div class="muted" style="margin-bottom:6px;">My Subjects</div>
          <div style="font-size:1.6rem;font-weight:800;">—</div>
        </div>
        <div class="card" style="background:var(--card);border-radius:var(--radius);padding:16px;box-shadow:var(--shadow);">
          <div class="muted" style="margin-bottom:6px;">Active Cohorts</div>
          <div style="font-size:1.6rem;font-weight:800;">—</div>
        </div>
        <div class="card" style="background:var(--card);border-radius:var(--radius);padding:16px;box-shadow:var(--shadow);">
          <div class="muted" style="margin-bottom:6px;">Assessments</div>
          <div style="font-size:1.6rem;font-weight:800;">—</div>
        </div>
        <div class="card" style="background:var(--card);border-radius:var(--radius);padding:16px;box-shadow:var(--shadow);">
          <div class="muted" style="margin-bottom:6px;">Marks Pending</div>
          <div style="font-size:1.6rem;font-weight:800;">—</div>
        </div>
      </div>

      <p style="margin-top:22px">
        <a href="/public/index.php?route=logout">Logout</a>
      </p>
    </main>
  </div>

  <script src="/project-root/public/assets/js/admin-shell.js"></script>
</body>
</html>
