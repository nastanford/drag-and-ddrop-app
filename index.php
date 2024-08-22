<?php
require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $newPosition = $_POST['newPosition'];
    
    $stmt = $conn->prepare("UPDATE items SET position = ? WHERE id = ?");
    $stmt->bind_param("ii", $newPosition, $id);
    $stmt->execute();
    $stmt->close();
    
    exit;
}

$result = $conn->query("SELECT * FROM items ORDER BY position");
$items = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag and Drop List</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://unpkg.com/htmx.org@1.9.2"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Drag and Drop List</h1>
        <ul id="itemList">
            <?php foreach ($items as $item): ?>
                <li data-id="<?= $item['id'] ?>"><?= htmlspecialchars($item['name']) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <script src="script.js"></script>
</body>
</html>