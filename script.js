window.onload = function() {
  if ('speechSynthesis' in window) {
    // Get references to the play, pause, and stop buttons
    var playEle = document.querySelector('#play');
    var pauseEle = document.querySelector('#pause');
    var stopEle = document.querySelector('#stop');
    var articleEle = document.querySelector('article');
    var flag = false;

    // Add click event listeners to the buttons
    playEle.addEventListener('click', onClickPlay);
    pauseEle.addEventListener('click', onClickPause);
    stopEle.addEventListener('click', onClickStop);

    // Add an event listener for the speechSynthesis.onboundary event
    //speechSynthesis.addEventListener('boundary', onBoundary);

    function onClickPlay() {
      if (!flag) {
        // Start speaking
        flag = true;
        var utterance = new SpeechSynthesisUtterance(articleEle.textContent);
        utterance.voice = speechSynthesis.getVoices()[0];
        utterance.onend = function() {
          flag = false;
          playEle.className = pauseEle.className = '';
          stopEle.className = 'stopped';
        };
        playEle.className = 'played';
        stopEle.className = '';
        speechSynthesis.speak(utterance);
      } else if (speechSynthesis.paused) {
        // Unpause/resume narration
        playEle.className = 'played';
        pauseEle.className = '';
        speechSynthesis.resume();
      }
    }

    /*function onBoundary(event) {
      // Highlight the word being spoken
      var charIndex = event.charIndex;
      var word = articleEle.textContent.substr(charIndex, event.utterance.length);
      var wordStart = articleEle.textContent.indexOf(word);
      var wordEnd = wordStart + word.length;
      var span = document.createElement('span');
      article.className = 'highlight';
      var textNode = document.createTextNode(word);
      span.appendChild(textNode);

      articleEle.replaceChild(span,articleEle.childNodes[wordStart]);
    }*/

    function onClickPause() {
      if (speechSynthesis.speaking && !speechSynthesis.paused) {
        // Pause narration
        pauseEle.className = 'paused';
        playEle.className = '';
        speechSynthesis.pause();
      }
    }

    function onClickStop() {
      if (speechSynthesis.speaking) {
        // Stop narration
        stopEle.className = 'stopped';
        playEle.className = pauseEle.className = '';
        flag = false;
        speechSynthesis.cancel();
      }
    }
  }
}
