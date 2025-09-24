<?php use App\Core\Session; use App\Core\Url; ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Login · EduTrack</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- shared tokens & components -->
  <link rel="stylesheet" href="<?= Url::to('assets/css/base.css') ?>">
  <link rel="stylesheet" href="<?= Url::to('assets/css/header.css') ?>">
  <link rel="stylesheet" href="<?= Url::to('assets/css/footer.css') ?>">
  <!-- page styles -->
  <link rel="stylesheet" href="<?= Url::to('assets/css/login.css') ?>">
</head>
<body>

  <?php /* optional header */ require APP_PATH.'/views/partials/header.php'; ?>

  <main class="auth-wrap">
    <section class="auth-card">
      <h1 class="auth-title">Sign in</h1>
      <p class="auth-sub">Use your email and password to access EduTrack.</p>

      <?php if ($msg = Session::flash('error')): ?>
        <div class="alert"><?= htmlspecialchars($msg) ?></div>
      <?php endif; ?>

      <form method="post" action="<?= Url::to('index.php?route=auth.login') ?>" novalidate>
        <input type="hidden" name="_csrf" value="<?= htmlspecialchars(Session::csrfToken()) ?>">

        <div class="field">
          <label class="label" for="email">Email</label>
          <input class="input" id="email" name="email" type="email" autocomplete="username" required>
        </div>

        <div class="field">
          <label class="label" for="password">Password</label>
          <input class="input" id="password" name="password" type="password" autocomplete="current-password" required>
        </div>

        <div class="actions">
          <button class="btn-login" type="submit">Login</button>
        </div>

        <p class="help">Forgot your password? Contact an administrator.</p>
      </form>
    </section>
  </main>

  <?php /* optional footer */ require APP_PATH.'/views/partials/footer.php'; ?>

</body>
</html>
