<?php
$e_id = 0;
if (isset($_GET['e_id']) && !empty($_GET['e_id'])) {
    $e_id = $_GET['e_id'];
} else {
    die("Access Denied!");
}
?>
<video autoplay width="300" height="300"></video>
                     <button id="reset" class="ui-btn">Reset camera</button>
  <script src="assets/js/qcode-decoder.min.js"></script>
  <script type="text/javascript">
 
  (function () {
    'use strict';
 
    var qr = new QCodeDecoder();
 
    if (!(qr.isCanvasSupported() && qr.hasGetUserMedia())) {
      alert('Your browser doesn\'t match the required specs.');
      throw new Error('Canvas and getUserMedia are required');
    }
 
    var video = document.querySelector('video');
    var reset = document.querySelector('#reset');
    var stop = document.querySelector('#stop');
 
    function resultHandler (err, result) {
        if (err) {
            return console.log(err.message);
        }
        $.post("staff/ajax/ajaxcheckin.php", {
            result: result,
            eid: '<?=$e_id; ?>'
        }).done(function (data) {
            var d = data.split("|");
            alert(d[1]);
            if (d[0] == "-1") {
                location.href = 'index.php?page=staff/viewexam.php&controller=1&e_id=<?=$e_id; ?>';
            }
        });
    }
 
    // prepare a canvas element that will receive
    // the image to decode, sets the callback for
    // the result and then prepares the
    // videoElement to send its source to the
    // decoder.
 
    qr.decodeFromCamera(video, resultHandler);
 
    // attach some event handlers to reset and
    // stop whenever we want.
 
    reset.onclick = function () {
      qr.decodeFromCamera(video, resultHandler);
    };
 
//    stop.onclick = function () {
//      qr.stop();
//    };
 
  })();
  </script>