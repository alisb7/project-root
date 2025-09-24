<?php
use App\Core\Url;
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>About · EduTrack</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Base + components -->
  <link rel="stylesheet" href="<?= Url::to('assets/css/base.css') ?>">
  <link rel="stylesheet" href="<?= Url::to('assets/css/header.css') ?>">
  <link rel="stylesheet" href="<?= Url::to('assets/css/footer.css') ?>">
  <link rel="stylesheet" href="<?= Url::to('assets/css/about.css') ?>">
</head>
<body>
  <?php require APP_PATH.'/views/partials/header.php'; ?>

  <main class="about-page container">
    <section class="intro">
      <h1>About EduTrack</h1>
      <p>
        EduTrack is designed to provide secure, accessible, and collaborative solutions 
        for managing student records, enrolments, and academic progress. 
        Our mission is to support schools, lecturers, and students 
        with technology that makes education simpler and safer.
      </p>
    </section>

    <section class="about-grid">
      <article>
        <img src="<?= Url::to('assets/images/about/about-collaboration.png') ?>" alt="Team Collaboration">
        <h2>Collaboration</h2>
        <p>We make teamwork seamless for administrators, lecturers, and students alike.</p>
      </article>

      <article>
        <img src="<?= Url::to('assets/images/about/about-secure.png') ?>" alt="Secure Data">
        <h2>Secure Data</h2>
        <p>Advanced encryption and role-based access protect sensitive academic records.</p>
      </article>

      <article>
        <img src="<?= Url::to('assets/images/about/about-accessibility.png') ?>" alt="Accessibility">
        <h2>Accessibility</h2>
        <p>EduTrack is built to be inclusive and usable by all members of the community.</p>
      </article>

      <article>
        <img src="<?= Url::to('assets/images/about/about-partners.png') ?>" alt="Partnerships">
        <h2>Partnerships</h2>
        <p>We work hand-in-hand with educators and institutions to improve learning outcomes.</p>
      </article>

      <article>
        <img src="<?= Url::to('assets/images/about/about-learning.png') ?>" alt="Learning Together">
        <h2>Learning</h2>
        <p>Technology that supports classrooms, helping teachers focus on what matters most.</p>
      </article>
    </section>
  </main>

  <?php require APP_PATH.'/views/partials/footer.php'; ?>
</body>
</html>
