    <footer class="footer mt-auto py-3 bg-light">
      <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
      </div>
    </footer>
    <div id="yourElement"></div>
    <script src="<?= URLROOT; ?>/js/jquery-3.6.0.min.js"></script>
    <script src="<?= URLROOT; ?>/js/bootstrap.min.js"></script>
    <script src="<?= URLROOT; ?>/js/quagga.min.js"></script>
    <script>
      Quagga.init({
        inputStream : {
          name : "Live",
          type : "LiveStream",
          target: document.querySelector('#yourElement')    // Or '#yourElement' (optional)
        },
        decoder : {
          readers : [
            "code_128_reader",
            "ean_reader",
            "ean_8_reader",
            "code_39_reader",
            "code_39_vin_reader", 
            "codabar_reader", 
            "upc_reader", 
            "upc_e_reader", 
            //"i2of5_reader", 
            //"2of5_reader", 
            "code_93_reader"]
        },
        locate: true,
        locator: {
          halfSample: true,
          patchSize: "large", // x-small, small, medium, large, x-large
        }
      }, function(err) {
          if (err) {
              console.log(err);
              return
          }
          console.log("Initialization finished. Ready to start");
          Quagga.start();
      });

      Quagga.onProcessed((data) => {
        // console.log(data);
      });

      Quagga.onDetected(detected);

      let notSleep = true;

      function detected(data){
        if(notSleep){
          // console.log(data);
          notSleep = false;
          let audio = new Audio('<?= URLROOT; ?>/sounds/beep.mp3');
          audio.play();
          setTimeout(() => {
            notSleep = true;
          }, 600);
        }
      }
    </script>
</body>
</html>