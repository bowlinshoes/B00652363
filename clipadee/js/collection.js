$(document).ready(function()
{
	$("#save").click(function()
	{
		ajax("save");
	});

	$("#add_new").click(function()
	{
		$(".collection-form").fadeIn("fast");	
	});
	
	$("#close").click(function()
	{
		$(".collection-form").fadeOut("fast");	
	});
	
	$("#cancel").click(function()
	{
		$(".collection-form").fadeOut("fast");	
	});
	
	$(".del").live("click",function()
	{
		if(confirm("Do you really want to delete this record ?"))
		{
			ajax("delete",$(this).attr("id"));
		}
	});

	function ajax(action,id)
	{
		if(action =="save")
		{//delete this if breaks
			data = $("#userinfo").serialize()+"&action="+action;
		}//delete this if breaks
		else if(action == "delete")
			{
				data = "action="+action+"&item_id="+id;
			}

		$.ajax(
		{
			type: "POST", 
			url: "collection.php", 
			data : data,
			dataType: "json",
			success: function(response)
			{
				if(response.success == "1")
				{
					if(action == "save")
					{
						$(".collection-form").fadeOut("fast",function(){
							$(".table-list").append("<tr><td>"+response.fname+"</td><td>"+response.lname+"</td><td>"+response.email+"</td><td>"+response.phone+"</td><td><a href='#' id='"+response.row_id+"' class='del'>Delete</a></a></td></tr>");	
							$(".table-list tr:last").effect("highlight", {
								color: '#4BADF5'
							}, 1000);
						});	
						$(".collection-form input[type='text']").each(function(){
							$(this).val("");
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
			
				error: function(res)
				{
					alert("Unexpected error! Try again.");
				}
		});
	}
});
