<div id="update-user-container" class="modal-container">
    <div id="update-user-modal" class="modal update-user-modal">
        <div class="update-user-modal__header">
            <h1 class="update-user-modal__header-close">X</h1>
            <h1 class="update-user-modal__header-heading header-primary">Edit Profile</h1>
            <button class="button-primary-small ">Save</button>
        </div>
        <div class="update-user-modal__content">
            <div class="update-user-modal__img-bar">
                <label for="background-img">
                    <img class="update-user-modal__img-bar__background-img user-bg" src="img/cat.jpg"></img>
                </label>

                <label for="user-img">
                    <img class="update-user-modal__img-bar__user-img user-img"></img>
                </label>
            </div>
            <form action="#" id="update-user-form">

                <div class="form-input-field border-neaturual">
                    <label for="" class="form-input-field__label">First name</label>
                    <input type="text" name="firstName" id="first_name" class="form-input-field__input" />
                    <p class="error-msg display-hidden"></p>
                    <div id="lastname-character-display"><span id="lastname-character-count">0</span> / 50</div>
                </div>

                <div class="form-input-field border-neaturual">
                    <label for="" class="form-input-field__label">Last name</label>
                    <input type="text" name="secondName" id="last_name" class="form-input-field__input" />
                    <p class="error-msg display-hidden"></p>
                    <div id="lastname-character-display"><span id="lastname-character-count">0</span> / 50</div>
                </div>

                <div class="signup-form__input-field form-input-field border-neaturual">
                    <label for="" class="signup-form__label form-input-field__label">Bio</label>
                    <input type="text" name="bio" id="bio" class="signup-form__input form-input-field__input" />
                    <div id="lastname-character-display"><span id="lastname-character-count">0</span> / 50</div>
                </div>


                <div class="form-input-field border-neaturual">
                    <label for="" class="form-input-field__label">Location</label>
                    <input type="text" name="location" id="location" class="form-input-field__input" />
                    <p class="error-msg display-hidden"></p>
                    <div id="lastname-character-display"><span id="lastname-character-count">0</span> / 50</div>
                </div>

                <div class="form-input-field border-neaturual">
                    <label for="" class="form-input-field__label">Website</label>
                    <input type="text" name="website" id="website" class="form-input-field__input" />
                    <p class="error-msg display-hidden"></p>
                    <div id="lastname-character-display"><span id="lastname-character-count">0</span> / 50</div>
                </div>

                <div class="dob-container">
                    <div class="dob-input-field form-select-input-field border-neaturual">
                        <label for="" class="dob-label form-select-input-field__label">Month</label>
                        <select id="select-month" type="text" name="month" class="dob-input form-select-input-field__input">
                            <option value="" selected hidden></option>
                        </select>

                    </div>



                    <div class="dob-input-field form-select-input-field border-neaturual">
                        <label for="" class="dob-label form-select-input-field__label">Year</label>
                        <select id="select-year" type="text" name="year" class="dob-input form-select-input-field__input">
                            <option value="" selected hidden></option>
                        </select>
                    </div>


                    <div class="dob-input-field form-select-input-field border-neaturual">
                        <label for="" class="dob-label form-select-input-field__label">Day</label>
                        <select id="select-day" type="text" name="day" class="dob-input form-select-input-field__input">
                            <option value="" selected hidden></option>
                            <option value="" disabled>Please select a month and a year first</option>
                        </select>
                    </div>


                </div>

                <input type="file" class="display-hidden" id="backgroundImg" name="background-img">
                <input type="file" class="display-hidden" id="userImg" name="user-img">
            </form>

        </div>
    </div>
</div>