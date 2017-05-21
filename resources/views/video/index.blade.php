
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="https://developer.mozilla.org/en-US/docs/Template:CustomSampleCSS?raw=1" />

        <style type="text/css">
            body {
  font: 14px "Open Sans", "Arial", sans-serif;
}
#recording {
  margin-left:700px;
}
video {
  margin-top: 2px;
  border: 1px solid black;
}


.button {
  cursor: pointer;
  display: block;
  width: 160px;
  border: 1px solid black;
  font-size: 16px;
  text-align: center;
  padding-top: 2px;
  padding-bottom: 4px;
  color: white;
  background-color: darkgreen;
  text-decoration: none;
}

h2 {
  margin-bottom: 4px;
}

.left {
  margin-right: 10px;
  float: left;
  width: 160px;
  padding: 0px;
}

.right {
  margin-left: 10px;
  float: left;
  width: 160px;
  padding: 0px;
}

.bottom {
  clear: both;
  padding-top: 10px;
}
        </style>

    </head>
    <body>

<br> <div class="left">
  <div id="startButton" class="button">
    시작
  </div>
  <h2>화면</h2>
  <video id="preview" width="600" height="480" autoplay muted></video>
</div> <div class="right">
  <div id="stopButton" class="button">
    Stop
  </div>
  <h2>Recording</h2>
  <video id="recording" width="600" height="480" controls></video>
  <a id="downloadButton" class="button">
    Download
  </a>
</div> <div class="bottom">
  <pre id="log"></pre>
</div>


            <script type="text/javascript">
let preview = document.getElementById("preview");
let recording = document.getElementById("recording");
let startButton = document.getElementById("startButton");
let stopButton = document.getElementById("stopButton");
let downloadButton = document.getElementById("downloadButton");
let logElement = document.getElementById("log");

let recordingTimeMS = 5000; function log(msg) {
  logElement.innerHTML += msg + "\n";
} function wait(delayInMS) {
  return new Promise(resolve => setTimeout(resolve, delayInMS));
} function startRecording(stream, lengthInMS) {
  let recorder = new MediaRecorder(stream);
  let data = [];

  recorder.ondataavailable = event => data.push(event.data);
  recorder.start();
  log(recorder.state + " for " + (lengthInMS/1000) + " seconds...");

  let stopped = new Promise((resolve, reject) => {
    recorder.onstop = resolve;
    recorder.onerror = event => reject(event.name);
  });

  let recorded = wait(lengthInMS).then(
    () => recorder.state == "recording" && recorder.stop()
  );

  return Promise.all([
    stopped,
    recorded
  ])
  .then(() => data);
} function stop(stream) {
  stream.getTracks().forEach(track => track.stop());
} startButton.addEventListener("click", function() {
  navigator.mediaDevices.getUserMedia({
    video: true,
    audio: true
  }).then(stream => {
    preview.srcObject = stream;
    downloadButton.href = stream;

    preview.captureStream = preview.captureStream || preview.mozCaptureStream;

    // document.querySelector('.playAndRecord').addEventListener('click', function() {
    //   var playbackElement = document.getElementById("playback");
    //   var captureStream = playbackElement.captureStream();
    //   playbackElement.play();
    // });

    return new Promise(resolve => preview.onplaying = resolve);
  })
  .then(() => startRecording(startButton.captureStream(), recordingTimeMS))
  .then (recordedChunks => {
    let recordedBlob = new Blob(recordedChunks, { type: "video/webm" });
    recording.src = URL.createObjectURL(recordedBlob);
    downloadButton.href = recording.src;
    downloadButton.download = "RecordedVideo.webm";

    log("Successfully recorded " + recordedBlob.size + " bytes of " +
        recordedBlob.type + " media.");
  })
  .catch(log);
}, false); stopButton.addEventListener("click", function() {
  stop(preview.srcObject);
}, false);
            </script>

    </body>
</html>
