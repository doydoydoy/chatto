<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome, <span id="user"><?= $_SESSION['name']; ?></span><b></b></p>
        <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>
     
    <div id="chatbox">
        <?php require_once('handler.php'); ?>
    </div>
    <form name="message" action="POST">
        <input name="usermsg" type="text" id="usermsg" size="63" onkeypress="type()" />
        <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
    </form>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){

    //If user submit message
    $("#submitmsg").click(function(){   
        var clientmsg = $("#usermsg").val();
        $.post("post.php", {text: clientmsg});              
        $("#usermsg").attr("value", "");
        return false;
    });

    setInterval(loadLog, 1500);

    //Load the file containing the chat log
    function loadLog()
    {
        var oldscrollHeight = $('#chatbox').attr('scrollHeight') - 20;
        $.ajax(
        {
            url: "log.html",
            cache: false,
            success: function(html)
            {
                $('#chatbox').html(html); // Insert chat log into the #chatbox div

                //Auto-scroll
                var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
                if(newscrollHeight > oldscrollHeight)
                {
                    $('#chatbox').animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div   
                }
            }
        });
    }



    //If user wants to logout
    $('#exit').click(function()
    {
        var exit = confirm("Are you sure you want to end the session?");
        if(exit)
        {
            window.location = 'index.php?logout=true';
        }
    });


});
</script>