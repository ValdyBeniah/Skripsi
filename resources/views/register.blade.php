<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Register</title>
    <style>
        body {
            background-color: rgb(187, 187, 187)
            }
            
        .center {
            background-color: white; /* Warna form */
            padding: 30px;
            margin-top: 5%;
            border: 1px solid #ccc; /* Batas form */
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); /* Bayangan sekitar form */
        }

        label {
            margin-bottom: 4px;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h1>Register</h1><hr>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $item)
                    <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group mb-2">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="form-group mb-2">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" required>
            </div>

            <div class="form-group mb-2">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <div class="form-group mb-4">
                <label for="role">Role</label>
                <select class="form-control" name="role" id="role">
                    <option value="admin">Admin</option>
                    <option value="gudang">Gudang</option>
                    <option value="supir">Supir</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Register
                </button>
            </div>
        </form>
        </div>
    </div>
</body>
</html>
