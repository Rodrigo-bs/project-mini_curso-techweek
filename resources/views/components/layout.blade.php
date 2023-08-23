<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>{{ $title }}</title>
</head>
<body class="container">
    <div class="border-bottom mb-3 pb-2 pt-2 d-flex justify-content-between align-items-center">
        <h1>{{ $title ?? 'Lista de fazeres' }}</h1>
    </div>

    @if (session('msg'))
        <span @class([
            'alert',
            'd-block',
            'alert-danger' => session('msg')['action'] == 'danger',
            'alert-success' => session('msg')['action'] == 'success'
        ])>{{ session('msg')['msg'] }}</span>
    @endif

    {{ $slot }}
</body>
</html>