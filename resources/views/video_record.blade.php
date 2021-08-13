@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-0">
                  <div class="row ml-0 mr-0 text-center">
                    <div id="step1-head" class="col-md-6 p-2 highlight-step">
                      <h3>Step 1</h3>
                      <p class="mb-0">Verify Details</p>
                    </div>
                    <div id="step2-head" class="col-md-6 p-2">
                      <h3>Step 2</h3>
                      <p class="mb-0">Record Video</p>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  {{-- <form method="post" action="" enctype="multipart/form-data"> --}}
                    {{-- @csrf --}}
                    <div id="step_1">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Application ID</label>
                            <input type="text" class="form-control" placeholder="Application ID" id="application_id" name="application_id" />
                            <p id="application_id_error"></p>
                          </div>
                          <div class="form-group">
                            <label>Date of Birth</label>
                            <input
                            type="date"
                            id="birthday"
                            class="form-control"
                            name="birthday"
                            />
                            <p id="birthday_error"></p>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <p><input type="checkbox" id="confirmation_checked" /> I hereby confirm that I have a camera, microphone and have good internet connection (minimum 3G).I confirm to validate myself with my video recording and fair answers to questions displayed.</p>
                          </div>
                          <p id="all_error"></p>
                        </div>
                      </div>
                      <div class="text-right">
                        <button type="button" class="btn-form" id="move_step_2" disabled>Next</button>
                      </div>
                    </div>
                    <div id="step_2" style="display: none;">
                      <div class="row justify-content-md-center">
                        <div class="col-4 align-self-center">
                          <p class="mb-2 text-center">Video Recording Left 00:<span id="countdowntimer">22</span>seconds</p>
                          <div class="form-group">
                            <div id="recordVideo" class="embed-responsive embed-responsive-1by1">
                              <video id="videoElement" controls></video>
                            </div>
                            <div id="viewVideo" class="embed-responsive embed-responsive-1by1">
                              <video id="vid2" controls></video>
                            </div>  
                          </div>
                          <div class="form-group">
                            <button type="button" style="float:left;" class="btn btn-primary ml-3 mr-5" id="btnStart" disabled>Record</button>
                            <!-- <button type="button" style="float:left;" class="btn btn-primary mr-3" id="btnStop" >Stop</button> -->
                            <button type="button" style="float:left;" class="btn btn-primary mr-5" id="btnView" disabled>View</button>
                            <form method="POST" style="float:left;" action="{{ route('video.verification') }}">
                              @csrf
                              <input type="hidden" name="verification_application_id" id="verification_application_id" />
                              <input type="hidden" name="verfication_dob" id="verfication_dob" />
                              <input type="hidden" name="verification_video_url" id="verification_video_url" />
                              <input type="hidden" name="verification_video_hash" id="verification_video_hash" />
                              <button class="btn btn-primary" id="verification_form_submit" disabled>Submit</button>
                            </form>
                          </div>
                        </div>
                      </div>
                      <p class="text-uppercase mb-3" style="color: #b74f51">Click the record button and read the script below</p>

                      <ul class="list-group mb-2">
                        <li class="list-group-item">My name is <strong id="applicant_name"></strong></li>
                        <li class="list-group-item">My application ID is <strong id="applicant_application_id"></strong></li>
                        <li class="list-group-item">My date of birth is <strong id="applicant_dob"></strong></li>
                        <li class="list-group-item">I have applied for a Futuriq digital signature</li>
                      </ul>
                    </div>
                  {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
{{-- <script>
  var record = document.querySelector("#startRecording");
  var video = document.querySelector("#videoElement");

  record.addEventListener("click", recordVideo)

  function recordVideo() {
    if (navigator.mediaDevices.getUserMedia) {
      navigator.mediaDevices.getUserMedia({ video: true })
        .then(function (stream) {
          video.srcObject = stream;
        })
        .catch(function (err) {
          console.log("Something went wrong!");
        });
    }
  }
</script> --}}

<script>

    document.getElementById('recordVideo').style.display = "block";
    document.getElementById('viewVideo').style.display = "none";
    openVideoRecording();
    let video = document.querySelector('#videoElement');
    let vidSave = document.querySelector('#vid2');
    
    function openVideoRecording() {
      let constraintObj = {
          audio: true,
          video: true
      };

      //handle older browsers that might implement getUserMedia in some way
      if(navigator.mediaDevices === undefined){
          navigator.mediaDevices = {};
          navigator.mediaDevices.getUserMedia = function(constraints){
              let getUserMedia = navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
              if(!getUserMedia){
                  return Promise.reject(new Error('getUserMedia is not implemented in the browser'));
              }
              return new Promise(function(resolve, reject){
                  getUserMedia.call(navigator, constraints, resolve, reject);
              });
          }
      }else{
          navigator.mediaDevices.enumerateDevices()
          .then(devices => {
              devices.forEach(device=>{
                  console.log(device.kind.toUpperCase(), device.label);
                  console.log(device.deviceId, device.label);
              })
          })
          .catch(err => {
              console.log(err.name, err.message);
          })
      }

      navigator.mediaDevices.getUserMedia(constraintObj)
      .then(function(mediaStreamObj){
          //connect to media stream with first video element
          if("srcObject" in video){
            video.srcObject = mediaStreamObj;
          }else{
            //old version
            video.src = window.URL.createObjectURL(mediaStreamObj);
          }
          //add listeners for saving video/audio
          let stop = document.getElementById('btnStop');
          let submit = document.getElementById('verification_form_submit');
          let start = document.getElementById('btnStart');
          start.disabled = false;
          let view = document.getElementById('btnView');
          let mediaRecorder = new MediaRecorder(mediaStreamObj);
          let chunks = [];

           start.addEventListener('click', (ev) => {
              video.play();
              mediaRecorder.start();
              timer(video, mediaRecorder, chunks);
           });

           view.addEventListener('click', (ev) => {
              vidSave.play();
           }); 

          //  stop.addEventListener('click', (ev) => {
          //     mediaRecorder.stop();
          //     console.log(mediaRecorder.state);
          //  });
          
           
      })
      .catch(function(err){
          console.log(err.name, err.message);
      });
    }

    function timer(video, mediaRecorder, chunks) {
      var timeleft = 22;
      var downloadTimer = setInterval(function(){
      timeleft--;
      document.getElementById("countdowntimer").textContent = timeleft;
        if(timeleft <= 0){
            video.pause();
            mediaRecorder.stop();
            mediaRecorder.ondataavailable = (ev) => {
               chunks.push(ev.data);
            }
            mediaRecorder.onstop = async (ev) => {
              let blob = new Blob(chunks, {'type' : 'video/mp4;'});
              console.log("Blog Data==>", blob);
              chunks = [];
              await uploadFile(blob);
              let videoURL = window.URL.createObjectURL(blob);
              vidSave.src = videoURL;
            }
            clearInterval(downloadTimer);
            document.getElementById('recordVideo').style.display = "none";
            document.getElementById('viewVideo').style.display = "block";
            document.getElementById('btnStart').disabled = true;
            document.getElementById('btnView').disabled = false;
            document.getElementById('verification_form_submit').disabled = false;
        }    
      },1000);
    }
    
    
    function uploadFile(blob) {
        var application_id = document.getElementById('application_id').value;
        var file = new File([blob], 'msr-' + (new Date).toISOString().replace(/:|\./g, '-') + '.webm', {
            type: 'video/webm'
        });
        const hashHexVideo = getHash("SHA-256", new Blob([file]));
        // create FormData
        var formData = new FormData();
        formData.append('application_id', application_id);
        formData.append('_token', "{{ csrf_token() }}");
        formData.append('video-filename', file.name);
        formData.append('video-blob', file);
        formData.append('video_file_hash', hashHexVideo);
        makeXMLHttpRequest('{{ route("video.upload") }}', formData, function() {
            var downloadURL = 'https://futuriq.in/videos/' + file.name;
            console.log('File uploaded to this path:', downloadURL);
        });
    }

    function makeXMLHttpRequest(url, data, callback) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                callback(location.href + request.responseText);
                console.log("res", request.responseText);
                document.getElementById('verification_video_url').value = request.responseText;
                document.getElementById('verification_video_hash').value = hashHexVideo;
                document.getElementById('verification_form_submit').disabled = false;
            }
        };
        request.open('POST', url);
        request.send(data);
    }
    
     /**
      * @param {"SHA-1"|"SHA-256"|"SHA-384"|"SHA-512"} algorithm https://developer.mozilla.org/en-US/docs/Web/API/SubtleCrypto/digest
      * @param {string|Blob} data
    **/
    async function getHash(algorithm, data) {

          const main = async (msgUint8) => { // https://developer.mozilla.org/en-US/docs/Web/API/SubtleCrypto/digest#converting_a_digest_to_a_hex_string
            const hashBuffer = await crypto.subtle.digest(algorithm, msgUint8)
            const hashArray = Array.from(new Uint8Array(hashBuffer))
            return hashArray.map(b => b.toString(16).padStart(2, '0')).join(''); // convert bytes to hex string
          }

          if (data instanceof Blob) {
            const arrayBuffer = await data.arrayBuffer()
            const msgUint8 = new Uint8Array(arrayBuffer)
            return await main(msgUint8)
          }
          const encoder = new TextEncoder()
          const msgUint8 = encoder.encode(data)
          return await main(msgUint8)
    }
    
</script>
@endsection