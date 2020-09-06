<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="css/main.css" />
</head>

<body>
  <div id="page">
    <div id="menu">
      <nav class="navigation">
        <ul class="navigation__list">
          <li class="navigation__logo">
            <svg viewBox="0 0 24 24" class="navigation__icon navigation__icon-fill">
              <g>
                <path d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z"></path>
              </g>
            </svg>
          </li>
          <li class="navigation__list-item" id="show-home" data-id="subpage-home">
            <svg viewBox="0 0 24 24" class="navigation__icon navigation__icon-active">
              <g>
                <path d="M22.58 7.35L12.475 1.897c-.297-.16-.654-.16-.95 0L1.425 7.35c-.486.264-.667.87-.405 1.356.18.335.525.525.88.525.16 0 .324-.038.475-.12l.734-.396 1.59 11.25c.216 1.214 1.31 2.062 2.66 2.062h9.282c1.35 0 2.444-.848 2.662-2.088l1.588-11.225.737.398c.485.263 1.092.082 1.354-.404.263-.486.08-1.093-.404-1.355zM12 15.435c-1.795 0-3.25-1.455-3.25-3.25s1.455-3.25 3.25-3.25 3.25 1.455 3.25 3.25-1.455 3.25-3.25 3.25z"></path>
              </g>
            </svg>
            <a href="#" class="navigation__link navigation__link-active">Home</a>
          </li>

          <li class="navigation__list-item" data-id="subpage-explore">
            <svg viewBox="0 0 24 24" class="navigation__icon">
              <g>
                <path d="M21 7.337h-3.93l.372-4.272c.036-.412-.27-.775-.682-.812-.417-.03-.776.27-.812.683l-.383 4.4h-6.32l.37-4.27c.037-.413-.27-.776-.68-.813-.42-.03-.777.27-.813.683l-.382 4.4H3.782c-.414 0-.75.337-.75.75s.336.75.75.75H7.61l-.55 6.327H3c-.414 0-.75.336-.75.75s.336.75.75.75h3.93l-.372 4.272c-.036.412.27.775.682.812l.066.003c.385 0 .712-.295.746-.686l.383-4.4h6.32l-.37 4.27c-.036.413.27.776.682.813l.066.003c.385 0 .712-.295.746-.686l.382-4.4h3.957c.413 0 .75-.337.75-.75s-.337-.75-.75-.75H16.39l.55-6.327H21c.414 0 .75-.336.75-.75s-.336-.75-.75-.75zm-6.115 7.826h-6.32l.55-6.326h6.32l-.55 6.326z"></path>
              </g>
            </svg>
            <a href="#" class="navigation__link">Explore</a>
          </li>

          <li class="navigation__list-item" data-id="subpage-notifications">
            <svg viewBox="0 0 24 24" class="navigation__icon">
              <g>
                <path d="M21.697 16.468c-.02-.016-2.14-1.64-2.103-6.03.02-2.532-.812-4.782-2.347-6.335C15.872 2.71 14.01 1.94 12.005 1.93h-.013c-2.004.01-3.866.78-5.242 2.174-1.534 1.553-2.368 3.802-2.346 6.334.037 4.33-2.02 5.967-2.102 6.03-.26.193-.366.53-.265.838.102.308.39.515.712.515h4.92c.102 2.31 1.997 4.16 4.33 4.16s4.226-1.85 4.327-4.16h4.922c.322 0 .61-.206.71-.514.103-.307-.003-.645-.263-.838zM12 20.478c-1.505 0-2.73-1.177-2.828-2.658h5.656c-.1 1.48-1.323 2.66-2.828 2.66zM4.38 16.32c.74-1.132 1.548-3.028 1.524-5.896-.018-2.16.644-3.982 1.913-5.267C8.91 4.05 10.397 3.437 12 3.43c1.603.008 3.087.62 4.18 1.728 1.27 1.285 1.933 3.106 1.915 5.267-.024 2.868.785 4.765 1.525 5.896H4.38z"></path>
              </g>
            </svg>
            <a href="#" class="navigation__link">Notifications</a>
          </li>

          <li class="navigation__list-item" data-id="subpage-messages">
            <svg viewBox="0 0 24 24" class="navigation__icon">
              <g>
                <path d="M19.25 3.018H4.75C3.233 3.018 2 4.252 2 5.77v12.495c0 1.518 1.233 2.753 2.75 2.753h14.5c1.517 0 2.75-1.235 2.75-2.753V5.77c0-1.518-1.233-2.752-2.75-2.752zm-14.5 1.5h14.5c.69 0 1.25.56 1.25 1.25v.714l-8.05 5.367c-.273.18-.626.182-.9-.002L3.5 6.482v-.714c0-.69.56-1.25 1.25-1.25zm14.5 14.998H4.75c-.69 0-1.25-.56-1.25-1.25V8.24l7.24 4.83c.383.256.822.384 1.26.384.44 0 .877-.128 1.26-.383l7.24-4.83v10.022c0 .69-.56 1.25-1.25 1.25z"></path>
              </g>
            </svg>
            <a href="#" class="navigation__link">Messages</a>
          </li>

          <li class="navigation__list-item" data-id="subpage-bookmarks">
            <svg viewBox="0 0 24 24" class="navigation__icon">
              <g>
                <path d="M19.9 23.5c-.157 0-.312-.05-.442-.144L12 17.928l-7.458 5.43c-.228.164-.53.19-.782.06-.25-.127-.41-.385-.41-.667V5.6c0-1.24 1.01-2.25 2.25-2.25h12.798c1.24 0 2.25 1.01 2.25 2.25v17.15c0 .282-.158.54-.41.668-.106.055-.223.082-.34.082zM12 16.25c.155 0 .31.048.44.144l6.71 4.883V5.6c0-.412-.337-.75-.75-.75H5.6c-.413 0-.75.338-.75.75v15.677l6.71-4.883c.13-.096.285-.144.44-.144z"></path>
              </g>
            </svg>
            <a href="#" class="navigation__link">Bookmarks</a>
          </li>

          <li class="navigation__list-item" data-id="subpage-lists">
            <svg viewBox="0 0 24 24" class="navigation__icon">
              <g>
                <path d="M19.75 22H4.25C3.01 22 2 20.99 2 19.75V4.25C2 3.01 3.01 2 4.25 2h15.5C20.99 2 22 3.01 22 4.25v15.5c0 1.24-1.01 2.25-2.25 2.25zM4.25 3.5c-.414 0-.75.337-.75.75v15.5c0 .413.336.75.75.75h15.5c.414 0 .75-.337.75-.75V4.25c0-.413-.336-.75-.75-.75H4.25z"></path>
                <path d="M17 8.64H7c-.414 0-.75-.337-.75-.75s.336-.75.75-.75h10c.414 0 .75.335.75.75s-.336.75-.75.75zm0 4.11H7c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h10c.414 0 .75.336.75.75s-.336.75-.75.75zm-5 4.11H7c-.414 0-.75-.335-.75-.75s.336-.75.75-.75h5c.414 0 .75.337.75.75s-.336.75-.75.75z"></path>
              </g>
            </svg>
            <a href="#" class="navigation__link">Lists</a>
          </li>

          <li class="navigation__list-item" data-id="subpage-profile">
            <svg viewBox="0 0 24 24" class="navigation__icon">
              <g>
                <path d="M12.225 12.165c-1.356 0-2.872-.15-3.84-1.256-.814-.93-1.077-2.368-.805-4.392.38-2.826 2.116-4.513 4.646-4.513s4.267 1.687 4.646 4.513c.272 2.024.008 3.46-.806 4.392-.97 1.106-2.485 1.255-3.84 1.255zm5.849 9.85H6.376c-.663 0-1.25-.28-1.65-.786-.422-.534-.576-1.27-.41-1.968.834-3.53 4.086-5.997 7.908-5.997s7.074 2.466 7.91 5.997c.164.698.01 1.434-.412 1.967-.4.505-.985.785-1.648.785z"></path>
              </g>
            </svg>
            <a href="#" class="navigation__link">Profile</a>
          </li>

          <li class="navigation__list-item" data-id="subpage-more">
            <svg viewBox="0 0 24 24" class="navigation__icon">
              <g>
                <path d="M16.5 10.25c-.965 0-1.75.787-1.75 1.75s.784 1.75 1.75 1.75c.964 0 1.75-.786 1.75-1.75s-.786-1.75-1.75-1.75zm0 2.5c-.414 0-.75-.336-.75-.75 0-.413.337-.75.75-.75s.75.336.75.75c0 .413-.336.75-.75.75zm-4.5-2.5c-.966 0-1.75.787-1.75 1.75s.785 1.75 1.75 1.75 1.75-.786 1.75-1.75-.784-1.75-1.75-1.75zm0 2.5c-.414 0-.75-.336-.75-.75 0-.413.337-.75.75-.75s.75.336.75.75c0 .413-.336.75-.75.75zm-4.5-2.5c-.965 0-1.75.787-1.75 1.75s.785 1.75 1.75 1.75c.964 0 1.75-.786 1.75-1.75s-.787-1.75-1.75-1.75zm0 2.5c-.414 0-.75-.336-.75-.75 0-.413.337-.75.75-.75s.75.336.75.75c0 .413-.336.75-.75.75z"></path>
                <path d="M12 22.75C6.072 22.75 1.25 17.928 1.25 12S6.072 1.25 12 1.25 22.75 6.072 22.75 12 17.928 22.75 12 22.75zm0-20C6.9 2.75 2.75 6.9 2.75 12S6.9 21.25 12 21.25s9.25-4.15 9.25-9.25S17.1 2.75 12 2.75z"></path>
              </g>
            </svg>
            <a href="#" class="navigation__link">More</a>
          </li>
        </ul>
      </nav>
      <div>
        <button class="button-primary">Tweet</button>
      </div>
      <div class="user">
        <img src="img/placeholder.jpg" alt="Placeholder image" class="user__img" />
        <div class="user__text-column">
          <h3 class="user__name">Nikulás Óskarsson</h3>
          <p class="user__handler">@nikulasoskarsson</p>
        </div>
        <svg viewBox="0 0 24 24" class="user__icon">
          <g>
            <path d="M20.207 8.147c-.39-.39-1.023-.39-1.414 0L12 14.94 5.207 8.147c-.39-.39-1.023-.39-1.414 0-.39.39-.39 1.023 0 1.414l7.5 7.5c.195.196.45.294.707.294s.512-.098.707-.293l7.5-7.5c.39-.39.39-1.022 0-1.413z"></path>
          </g>
        </svg>
      </div>
    </div>
    <main id="main">

      <div class="subpage subpage-visible" id="subpage-home">
        <?php require_once('php/subpages/home.php'); ?>
      </div>

      <div class="subpage subpage-hidden" id="subpage-explore">
        <?php require_once('php/subpages/explore.php'); ?>
      </div>

      <div class="subpage subpage-hidden" id="subpage-notifications">
        <?php require_once('php/subpages/notifications.php'); ?>
      </div>

      <div class="subpage subpage-hidden" id="subpage-messages">
        <?php require_once('php/subpages/messages.php'); ?>
      </div>

      <div class="subpage subpage-hidden" id="subpage-bookmarks">
        <?php require_once('php/subpages/bookmarks.php'); ?>
      </div>

      <div class="subpage subpage-hidden" id="subpage-lists">
        <?php require_once('php/subpages/lists.php'); ?>
      </div>

      <div class="subpage subpage-hidden" id="subpage-profile">
        <?php require_once('php/subpages/profile.php'); ?>
      </div>

      <div class="subpage subpage-hidden" id="subpage-more">
        <?php require_once('php/subpages/more.php'); ?>
      </div>


    </main>
    <div id="side-menu" class="side-menu">
      <div class="searchbar">
        <label class="searchbar__label" for="search-input"></label>
        <svg viewBox="0 0 24 24" class="searchbar__icon">
          <g>
            <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
          </g>
        </svg>
        <input name="search-input" id="search-input" type="text" placeholder="Search Twitter" class="searchbar__input" />
      </div>

      <div class="trends">
        <div class="trends__topbar">
          <h3 class="trends__topbar-title">Trends for you</h3>

          <svg viewBox="0 0 24 24" class="trends__topbar-icon">
            <g>
              <path d="M12 8.21c-2.09 0-3.79 1.7-3.79 3.79s1.7 3.79 3.79 3.79 3.79-1.7 3.79-3.79-1.7-3.79-3.79-3.79zm0 6.08c-1.262 0-2.29-1.026-2.29-2.29S10.74 9.71 12 9.71s2.29 1.026 2.29 2.29-1.028 2.29-2.29 2.29z"></path>
              <path d="M12.36 22.375h-.722c-1.183 0-2.154-.888-2.262-2.064l-.014-.147c-.025-.287-.207-.533-.472-.644-.286-.12-.582-.065-.798.115l-.116.097c-.868.725-2.253.663-3.06-.14l-.51-.51c-.836-.84-.896-2.154-.14-3.06l.098-.118c.186-.222.23-.523.122-.787-.11-.272-.358-.454-.646-.48l-.15-.014c-1.18-.107-2.067-1.08-2.067-2.262v-.722c0-1.183.888-2.154 2.064-2.262l.156-.014c.285-.025.53-.207.642-.473.11-.27.065-.573-.12-.795l-.094-.116c-.757-.908-.698-2.223.137-3.06l.512-.512c.804-.804 2.188-.865 3.06-.14l.116.098c.218.184.528.23.79.122.27-.112.452-.358.477-.643l.014-.153c.107-1.18 1.08-2.066 2.262-2.066h.722c1.183 0 2.154.888 2.262 2.064l.014.156c.025.285.206.53.472.64.277.117.58.062.794-.117l.12-.102c.867-.723 2.254-.662 3.06.14l.51.512c.836.838.896 2.153.14 3.06l-.1.118c-.188.22-.234.522-.123.788.112.27.36.45.646.478l.152.014c1.18.107 2.067 1.08 2.067 2.262v.723c0 1.183-.888 2.154-2.064 2.262l-.155.014c-.284.024-.53.205-.64.47-.113.272-.067.574.117.795l.1.12c.756.905.696 2.22-.14 3.06l-.51.51c-.807.804-2.19.864-3.06.14l-.115-.096c-.217-.183-.53-.23-.79-.122-.273.114-.455.36-.48.646l-.014.15c-.107 1.173-1.08 2.06-2.262 2.06zm-3.773-4.42c.3 0 .593.06.87.175.79.328 1.324 1.054 1.4 1.896l.014.147c.037.4.367.7.77.7h.722c.4 0 .73-.3.768-.7l.014-.148c.076-.842.61-1.567 1.392-1.892.793-.33 1.696-.182 2.333.35l.113.094c.178.148.366.18.493.18.206 0 .4-.08.546-.227l.51-.51c.284-.284.305-.73.048-1.038l-.1-.12c-.542-.65-.677-1.54-.352-2.323.326-.79 1.052-1.32 1.894-1.397l.155-.014c.397-.037.7-.367.7-.77v-.722c0-.4-.303-.73-.702-.768l-.152-.014c-.846-.078-1.57-.61-1.895-1.393-.326-.788-.19-1.678.353-2.327l.1-.118c.257-.31.236-.756-.048-1.04l-.51-.51c-.146-.147-.34-.227-.546-.227-.127 0-.315.032-.492.18l-.12.1c-.634.528-1.55.67-2.322.354-.788-.327-1.32-1.052-1.397-1.896l-.014-.155c-.035-.397-.365-.7-.767-.7h-.723c-.4 0-.73.303-.768.702l-.014.152c-.076.843-.608 1.568-1.39 1.893-.787.326-1.693.183-2.33-.35l-.118-.096c-.18-.15-.368-.18-.495-.18-.206 0-.4.08-.546.226l-.512.51c-.282.284-.303.73-.046 1.038l.1.118c.54.653.677 1.544.352 2.325-.327.788-1.052 1.32-1.895 1.397l-.156.014c-.397.037-.7.367-.7.77v.722c0 .4.303.73.702.768l.15.014c.848.078 1.573.612 1.897 1.396.325.786.19 1.675-.353 2.325l-.096.115c-.26.31-.238.756.046 1.04l.51.51c.146.147.34.227.546.227.127 0 .315-.03.492-.18l.116-.096c.406-.336.923-.524 1.453-.524z"></path>
            </g>
          </svg>
        </div>

        <div class="trends__cards">
          <div class="trends__card">
            <div class="trends__card-content">
              <span class="trends__card-location">Trending in Denmark</span>
              <h3 class="trends__card-trend">Sisto</h3>
            </div>
            <svg viewBox="0 0 24 24" class="trends__card-icon">
              <g>
                <path d="M20.207 8.147c-.39-.39-1.023-.39-1.414 0L12 14.94 5.207 8.147c-.39-.39-1.023-.39-1.414 0-.39.39-.39 1.023 0 1.414l7.5 7.5c.195.196.45.294.707.294s.512-.098.707-.293l7.5-7.5c.39-.39.39-1.022 0-1.413z"></path>
              </g>
            </svg>
          </div>

          <div class="trends__card">
            <div class="trends__card-content">
              <span class="trends__card-location">Trending in Denmark</span>
              <h3 class="trends__card-trend">Premier League</h3>
              <p class="trends__card-tweets-nr">9,137 Tweets</p>
            </div>
            <svg viewBox="0 0 24 24" class="trends__card-icon">
              <g>
                <path d="M20.207 8.147c-.39-.39-1.023-.39-1.414 0L12 14.94 5.207 8.147c-.39-.39-1.023-.39-1.414 0-.39.39-.39 1.023 0 1.414l7.5 7.5c.195.196.45.294.707.294s.512-.098.707-.293l7.5-7.5c.39-.39.39-1.022 0-1.413z"></path>
              </g>
            </svg>
          </div>

          <div class="trends__card">
            <div class="trends__card-content">
              <span class="trends__card-location">Trending in Denmark</span>
              <h3 class="trends__card-trend">Softe Linde</h3>
            </div>
            <svg viewBox="0 0 24 24" class="trends__card-icon">
              <g>
                <path d="M20.207 8.147c-.39-.39-1.023-.39-1.414 0L12 14.94 5.207 8.147c-.39-.39-1.023-.39-1.414 0-.39.39-.39 1.023 0 1.414l7.5 7.5c.195.196.45.294.707.294s.512-.098.707-.293l7.5-7.5c.39-.39.39-1.022 0-1.413z"></path>
              </g>
            </svg>
          </div>

          <div class="trends__card">
            <div class="trends__card-content">
              <span class="trends__card-location">Trending in Denmark</span>
              <h3 class="trends__card-trend">#KeaWebDevelopment</h3>
              <p class="trends__card-tweets-nr">20,147 Tweets</p>
            </div>
            <svg viewBox="0 0 24 24" class="trends__card-icon">
              <g>
                <path d="M20.207 8.147c-.39-.39-1.023-.39-1.414 0L12 14.94 5.207 8.147c-.39-.39-1.023-.39-1.414 0-.39.39-.39 1.023 0 1.414l7.5 7.5c.195.196.45.294.707.294s.512-.098.707-.293l7.5-7.5c.39-.39.39-1.022 0-1.413z"></path>
              </g>
            </svg>
          </div>

          <div class="trends__card">
            <div class="trends__card-content">
              <span class="trends__card-location">Trending in Denmark</span>
              <h3 class="trends__card-trend">iPhone</h3>
            </div>
            <svg viewBox="0 0 24 24" class="trends__card-icon">
              <g>
                <path d="M20.207 8.147c-.39-.39-1.023-.39-1.414 0L12 14.94 5.207 8.147c-.39-.39-1.023-.39-1.414 0-.39.39-.39 1.023 0 1.414l7.5 7.5c.195.196.45.294.707.294s.512-.098.707-.293l7.5-7.5c.39-.39.39-1.022 0-1.413z"></path>
              </g>
            </svg>
          </div>
        </div>
        <div class="trends__footer">
          <a href="#" class="link">Show more</a>
        </div>
      </div>
      <div id="who-to-follow" class="who-to-follow">
        <div class="who-to-follow__topbar">
          <h3 class="heading-primary">Who to follow</h3>
        </div>
        <div class="who-to-follow__cards">
          <div class="who-to-follow__card">
            <div class="who-to-follow__card-user">
              <img src="img/follow1.jpg" alt="Twitter user" class="who-to-follow__card-img" />
              <div>
                <h3 class="who-to-follow__name">Jacob Mark</h3>
                <span class="who-to-follow__handle">@jacobmark</span>
              </div>
            </div>
            <button class="button-inverted-small">Follow</button>
          </div>

          <div class="who-to-follow__card">
            <div class="who-to-follow__card-user">
              <img src="img/follow2.jpg" alt="Twitter user" class="who-to-follow__card-img" />
              <div>
                <h3 class="who-to-follow__name">Katrín Jakóbsdóttir</h3>
                <span class="who-to-follow__handle">@katrinjakobs</span>
              </div>
            </div>
            <button class="button-inverted-small">Follow</button>
          </div>

          <div class="who-to-follow__card">
            <div class="who-to-follow__card-user">
              <img src="img/follow3.jpg" alt="Twitter user" class="who-to-follow__card-img" />
              <div>
                <h3 class="who-to-follow__name">JHeather Jackson</h3>
                <span class="who-to-follow__handle">@heatherjackson1</span>
              </div>
            </div>
            <button class="button-inverted-small">Follow</button>
          </div>
        </div>
        <div class="trends__footer">
          <a href="#" class="link">Show More</a>
        </div>
      </div>
    </div>
  </div>
  <script src="js/sub-page-selector.js"></script>
</body>

</html>