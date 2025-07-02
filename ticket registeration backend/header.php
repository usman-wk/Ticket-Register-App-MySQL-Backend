<?php
/* ---------- header.php ---------- */
if (session_status() === PHP_SESSION_NONE) session_start();
$isAdmin = isset($_SESSION['admin']);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Stellar Events | Ticket Registration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">


  <style>
  :root{
    --bg-1:#0d1117;
    --bg-2:#161b22;
    --glass:rgba(22,27,34,0.65);
    --accent:#7b5bff;
    --accent-light:#9a7cff;
  }
  *,*::before,*::after{box-sizing:border-box;}
  body{
    margin:0;
    font-family:'Poppins',system-ui,sans-serif;
    background:var(--bg-1);
    color:#e6edf3;
    min-height:100vh;
    display:flex;
    flex-direction:column;
  }

  /* ─── Navbar ─────────────────────────────── */
  .navbar{
    background:#000000e6!important;
    backdrop-filter:blur(6px);
  }
  .navbar-brand{
    font-weight:600;
    letter-spacing:.5px;
    color:#ffffff!important;           /* always white */
  }
  .navbar .btn,
  .navbar .btn:hover{
    color:#ffffff!important;
    border-color:#ffffff80;
  }

  /* ─── Hero banner ────────────────────────── */
  .hero{
    background:linear-gradient(120deg,#7b5bff33 0%,#ff796e33 100%);
    border-radius:18px;
    padding:4rem 2rem;
    text-align:center;
    position:relative;
    overflow:hidden;
  }
  .hero::before{
    content:'';
    position:absolute; inset:0;
    background:url('https://images.unsplash.com/photo-1526498460520-4c246339dccb?auto=format&fit=cover&w=1200&q=60') center/cover;
    opacity:.05;
  }
  .hero h1{position:relative;font-weight:600;font-size:clamp(2.2rem,5vw,3rem);}
  .hero p{position:relative;color:#c9d1d9;font-size:1.1rem;margin-top:.5rem;}

  /* ─── Glass card ─────────────────────────── */
  .section-card{
    background:var(--glass);
    border:1px solid #ffffff22;
    backdrop-filter:blur(10px); -webkit-backdrop-filter:blur(10px);
    padding:28px;
    border-radius:16px;
    box-shadow:0 4px 18px #00000050;
    transition:transform .25s;
  }
  .section-card:hover{transform:translateY(-4px);}

  /* ─── Form inputs/buttons ────────────────── */
  input,button{border-radius:10px!important;}
  input{
    background:#1c2128!important;
    border:1px solid #333c45!important;
    color:#e6edf3!important;
  }
input::placeholder,
input::-webkit-input-placeholder,
input::-moz-placeholder,
input:-ms-input-placeholder,
input::-ms-input-placeholder{
    color:#f0f6fc;
    opacity:1;
}

  input:focus{
    border-color:var(--accent)!important;
    box-shadow:0 0 0 .15rem #7b5bff55!important;
  }
  .btn-accent{
    background:var(--accent);
    border:none;
    color:#fff;
    transition:background .2s,transform .2s;
  }
  .btn-accent:hover{
    background:var(--accent-light);
    transform:translateY(-2px);
  }
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="<?= $isAdmin ? 'admin.php' : 'index.php' ?>">🌟 Stellar Events</a>
    <div class="ms-auto">
      <?php if ($isAdmin): ?>
        <a href="logout.php" class="btn btn-sm btn-outline-warning">Logout</a>
      <?php else: ?>
        <a href="login.php" class="btn btn-sm btn-outline-light">Admin Login</a>
      <?php endif; ?>
    </div>
  </div>
</nav>

<div class="container my-5 flex-grow-1">
