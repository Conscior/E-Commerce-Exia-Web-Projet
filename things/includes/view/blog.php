<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    
<?php include "../model/head.php"?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

     <link rel="stylesheet" href="../../css/blogStyle.css" />

    <title>Blog</title>
</head>

<body class="animsition">
    <?php include '../model/navbar.php';?>
    	<!-- Title Page -->
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(../../assets/turned-on-black-framed-incandescent-bulb-pendant-lamp-1047270.jpg);">
		<h2 class="tit6 t-center">
			Blog
		</h2>
    </section>
    <!-- Content page -->
	<section>
		<div class="bread-crumb bo5-b p-t-17 p-b-17">
			<div class="container">
				<a href="index.php" class="txt27">
					Home
				</a>

				<span class="txt29 m-l-10 m-r-10">/</span>

				<span class="txt29">
					Blog
				</span>
			</div>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9">
                    <div class="p-t-80 p-b-124 bo5-r h-full p-r-50 p-r-0-md bo-none-md">
                        <div class="blo4 p-b-63">



                        <div class="comment-form-container" style="margin-top:50px;background-color:black;border:2px solid yellow">
    <form id="frm-comment">
        <div class="input-row">
            <input type="hidden" name="comment_id" id="commentId"
                   placeholder="Name" /> <input class="input-field"
                   type="text" name="name" id="name" placeholder="Name" />
        </div>
        <div class="input-row">
            <textarea class="input-field" type="text" name="comment"
                      id="comment" placeholder="Add a Comment">  </textarea>
        </div>
        <div>
            <input type="button" class="btn-submit" id="submitButton"
                   value="Publish" /><div id="comment-message">Comments Added Successfully!</div>
        </div>

    </form>
</div>

<div id="output">

