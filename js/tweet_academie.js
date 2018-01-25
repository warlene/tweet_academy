// const asyncRequestObject = new XMLHttpRequest;

// function refresh() {
//   window.setInterval("reloadIFrame();", 2000);
//
//   function reloadIFrame() {
//     document.src="rooter.php";
//   }
// }

// $('#myTweet').ready(

$(document).ready(function () {
  function subscribe(e) {
    var userId = $(e.target).data('user-id');
    var userIdFollower = $(e.target).data('idFollower');
    if($(e.target).val() == "S'abonner"){
      $.post('rooter.php?controller=follow&action=following', {idUserFollowed: userId, idUserfollower: userIdFollower})
        .done(function (response) {
          $(e.target).val("Abonné");
          $(e.target).css({
            backgroundColor : '#FA8258',
          })
        })
        .fail(function (error) {
          console.log(error);
        })
    }
    else if($(e.target).val() == "Abonné"){
      $.post('rooter.php?controller=follow&action=unfollow', {idUserFollowed: userId, idUserfollower: userIdFollower})
        .done(function (response) {
          $(e.target).val("S'abonner");
          $(e.target).css({
            backgroundColor : '#81BEF7',
          })
        })
        .fail(function (error) {
          console.log(error);
        })
      }
  }
  $(".subscribeBtn").click(subscribe);
});
