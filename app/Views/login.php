<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - Vali Admin</title>
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>

    <section class="login-content">
        <div class="logo">
            <h1>Vali</h1>
        </div>

        <div class="login-box">
 
            <form class="login-form" action="/login/authenticate" method="post">
                <h3 class="login-head">
                    <i class="bi bi-person me-2"></i>
                    SIGN IN
                </h3>

              
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <div class="mb-3">
                    <label class="form-label">USERNAME</label>
                    <input class="form-control" type="text" name="username" placeholder="Email" required autofocus>
                </div>

                <div class="mb-3">
                    <label class="form-label">PASSWORD</label>
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>

                <div class="mb-3 utility">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox">
                            <span class="label-text">Stay Signed in</span>
                        </label>
                    </div>
                    <p class="semibold-text mb-2">
                        <a href="#" data-toggle="flip">Forgot Password?</a>
                    </p>
                </div>

                <div class="mb-3 btn-container d-grid">
                    <button class="btn btn-primary btn-block" type="submit">
                        <i class="bi bi-box-arrow-in-right me-2 fs-5"></i>
                        SIGN IN
                    </button>
                </div>
            </form>

      
            <form class="forget-form" action="index.html">
                <h3 class="login-head">
                    <i class="bi bi-person-lock me-2"></i>
                    Forgot Password ?
                </h3>
                <div class="mb-3">
                    <label class="form-label">EMAIL</label>
                    <input class="form-control" type="text" placeholder="Email">
                </div>
                <div class="mb-3 btn-container d-grid">
                    <button class="btn btn-primary btn-block">
                        <i class="bi bi-unlock me-2 fs-5"></i>
                        RESET
                    </button>
                </div>
                <div class="mb-3 mt-3">
                    <p class="semibold-text mb-0">
                        <a href="#" data-toggle="flip"><i class="bi bi-chevron-left me-1"></i> Back to Login</a>
                    </p>
                </div>
            </form>
        </div>
    </section>


    <script type="text/javascript">
    
        document.querySelectorAll('.login-content [data-toggle="flip"]').forEach(function (el) {
            el.addEventListener('click', function () {
                document.querySelector('.login-box').classList.toggle('flipped');
                return false;
            });
        });
    </script>
</body>
</html>
