<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Index user data</title>
</head>
<body>

<div class="backButtonWrapper">
    <a href="{{route('user.index')}}" class="backButton">Вернуться</a>
</div>
<div class="userDataArrayWrapper">
    <div class="userDataWrapper" data-user-id="{{ $user->id }}">
        <div class="userDataValuesWrapper">
            <div class="stringData">User Id: {{$user->id}}</div>
            <div class="stringData">User name: {{$user->user_name}}</div>
            <div class="stringData">User phone: {{$user->phone_number}}</div>
            <div class="stringData">User email: {{$user->email}}</div>
        </div>
        <div class="userDataLinksWrapper">
            <div class="stringData">
                <a href="{{route('user.edit', $user->id)}}" class="editButton">Редактировать</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<style>
    body {
        background-color: black;
    }

    .backButtonWrapper {
        margin: 15px 0 0 35px;
    }

    .backButton, .showButton, .editButton, .deleteButton {
        text-decoration: none;
    }

    .backButton, .showButton, .editButton, .deleteButton {
        display: inline-block;
        color: white;
        border-radius: 20px;
        border: 0;
        width: 150px;
        height: 35px;
        background-color: #2985cd;
        -webkit-box-shadow: 0px 5px 10px 2px rgba(34, 60, 80, 0.2);
        -moz-box-shadow: 0px 5px 10px 2px rgba(34, 60, 80, 0.2);
        box-shadow: 0px 5px 10px 2px rgba(34, 60, 80, 0.2);
        text-align: center;
    }

    .showButton, .editButton, .deleteButton, .backButton {
        line-height: 31px;
    }


    .addButton:hover, .showButton:hover, .editButton:hover, .deleteButton:hover {
        cursor: pointer;
        background-color: #1f6fb0;
        transform: translateY(-1px);
    }

    .addButton:active, .showButton:active, .editButton:hover, .deleteButton:hover {
        transform: translateY(1px);
        box-shadow: 0px 2px 5px 1px rgba(34, 60, 80, 0.2);
    }

    .userDataArrayWrapper {
        display: flex;
        flex-direction: column;
    }

    .userDataWrapper {
        background-color: white;
        width: auto;
        margin: 20px 20px 0 0;
        border: 1px solid black;
        border-radius: 15px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        -webkit-box-shadow: 0px 5px 10px 2px rgba(34, 60, 80, 0.2);
        -moz-box-shadow: 0px 5px 10px 2px rgba(34, 60, 80, 0.2);
        box-shadow: 0px 5px 10px 2px rgba(34, 60, 80, 0.2);
    }

    .userDataValuesWrapper {
        display: flex;
        flex-direction: column;
    }

    .userDataLinksWrapper {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .stringData {
        margin: 10px
    }

</style>