$(document).ready( function () {
	$('.edit_link').hide();
	$('.contentbox').focus(function() {
		$('.edit_link').hide();
		$(this).siblings('.edit_link').show();
	});
	
	$('.edit_link').click(function() {
		$('.contentbox').removeClass('currentcontent');
		$(this).siblings('.contentbox').addClass('currentcontent');
		var content = $(this).siblings('.contentbox').val();
		$('#edit_wrap').show();
		tinyMCE.activeEditor.setContent(content);
	});
	
	$('.close').click(function() {
		var newcontent = tinyMCE.activeEditor.getContent();
		$('#edit_wrap').hide();
		$('.currentcontent').val(newcontent);
	});

//$('#creation_form').on('submit', function(e) {
//	if($('#creation_form ul li .not_in_range').length > 0) {
//	    e.preventDefault();
//	    $('#creation_form ul li .not_in_range + input').addClass('not_finished');
//	}
//});

$('#creation_form input[type="text"]').keyup(function() {
     var min = $(this).attr('data-min');
     var max = $(this).attr('data-max');
     var content = $(this).val();
     var contentLen = content.length;
    $(this).siblings('.range').html('Character Count: ' + contentLen);
    if (contentLen >= min && contentLen <= max) {
        if ($(this).siblings('.range').hasClass('not_in_range')) {
            $(this).siblings('.range').removeClass('not_in_range'); 
        }
        if (!$(this).siblings('.range').hasClass('in_range')) {
            $(this).siblings('.range').addClass('in_range');
            $(this).removeClass('not_finished');
        }
    } else {
        if ($(this).siblings('.range').hasClass('in_range')) {
            $(this).siblings('.range').removeClass('in_range'); 
        }
        if (!$(this).siblings('.range').hasClass('not_in_range')) {
            $(this).siblings('.range').addClass('not_in_range');
        }
    }
});
});
$(function() {
	Dropzone.options.dropzoneForm = {
		init: function() {
			this.on("complete", function() {
				if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
					if( $.trim( $('#image_error').text() ).length === 0) {
						//location.reload();
					} else {
						$('#image_error').show();
					}
					//$('#upload_wrap').hide();
				}
			});
		},
		success: function(file, response) {
			$('#image_error').append(response);
		}
	};
});