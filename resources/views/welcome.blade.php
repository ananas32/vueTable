<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <title>vue table load</title>
    </head>
    <body>
        {{--<div class="flex-center position-ref full-height">--}}
            {{--@if (Route::has('login'))--}}
                {{--<div class="top-right links">--}}
                    {{--@if (Auth::check())--}}
                        {{--<a href="{{ url('/home') }}">Home</a>--}}
                    {{--@else--}}
                        {{--<a href="{{ url('/login') }}">Login</a>--}}
                        {{--<a href="{{ url('/register') }}">Register</a>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--@endif--}}

        {{--</div>--}}

        <div id="app">
            <users></users>
        </div>

        <template id="users-template">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>email</th>
                    <th>create at</th>
                </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users">
                        <td>@{{ user.id }}</td>
                        <td>@{{ user.name }}</td>
                        <td>@{{ user.email }}</td>
                        <td>@{{ user.created_at }}</td>
                    </tr>
                </tbody>
            </table>
        </template>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/vue/dist/vue.js"></script>
        <script>
            Vue.component('users', {
                template: '#users-template',

                data: function() {
                    return {
                        users: []
                    }
                },

                created: function() {
                    this.getUsers();
                },

                methods: {
                    getUsers:function () {
                        $.getJSON("{{ route('api_users') }}", function(users){
                            this.users = users;
                        }.bind(this));
                        setTimeout(this.getUsers, 5000);
                    }
                }
            });
            new Vue({
                el: "#app"
            });
        </script>
    </body>
</html>
