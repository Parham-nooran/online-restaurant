function removeMessage(){
    $('.message').hide();
}

$(()=>{
    setTimeout(removeMessage, 3000);
});