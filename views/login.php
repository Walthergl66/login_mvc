<?php require 'header.php'; ?>
<div class="form-container">
    <h2>User Login</h2>
    <?php if (isset($message)): ?>
        <p class="message"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
    <form action="?action=login" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Log In</button>
    </form>
    <p>Don't have an account? <a href="?action=register">Register here</a></p>
</div>
<?php require 'footer.php'; ?>
