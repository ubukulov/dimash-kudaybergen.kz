/*
  When the bandcamp link is pressed, stop all propagation so AmplitudeJS doesn't
  play the song.
*/
let bandcampLinks = document.getElementsByClassName('bandcamp-link');

for( var i = 0; i < bandcampLinks.length; i++ ){
  bandcampLinks[i].addEventListener('click', function(e){
    e.stopPropagation();
  });
}


let songElements = document.getElementsByClassName('song');

for( var i = 0; i < songElements.length; i++ ){
  /*
    Ensure that on mouseover, CSS styles don't get messed up for active songs.
  */
  songElements[i].addEventListener('mouseover', function(){
    this.style.backgroundColor = '#00A0FF';

    this.querySelectorAll('.song-meta-data .song-title')[0].style.color = '#FFFFFF';
    this.querySelectorAll('.song-meta-data .song-artist')[0].style.color = '#FFFFFF';

    if( !this.classList.contains('amplitude-active-song-container') ){
      this.querySelectorAll('.play-button-container')[0].style.display = 'block';
    }

    this.querySelectorAll('img.bandcamp-grey')[0].style.display = 'none';
    this.querySelectorAll('img.bandcamp-white')[0].style.display = 'block';
    //this.querySelectorAll('.song-duration')[0].style.color = '#FFFFFF';
  });

  /*
    Ensure that on mouseout, CSS styles don't get messed up for active songs.
  */
  songElements[i].addEventListener('mouseout', function(){
    this.style.backgroundColor = '#FFFFFF';
    this.querySelectorAll('.song-meta-data .song-title')[0].style.color = '#272726';
    this.querySelectorAll('.song-meta-data .song-artist')[0].style.color = '#607D8B';
    this.querySelectorAll('.play-button-container')[0].style.display = 'none';
    this.querySelectorAll('img.bandcamp-grey')[0].style.display = 'block';
    this.querySelectorAll('img.bandcamp-white')[0].style.display = 'none';
    //this.querySelectorAll('.song-duration')[0].style.color = '#607D8B';
  });

  /*
    Show and hide the play button container on the song when the song is clicked.
  */
  songElements[i].addEventListener('click', function(){
    this.querySelectorAll('.play-button-container')[0].style.display = 'none';
  });
}

/*
  Initializes AmplitudeJS
*/
Amplitude.init({
  "songs": [
    {
      "name": "Дайдидау",
      "artist": "Димаш Кудайберген",
      "url": "../songs/daydidau.mp3",
      "cover_art_url": "../img/album-art/dimash.jpg"
    },
    {
      "name": "Грешная страсть",
      "artist": "Димаш Кудайберген",
      "url": "../songs/greshnaya_strast.mp3",
      "cover_art_url": "../img/album-art/dimash.jpg",
            "lyrics" : ""
    },
    {
      "name": "Adagio",
      "artist": "Димаш Кудайберген",
      "url": "../songs/Adagio.mp3",
      "cover_art_url": "../img/album-art/dimash.jpg"
    },
    {
      "name": "Akkuym",
      "artist": "Димаш Кудайберген",
      "url": "../songs/Akkuym.mp3",
      "cover_art_url": "../img/album-art/dimash.jpg"
    },
    {
      "name": "All By Myself",
      "artist": "Димаш Кудайберген",
      "url": "../songs/All_By_Myself.mp3",
      "cover_art_url": "../img/album-art/dimash.jpg"
    },
    {
      "name": "Hello",
      "artist": "Димаш Кудайберген",
      "url": "../songs/Hello.mp3",
      "cover_art_url": "../img/album-art/dimash.jpg"
    },
    {
      "name": "Lay Down",
      "artist": "Димаш Кудайберген",
      "url": "../songs/Lay Down.mp3",
      "cover_art_url": "../img/album-art/dimash.jpg"
    },
    {
      "name": "My Heart Will Go On",
      "artist": "Димаш Кудайберген",
      "url": "../songs/My heart will go on.mp3",
      "cover_art_url": "../img/album-art/dimash.jpg"
    },
    {
      "name": "A Question of Honour",
      "artist": "Димаш Кудайберген",
      "url": "../songs/Question of Honour.mp3",
      "cover_art_url": "../img/album-art/dimash.jpg"
    },
    {
      "name": "Screaming",
      "artist": "Димаш Кудайберген",
      "url": "../songs/Screaming.mp3",
      "cover_art_url": "../img/album-art/dimash.jpg"
    },
    {
      "name": "S.O.S. D'un Terrien En Detresse",
      "artist": "Димаш Кудайберген",
      "url": "../songs/Sos dun terrien (2018).mp3",
      "cover_art_url": "../img/album-art/dimash.jpg"
    },
    {
      "name": "The Crown",
      "artist": "Димаш Кудайберген",
      "url": "../songs/The_Crown.mp3",
      "cover_art_url": "../img/album-art/dimash.jpg"
    },
    {
      "name": "Война и Мир",
      "artist": "Димаш Кудайберген",
      "url": "../songs/Война и Мир.mp3",
      "cover_art_url": "../img/album-art/dimash.jpg"
    },
    {
      "name": "Знай",
      "artist": "Димаш Кудайберген",
      "url": "../songs/Знай.mp3",
      "cover_art_url": "../img/album-art/dimash.jpg"
    },
    {
      "name": "Любовь уставших лебедей",
      "artist": "Димаш Кудайберген",
      "url": "../songs/Любовь уставших лебедей.mp3",
      "cover_art_url": "../img/album-art/dimash.jpg"
    },
    {
      "name": "Махаббат бер маған",
      "artist": "Димаш Кудайберген",
      "url": "../songs/Махаббат бер маған.mp3",
      "cover_art_url": "../img/album-art/dimash.jpg"
    },
    {
      "name": "Опять метель",
      "artist": "Димаш Кудайберген",
      "url": "../songs/Опять метель.mp3",
      "cover_art_url": "../img/album-art/dimash.jpg"
    },
    {
      "name": "Umytylmas kún",
      "artist": "Димаш Кудайберген",
      "url": "../songs/umutulmas.mp3",
      "cover_art_url": "../img/album-art/dimash.jpg"
    },
    {
      "name": "Я люблю только тебя",
      "artist": "Димаш Кудайберген",
      "url": "../songs/Я люблю только тебя.mp3",
      "cover_art_url": "../img/album-art/dimash.jpg"
    }
  ]
});


















































































