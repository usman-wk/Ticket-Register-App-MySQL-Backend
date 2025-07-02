<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header('Location: login.php');
  exit;
}
require 'config.php';
$id = (int)($_GET['id'] ?? 0);
$pdo->prepare("DELETE FROM tickets WHERE id=?")->execute([$id]);
header("Location: index.php?msg=deleted");
exit;
