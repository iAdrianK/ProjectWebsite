// press f11 to full page view
// vote for me at https://www.uplabs.com/posts/fluent-movie-booking

tooglePage1();

function tooglePage1() {
  $('.covers').removeClass('up');
  setTimeout(() => $('.main header').toggleClass('loaded'), 50);
  setTimeout(() => $('.covers').toggleClass('loaded'), 600);
}

var $covers = $('.covers');
var scroll = 0;
var delta = 267;

function doScroll(scrollUp = false) {
  var listHeight = getComputedStyle(document.querySelector('ul.covers')).getPropertyValue('height');

  if (!scrollUp && scroll < parseInt(listHeight) - delta * 2) {
    scroll += delta;
    $covers.removeClass('up').
    find('li').css('transform', `translateY(-${scroll}px)`);
  }

  if (scrollUp && scroll >= delta) {
    scroll -= delta;
    $covers.addClass('up').
    find('li').css('transform', `translateY(-${scroll}px)`);
  }
}

$('button.scrollDown').on('click', evt => doScroll());
$('button.scrollTop').on('click', evt => doScroll(true));

$('button.back').on('click', evt => {
  $('.main').toggleClass('page2');
  $('.total button').removeClass('success').text('CHECKOUT');
  tooglePage1();
});

$('.covers').on('click', 'li', evt => {
  var data = getData();
  var index = evt.currentTarget.getAttribute('data-index');
  var movie = data.results[parseInt(index)];
  var txt = movie.overview.length >= 220 ?
  movie.overview.substring(0, 220).concat('...') :
  movie.overview;

  var $sinopsis = $('.sinopsis');
  $sinopsis.find('h3').text(movie.title);
  $sinopsis.find('p').text(txt);
  $sinopsis.find('img').attr('src', `https://image.tmdb.org/t/p/w300${movie.poster_path}`);

  $('.main').toggleClass('page2');
  tooglePage1();
});

// https://image.tmdb.org/t/p/w300/w93GAiq860UjmgR6tU9h2T24vaV.jpg
function doMoviesRender(filter) {
  var movies = getData().results;
  var moviesRender = movies.map((item, index) => {
    var {
      title,
      genre_ids,
      poster_path,
      overview } =
    item;

    var uri = `https://image.tmdb.org/t/p/w300/${poster_path}`;
    var gid = genre_ids.toString();

    return gid.indexOf(filter) < 0 ? '' : `
			<li data-index="${index}">
				<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8zw8AAhMBENYXhyAAAAAASUVORK5CYII=" style="background-image: url(${uri})">
				<span>${title}</span><small>16:00 (2h 15m)</small>
			</li>
		`;
  });

  $('.covers').html(moviesRender.join(''));
}

doMoviesRender(',');

var seats = [];
var initPos = 65;
for (var i = 0; i < 78; i++) {
  var row = String.fromCharCode(initPos + Math.floor(i / 9));
  var taken = i % 7 == 0 || i % 6 == 0 ? 'taken' : '';

  var aisle = i % 9 === 1 ? 'aisle-right' :
  i % 9 === 7 ? 'aisle-left' : '';

  if (row === 'I')
  aisle = 'aisle-top';

  seats.push(`<div class="seat ${taken} ${aisle}">${row}${i % 9 + 1}</div>`);
}
$('.seats').html(seats.join(''));

$('.seats').on('click', '.seat', evt => {
  var $seat = $(evt.currentTarget);

  if (!$seat.hasClass('taken')) {
    $seat.toggleClass('selected');

    var $sel = $seat.parent().find('.selected');
    var qty = $sel.length * 5.44;
    $('.total span').text(`$${qty}`.substring(0, 6));
  }
});

$('.filter li').on('click', evt => {
  $(evt.currentTarget).addClass('selected').siblings().removeClass('selected');
  var $covers = $('.covers').removeClass('loaded').removeClass('up');
  var filter = evt.currentTarget.getAttribute('data-gid');
  doMoviesRender(filter);
  scroll = 0;
  setTimeout(() => $covers.toggleClass('loaded'), 100);
});

