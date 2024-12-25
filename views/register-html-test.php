<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форми в контейнери</title>
    <link rel="stylesheet" href="/assets/css/style-test.css">
</head>
<body>
    <div class="form-container">
        <h2>Регистрация</h2>
        <form>
            <label for="username">Потребителско име</label>
            <input type="text" id="username" name="username" placeholder="Въведете потребителско име" required>
            
            <label for="email">Имейл</label>
            <input type="email" id="email" name="email" placeholder="Въведете имейл" required>
            
            <label for="password">Парола</label>
            <input type="password" id="password" name="password" placeholder="Въведете парола" required>
            
            <button type="submit">Регистрация</button>
        </form>
    </div>

    <div class="form-container">
        <h2>Вход</h2>
        <form>
            <label for="login-email">Имейл</label>
            <input type="email" id="login-email" name="login-email" placeholder="Въведете имейл" required>
            
            <label for="login-password">Парола</label>
            <input type="password" id="login-password" name="login-password" placeholder="Въведете парола" required>
            
            <button type="submit">Вход</button>
        </form>
    </div>
</body>
</html>
