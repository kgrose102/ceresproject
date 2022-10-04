(() => {

	const vid = document.querySelector("video"),
        audi = document.querySelector("audio");

	let	buttons = document.querySelectorAll("button"),
	    volume = document.querySelector("#volume-control");
		// track = video.textTrack && video.textTrack[0];
  
 
	function playVideo() {
	    vid.play();
	}

	function playAudio() {
        audi.play();
	}
  
	function rewind() {
        vid.currentTime = 0;
	}
	function rewindAudio() {
        audi.currentTime = 0;
	}
  
	function stopVideo() {
	    vid.pause();
	}

	function stopAudio() {
        audi.pause();
	}

	function adjustVolume() {
	  vid.volume = volume.value / 100;
      audi.volume = volume.value / 100;
	  console.log("Audio Level", volume.value);
	}

	function adjustVolumeAudio() {
		audi.volume = volume.value / 100;
		console.log("Audio Level", volume.value);
	  }

    function subson() {
        track.mode = "hidden";
    }
	
	buttons[0].addEventListener("click", rewind);
	buttons[1].addEventListener("click", playVideo);
	buttons[2].addEventListener("click", stopVideo);
	volume.addEventListener("change", adjustVolume);
	buttons[0].addEventListener("click", rewindAudio);
	buttons[1].addEventListener("click", playAudio);
	buttons[2].addEventListener("click", stopAudio);
	volume.addEventListener("change", adjustVolumeAudio);
    buttons[3].addEventListener("click", subson);
	
})();

