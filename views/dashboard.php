<?php require 'header.php'; ?>
<div class="dashboard-container">
    <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <p>You have successfully logged in.</p>
    <a href="?action=logout">Log Out</a>
</div>
<?php require 'footer.php'; ?>
