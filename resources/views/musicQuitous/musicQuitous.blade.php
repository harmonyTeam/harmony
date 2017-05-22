
@extends('layouts.layout')

@section('content')

<script type="text/javascript">
var isPlaying = false;

function init() {
    var musics = document.getElementsByName("musics[]");        //체크박스
    var musics_test = document.getElementsByName("my_audio[]"); //오디오 태그
    var flag = false;

        for(var i=0; i<musics.length; i++){
                if ((musics[i].checked == true) && (!isPlaying)) {
                    musics_test[i].play();

                }else if(isPlaying){
                    musics_test[i].pause();
                    flag = true;
                }
        }

        if(!flag){
            isPlaying = true;
        }else {
            isPlaying = false;
        }

}


</script>

<?php
  foreach ($musics as $music){
      echo "$music : <input type='checkbox'  name='musics[]' value='$music'/><br>";
      echo "<audio name='my_audio[]' controls>
                <source src='$music' type='audio/mpeg'>
            </audio><br>";
  }
?>

<input type="button" onclick="init();" value="Play">
<br>

{{--밑에는 녹음부분--}}

<section class="main-controls">
    <canvas class="visualizer"></canvas>
    <button class="record">Record</button>
    <button class="stop">Stop</button>
</section>

<section class="sound-clips">

</section>

<script src="//www.playrtc.com/sdk/js/playrtc.js"></script>
<script src="/scripts/app.js"></script>


@endsection

