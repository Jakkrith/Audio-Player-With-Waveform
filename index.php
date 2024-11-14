<?php

/***************************************************************************/
//
// Usage: https://labs.siamecohost.com/audio-player/audio-player.php?sound=track1.mp3
// Upload file.mp3 into folder:  audio-player/audio
// Credit: https://github.com/livebloggerofficial/Audio-Player-With-Waveform
//
/***************************************************************************/

$sound = $_GET['sound'];
if($sound=="") {$sound = "track1.mp3"; }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Audio Player</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
  <center>
    <div class="audio-container">
      <div class="track-name"><?=$sound; ?></div>

      <div class="audio"></div>

      <div class="buttons">
        <span class="play-btn btn">
          <i class="fas fa-play"></i>
          <i class="fas fa-pause"></i>
        </span>

        <span class="stop-btn btn">
          <i class="fas fa-stop"></i>
        </span>

        <span class="mute-btn btn">
          <i class="fas fa-volume-up"></i>
          <i class="fas fa-volume-mute"></i>
        </span>

        <input
          type="range"
          min="0"
          max="1"
          step="0.1"
          value="0.5"
          class="volume-slider"
        />
      </div>
    </div>

    <script src="https://unpkg.com/wavesurfer.js"></script>
    <!--<script src="main.js"></script>-->

<script>
var audioTrack = WaveSurfer.create({
  container: ".audio",
  waveColor: "#eee",
  progressColor: "red",
  barWidth: 2,
});

audioTrack.load("audio/<?=$sound; ?>");

const playBtn = document.querySelector(".play-btn");
const stopBtn = document.querySelector(".stop-btn");
const muteBtn = document.querySelector(".mute-btn");
const volumeSlider = document.querySelector(".volume-slider");

playBtn.addEventListener("click", () => {
  audioTrack.playPause();

  if (audioTrack.isPlaying()) {
    playBtn.classList.add("playing");
  } else {
    playBtn.classList.remove("playing");
  }
});

stopBtn.addEventListener("click", () => {
  audioTrack.stop();
  playBtn.classList.remove("playing");
});

volumeSlider.addEventListener("mouseup", () => {
  changeVolume(volumeSlider.value);
});

const changeVolume = (volume) => {
  if (volume == 0) {
    muteBtn.classList.add("muted");
  } else {
    muteBtn.classList.remove("muted");
  }

  audioTrack.setVolume(volume);
};

muteBtn.addEventListener("click", () => {
  if (muteBtn.classList.contains("muted")) {
    muteBtn.classList.remove("muted");
    audioTrack.setVolume(0.5);
    volumeSlider.value = 0.5;
  } else {
    audioTrack.setVolume(0);
    muteBtn.classList.add("muted");
    volumeSlider.value = 0;
  }
});
	
</script>	
	
	
	</center>
  </body>
</html>
