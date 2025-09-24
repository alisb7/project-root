<?php
use App\Core\Session;
use App\Core\Url;

$old    = Session::flash('contact_old') ?? ['name'=>'','email'=>'','subject'=>'','message'=>''];
$errors = Session::flash('contact_errors') ?? [];
$success= Session::flash('contact_success');
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Contact · EduTrack</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= Url::to('assets/css/base.css') ?>">
  <link rel="stylesheet" href="<?= Url::to('assets/css/header.css') ?>">
  <link rel="stylesheet" href="<?= Url::to('assets/css/footer.css') ?>">
  <link rel="stylesheet" href="<?= Url::to('assets/css/contact.css') ?>">
</head>
<body>
  <?php require APP_PATH.'/views/partials/header.php'; ?>

  <main class="contact container page">
    <header class="contact-hero">
      <div class="hero-text">
        <h1>Contact Us</h1>
        <p class="lead">Questions, feedback, or support requests — we’re here to help.</p>
      </div>
      <div class="hero-art">
        <img src="<?= Url::to('assets/images/about/about-learning.png') ?>" alt="Get in touch">
      </div>
    </header>

    <?php if ($success): ?>
      <div class="alert success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <?php if ($errors): ?>
      <div class="alert error">
        <ul>
          <?php foreach ($errors as $e): ?>
            <li><?= htmlspecialchars($e) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <section class="contact-grid">
      <form class="contact-card" method="post" action="<?= Url::to('index.php?route=contact.submit') ?>" novalidate>
        <input type="hidden" name="_csrf" value="<?= htmlspecialchars(Session::csrfToken()) ?>">

        <div class="field">
          <label for="name">Name</label>
          <input id="name" name="name" value="<?= htmlspecialchars($old['name']) ?>" required>
        </div>

        <div class="field">
          <label for="email">Email</label>
          <input id="email" name="email" type="email" value="<?= htmlspecialchars($old['email']) ?>" required>
        </div>

        <div class="field">
          <label for="subject">Subject</label>
          <input id="subject" name="subject" value="<?= htmlspecialchars($old['subject']) ?>" required>
        </div>

        <div class="field">
          <label for="message">Message</label>
          <textarea id="message" name="message" rows="6" required><?= htmlspecialchars($old['message']) ?></textarea>
        </div>

        <button class="btn-form" type="submit">Send Message</button>
        <p class="help">We respond within 1–2 business days.</p>
      </form>

      <aside class="info-card">
        <h3>Our Details</h3>
        <ul class="details">
          <li><strong>Email:</strong> support@edutrack.local</li>
          <li><strong>Availability:</strong> Mon–Fri, 9:00–17:00</li>
          <li><strong>Purpose:</strong> General queries, access requests, incident reporting</li>
        </ul>

        <div class="pill-grid">
          <div class="pill">
            <img src="<?= Url::to('assets/images/about/about-secure.png') ?>" alt="Security">
            <span>Security first</span>
          </div>
          <div class="pill">
            <img src="<?= Url::to('assets/images/about/about-accessibility.png') ?>" alt="Accessibility">
            <span>Accessible design</span>
          </div>
          <div class="pill">
            <img src="<?= Url::to('assets/images/about/about-collaboration.png') ?>" alt="Collaboration">
            <span>Built for teams</span>
          </div>
        </div>
      </aside>
    </section>
  </main>

  <?php require APP_PATH.'/views/partials/footer.php'; ?>
</body>
</html>
