$('#content_tweet').ready(function() {
  if($('#content_tweet')['0'].value.length == 140){
    $('#content_tweet')['0'].value.css ({
      borderColor: red,
    })
  }
});
