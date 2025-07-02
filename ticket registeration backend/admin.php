<?php
require 'config.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');   // guard route
    exit;
}

/* optional pagination etc. */
$tickets = $pdo->query("SELECT * FROM tickets ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);

include 'header.php';
?>

<!-- success alerts coming from ?msg= -->
<?php if (isset($_GET['msg'])): ?>
  <div class="alert alert-success">
    <?= match ($_GET['msg']) {
      'added'   => 'Ticket registered!',
      'deleted' => 'Ticket deleted.',
      'updated' => 'Ticket updated.',
    }; ?>
  </div>
<?php endif; ?>

<div class="text-center mb-4">
  <h2 class="fw-bold">Admin Dashboard</h2>
  <p class="text-light-emphasis">Manage registrations for <strong>Dastaan</strong></p>
</div>

<div class="row g-4">
  <!-- reuse same ticket form so admins can add -->
  <div class="col-lg-4">
    <div class="section-card">
      <h4 class="page-heading">Add / Register Ticket</h4>
      <form method="post" action="index.php" class="vstack gap-3">
        <!-- same 4 inputs -->
        <button class="btn btn-outline-primary fw-bold">Add Ticket</button>
      </form>
    </div>
  </div>

  <!-- full list with edit/delete -->
  <div class="col-lg-8">
    <div class="section-card">
      <h4 class="page-heading">All Tickets</h4>
      <table class="table table-dark table-hover table-bordered align-middle">
        <thead class="table-light">
          <tr><th>Name</th><th>Email</th><th>Date</th><th>Qty</th><th>Actions</th></tr>
        </thead>
        <tbody>
          <?php foreach ($tickets as $t): ?>
          <tr>
            <td><?= htmlspecialchars($t['visitorName']) ?></td>
            <td><?= htmlspecialchars($t['email']) ?></td>
            <td><?= $t['exhibitDate'] ?></td>
            <td><?= $t['ticketQty'] ?></td>
            <td>
              <a href="edit.php?id=<?= $t['id'] ?>" class="btn btn-sm btn-outline-info">Edit</a>
              <a href="delete.php?id=<?= $t['id'] ?>" class="btn btn-sm btn-outline-danger"
                 onclick="return confirm('Delete ticket?')">Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
