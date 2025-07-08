<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f7fa;
            padding: 30px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 25px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        .radio-group {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .radio-option {
            display: flex;
            align-items: center;
        }

        .radio-option input {
            margin-right: 6px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .alert {
            max-width: 400px;
            margin: 0 auto 20px;
            padding: 15px;
            border-radius: 6px;
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
        }

        .alert ul {
            margin: 10px 0 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>

    <h1>Insert Data</h1>

    @if ($errors->any())
        <div class="alert">
            <strong>Perhatian!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/category', @$category->id) }}" method="post">
        @csrf

        <label for="name">Nama Kategori</label>
        <input type="text" name="name" id="name" value="{{ old('name', @$category->name) }}">

        <label>Is Publish</label>
        <div class="radio-group">
            <div class="radio-option">
                <input type="radio" name="is_publish" id="is_publish_1" value="1">
                <label for="is_publish_1">1 (True)</label>
            </div>
            <div class="radio-option">
                <input type="radio" name="is_publish" id="is_publish_0" value="0">
                <label for="is_publish_0">0 (False)</label>
            </div>
        </div>

        <input type="submit" value="Simpan">
    </form>

</body>
</html>
