
    <div id="signup-modal" class="modal signup-modal display-hidden">

        <div class="modal__content">
            <form id="signup-form" class="signup-form">
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

                <div class="signup-form__input-field form-input-field border-neaturual">
                    <label for="" class="signup-form__label form-input-field__label">Firstname</label>
                    <input type="firstname" name="firstName" id="firstname" class="signup-form__input form-input-field__input" />
                    <div id="firstname-character-display"><span id="firstname-character-count">0</span> / 50</div>
                </div>
                <p class="error-msg display-hidden" id="firstname-error-msg">Character count invalid</p>


                <div class="signup-form__input-field form-input-field border-neaturual">
                    <label for="" class="signup-form__label form-input-field__label">Lastname</label>
                    <input type="text" name="lastName" id="lastname" class="signup-form__input form-input-field__input" />
                    <div id="lastname-character-display"><span id="lastname-character-count">0</span> / 50</div>
                </div>
                <p class="error-msg display-hidden" id="lastname-error-msg">Character count invalid</p>

                <div class="signup-form__input-field form-input-field border-neaturual">
                    <label for="" class="signup-form__label form-input-field__label">Choose a username</label>
                    <input type="text" name="userName" id="username" class="signup-form__input form-input-field__input" />
                    <div id="lastname-character-display"><span id="lastname-character-count">0</span> / 50</div>
                </div>
                <p class="error-msg display-hidden" id="username-error-msg">Character count invalid</p>


                <div class="signup-form__input-field form-input-field border-neaturual">
                    <label for="" class="signup-form__label form-input-field__label">Email</label>
                    <input type="email" name="email" id="email" class="signup-form__input form-input-field__input" />
                </div>
                <p class="error-msg display-hidden" id="email-error-msg">Not valid email</p>

                <div class="signup-form__input-field form-input-field border-neaturual">
                    <label for="" class="signup-form__label form-input-field__label">Password</label>
                    <input type="password" name="password" id="signup-modal-password" class="signup-form__input form-input-field__input" />
                    <div id="password-character-display"><span id="password-character-count">0</span> / 20</div>
                </div>
                <p class="error-msg display-hidden" id="password-error-msg">Password invalid</p>

                <h3 class="signup-form__input-dob-heading heading-secondary">Date of birth</h3>
                <p class="signup-form__input-dob-text text-xs-light">This will not be shown publicly. Confirm your own age, even if this account is for a bussiness, pet or something else.</p>

                <div class="signup-form__dob-container dob-container">
                    <div class="signup-form__dob-input-field form-select-input-field border-neaturual dob-input-field">
                        <label for="" class="signup-form__dob-label form-select-input-field__label">Month</label>
                        <select id="select-month" type="text" name="month" class="signup-form__dob-input form-select-input-field__input">
                            <option value="" selected hidden></option>
                        </select>

                    </div>



                    <div class="signup-form__dob-input-field form-select-input-field border-neaturual display-hiddendob-input-field">
                        <label for="" class="signup-form__dob-label form-select-input-field__label">Year</label>
                        <select id="select-year" type="text" name="year" class="signup-form__dob-input form-select-input-field__input">
                            <option value="" selected hidden></option>
                        </select>
                    </div>


                    <div class="signup-form__dob-input-field form-select-input-field border-neaturual dob-input-field">
                        <label for="" class="signup-form__dob-label form-select-input-field__label">Day</label>
                        <select id="select-day" type="text" name="day" class="signup-form__dob-input form-select-input-field__input">
                            <option value="" selected hidden></option>
                            <option value="" disabled>Please select a month and a year first</option>
                        </select>
                    </div>


                </div>
            </form>
        </div>
    </div>
