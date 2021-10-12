(function ($) {
  "use strict";
  
    var csrf_token = jQuery('meta[name="csrf-token"]').attr('content');
    
    $(function () {
        // Multiple images preview with JavaScript
        var multiImgPreview = function (input, imgPreviewPlaceholder) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (let i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function (event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#images').on('change', function () {
            multiImgPreview(this, 'div.imgPreview');
        });
    });

    $(function () {
        $(document).on('click', '.ajaxDelete', function () {
            var url = $(this).attr('href');
            var msg = $(this).data('msg');
            var id = $(this).data('id');
            swal({
                title: "Are you sure?",
                text: msg,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes do it!",
                cancelButtonText: "No",
                closeOnConfirm: false,
            }, function () {
                $.get(url, { '_token': csrf_token }, function (json) {
                    if (json.st == 1) {
                        swal({
                            title: "Success",
                            text: json.msg,
                            type: "success",
                            showCancelButton: false
                        }, function () {
                            $(`#hide_${id}`).slideUp();
                        });
                    }
                }, 'json');

            });
            return false;
        });
    });


$(function(){
  $(document).on('click','.action_btn',function(){
    var link = $(this).attr('href');
    var msg = $(this).data('msg');
    swal({
        title: are_you_sure,
        text: msg,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: yes,
        cancelButtonText: no,
        closeOnConfirm: false,
      }, function(){                      
          window.location.href =link;
      });
    return false;
  });
});



}(jQuery)); 