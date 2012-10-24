$(function() {
		
		$(".menu li").mouseenter(
				function(){
					var $this=$(this);
					//$('.content').stop(true).hide();
					
					
					$('.content').hide();
					$('#'+this.id.replace('li','content')).stop(true, true).slideDown(500, 'swing');
				}
				//function(){
				//	$('#'+this.id.replace('li','content')).stop(true, true).slideUp('fast');
				//}
				);
		//$('li.content').hide();
	});

// Login Screen
$(function () {
	$(document).on('click', 'a.dev_login', function () {})
});
//Custom rich user experience - jquery.fileDownload.js & jQuery UI Dialog
//uses the optional "options" argument
//
//      the below uses jQuery "on" http://api.jquery.com/on/ (jQuery 1.7 + required, otherwise use "delegate" or "live") so that any 
//      <a class="fileDownload..."/> that is ever loaded into an Ajax site will automatically use jquery.fileDownload.js
//      if you are using "on":
//          you should generally be able to reduce the scope of the selector below "document" but it is used in this example so it
//          works for possible dynamic manipulation in the entire DOM
//
$(function () {
    $(document).on("click", "a.fileDownloadCustomRichExperience", function () {

        var $preparingFileModal = $("#preparing-file-modal");

        $preparingFileModal.dialog({ modal: true });

        $.fileDownload($(this).attr('href'), {
            successCallback: function (url) {

                $preparingFileModal.dialog('close');
            },
            failCallback: function (responseHtml, url) {

                $preparingFileModal.dialog('close');
                $("#error-modal").dialog({ modal: true });
            }
        });
        return false; //this is critical to stop the click event which will trigger a normal file download!
    });
});