<script>
$(document).ready(function(){
    $image_crop = $('#image_to_crop').croppie({
        enableExif: true,
        viewport: {
            width:200,
            height:200,
            type:'square'
        },
        boundary:{
            width:300,
            height:300
        }
    });

    $('#upload_image').on('change', function(){
        var reader = new FileReader();
        reader.onload = function (event) {
            $image_crop.croppie('bind', {
                url: event.target.result
            }).then(function(){});
        }
        reader.readAsDataURL(this.files[0]);
        $('#uploadimageModal').modal('show');
    });

    $('.crop_image').click(function(event){
        $image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response){
            swal.fire({
                text:'Unggah logo tim',
                background:'#FFFFFF',
                width:'300px',
                height:'100px',
                confirmButtonColor:'#009245',
                showConfirmButton:false,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                onBeforeOpen: () =>{},
                onOpen: () => {
                    swal.showLoading()
                }
            });
            $.ajax({
                url:"<?php echo base_url();?>team/photo_upload",
                type: "POST",
                data:{"image": response},
                success:function(data)
                {
                    $('#uploadimageModal').modal('hide');
                    $('#logo').val(data);
                    var img_url = '<?php echo base_url()?>assets/team_logo/' + data;
                    $('#logo_preview').attr('src', img_url);
                    swal.close();
                }
            });
        })
    });

});
</script>
