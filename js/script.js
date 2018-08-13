
// $('#submitRegUser').click(function(event){
//  event.preventDefault();
//  $.ajax({
//   url: "partials/createUser.php",
//   method: "POST",
//   data: $('#RegUserForm').serialize(),
//   dataType: "text",
//   success: function(){
//     $('#message').text('Welcome! You are now registered, please sign in!')

//   },    
//   error: function (response){
//       console.log(response.status);
//       alert(" it doesnt work... : ");
//     }
// })
// });


 

$('.commentButton').on('click',function(event){
  event.preventDefault();
  event.stopImmediatePropagation();
  if ($(this).closest('.createComment').find('textarea').val() === '') {
    alert("Please type something");
    return 
  }
  $.ajax({
    url: "createComment.php",
    method: "POST",
    data: $(this).closest('.createComment').serialize(),
    dataType: "text",
    success: function(response) {
      console.log(response);
      displayFromDatabase(response, $(event.target));
      $(event.target).closest('.createComment').find('textarea').val('');
    },
    error: function (response){
      console.log(response.status);
      alert(" it doesnt work... : ");
    }
  })
});


function displayFromDatabase(jsonresponse, button) {
    var comment = JSON.parse(jsonresponse);
    console.log(comment);
    var lastComment = button.closest('.card-block').find('.comment-wrap').last();
    var template = `
    <div class="commentstyle">
    <p class="card-text display_p">
    ${comment.comment}
    </p>
    <p class="card-text display_p">
    Comment by: ${comment.username} ${comment.commentDate}
    </p>
    </div>
    `;
    $(template).insertAfter(lastComment);
}



$( document ).ready(function() {
$( ".container-fluid" ).delegate( ".delPost", "click", function() {
   event.preventDefault();
    //console.log($(this));
  var buttonCnt= $(this);
   $.ajax({
  url: "../partials/deletePost.php",
  method: "POST",
  data:   $(this).parent().serialize(),
  dataType: "text",
  success: function(data){
  console.log(buttonCnt);
  buttonCnt.closest(".card").remove();
  
  },
  error: function(){
      alert(" it doesnt work... : ");
    }
});
});

});


