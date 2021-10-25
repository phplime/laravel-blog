(function ($) {
  "use strict";
  
    var csrf_token = jQuery('meta[name="csrf-token"]').attr('content');
    
    $('.niceSelect').niceSelect();
  
    
    
    
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

function pushNotify() {
  new Notify({
    status: 'success',
    title: 'Notify Title',
    text: 'Notify text lorem ipsum',
    effect: 'fade',
    speed: 500,
    customClass: `custom-notify`,
    customIcon: `<i class="fa fa-home"></i>`,
    showIcon: true,
    showCloseButton: true,
    autoclose: false,
    autotimeout: 3000,
    gap: 20,
    distance: 20,
    type: 1,
    position: 'right top'
  })
}


$(document).on('click','.submitBtn',function(){
    $(this).prop('disabled',true);
    $(this).addClass('btn-loading');
    $(this).parents('form:first').submit();
  });


// new simpleSnackbar(`
//   <h4>Success</h4> 
//   <p>This is a test message</p>
//   `, {
//   icons: {
//     success: '<i class="fa fa-check"></i>',
//     danger: '<i class="fa fa-ban"></i>',
//   },
//   type: 'danger',
//   autohide: true,
//   close: true,
//   style: "toast",
//   progress: true,
// }).show();




pushNotify();
}(jQuery)); 