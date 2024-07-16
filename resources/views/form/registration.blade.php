<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geetest CAPTCHA Integration</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    @geetestCaptchaAssets()
</head>
<body>
    <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->has('captcha'))
                    <div class="alert alert-danger">
                        {{ $errors->first('captcha') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}" class="p-4 border rounded bg-light">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <div id="captcha-id" name="geetest_captcha">
                            <!-- Here we render Geetest captcha -->
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
                @geetestCaptchaInit('captcha-id')
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
