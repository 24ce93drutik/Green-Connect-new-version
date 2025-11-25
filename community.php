<?php
include "db.php";

/* ---------------- DELETE POST ---------------- */
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    $stmt = $conn->prepare("DELETE FROM community WHERE content_id=?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();

    // Redirect so delete message doesn’t repeat on refresh
    header("Location: community.php?deleted=1");
    exit();
}

/* ---------------- UPDATE POST ---------------- */
if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("
        UPDATE community
        SET name=?, content_title=?, content_discription=?
        WHERE content_id=?
    ");
    $stmt->bind_param("sssi", $name, $title, $description, $id);
    $stmt->execute();

    // Redirect — prevents update form from showing again
    header("Location: community.php?updated=1");
    exit();
}

/* ---------------- CREATE POST ---------------- */
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = date("Y-m-d H:i:s");

    $stmt = $conn->prepare("
        INSERT INTO community (name, content_title, content_discription, content_date)
        VALUES (?, ?, ?, ?)
    ");
    $stmt->bind_param("ssss", $name, $title, $description, $date);
    $stmt->execute();

    header("Location: community.php?added=1");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Forum</title>
    <link rel="stylesheet" href="community.css">
</head>

<body>

<!-- BACK BUTTON -->
<a href="index.php" class="back-btn">← Back</a>

<div class="header">
    <h1>Community Forum</h1>
    <p>Share tips, ask questions, and connect with fellow plant enthusiasts</p>
</div>

<!-- SUCCESS MESSAGES -->
<?php if (isset($_GET['added'])) echo "<p class='success'>Post added successfully!</p>"; ?>
<?php if (isset($_GET['updated'])) echo "<p class='success'>Post updated successfully!</p>"; ?>
<?php if (isset($_GET['deleted'])) echo "<p class='deleted'>Post deleted successfully!</p>"; ?>


<!-- ===================== CREATE POST FORM ===================== -->
<?php if (!isset($_GET['edit'])): ?>
<div class="form-container">
    <h2>Share Your Thoughts</h2>

    <form action="" method="POST">
        <label>Your Name</label>
        <input type="text" name="name" required>

        <label>Title</label>
        <input type="text" name="title" required>

        <label>Content</label>
        <textarea name="description" required></textarea>

        <button type="submit" name="submit" class="post-btn">💬 Post to Forum</button>
    </form>
</div>
<?php endif; ?>


<!-- ===================== EDIT MODE FORM ===================== -->
<?php
if (isset($_GET['edit'])) {

    $edit_id = $_GET['edit'];

    $stmt = $conn->prepare("SELECT * FROM community WHERE content_id=?");
    $stmt->bind_param("i", $edit_id);
    $stmt->execute();
    $edit_row = $stmt->get_result()->fetch_assoc();
?>
<div class="form-container">
    <h2>Edit Post</h2>

    <form method="POST">
        <input type="hidden" name="id" value="<?= $edit_row['content_id'] ?>">

        <label>Your Name</label>
        <input type="text" name="name" value="<?= $edit_row['name']; ?>" required>

        <label>Title</label>
        <input type="text" name="title" value="<?= $edit_row['content_title']; ?>" required>

        <label>Content</label>
        <textarea name="description" required><?= $edit_row['content_discription']; ?></textarea>

        <button type="submit" name="update" class="post-btn">✔ Update Post</button>
    </form>
</div>
<?php } ?>


<!-- ===================== DISPLAY ALL POSTS ===================== -->
<h2 style="text-align:center; margin-top:30px;">Latest Posts</h2>

<div class="posts">

<?php
$sql = "SELECT * FROM community ORDER BY content_id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo "
        <div class='post-card'>
            <div class='avatar'></div>
            <div class='post-content'>
                <h3>" . $row['name'] . "</h3>
                <span class='date'>" . $row['content_date'] . "</span>

                <h4>" . $row['content_title'] . "</h4>
                <p>" . $row['content_discription'] . "</p>

                <div class='post-footer'>
    <a class='action-btn edit-btn' href='?edit=" . $row['content_id'] . "'>✏ Edit</a>

    <a class='action-btn delete-btn' 
       href='?delete=" . $row['content_id'] . "' 
       onclick='return confirm(\"Are you sure you want to delete this post?\")'>
       🗑 Delete
    </a>
</div>

            </div>
        </div>
        ";
    }

} else {
    echo "<p style='text-align:center;'>No posts yet.</p>";
}

$conn->close();
?>

</div>

</body>
</html>
