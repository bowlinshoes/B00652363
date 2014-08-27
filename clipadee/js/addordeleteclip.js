$(document).ready(function()
{
	//allow enter key to trigger save in title field
	$("#newclip").keypress(function(event)
	{
	    if(event.keyCode == 13)
	    {
	    	event.preventDefault();
	    	ajax("save");
	    }
	});

	//allow enter key to trigger in url field
	$("#newclipurl").keypress(function(event)
	{
	    if(event.keyCode == 13)
	    {
	    	event.preventDefault();
	    	ajax("save");
	    }
	});

	$("#save_clip").click(function()
	{
		ajax("save");
	});

	$("#add_clip").click(function()
	{
		$(".clip_form").fadeIn("fast");	
	});
	
	$("#close_clip").click(function()
	{
		$(".clip_form").fadeOut("fast");	
	});
	
	$("#cancel_clip").click(function()
	{
		$(".clip_form").fadeOut("fast");	
	});
	
	$(".del_clip").live("click",function()
	{
		if(confirm("Do you really want to delete this clip?"))
		{
			ajax("delete",$(this).attr("id"));
			location.reload();
		}
	});

	function ajax(action,id)
	{
		if(action =="save")
		{//delete this if breaks
			data = $("#clip_info").serialize()+"&action="+action;
		}//delete this if breaks
		else if(action == "delete")
			{
				data = "action="+action+"&item_id="+id;
			}

		$.ajax(
		{
			type: "POST", 
			url: "php/addordeleteclip.php", 
			data : data,
			dataType: "json",
			success: function(response)
			{
				if(response.success == "1")
				{
					if(action == "save")
					{
						$(".clip_form").fadeOut("fast",function(){
							$(".table-list").append("<tr><td>"+response.fname+"</td><td>"+response.lname+"</td><td>"+response.email+"</td><td>"+response.phone+"</td><td><a href='#' id='"+response.row_id+"' class='del'>Delete</a></a></td></tr>");	
							$(".table-list tr:last").effect("highlight", {
								color: '#4BADF5'
							}, 1000);
						});	
						$(".clip_form input[type='text']").each(function(){
							$(this).val("");
							location.reload();
						});		
					}else if(action == "delete")
						{
							var row_id = response.item_id;
							$("a[id='"+row_id+"']").closest("tr").effect("highlight", 
							{
								color: '#4BADF5'
							}, 1000);
						
							$("a[id='"+row_id+"']").closest("tr").fadeOut();
						}
				}else
					{
						alert("unexpected error occured, Please check your database connection");
					}
			},

		});
	}
});