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
      // --- ЛОГИКА ЗА ОБРАБОТКА (POST) ---
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $token = $_POST['token'] ?? '';
          $newPassword = $_POST['new_password'] ?? '';
          $confirmPassword = $_POST['confirm_password'] ?? '';

          if ($newPassword !== $confirmPassword) {
              echo "<script>alert('Паролите не съвпадат.'); window.location.href = 'reset-password.php?token=" . urlencode($token) . "';</script>";
              exit;
          }

          // 1. Проверка на токена и взимане на имейла (Prepared Statement)
          $stmt = $conn->prepare("SELECT email FROM password_resets WHERE token = ? AND expires_at > NOW() LIMIT 1");
          $stmt->bind_param("s", $token);
          $stmt->execute();
          $result = $stmt->get_result();

          if ($result && $result->num_rows > 0) {
              $email = $result->fetch_assoc()['email'];
              $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

              // 2. Обновяване на паролата на потребителя (Prepared Statement)
              $updateStmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
              $updateStmt->bind_param("ss", $hashedPassword, $email);
              
              if ($updateStmt->execute()) {
                  // 3. Изтриване на използвания токен (Prepared Statement)
                  $deleteStmt = $conn->prepare("DELETE FROM password_resets WHERE email = ?");
                  $deleteStmt->bind_param("s", $email);
                  $deleteStmt->execute();

                  echo "<script>alert('Паролата е сменена успешно. Вече можете да влезете.'); window.location.href = 'login.php';</script>";
              } else {
                  echo "<p class='alert alert-danger'>Възникна грешка при обновяването. Моля, опитайте пак.</p>";
              }
          } else {
              echo "<script>alert('Линкът е невалиден, вече сте го използвали или е изтекъл.  Моля, генерирайте нов.'); window.location.href = 'forgot-password-view.php';</script>";
          }
      } 
      
      // --- ЛОГИКА ЗА ПОКАЗВАНЕ НА ФОРМАТА (GET) ---
      elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
          $token = $_GET['token'] ?? '';

          if (empty($token)) {
              echo "<div class='section-header'><h2>Невалиден достъп</h2><p>Моля, използвайте линка от вашия имейл.</p></div>";
          } else {
              // Проверка дали токенът е валиден, преди да покажем формата
              $stmt = $conn->prepare("SELECT email FROM password_resets WHERE token = ? AND expires_at > NOW() LIMIT 1");
              $stmt->bind_param("s", $token);
              $stmt->execute();
              $result = $stmt->get_result();

              if ($result && $result->num_rows > 0) {
                  ?>
                  <div class="section-header resetPassword">
                      <h2>Смяна на парола</h2>
                  </div>
                  <br><br>
                  <form method="POST" action="reset-password.php" id="resetPasswordForm" class="changePassword">
                      <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                      
                      <div class="form-group mb-3">
                        <label for="new_password">Нова парола:</label><br>
                        <div class="password-container d-flex align-items-center">
                            <input type="password" id="newPassword" name="new_password" class="form-control" style="max-width: 300px;" required>
                            <img id="toggleNewPassword" src="/assets/img/Icons/visibility_18dp_000000.svg" class="toggle-password" style="cursor:pointer; margin-left:10px;" />
                        </div>
                      </div>

                      <div class="form-group mb-4">
                        <label for="confirm_password">Потвърди паролата:</label><br>
                        <div class="password-container d-flex align-items-center">
                            <input type="password" id="confirmPassword" name="confirm_password" class="form-control" style="max-width: 300px;" required>
                            <img id="toggleConfirmPassword" src="/assets/img/Icons/visibility_18dp_000000.svg" class="toggle-password" style="cursor:pointer; margin-left:10px;" />
                        </div>
                      </div>

                      <button type="submit" name="reset" id="reset" class="btn btn-primary">Смени паролата</button>
                  </form>
                  <?php
              } else {
                  echo "<script> alert('Линкът е невалиден, вече сте го използвали или е изтекъл.  Моля, генерирайте нов.'); window.location.href = 'forgot-password-view.php'; </script>";
              }
          }
      }
      ?>
    </div>
  </section>
</main>

<?php require_once 'views/footer-html.php'; ?>