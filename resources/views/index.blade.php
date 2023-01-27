<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Gym Management</title>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('index') }}">Gym Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Members</a>
                    <a class="nav-link" href="{{ route('trainers') }}">Trainers</a>
                    <a class="nav-link" href="{{ route('memberships') }}">Memberships</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container p-5 m-5">
        <div class="row">
            <h1>Members List</h1>
            <p>A Laravel CRUD Activity by <strong>Dominic Cristobal</strong></p>
            @if (session('success'))
            <div class="alert alert-primary" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <hr />
            <form action="/create" method="GET">
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Membership Expiration</th>
                        <th scope="col">Date Added</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($members) > 0)
                    @foreach($members as $member)
                    <tr>
                        <td>{{ $member->id }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->membership_expiration }}</td>
                        <td>{{ $member->created_at->diffForHumans() }}</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('edit', $member->id) }}">Edit</a></li>
                                    <li><a class="dropdown-item" href="{{ route('delete', $member->id) }}">Delete</a></li>
                                    <li><a class="dropdown-item" href="{{ route('view_trainer', $member->trainer_id) }}">View Trainer</a></li>
                                    <li><a class="dropdown-item" href="#">View Membership</a></li>
                                </ul>
                            </div>


                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="7" class="text-center">
                            <div class="alert alert-secondary" role="alert">
                                No members yet.
                            </div>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>