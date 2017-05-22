'use strict';

navigator.getUserMedia = ( navigator.getUserMedia ||
                       navigator.webkitGetUserMedia ||
                       navigator.mozGetUserMedia ||
                       navigator.msGetUserMedia);

var blobAudio;
var app;
var record = document.querySelector('.record');
var stop = document.querySelector('.stop');
var soundClips = document.querySelector('.sound-clips');
var canvas = document.querySelector('.visualizer');

var audioCtx = new (window.AudioContext || webkitAudioContext)();
var canvasCtx = canvas.getContext("2d");
canvas.style.border = "1px solid black";

if (navigator.getUserMedia) {

   navigator.getUserMedia (

      {
         audio: true
      },

      // Success callback
      function(stream) {
      	 var mediaRecorder = new MediaRecorder(stream);

          app = new PlayRTC({
              projectKey: '60ba608a-e228-4530-8711-fa38004719c1',
              localMediaTarget: 'localVideo',
              video: false
          });
          app.createChannel();

      	 visualize(stream);

      	 record.onclick = function() {
      	 	mediaRecorder.start();
             app.getMedia().record();

      	 	record.style.background = "#229";
      	 	record.style.color = "#fff";
      	 }

      	 stop.onclick = function() {
      	 	mediaRecorder.stop();
             app.getMedia().recordStop();

      	 	record.style.background = "";
      	 	record.style.color = "";
      	 }

      	 mediaRecorder.ondataavailable = function(e) {



      	   var clipContainer = document.createElement('article');

           var audio = document.createElement('audio');
           var deleteButton = document.createElement('button');
           var saveButton = document.createElement('button');


           clipContainer.classList.add('clip');
           audio.setAttribute('controls', '');
           deleteButton.innerHTML = "Delete";
           saveButton.innerHTML = "Save";

           clipContainer.appendChild(audio);

           clipContainer.appendChild(deleteButton);
           clipContainer.appendChild(saveButton);
           soundClips.appendChild(clipContainer);

           var audioURL = window.URL.createObjectURL(e.data);
           var te = e.data;
           var fr = new FileReader();


           audio.src = audioURL;

             saveButton.onclick = function (blob) {

                    blobAudio = te;

                     send(blobAudio);

             }


           deleteButton.onclick = function(e) {
             var evtTgt = e.target;
             evtTgt.parentNode.parentNode.removeChild(evtTgt.parentNode);
           }


      	 }
      },

      // Error callback
      function(err) {

      }
   );
}

function visualize(stream) {
  var source = audioCtx.createMediaStreamSource(stream);

  var analyser = audioCtx.createAnalyser();
  analyser.fftSize = 2048;
  var bufferLength = analyser.frequencyBinCount;
  var dataArray = new Uint8Array(bufferLength);

  source.connect(analyser);
  //analyser.connect(audioCtx.destination);
  
  var WIDTH = canvas.width
  var HEIGHT = canvas.height;

  draw()

  function draw() {

    requestAnimationFrame(draw);

    analyser.getByteTimeDomainData(dataArray);

    canvasCtx.fillStyle = 'rgb(255, 255, 255)';
    canvasCtx.fillRect(0, 0, WIDTH, HEIGHT);

    canvasCtx.lineWidth = 2;
    canvasCtx.strokeStyle = 'rgb(255, 255, 0)';

    canvasCtx.beginPath();

    var sliceWidth = WIDTH * 1.0 / bufferLength;
    var x = 0;


    for(var i = 0; i < bufferLength; i++) {
 
      var v = dataArray[i] / 128.0;
      var y = v * HEIGHT/2;

      if(i === 0) {
        canvasCtx.moveTo(x, y);
      } else {
        canvasCtx.lineTo(x, y);
      }

      x += sliceWidth;
    }

    canvasCtx.lineTo(canvas.width, canvas.height/2);
    canvasCtx.stroke();

  }

}

//-----------------------------

function send(data) {

    var fd = new FormData();
    fd.append('fname', 'audioBlob');
    fd.append('data',data);


    $.ajax({
        url: "/blobTest",
        type: "POST",
        processData: false,
        contentType: false,
        data: fd,
        dataType: 'json',
        success:function(data){
            alert(data);
            console.log("전송 완료");

        },
        error: function () {
            alert('오류가 발생하였습니다.');
        }
    });


}


