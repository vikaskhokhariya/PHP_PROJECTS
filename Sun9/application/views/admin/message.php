<script type="text/javascript">
	function load_message_data()
    {
    	$.ajax({
    		url : "<?php echo site_url("Controller/load_message_data"); ?>",
    		method : "POST",
    		success : function(response)
    		{
    			//console.log(response);
    			$('#messagesdiv').html(response);
                $('#messagesdiv').append('<a href="javascript:load_viewall_messages();" class="dropdown-item notify-item">View All</a>');
    		}
    	});
    }

    function load_notification_data()
    {
        $.ajax({
            url : "<?php echo site_url("Controller/load_notification_data"); ?>",
            method : "POST",
            success : function(response)
            {
                //console.log(response);
                $('#notificationdiv').html(response);
                $('#notificationdiv').append('<a href="javascript:load_viewall_notifications()" class="dropdown-item notify-item">View All</a>');
            }
        });
    }

    function openmessage()
    {
        msg_change_false();
        $('#messageclick').toggleClass('openornot');
    }

    function opennotification()
    {
        noti_msg_change_false();
        $('#notificationclick').toggleClass('openornot');
    }

    function msg_change_false()
    {
    	$.ajax({
    		url : "<?php echo site_url("Controller/msg_change_false"); ?>",
    		method : "POST",
    		success : function(response)
    		{
    			//console.log(response);
    		}
    	});
    }

    function noti_msg_change_false()
    {
        $.ajax({
            url : "<?php echo site_url("Controller/noti_msg_change_false"); ?>",
            method : "POST",
            success : function(response)
            {
                //console.log(response);
            }
        });
    }

    function msg_count()
    {
    	$.ajax({
    		url : "<?php echo site_url("Controller/msg_count_true"); ?>",
    		method : "POST",
    		success : function(response)
    		{
    			//console.log(response);
    			if(response!=0)
    			{
    				$('#messagecount').html(response);
    			}
    			else
    			{
    				$('#messagecount').html('');
    			}
    		}
    	});
    }

    function noti_msg_count()
    {
        $.ajax({
            url : "<?php echo site_url("Controller/noti_msg_count_true"); ?>",
            method : "POST",
            success : function(response)
            {
                //console.log(response);
                if(response!=0)
                {
                    $('#notificationcount').html(response);
                }
                else
                {
                    $('#notificationcount').html('');
                }
            }
        });
    }

    function load_viewall_messages()
    {
        window.location.href="load_allmessages";
    }

    function load_viewall_notifications()
    {
        window.location.href="load_allnotifications";
    }

    function openindividualnotification(id)
    {
        $.ajax({
            url : "<?php echo site_url("Controller/change_noti_status_zero/");?>"+id,
            method : "POST",
            dataType : "JSON",
            success : function(response)
            {
                
            }
        });
    }

    function openreplymodal(id)
    {
        $.ajax({
            url : "<?php echo site_url("Controller/user_message_details/");?>"+id,
            method : "POST",
            dataType : "JSON",
            success : function(response)
            {
                //console.log(response);
                $('#nm').val(response[0].name);
                $('#notiemail').val(response[0].email);
                $('#mobile').val(response[0].mobile);
                $('#message').val(response[0].message);
                $('#messagedate').val(response[0].date);
                $('#mymessagemodal').modal();
            }
        });
    }

    function cancelreplymodal()
    {
        $('#mymessagemodal').modal('hide');
    }  
</script>