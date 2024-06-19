<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= BASEURL ?>/css/auth.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>Login</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="container main">
        <div class="row">
          <div class="col-md-6 side-image"></div>

          <div class="col-md-6 right">
            <div class="input-box">
              <form action="<?= BASEURL ?>/login/store" method="post">
                <header>Login account</header>
                <div class="mb-2">
                    <?php Flasher::flash(); ?>    
                </div>
                <div class="input-field">
                  <!-- <input type="text" class="input" id="email" required="" autocomplete="off" /> -->
                  <input type="email" class="input" id="email" name="email" required />
                  <label for="email">Email</label>
                </div>
                <div class="input-field">
                  <input type="password" class="input" id="password" name="password" required />
                  <label for="pass">Password</label>
                </div>
                <div class="input-field">
                  <button type="submit" class="submit">Sign In</button>
                </div>
                <div class="register">
                  <span>Don't have an account? <a href="<?= BASEURL ?>/register">Sign up now</a></span>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
