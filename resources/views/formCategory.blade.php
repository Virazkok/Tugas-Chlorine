<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
    <link rel="stylesheet" href="{{ asset('/css/adminForm.css') }}">
    <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f6f9;
    padding: 40px;
    color: #333;
}

h1 {
    text-align: center;
    color: #444;
    margin-bottom: 30px;
}

form {
    background: #fff;
    padding: 25px;
    max-width: 500px;
    margin: 0 auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

label {
    font-weight: bold;
    display: block;
    margin-top: 15px;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    margin-bottom: 15px;
}

input[type="radio"] {
    margin-right: 5px;
}

input[type="submit"] {
    background-color: #3490dc;
    color: white;
    border: none;
    padding: 12px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 6px;
    width: 100%;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #2779bd;
}

.alert.alert-danger {
    max-width: 500px;
    margin: 20px auto;
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    padding: 15px;
    border-radius: 6px;
    color: #721c24;
}
    
    </style>
</head>
<body>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Perhatian!</strong>
            <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>Form Edit Data</h1>

    <form action="{{ url('/category', @$category->id) }}" method="post">
        @csrf
        @if (!empty($category))
            @method('PATCH')
        @endif

        <label for="name">Nama Kategori</label><br>
        <input type="text" name="name" value="{{ old('name', @$category->name) }}"><br>

        <label for="is_publish">is publish?</label>
       <div class="radio-group">
            <div class="radio-option">
                <label for="is_publish_1">
                <input type="radio" name="is_publish" id="is_publish_1" value="1"
                {{ old('is_publish', @$category->is_publish) == 1 ? 'checked' : '' }}>
                1 (True)</label>
            </div>
            <div class="radio-option">
                 <label for="is_publish_0">
                <input type="radio" name="is_publish" id="is_publish_0" value="0"
                {{ old('is_publish', @$category->is_publish) == 0 ? 'checked' : '' }}>
               0 (False)</label>
            </div>
        </div>
    </form>

</body>
</html>