$('.total button').on('click', function (evt) {
  var $button = $(evt.currentTarget);
  var total = $('.total span').text();

  if (!$button.hasClass('success') && total !== '$0') {
    var $loader = $('.loader').show();
    $button.text('Booking...');

    setTimeout(() => {
      $loader.hide();
      $button.html('<i class="zmdi zmdi-check-circle"></i> Movie Booked');
      $button.addClass('success');
    }, 1600);
  }
});

/*** END OF CODE ***/

function getData() {
  return { "page": 1, "total_results": 315519, "total_pages": 15776, "results": [{ "vote_count": 1724, "id": 297762, "video": false, "vote_average": 7, 
  "title": "Shang-Chi", "popularity": 119.66635, "poster_path": "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/xeItgLK9qcafxbd8kYgv7XnMEog.jpg", "original_language": "en", "original_title": "Shang-Chi", "genre_ids": [28, 12, 14, 878], "backdrop_path": "/hA5oCgvgCxj5MEWcLpjXXTwEANF.jpg", "adult": false, 
  "overview": "Shang-Chi must confront the past he thought he left behind when he is drawn into the web of the mysterious Ten Rings organization.", "release_date": "2017-05-30" }, 



{ "vote_count": 4194, "id": 263115, "video": false, "vote_average": 7.5, "title": "Black Widow", "popularity": 80.401638, "poster_path": "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/ytnhzdwtj0YfC5NVWrrPRGSGZb7.jpg", "original_language": "en", "original_title": "Black Widow", "genre_ids": [28, 18, 878], "backdrop_path": "/5pAGnkFYSsFJ99ZxDIYnhQbQFXs.jpg", "adult": false, 
"overview": "Natasha Romanoff, also known as Black Widow, confronts the darker parts of her ledger when a dangerous conspiracy with ties to her past arises. Pursued by a force that will stop at nothing to bring her down, Natasha must deal with her history as a spy and the broken relationships left in her wake long before she became an Avenger.", "release_date": "2017-02-28" }, 



{ "vote_count": 3464, "id": 321612, "video": false, "vote_average": 6.8, "title": "Avengers: Endgame", "popularity": 73.33872, "poster_path": "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/or06FN3Dka5tukK1e9sl16pB3iy.jpg", "original_language": "en", "original_title": "Beauty and the Beast", "genre_ids": [10751, 14, 10749], "backdrop_path": "Covers/cover.jpg", "adult": false, 
"overview": "After Thanos, an intergalactic warlord, disintegrates half of the universe, the Avengers must reunite and assemble again to reinvigorate their trounced allies and restore balance.", "release_date": "2017-03-16" }, 



{ "vote_count": 240, "id": 335988, "video": false, "vote_average": 5.8, "title": "Spiderman Far From Home", "popularity": 70.762261, "poster_path": "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/4q2NNj4S5dG2RLF9CpXsej7yXl.jpg", "original_language": "en", "original_title": "Transformers: The Last Knight", "genre_ids": [28, 878, 53, 12], "backdrop_path": "/Ytv7P13rbwQ3mLpCAY8lBTqI5s.jpg", "adult": false, 
"overview": "Peter Parker and his friends go on a summer trip to Europe. However, they will hardly be able to rest - Peter will have to agree to help Nick Fury uncover the mystery of creatures that cause natural disasters and destruction throughout the continent.", "release_date": "2017-06-21" }, 



{ "vote_count": 591, "id": 282035, "video": false, "vote_average": 5.2, "title": "Avengers: Infinity War", "popularity": 57.18406, "poster_path": "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/7WsyChQLEftFiDOVTGkv3hFpyyt.jpg", "original_language": "en", "original_title": "The Mummy", "genre_ids": [28, 12, 14, 27, 53], "backdrop_path": "/qedJJ2z9oBYKxxO4Pp8qAkfgPst.jpg", "adult": false, 
"overview": "As the Avengers and their allies have continued to protect the world from threats too large for any one hero to handle, a new danger has emerged from the cosmic shadows: Thanos. A despot of intergalactic infamy, his goal is to collect all six Infinity Stones, artifacts of unimaginable power, and use them to inflict his twisted will on all of reality. Everything the Avengers have fought for has led up to this moment - the fate of Earth and existence itself has never been more uncertain.", "release_date": "2017-06-06" }, 



{ "vote_count": 1309, "id": 166426, "video": false, "vote_average": 6.6, "title": "Spiderman No Way Home", "popularity": 37.717108, "poster_path": "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/5RjyUm9HP2ZRwvqCqK9sDqlQHxa.jpg", "original_language": "en", "original_title": "Pirates of the Caribbean: Dead Men Tell No Tales", "genre_ids": [28, 12, 35, 14], "backdrop_path": "/tZvdyLP2F6x2TTuh292ceH87qZT.jpg", "adult": false, 
"overview": "Peter Parker is unmasked and no longer able to separate his normal life from the high-stakes of being a Super Hero. When he asks for help from Doctor Strange the stakes become even more dangerous, forcing him to discover what it truly means to be Spider-Man.", "release_date": "2017-05-23" },



{ "vote_count": 8105, "id": 118340, "video": false, "vote_average": 7.9, "title": "Tom & Jerry", "popularity": 35.408184, "poster_path": "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/8XZI9QZ7Pm3fVkigWJPbrXCMzjq.jpg", "original_language": "en", "original_title": "Guardians of the Galaxy", "genre_ids": [28, 878, 12], "backdrop_path": "/bHarw8xrmQeqf3t8HpuMY7zoK4x.jpg", "adult": false, 
"overview": "Tom the cat and Jerry the mouse get kicked out of their home and relocate to a fancy New York hotel, where a scrappy employee named Kayla will lose her job if she can’t evict Jerry before a high-class wedding at the hotel. Her solution? Hiring Tom to get rid of the pesky mouse.", "release_date": "2014-07-30" }, 



{ "vote_count": 1843, "id": 293167, "video": false, "vote_average": 6.1, "title": "Rumble", "popularity": 31.442202, "poster_path": "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/8dFmLzNTDeRCtdXEHV4ro7rd7C9.jpg", "original_language": "en", "original_title": "Kong: Skull Island", "genre_ids": [28, 12, 14], "backdrop_path": "/pGwChWiAY1bdoxL79sXmaFBlYJH.jpg", "adult": false, 
"overview": "In a world where monster wrestling is a global sport and monsters are superstar athletes, teenage Winnie seeks to follow in her father’s footsteps by coaching a loveable underdog monster into a champion.", "release_date": "2017-03-08" },



{ "vote_count": 1961, "id": 324552, "video": false, "vote_average": 6.5, "title": "Black Adam", "popularity": 30.3182, "poster_path": "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/eqGks2XhJSZoi4SaZdbVKv7jiUm.jpg", "original_language": "en", "original_title": "John Wick: Chapter 2", "genre_ids": [53, 28, 80], "backdrop_path": "/dQ6s3Ud2KoOs3LKw6xgZr1cw7Yq.jpg", "adult": false, 
"overview": "Black Adam is an upcoming American superhero film based on the DC Comics character of the same name, and is a spin-off film to Shazam! (2019).", "release_date": "2017-02-08" },



{ "vote_count": 9253, "id": 157336, "video": false, "vote_average": 8.1, "title": "John Wick 3", "popularity": 30.190706, "poster_path": "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/ziEuG1essDuWuC5lpWUaw1uXY2O.jpg", "original_language": "en", "original_title": "Interstellar", "genre_ids": [12, 18, 878], "backdrop_path": "/xu9zaAevzQ5nnrsXN6JcahLnG4i.jpg", "adult": false, 
"overview": "Super-assassin John Wick returns with a $14 million price tag on his head and an army of bounty-hunting killers on his trail. After killing a member of the shadowy international assassin’s guild, the High Table, John Wick is excommunicado, but the world’s most ruthless hit men and women await his every turn.", "release_date": "2014-11-05" }, 



{ "vote_count": 1034, "id": 395992, "video": false, "vote_average": 6.1, "title": "Captain Marvel", "popularity": 29.266811, "poster_path": "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/AtsgWhDnHTq68L0lLsUrCnM7TjG.jpg", "original_language": "en", "original_title": "Life", "genre_ids": [27, 878, 53], "backdrop_path": "/hES8wGmkxHa54z7hqUMpw5TIs09.jpg", "adult": false, 
"overview": "The story follows Carol Danvers as she becomes one of the universe’s most powerful heroes when Earth is caught in the middle of a galactic war between two alien races. Set in the 1990s, Captain Marvel is an all-new adventure from a previously unseen period in the history of the Marvel Cinematic Universe.", "release_date": "2017-03-23" }, 



{ "vote_count": 4458, "id": 245891, "video": false, "vote_average": 6.9, "title": "John Wick", "popularity": 25.286957, "poster_path": "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/fZPSd91yGE9fCcCe6OoQr6E3Bev.jpg", "original_language": "en", "original_title": "John Wick", "genre_ids": [28, 53], "backdrop_path": "/mFb0ygcue4ITixDkdr7wm1Tdarx.jpg", "adult": false, 
"overview": "Ex-hitman John Wick comes out of retirement to track down the gangsters that took everything from him.", "release_date": "2014-10-22" }, 



{ "vote_count": 5887, "id": 22, "video": false, "vote_average": 7.4, "title": "Pirates of the Caribbean: The Curse of the Black Pearl", "popularity": 23.891021, "poster_path": "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/z8onk7LV9Mmw6zKz4hT6pzzvmvl.jpg", "original_language": "en", "original_title": "Pirates of the Caribbean: The Curse of the Black Pearl", "genre_ids": [12, 14, 28], "backdrop_path": "/fQZQYW9Hrg8TpYZH4KgbRptkcCN.jpg", "adult": false, 
"overview": "Jack Sparrow, a freewheeling 17th-century pirate who roams the Caribbean Sea, butts heads with a rival pirate bent on pillaging the village of Port Royal. When the governor's daughter is kidnapped, Sparrow decides to help the girl's love save her. But their seafaring mission is hardly simple.", "release_date": "2003-07-09" }, 



{ "vote_count": 7531, "id": 135397, "video": false, "vote_average": 6.5, "title": "Jurassic World", "popularity": 23.877628, "poster_path": "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/rhr4y79GpxQF9IsfJItRXVaoGs4.jpg", "original_language": "en", "original_title": "Jurassic World", "genre_ids": [28, 12, 878, 53], "backdrop_path": "/dkMD5qlogeRMiEixC4YNPUvax2T.jpg", "adult": false, 
"overview": "Twenty-two years after the events of Jurassic Park, Isla Nublar now features a fully functioning dinosaur theme park, Jurassic World, as originally envisioned by John Hammond.", "release_date": "2015-06-09" }, 



{ "vote_count": 2705, "id": 91314, "video": false, "vote_average": 5.9, "title": "Transformers: Age of Extinction", "popularity": 23.349316, "poster_path": "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/jyzrfx2WaeY60kYZpPYepSjGz4S.jpg", "original_language": "en", "original_title": "Transformers: Age of Extinction", "genre_ids": [878, 28, 12], "backdrop_path": "/cHy7nSitAVgvZ7qfCK4JO47t3oZ.jpg", "adult": false, 
"overview": "As humanity picks up the pieces, following the conclusion of \"Transformers: Dark of the Moon,\" Autobots and Decepticons have all but vanished from the face of the planet. However, a group of powerful, ingenious businessman and scientists attempt to learn from past Transformer incursions and push the boundaries of technology beyond what they can control - all while an ancient, powerful Transformer menace sets Earth in his cross-hairs.", "release_date": "2014-06-25" }, 



{ "vote_count": 8253, "id": 76341, "video": false, "vote_average": 7.2, "title": "Mad Max: Fury Road", "popularity": 23.066573, "poster_path": "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/8tZYtuWezp8JbcsvHYO0O46tFbo.jpg", "original_language": "en", "original_title": "Mad Max: Fury Road", "genre_ids": [28, 12, 878, 53], "backdrop_path": "/phszHPFVhPHhMZgo0fWTKBDQsJA.jpg", "adult": false, 
"overview": "An apocalyptic story set in the furthest reaches of our planet, in a stark desert landscape where humanity is broken, and most everyone is crazed fighting for the necessities of life. Within this world exist two rebels on the run who just might be able to restore order. There's Max, a man of action and a man of few words, who seeks peace of mind following the loss of his wife and child in the aftermath of the chaos. And Furiosa, a woman of action and a woman who believes her path to survival may be achieved if she can make it across the desert back to her childhood homeland.", "release_date": "2015-05-13" }, 



{ "vote_count": 654, "id": 305470, "video": false, "vote_average": 6.5, "title": "Power Rangers", "popularity": 22.184089, "poster_path": "/zV5rpeTzUJ7QpA3NC4iidlwXssU.jpg", "original_language": "en", "original_title": "Power Rangers", "genre_ids": [28, 12, 878], "backdrop_path": "/gfTQaH7h09IaSZw9ubZgP2c7syr.jpg", "adult": false, 
"overview": "Saban's Power Rangers follows five ordinary teens who must become something extraordinary when they learn that their small town of Angel Grove — and the world — is on the verge of being obliterated by an alien threat. Chosen by destiny, our heroes quickly discover they are the only ones who can save the planet. But to do so, they will have to overcome their real-life issues and before it’s too late, band together as the Power Rangers.", "release_date": "2017-03-23" }, 



{ "vote_count": 1203, "id": 126889, "video": false, "vote_average": 5.8, "title": "Alien: Covenant", "popularity": 20.568775, "poster_path": "/ewVHnq4lUiovxBCu64qxq5bT2lu.jpg", "original_language": "en", "original_title": "Alien: Covenant", "genre_ids": [27, 878, 53], "backdrop_path": "/kMU8trT43p5LFoJ4plIySMOsZ1T.jpg", "adult": false, 
"overview": "Bound for a remote planet on the far side of the galaxy, the crew of the colony ship Covenant discovers what they think is an uncharted paradise, but is actually a dark, dangerous world — whose sole inhabitant is the “synthetic” David, survivor of the doomed Prometheus expedition.", "release_date": "2017-05-09" }, 



{ "vote_count": 3094, "id": 381288, "video": false, "vote_average": 6.8, "title": "Split", "popularity": 19.539855, "poster_path": "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/bqb9WsmZmDIKxqYmBJ9lj7J6hzn.jpg", "original_language": "en", "original_title": "Split", "genre_ids": [27, 53], "backdrop_path": "/4G6FNNLSIVrwSRZyFs91hQ3lZtD.jpg", "adult": false, 
"overview": "Though Kevin has evidenced 23 personalities to his trusted psychiatrist, Dr. Fletcher, there remains one still submerged who is set to materialize and dominate all the others. Compelled to abduct three teenage girls led by the willful, observant Casey, Kevin reaches a war for survival among all of those contained within him — as well as everyone around him — as the walls between his compartments shatter apart.", "release_date": "2016-11-15" }, 



{ "vote_count": 2554, "id": 283995, "video": false, "vote_average": 7.6, "title": "Guardians of the Galaxy Vol. 2", "popularity": 19.364494, "poster_path": "/y4MBh0EjBlMuOzv9axM4qJlmhzz.jpg", "original_language": "en", "original_title": "Guardians of the Galaxy Vol. 2", "genre_ids": [28, 12, 35, 878], "backdrop_path": "/aJn9XeesqsrSLKcHfHP4u5985hn.jpg", "adult": false,
 "overview": "The Guardians must fight to keep their newfound family together as they unravel the mysteries of Peter Quill's true parentage.", "release_date": "2017-04-19" }] };
}