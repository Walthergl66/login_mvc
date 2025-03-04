<?php require 'header.php'; ?>
<div class="form-container">
    <h2>User Registration</h2>
    <?php if (isset($message)): ?>
        <p class="message"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
    <form action="?action=register" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="?action=login">Log in here</a></p>
</div>
<?php require 'footer.php'; ?>
