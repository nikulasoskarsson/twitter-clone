<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Auth page</title>
  <link rel="stylesheet" href="css/main.css" />
</head>

<body>

  <?php require('php/components/signup-modal.php'); ?>
  <main id="auth-page">
    <div class="auth-page__grid-container">
      <div class="auth__left">
        <div class="auth__left-container">
          <div>
            <div class="auth__left-tagline-field">
              <svg viewBox="0 0 24 24" class="auth__left-tagline-field-icon">
                <g>
                  <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
                </g>
              </svg>
              <h3 class="auth__left-tagline-field-heading">
                Follow your interests.
              </h3>
            </div>

            <div class="auth__left-tagline-field">
              <svg viewBox="0 0 24 24" class="auth__left-tagline-field-icon">
                <g>
                  <path d="M16.695 13.037c1.185 0 2.51-.132 3.368-1.11.72-.823.952-2.08.715-3.847-.333-2.478-1.86-3.956-4.083-3.956-2.225 0-3.75 1.48-4.084 3.956-.236 1.766-.002 3.023.717 3.846.858.98 2.184 1.11 3.368 1.11zM14.098 8.28c.134-.992.648-2.656 2.598-2.656 1.948 0 2.463 1.664 2.597 2.655.174 1.293.054 2.187-.358 2.657-.367.42-1.036.6-2.238.6s-1.87-.18-2.24-.6c-.412-.47-.533-1.364-.36-2.658zm9.788 11.222c-.763-3.066-3.72-5.208-7.19-5.208-1.765 0-3.392.558-4.67 1.505-1.278-.948-2.905-1.506-4.67-1.506-3.47 0-6.428 2.142-7.19 5.208-.156.625-.025 1.265.356 1.754.37.473.94.744 1.567.744h19.87c.628 0 1.2-.27 1.57-.745.382-.49.512-1.13.356-1.753zm-1.537.83c-.09.11-.22.168-.39.168h-7.413c.078-.32.084-.66 0-.998-.25-1-.75-1.888-1.41-2.65.993-.665 2.223-1.058 3.558-1.058 2.78 0 5.14 1.674 5.735 4.07.044.174.014.344-.08.467zM7.354 20.5H2.09c-.17 0-.3-.057-.388-.168-.096-.123-.126-.294-.083-.47.596-2.395 2.954-4.068 5.735-4.068 2.78 0 5.14 1.674 5.735 4.07.043.174.014.344-.082.467-.088.113-.22.17-.388.17H7.355zm.001-7.463c1.185 0 2.51-.132 3.367-1.11.72-.823.953-2.08.716-3.847-.333-2.478-1.86-3.956-4.083-3.956-2.225 0-3.75 1.48-4.084 3.956-.236 1.766-.002 3.023.717 3.846.858.98 2.184 1.11 3.368 1.11zM4.758 8.28c.134-.992.648-2.656 2.598-2.656 1.948 0 2.463 1.664 2.597 2.655.174 1.293.053 2.187-.358 2.658-.368.42-1.037.6-2.238.6-1.202 0-1.87-.18-2.24-.6-.412-.47-.533-1.365-.36-2.66z"></path>
                </g>
              </svg>
              <h3 class="auth__left-tagline-field-heading">
                Hear what people are talking about.
              </h3>
            </div>

            <div class="auth__left-tagline-field">
              <svg viewBox="0 0 24 24" class="auth__left-tagline-field-icon">
                <g>
                  <path d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z"></path>
                </g>
              </svg>
              <h3 class="auth__left-tagline-field-heading">
                Join the conversation.
              </h3>
            </div>
          </div>
        </div>
      </div>
      <div class="auth__right">
        <form action="#" id="login" class="login" method="POST">
          <div class="login__input-field form-input-field">
            <label for="" class="login__label  form-input-field__label">Phone, email or username</label>
            <input type="text" name="username" id="username" class="login__input  form-input-field__input" />
          </div>

          <div class="login__input-field  form-input-field">
            <label for="" class="login__label  form-input-field__label">Password</label>
            <input type="text" name="username" id="username" class="login__input  form-input-field__input" />
            <a href="#" class="link">Forgot password?</a>
          </div>

          <button class="button-inverted-small">Log in</button>
        </form>

        <div class="auth__cta">
          <div>
            <img src="img/twitter-logo.png" alt="twitter logo" class="auth__cta-logo" />
            <h1 class="auth__cta-heading">
              See what’s happening in the world right now.
            </h1>

            <p class="auth__cta-tagline">Join Twitter today.</p>
            <button class="button-long-primary" id="open-sign-up-modal">Sign up</button>
            <button class="button-long-inverted">Log in</button>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="auth__footer">
    <div class="auth__footer-container">
      <a href="" class="auth__footer-link">About</a>
      <a href="" class="auth__footer-link">Help Center</a>
      <a href="" class="auth__footer-link">Terms</a>
      <a href="" class="auth__footer-link">Privacy Policy</a>
      <a href="" class="auth__footer-link">Cookies</a>
      <a href="" class="auth__footer-link">Ads info</a>
      <a href="" class="auth__footer-link">Blog</a>
      <a href="" class="auth__footer-link">Status</a>
      <a href="" class="auth__footer-link">Jobs</a>
      <a href="" class="auth__footer-link">Brand</a>
      <a href="" class="auth__footer-link">Advetise</a>
      <a href="" class="auth__footer-link">Meeting</a>
      <a href="" class="auth__footer-link">Buissiness</a>
      <a href="" class="auth__footer-link">Developers</a>
      <a href="" class="auth__footer-link">Directory</a>
      <a href="" class="auth__footer-link">Settings</a>
      <p class="auth__footer-copyright">&copy; 2020 Twitter, Inc</p>
    </div>
  </footer>
  <script src="js/modals.js"></script>
  <script src="js/add-date-fields.js"></script>
</body>

</html>