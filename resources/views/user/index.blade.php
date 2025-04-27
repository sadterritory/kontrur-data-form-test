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

<div class="addButtonWrapper">
    <a href="{{route('user.create')}}" class="addButton">Добавить пользователя</a>
</div>
<div class="userDataArrayWrapper">
    @foreach($users as $user)
        <div class="userDataWrapper" data-user-id="{{ $user->id }}">
            <div class="userDataValuesWrapper">
                <div class="stringData">User Id: {{$user->id}}</div>
                <div class="stringData">User name: {{$user->user_name}}</div>
                <div class="stringData">User phone: {{$user->phone_number}}</div>
                <div class="stringData">User email: {{$user->email}}</div>
            </div>
            <div class="userDataLinksWrapper">
                <div class="stringData">
                    <a href="{{route('user.show', $user->id)}}" class="showButton">Посмотреть</a>
                </div>
                <div class="stringData">
                    <a href="{{route('user.edit', $user->id)}}" class="editButton">Редактировать</a>
                </div>
                <div class="stringData">
                    <form class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="deleteButton">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>

<script>
    $(document).ready(function() {
        $('.deleteButton').on('click', function(e) {
            e.preventDefault();
            const userWrapper = $(this).closest('.userDataWrapper');
            const userId = userWrapper.data('user-id');
            console.log(userId);
            const url = "{{ route('user.destroy', ':id') }}".replace(':id', userId);
            if(confirm('Вы уверены, что хотите удалить этого пользователя?')) {
                $.ajax({
                    url: url,
                    type: "DELETE",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "_method": "DELETE"
                    },
                    success: function(response) {
                        userWrapper.remove();
                        alert('Пользователь успешно удалён');
                    },
                    error: function(xhr) {
                        alert('Ошибка: ' + (xhr.responseJSON?.message || xhr.statusText));
                    }
                });
            }
        });
    });
</script>

<style>
    body {
        background-color: black;
    }

    .addButtonWrapper {
        margin: 15px 0 0 35px;
    }

    .addButton, .showButton, .editButton, .deleteButton {
        text-decoration: none;
    }

    .addButton, .showButton, .editButton, .deleteButton {
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

    .showButton, .editButton, .deleteButton {
        line-height: 31px;
    }

    .addButton {
        line-height: 16px;
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