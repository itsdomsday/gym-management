<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Gym Management - Update Trainer</title>

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
                    <a class="nav-link" aria-current="page" href="{{ route('index') }}">Members</a>
                    <a class="nav-link active" href="{{ route('trainers') }}">Trainers</a>
                    <a class="nav-link" href="#">Membership</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container p-5 m-5">
        <div class="row">
            <h1>Trainers List</h1>
            <p>A Laravel CRUD Activity by <strong>Dominic Cristobal</strong></p>
            <hr />
            <form action="{{ route('update_trainer') }}" method="POST">
            @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $trainer->name }}" placeholder="e.g. Juan Dela Cruz">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $trainer->email }}" placeholder="e.g. jdelacruz@example.com">
                </div>
                <div class="mb-3">
                    <label for="specialization" class="form-label">Specialization:</label>
                    <input type="text" class="form-control" id="specialization" name="specialization" value="{{ $trainer->specialization }}" placeholder="e.g. Chiropractor">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $trainer->phone }}" placeholder="e.g. 09191234567">
                </div>
                <input type="hidden" name="id" value="{{ $trainer->id }}">
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <a href="{{ route('trainers') }}">← Cancel</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>