</div>
<script>
    var totalLikes = 0;
    var totalUnlikes = 0;
   
    function postReply(commentId) {
        $('#commentId').val(commentId);
        $("#name").focus();
    }

    $("#submitButton").click(function () {
        $("#comment-message").css('display', 'none');
        var str = $("#frm-comment").serialize();

        $.ajax({
            url: "../controller/comment-add.php",
            data: str,
            type: 'post',
            success: function (response)
            {
                var result = eval('(' + response + ')');
                if (response)
                {
                    $("#comment-message").css('display', 'inline-block');
                    $("#name").val("");
                    $("#comment").val("");
                    $("#commentId").val("");
                    listComment();
                } else
                {
                    alert("Failed to add comments !");
                    return false;
                }
            }
        });
    });

    $(document).ready(function () {
        listComment();
    });

    function listComment() {
        $.post("../controller/comment-list.php",
                function (data) {
                    var data = JSON.parse(data);

                    var comments = "";
                    var replies = "";
                    var item = "";
                    var parent = -1;
                    var results = new Array();

                    var list = $("<ul class='outer-comment'>");
                    var item = $("<li>").html(comments);

                    for (var i = 0; (i < data.length); i++)
                    {
                        var commentId = data[i]['comment_id'];
                        parent = data[i]['parent_comment_id'];

                        var obj = getLikesUnlikes(commentId);
                        
                        if (parent == "0")
                        {
                            if(data[i]['like_unlike'] >= 1) 
                            {
                                like_icon = "<img src='../../assets/like.png'  id='unlike_" + data[i]['comment_id'] + "' class='like-unlike'  onClick='likeOrDislike(" + data[i]['comment_id'] + ",-1)' />";
                                like_icon += "<img style='display:none;' src='../../assets/unlike.png' id='like_" + data[i]['comment_id'] + "' class='like-unlike' onClick='likeOrDislike(" + data[i]['comment_id'] + ",1)' />";
                            }
                            else
                            {
                                   like_icon = "<img style='display:none;' src='../../assets/like.png'  id='unlike_" + data[i]['comment_id'] + "' class='like-unlike'  onClick='likeOrDislike(" + data[i]['comment_id'] + ",-1)' />";
                                like_icon += "<img src='../../assets/unlike.png' id='like_" + data[i]['comment_id'] + "' class='like-unlike' onClick='likeOrDislike(" + data[i]['comment_id'] + ",1)' />";
                                
                            }
                            
                            comments = "\
                                <div class='comment-row'>\
                                    <div class='comment-info'>\
                                        <span class='commet-row-label'>from</span>\
                                        <span class='posted-by'>" + data[i]['comment_sender_name'] + "</span>\
                                        <span class='commet-row-label'>at</span> \
                                        <span class='posted-at'>" + data[i]['date'] + "</span>\
                                    </div>\
                                    <div class='comment-text'>" + data[i]['comment'] + "</div>\
                                    <div>\
                                        <a class='btn-reply' onClick='postReply(" + commentId + ")'>Reply</a>\
                                    </div>\
                                    <div class='post-action'>\ " + like_icon + "&nbsp;\
                                        <span id='likes_" + commentId + "'> " + totalLikes + " likes </span>\
                                    </div>\
                                </div>";

                            var item = $("<li>").html(comments);
                            list.append(item);
                            var reply_list = $('<ul>');
                            item.append(reply_list);
                            listReplies(commentId, data, reply_list);
                        }
                    }
                    $("#output").html(list);
                });
    }

    function listReplies(commentId, data, list) {

        for (var i = 0; (i < data.length); i++)
        {

            var obj = getLikesUnlikes(data[i].comment_id);
            if (commentId == data[i].parent_comment_id)
            {
                if(data[i]['like_unlike'] >= 1) 
                {
                    like_icon = "<img src='../../assets/like.png'  id='unlike_" + data[i]['comment_id'] + "' class='like-unlike'  onClick='likeOrDislike(" + data[i]['comment_id'] + ",-1)' />";
                    like_icon += "<img style='display:none;' src='../../assets/unlike.png' id='like_" + data[i]['comment_id'] + "' class='like-unlike' onClick='likeOrDislike(" + data[i]['comment_id'] + ",1)' />";
                    
                }
                else
                {
                 like_icon = "<img style='display:none;' src='../../assets/like.png'  id='unlike_" + data[i]['comment_id'] + "' class='like-unlike'  onClick='likeOrDislike(" + data[i]['comment_id'] + ",-1)' />";
                 like_icon += "<img src='../../assets/unlike.png' id='like_" + data[i]['comment_id'] + "' class='like-unlike' onClick='likeOrDislike(" + data[i]['comment_id'] + ",1)' />";
                    
                }
                var comments = "\
                                <div class='comment-row'>\
                                    <div class='comment-info'>\
                                        <span class='commet-row-label'>from</span>\
                                        <span class='posted-by'>" + data[i]['comment_sender_name'] + "</span>\
                                        <span class='commet-row-label'>at</span> \
                                        <span class='posted-at'>" + data[i]['date'] + "</span>\
                                    </div>\
                                    <div class='comment-text'>" + data[i]['comment'] + "</div>\
                                    <div>\
                                        <a class='btn-reply' onClick='postReply(" + data[i]['comment_id'] + ")'>Reply</a>\
                                    </div>\
                                    <div class='post-action'> " + like_icon + "&nbsp;\
                                        <span id='likes_" + data[i]['comment_id'] + "'> " + totalLikes + " likes </span>\
                                    </div>\
                                </div>";

                var item = $("<li>").html(comments);
                var reply_list = $('<ul>');
                list.append(item);
                item.append(reply_list);
                listReplies(data[i].comment_id, data, reply_list);
            }
        }
    }

    function getLikesUnlikes(commentId)
    {

        $.ajax({
            type: 'POST',
            async: false,
            url: '../controller/get-like-unlike.php',
            data: {comment_id: commentId},
            success: function (data)
            {
                totalLikes = data;
            }

        });

    }
    
                 
   function likeOrDislike(comment_id,like_unlike)
    {
      
        $.ajax({
            url: '../controller/comment-like-unlike.php',
            async: false,
            type: 'post',
            data: {comment_id:comment_id,like_unlike:like_unlike},
            dataType: 'json',
            success: function (data) {
                
                $("#likes_"+comment_id).text(data + " likes");
                
                if (like_unlike == 1) { 
                    $("#like_" + comment_id).css("display", "none");
                    $("#unlike_" + comment_id).show();
                }

                if (like_unlike == -1) {
                    $("#unlike_" + comment_id).css("display", "none");
                    $("#like_" + comment_id).show();
                }
                
            },
            error: function (data) {
                alert("error : " + JSON.stringify(data));
            }
        });
    }
   
    


</script>


    




                
        </div>
    </div>
  

    </section>


                        </div>

                    </div>

                </div>

            </div>


        </div>


        
    <?php include '../model/footer.php'?>

<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </span>
</div>



<?php
    include '../model/injectionScript.php';
?>


</body>
</html>









































