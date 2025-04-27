<!DOCTYPE html>
<html>
<head>
    <title>Новый пользователь</title>
</head>
<body>
<h1>Данные нового пользователя:</h1>
<p>Имя: {{ $userData->user_name }}</p>
<p>Email: {{ $userData->email }}</p>
<p>Телефон: {{ $userData->phone_number }}</p>
</body>
</html>