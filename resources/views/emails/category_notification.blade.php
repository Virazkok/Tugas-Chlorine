<!DOCTYPE html>
<html>
<head>
  <style>
    body {
        font-family: Arial, sans-serif;
        background: #f5f5f5;
        padding: 20px;
    }
    .email-box {
        background: #ffffff;
        padding: 20px;
        border-radius: 5px;
        max-width: 600px;
        margin: auto;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
        color: #333;
    }
    p {
        font-size: 16px;
        color: #555;
    }
  </style>
</head>
<body>
  <div class="email-box">
    <h2>Notifikasi Kategori</h2>
    <p>Kategori <strong>{{ $category->name }}</strong> telah <strong>{{ $type }}</strong>.</p>
  </div>
</body>
</html>
