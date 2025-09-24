<?php
use App\Core\Url;
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>EduTrack · Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- base tokens/utilities first -->
  <link rel="stylesheet" href="<?= Url::to('assets/css/base.css') ?>">
  <!-- component styles -->
  <link rel="stylesheet" href="<?= Url::to('assets/css/header.css') ?>">
  <link rel="stylesheet" href="<?= Url::to('assets/css/home.css') ?>">
  <link rel="stylesheet" href="<?= Url::to('assets/css/footer.css') ?>">
</head>
<body>
  <?php require APP_PATH.'/views/partials/header.php'; ?>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-content">
      <h1>Welcome to <b>EduTrack</b></h1>
      <p class="lead">
        A secure, ethical platform for managing <b>students</b>, <b>lecturers</b>, 
        <b>subjects</b>, <b>enrolments</b>, and <b>marks</b>. Role-based access keeps data safe and simple.
      </p>
      <div class="cta-row">
        <a class="btn" href="<?= Url::to('index.php?route=login') ?>">Sign In</a>
      </div>
    </div>
    <div class="hero-image">
      <img src="<?= Url::to('assets/images/hero-1.png') ?>" alt="EduTrack Hero Image">
    </div>
  </section>

  <main class="container page">

    <!-- Features Section -->
    <section class="section features">
      <h2 class="h2">Features</h2>
      <div class="features-layout">
        <div class="features-text">
          <div class="grid cards">
            <article class="card">
              <h3 class="title">Centralised Records</h3>
              <p class="desc">Student & lecturer data unified in one secure place.</p>
            </article>
            <article class="card">
              <h3 class="title">Enrolments & Subjects</h3>
              <p class="desc">Students enrol in subjects; lecturers are assigned to teach them.</p>
            </article>
            <article class="card">
              <h3 class="title">Marks Management</h3>
              <p class="desc">Lecturers enter/update marks; students view their own only.</p>
            </article>
            <article class="card">
              <h3 class="title">Role-Based Access</h3>
              <p class="desc">Admins manage all; staff limited to their subjects; students read-only.</p>
            </article>
            <article class="card">
              <h3 class="title">Security & Privacy</h3>
              <p class="desc">CSRF, Argon2id hashing, audit trail, data minimisation by design.</p>
            </article>
          </div>
        </div>
        <div class="features-image">
          <img src="<?= Url::to('assets/images/home-features.jpg') ?>" alt="EduTrack Features">
        </div>
      </div>
    </section>

    <!-- Call To Action Section -->
    <section class="section section--cta">
      <div class="cta-box">
        <div class="cta-text">
          <h2 class="h2">Get Started</h2>
          <p class="muted">Log in with your role credentials to access the system.</p>
          <a class="btn" href="<?= Url::to('index.php?route=login') ?>">Login Now</a>
        </div>
        <div class="cta-image">
          <img src="<?= Url::to('assets/images/home-hero.jpg') ?>" alt="EduTrack Dashboard Illustration">
        </div>
      </div>
    </section>

  </main>

  <?php require APP_PATH.'/views/partials/footer.php'; ?>
</body>
</html>
