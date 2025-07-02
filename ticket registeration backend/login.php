<?php
session_start();
$loginError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    if ($user === 'admin' && $pass === 'admin123') {
        $_SESSION['admin'] = true;
        header('Location: admin.php');
        exit;
    }
    $loginError = 'Invalid credentials';
}

include 'header.php';
?>
<div class="row justify-content-center">
  <div class="col-md-4 section-card">
    <h3 class="text-center mb-3">Admin Login</h3>

    <?php if ($loginError): ?>
      <div class="alert alert-danger"><?= $loginError ?></div>
    <?php endif; ?>

    <form method="post" class="vstack gap-3">
      <input class="form-control" name="username" placeholder="Username" required>
      <input class="form-control" name="password" type="password" placeholder="Password" required>
      <button class="btn btn-primary w-100">Login</button>
    </form>
  </div>
</div>
<?php include 'footer.php'; ?>
