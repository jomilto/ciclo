<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 mx-auto">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        - {{ $error }} <br>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{route('users.store')}}" method="post">
                                <div class="form-row">
                                    <div class="col-sm-3">
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                                    </div>

                                    <div class="col-sm-4">
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                    </div>

                                    <div class="col-sm-3">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>

                                    <div class="col-auto">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <form action="{{route('users.destroy',$user)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <input 
                                            type="submit" 
                                            value="Delete" 
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Want to Delete... ?')"
                                        >
                                    </form>
                                </td>
                            </tr>   
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
