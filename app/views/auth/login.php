<?php use App\Core\Session; ?>
<!doctype html><html><head><meta charset="utf-8"><title>Login</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="/public/assets/css/app.css">
</head><body>
  <main style="max-width:420px;margin:5rem auto;font-family:system-ui;">
    <h1>Sign in</h1>
    <?php if ($msg = Session::flash('error')): ?>
      <div style="color:#b00020;"><?= htmlspecialchars($msg) ?></div>
    <?php endif; ?>
    <form method="post" action="/public/index.php?route=auth.login">
      <input type="hidden" name="_csrf" value="<?= htmlspecialchars($csrf) ?>">
      <label>Email<br><input name="email" type="email" required></label><br><br>
      <label>Password<br><input name="password" type="password" required></label><br><br>
      <button type="submit">Login</button>
    </form>
  </main>
</body></html>
