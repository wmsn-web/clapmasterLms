
<input type="file"  name="upload_files" id="upload_files" multiple="multiple">
<script src="assets/js/jquery-3.3.1.min.js"></script>
	<!-- BootStart Poper -->
	<script src="assets/js/popper.min.js"></script>
	<!-- BootStart Poper -->
	<script src="assets/js/bootstrap.v4.3.1.min.js"></script>
	<!-- OwlCarosel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- Animated Wow -->
	<script src="assets/js/wow.min.js"></script>
    <!-- counterup JS -->
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>

	<!-- Custome -->
	<script src="assets/js/active.js"></script>
	<script type="text/javascript">
		function upload(fileInputId, fileIndex)
    {
        // take the file from the input
        var file = document.getElementById(fileInputId).files[fileIndex];
        var reader = new FileReader();
        reader.readAsBinaryString(file); // alternatively you can use readAsDataURL
        reader.onloadend  = function(evt)
        {
                // create XHR instance
                xhr = new XMLHttpRequest();

                // send the file through POST
                xhr.open("POST", 'upload.php', true);

                // make sure we have the sendAsBinary method on all browsers
                XMLHttpRequest.prototype.mySendAsBinary = function(text){
                    var data = new ArrayBuffer(text.length);
                    var ui8a = new Uint8Array(data, 0);
                    for (var i = 0; i < text.length; i++) ui8a[i] = (text.charCodeAt(i) & 0xff);

                    if(typeof window.Blob == "function")
                    {
                         var blob = new Blob([data]);
                    }else{
                         var bb = new (window.MozBlobBuilder || window.WebKitBlobBuilder || window.BlobBuilder)();
                         bb.append(data);
                         var blob = bb.getBlob();
                    }

                    this.send(blob);
                }

                // let's track upload progress
                var eventSource = xhr.upload || xhr;
                eventSource.addEventListener("progress", function(e) {
                    // get percentage of how much of the current file has been sent
                    var position = e.position || e.loaded;
                    var total = e.totalSize || e.total;
                    var percentage = Math.round((position/total)*100);

                    // here you should write your own code how you wish to proces this
                });

                // state change observer - we need to know when and if the file was successfully uploaded
                xhr.onreadystatechange = function()
                {
                    if(xhr.readyState == 4)
                    {
                        if(xhr.status == 200)
                        {
                            // process success
                        }else{
                            // process error
                        }
                    }
                };

                // start sending
                xhr.mySendAsBinary(evt.target.result);
        };
    }
	</script>