<div id="modal-container" class="modal-container display-hidden">
    <div id="signup-modal" class="modal signup-modal display-hidden">


        <form action="php/actions/signup.php" id="signup-form" class="signup-form" method="POST">
            <div class="signup-modal__header">
                <div></div>
                <svg viewBox="0 0 24 24" aria-label="Twitter" class="signup-modal__header-icon icon-25px-primary ">
                    <g>
                        <path d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z"></path>
                    </g>
                </svg>

                <button class="button-primary-small">Sign up</button>
            </div>
            <h1 class="signup-form__heading heading-primary">Create your account</h1>

            <div class="signup-form__input-field form-input-field">
                <label for="" class="signup-form__label form-input-field__label">Email</label>
                <input type="text" name="email" id="email" class="signup-form__input form-input-field__input" />
            </div>

            <div class="signup-form__input-field form-input-field">
                <label for="" class="signup-form__label form-input-field__label">Password</label>
                <input type="text" name="password" id="password" class="signup-form__input form-input-field__input" />
            </div>

            <h3 class="signup-form__input-dob-heading heading-secondary">Date of birth</h3>
            <p class="signup-form__input-dob-text text-xs-light">This will not be shown publicly. Confirm your own age, even if this account is for a bussiness, pet or something else.</p>

            <div class="signup-form__dob-container">
                <div class="signup-form__dob-input-field form-select-input-field">
                    <label for="" class="signup-form__dob-label form-select-input-field__label">Month</label>
                    <select type="text" name="password" id="password" class="signup-form__dob-input form-select-input-field__input"></select>
                </div>

                <div class="signup-form__dob-input-field form-select-input-field">
                    <label for="" class="signup-form__dob-label form-select-input-field__label">Day</label>
                    <select type="text" name="password" id="password" class="signup-form__dob-input form-select-input-field__input"></select>
                </div>

                <div class="signup-form__dob-input-field form-select-input-field">
                    <label for="" class="signup-form__dob-label form-select-input-field__label">Year</label>
                    <select type="text" name="password" id="password" class="signup-form__dob-input form-select-input-field__input"></select>
                </div>
            </div>
        </form>
    </div>
</div>