"use strict";

function lyricsDisplay(id) {
  document.getElementById('id-lyric').value = id;
  document.getElementById('lyric').value = document.getElementById("Song-Lyric" + id).getAttribute('data');
}

function editForm(id) {
  document.getElementById('edit-song').value = document.getElementById("Name-Song" + id).getAttribute('data');
  document.getElementById('edit-id').value = document.getElementById("id-info" + id).getAttribute('data');
  document.getElementById('edit-singer').value = document.getElementById("Name-Singer" + id).getAttribute('data');
  document.getElementById('edit-album').value = document.getElementById("Name-Album" + id).getAttribute('data');
  document.getElementById('edit-lyric').value = document.getElementById("Song-Lyric" + id).getAttribute('data');
  document.getElementById('edit-date').value = document.getElementById("Date" + id).getAttribute('data');
}