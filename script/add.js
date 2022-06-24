$(()=>{
    $('.input').on('change', (event) => {
        var file = event.target.files[0];
        console.log(file);
        $('#image-preview').attr('src', URL.createObjectURL(file));
        // $('#image-preview').attr('class', 'food-image');
        // $(".caption").attr('display', 'none');
        // $('input').css('position', 'absolute');
    });
});