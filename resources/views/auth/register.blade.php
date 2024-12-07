<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: url('{{ asset('images/bg-logreg.jpg') }}') no-repeat center center fixed;
      background-size: cover;
      background-color: #87CEEB;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 2rem;
    }
    .register-card {
      width: 400px;
      background: rgba(255, 255, 255, 0.9);
      box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
      padding: 2rem;
      border-radius: 10px;
      margin-top: 1rem;
    }
    .alert {
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>
  <div class="register-card">
    <h3 class="text-center">Register</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required autofocus>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Register</button>
      </div>
      <div class="text-center mt-3">
        <a href="{{ route('login') }}">Already registered? Login here</a>
      </div>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
