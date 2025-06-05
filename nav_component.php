<?php session_start(); ?>


<style>
header {
  background-color: #333;
  padding: 15px 30px;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  gap: 15px;
}

header a {
  color: #fff;
  text-decoration: none;
  padding: 10px 18px;
  border-radius: 5px;
  font-weight: 500;
  transition: background-color 0.3s ease;
}

header a:hover {
  background-color: #555;
}

.login-btn {
  background-color: #007bff;
}

.login-btn:hover {
  background-color: #0056b3;
}

.register-btn {
  background-color: #28a745;
}

.register-btn:hover {
  background-color: #1e7e34;
}

.logout-btn {
  background-color: #dc3545;
}

.logout-btn:hover {
  background-color: #c82333;
}


</style>


<header>
    <a href="use_session.php">Home</a>
    <a href="#">About</a>

    <?php if (!isset($_SESSION['user'])): ?>
        <a href="index.html" class="login-btn">Login</a>
        <a href="index.html" class="register-btn">Register</a>
    <?php else: ?>
        <a href="logout.php" class="logout-btn">Logout</a>
    <?php endif; ?>
</header>


<script src="script.js"></script>