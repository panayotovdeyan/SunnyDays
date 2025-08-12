<?php
session_start();
define("SunnyDays", true);
require_once 'includes/db_SunnyDays.php';
require_once 'views/head-html.php';
require_once 'views/header-html.php';
?>

<main id="main">
  <section class="inner-page" id="resetPasswordSection">
    <div class="container" data-aos="fade-up">
      <?php
      if ($_SERVER['REQUEST_METHOD'] === 'GET') {
          $token = $_GET['token'] ?? '';

          if (empty($token)) {
              echo "<p>Невалиден линк.</p>";
          } else {
              $query = "SELECT email FROM password_resets WHERE token = '$token' AND expires_at > NOW()";
              $result = mysqli_query($conn, $query);
              if (!$result || mysqli_num_rows($result) === 0) {
                  echo "<script> alert('Линкът е невалиден или е изтекъл. Генерирайте отново.'); window.location.href = 'forgot-password-view.php'; </script>";

              } else {
                  ?>
                    <div class="section-header resetPassword">
                        <h2>Смяна на парола</h2>
                    </div>
                    <br>
                    <br>
                  <form method="POST" action="reset-password.php" id="resetPasswordForm" class="changePassword">
                    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                    
                    <div class="form-group">
                      <label for="new_password">Нова парола:</label><br>
                      <input type="password" id="newPassword" name="new_password" required>
                      <img id="toggleNewPassword" src="/assets/img/Icons/visibility_18dp_000000.svg" class="toggle-password" style="cursor:pointer; margin-left:5px;" />
                    </div>

                    <div class="form-group">
                      <label for="confirm_password">Потвърди паролата:</label><br>
                      <input type="password" id="confirmPassword" name="confirm_password" required>
                      <img id="toggleConfirmPassword" src="/assets/img/Icons/visibility_18dp_000000.svg" class="toggle-password" style="cursor:pointer; margin-left:5px;" />
                    </div>

                    <button type="submit" name="reset" id="reset" class="btn btn-primary">Смени паролата</button>
                  </form>
                  <?php
              }
          }
      } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $token = $_POST['token'] ?? '';
          $newPassword = $_POST['new_password'] ?? '';
          $confirmPassword = $_POST['confirm_password'] ?? '';
          
          if ($newPassword !== $confirmPassword) {
              echo "<script>
                      alert('Паролите не съвпадат.');
                      window.location.href = 'reset-password.php?token=" . urlencode($token) . "';
                    </script>";
              exit;
          } else {
              $query = "SELECT email FROM password_resets WHERE token = '$token' AND expires_at > NOW()";
              $result = mysqli_query($conn, $query);

              if ($result && mysqli_num_rows($result) > 0) {
                  $email = mysqli_fetch_assoc($result)['email'];
                  $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                  mysqli_query($conn, "UPDATE users SET password = '$hashedPassword' WHERE email = '$email'");
                  mysqli_query($conn, "DELETE FROM password_resets WHERE email = '$email'");

                  echo "<script>alert('Паролата е сменена успешно. Ще бъдете пренасочени -> Вход.'); window.location.href = 'login.php';</script>";
              } else {
                echo "<script>alert('Невалиден токен/линк.'); window.location.href = 'forgot-password-html.php';</script>";

              }
          }
      }
      ?>
    </div>
  </section>
</main>

<?php require_once 'views/footer-html.php'; ?>
