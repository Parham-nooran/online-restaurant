$(()=>{
    $('.input').on('change', (event) => {
        var file = event.target.files[0];
        console.log(file);
        $('#image-preview').attr('src', URL.createObjectURL(file));
        $('#image-preview').attr('class', 'uploaded-image');
        $(".caption").css('display', 'none');
        // $('input').css('position', 'absolute');
    });
});