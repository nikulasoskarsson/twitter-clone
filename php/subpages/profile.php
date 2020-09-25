<?php require_once(__DIR__ . '/../components/update-user-modal.php') ?>
<div>
    <div id="profile-topbar" class="profile-topbar">
        <svg viewBox="0 0 24 24" class="profile-topbar__icon icon-25px-primary">
            <g>
                <path d="M20 11H7.414l4.293-4.293c.39-.39.39-1.023 0-1.414s-1.023-.39-1.414 0l-6 6c-.39.39-.39 1.023 0 1.414l6 6c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414L7.414 13H20c.553 0 1-.447 1-1s-.447-1-1-1z"></path>
            </g>
        </svg>
        <div class="profile-topbar__txt-container">
            <h3 class="profile-topbar__heading user-name"></h3>
            <p class="profile-topbar__tweets-nr user-tweets-nr"></p>
        </div>
    </div>
    <div id="profile-userbar" class="profile-userbar">
        <div class="profile-userbar__background-img user-bg"></div>

        <label for="user-image-upload" class="profile-userbar__user-img-label">
            <img src="img/placeholder.jpg" alt="" class="profile-userbar__user-img user-img" />
        </label>

        <div class="profile-userbar__flex-container">
            <div class="profile-userbar__txt-container">
                <h3 class="profile-userbar__username heading-secondary user-name"></h3>
                <p class="profile-userbar__handle text-xs-light marginBottom05 user-handle"></p>
                <div class="profile-userbar__join-date marginBottom05 ">
                    <svg viewBox="0 0 24 24" class="profile-userbar__join-date__icon">
                        <g>
                            <path d="M19.708 2H4.292C3.028 2 2 3.028 2 4.292v15.416C2 20.972 3.028 22 4.292 22h15.416C20.972 22 22 20.972 22 19.708V4.292C22 3.028 20.972 2 19.708 2zm.792 17.708c0 .437-.355.792-.792.792H4.292c-.437 0-.792-.355-.792-.792V6.418c0-.437.354-.79.79-.792h15.42c.436 0 .79.355.79.79V19.71z"></path>
                            <circle cx="7.032" cy="8.75" r="1.285"></circle>
                            <circle cx="7.032" cy="13.156" r="1.285"></circle>
                            <circle cx="16.968" cy="8.75" r="1.285"></circle>
                            <circle cx="16.968" cy="13.156" r="1.285"></circle>
                            <circle cx="12" cy="8.75" r="1.285"></circle>
                            <circle cx="12" cy="13.156" r="1.285"></circle>
                            <circle cx="7.032" cy="17.486" r="1.285"></circle>
                            <circle cx="12" cy="17.486" r="1.285"></circle>
                        </g>
                    </svg>
                    <p class="profile-userbar__join-date__text text-xs-light"></p>
                </div>
                <div class="profile-userbar__follower-info">
                    <p class="profile-userbar__follower-text">
                        <span class="profile-userbar__follower-count">166</span>Following
                    </p>

                    <p class="profile-userbar__follower-text">
                        <span class="profile-userbar__follower-count">2032</span>Followers
                    </p>
                </div>
            </div>
            <form method="POST" action="php/actions/update-user.php" enctype="multipart/form-data">
                <button class="button-inverted-md">Edit profile</button>
                <input type="file" name="user-image" id="user-image-upload" class="display-hidden">
            </form>
        </div>
    </div>
    <div class="profile-nav">
        <ul class="profile-nav__list">
            <li class="profile-nav__list-item profile-nav__list-item-active">
                <a href="#" class="profile-nav__link profile-nav__link-active text-sm-light">Tweets</a>
            </li>
            <li class="profile-nav__list-item">
                <a href="#" class="profile-nav__link text-sm-light">Tweets & Replies</a>
            </li>
            <li class="profile-nav__list-item">
                <a href="#" class="profile-nav__link text-sm-light">Media</a>
            </li>
            <li class="profile-nav__list-item">
                <a href="#" class="profile-nav__link text-sm-light">Likes</a>
            </li>
        </ul>
    </div>
    <div id="profile-tweet-container">

    </div>
</div>