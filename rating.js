$(document).ready(function() {

	$('#like_button').on('click', function() {
		insertLike();
	});

	$('#dislike_button').on('click', function() {
		insertDislike();

	if ($.cookie('rating-mirjan') == null )
		$('.comment-form').show();

	});

	$('#comment-btn').on('click', function() {
		sendComment();
	});

});

function insertLike()
    {
	  $.ajax({
	    type: 'post',
	    url: '/rating/like.php',
	    data: {
	      post_like:"like"
	    },
	    success: function (response) {
 	      $('#totalvotes').slideDown()
	      {			
	        $('#totalvotes').html(response);
	      }
	    }
	    });
    }

function insertDislike()
    {
	  $.ajax({
	    type: 'post',
	    url: '/rating/like.php',
	    data: {
	      post_dislike:"dislike"
	    },
	    success: function (response) {
 	      $('#totalvotes').slideDown()
	      {			
	        $('#totalvotes').html(response);
	      }
	    }
	    });
    }

function sendComment()
    {

    var email = $('input[name=email]').val();
    var message = $('input[name=message]').val();

	  $.ajax({
	    type: 'post',
	    url: '/rating/like.php',
	    data: {
	      post_email: email,
	      post_message: message
	    },
	    success: function (response) {
 	      $('.comment-form').after('Wysłano twój kommentarz');
	    }
	    });
    }