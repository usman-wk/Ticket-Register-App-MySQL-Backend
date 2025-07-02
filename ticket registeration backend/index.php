<?php
/* ---------- index.php (visitor page) ---------- */
require 'config.php';
if (session_status()===PHP_SESSION_NONE) session_start();

$errors=[];
if($_SERVER['REQUEST_METHOD']==='POST'){
  $name = trim($_POST['visitorName']??'');
  $email= trim($_POST['email']??'');
  $date = $_POST['exhibitDate']??'';
  $qty  =(int)($_POST['ticketQty']??1);

  if($name==='')                            $errors[]='Name required';
  if(!filter_var($email,FILTER_VALIDATE_EMAIL))$errors[]='Valid email required';
  if($date==='')                            $errors[]='Date required';
  if($qty<1)                                $errors[]='Qty ≥ 1';

  if(!$errors){
    $pdo->prepare("INSERT INTO tickets(visitorName,email,exhibitDate,ticketQty)VALUES(?,?,?,?)")
        ->execute([$name,$email,$date,$qty]);
    header('Location: index.php?msg=added');exit;
  }
}

include 'header.php';
?>

<?php if($errors): ?>
  <div class="alert alert-danger"><?=implode('<br>',$errors)?></div>
<?php elseif(isset($_GET['msg'])&&$_GET['msg']==='added'): ?>
  <div class="alert alert-success">Ticket registered successfully!</div>
<?php endif; ?>

<!-- hero -->
<section class="hero mb-5">
  <h1>Register for <span class="text-accent">Dastaan</span></h1>
  <p>An exclusive art exhibition celebrating stories through colour &amp; canvas.</p>
</section>

<!-- glass registration card -->
<div class="row justify-content-center">
  <div class="col-lg-5">
    <div class="section-card">
      <h4 class="page-heading">Reserve Your Spot</h4>
     <form method="post" class="vstack gap-3">

  <div>
    <label class="form-label" for="name">Full Name</label>
    <input id="name" class="form-control" name="visitorName"
           placeholder="Enter your name" required>
  </div>

  <div>
    <label class="form-label" for="email">Email Address</label>
    <input id="email" class="form-control" name="email" type="email"
           placeholder="you@example.com" required>
  </div>

  <div>
    <label class="form-label" for="date">Preferred Date</label>
    <input id="date" class="form-control" name="exhibitDate" type="date" required>
  </div>

  <div>
    <label class="form-label" for="qty">Ticket Quantity</label>
    <input id="qty" class="form-control" name="ticketQty" type="number"
           min="1" value="1" required>
  </div>

  <button class="btn btn-accent fw-bold">🎫 Register Now</button>
</form>

    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
