<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header('Location: login.php');
  exit;
}
require 'config.php';

$id = (int)($_GET['id'] ?? 0);
$ticket = $pdo->prepare("SELECT * FROM tickets WHERE id=?");
$ticket->execute([$id]);
$ticket = $ticket->fetch(PDO::FETCH_ASSOC);
if (!$ticket) exit('Ticket not found');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare(
      "UPDATE tickets SET visitorName=:n, email=:e, exhibitDate=:d, ticketQty=:q WHERE id=:id"
    );
    $stmt->execute([
        ':n'  => $_POST['visitorName'],
        ':e'  => $_POST['email'],
        ':d'  => $_POST['exhibitDate'],
        ':q'  => (int)$_POST['ticketQty'],
        ':id' => $id
    ]);
    header("Location: index.php?msg=updated");
    exit;
}

include 'header.php';
?>

<h3>Edit Ticket #<?= $id ?></h3>
<form method="post" class="vstack gap-2 col-md-6">
  <input class="form-control" name="visitorName" value="<?= htmlspecialchars($ticket['visitorName']) ?>" required>
  <input class="form-control" name="email" type="email" value="<?= htmlspecialchars($ticket['email']) ?>" required>
  <input class="form-control" name="exhibitDate" type="date" value="<?= $ticket['exhibitDate'] ?>" required>
  <input class="form-control" name="ticketQty" type="number" min="1" value="<?= $ticket['ticketQty'] ?>" required>
  <button class="btn btn-success">Update</button>
  <a href="index.php" class="btn btn-secondary">Back</a>
</form>

<?php include 'footer.php'; ?>
