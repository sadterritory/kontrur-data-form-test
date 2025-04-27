<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update user data</title>
</head>
<body>
<div class="addButtonWrapper">
    <a href="{{route('user.index')}}" class="addButton">Назад</a>
</div>
<div class="userDataFormWrapper">
    <form id="userDataForm" class="userDataForm">
        @csrf
        @method('Patch')
        <div class="wrapper">
            <div class="dataInputsWrapper">
                <div><input type="text" id="nameInput" placeholder="Введите имя" class="userDataInp" name="user_name"
                            value="{{$user->user_name}}"></div>
                <div><input type="tel" id="phoneInput" placeholder="Введите номер телефона" class="userDataInp"
                            name="phone_number" value="{{$user->phone_number}}"></div>
                <div><input type="email" id="emailInput" placeholder="Введите адрес электронной почты"
                            class="userDataInp" name="email" value="{{$user->email}}"></div>
            </div>
            <div class="sendButtonWrapper">
                <button id="submitButton" class="submitBtn" type="submit">Отправить</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('#userDataForm').on('submit', function (event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('user.update', ['user' => $user->id]) }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "user_name": $('#nameInput').val(),
                    "phone_number": $('#phoneInput').val(),
                    "email": $('#emailInput').val(),
                    "_method": "PATCH"
                },
                success: function (response) {
                    alert('Данные успешно обновлены!');
                },
                error: function(xhr) {
                    alert('Ошибка: ' + (xhr.responseJSON?.message || 'Неизвестная ошибка'));
                }
            });
        });
    });
</script>

<style>

    body{
        background-color: black;
    }

    input {
        border-radius: 20px;
        text-align: center;
        border: 0;
        -webkit-box-shadow: 0px 5px 10px 2px rgba(34, 60, 80, 0.2);
        -moz-box-shadow: 0px 5px 10px 2px rgba(34, 60, 80, 0.2);
        box-shadow: 0px 5px 10px 2px rgba(34, 60, 80, 0.2);
    }

    .addButtonWrapper {
        margin: 15px 0 20px 35px;
    }

    .addButton {
        display: inline-block;
        text-decoration: none;
        color: white;
        border-radius: 20px;
        border: 0;
        width: 150px;
        height: 35px;
        background-color: #2985cd;
        -webkit-box-shadow: 0px 5px 10px 2px rgba(34, 60, 80, 0.2);
        -moz-box-shadow: 0px 5px 10px 2px rgba(34, 60, 80, 0.2);
        box-shadow: 0px 5px 10px 2px rgba(34, 60, 80, 0.2);

        line-height: 33px;
        text-align: center;
    }

    .addButton:hover, .submitBtn:hover {
        background-color: #1f6fb0;
        transform: translateY(-1px);
        cursor: pointer;
    }

    .userDataFormWrapper {
        height: 30vh;
    }

    .userDataForm {
        height: 100%;
    }

    .wrapper {
        border-radius: 15px;
        background-color: white;
        height: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    .dataInputsWrapper {
        margin-left: 20px;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
    }

    .sendButtonWrapper {
        margin-right: 20px;
        align-content: center;
    }

    .submitBtn {
        color: white;
        border-radius: 20px;
        border: 0;
        width: 150px;
        height: 35px;
        background-color: #2985cd;
        -webkit-box-shadow: 0px 5px 10px 2px rgba(34, 60, 80, 0.2);
        -moz-box-shadow: 0px 5px 10px 2px rgba(34, 60, 80, 0.2);
        box-shadow: 0px 5px 10px 2px rgba(34, 60, 80, 0.2);
    }

    .userDataInp {
        height: 30px;
        width: 230px;
    }

</style>