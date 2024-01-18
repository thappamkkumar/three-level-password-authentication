<?php

session_start();
require("Database/db_connection.php");
?>
<html>
	<head>
		<title>Home </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style/sort-list.css"/>
		 
		<link href="style/puzzzle.css" rel="stylesheet" type="text/css" />
		<script src="js/sort_list.js"></script>
	</head>
	<body>
		<div class="p_main_container">
			<div class="p_container">
				<ul id="sortlist">
					<?php
						$get_image="SELECT * FROM `login_info` WHERE Email='aaadssas@sdf.jj' ";
						$get_image_result=mysqli_query($con,$get_image); 
						$get_image_row = mysqli_fetch_array($get_image_result,MYSQLI_ASSOC);
						 
						$image_url2="Image_Code/".$get_image_row["Image_Code"];
						$arr=array("image1", "image2", "image3", "image4", "image5", "image6", "image7", "image8", "image9", "image10", "image11", "image12", "image13", "image14", "image15", "image16");
						
						
						$arr_lenght=count($arr);
						$percentage = 100 / (4 - 1);
						for($i=0; $i<$arr_lenght; $i++)
						{
							$xpos = ($percentage * ($i % 4));
							$ypos = ($percentage * floor($i / 4));
							 
							echo'<li  id="'.$arr[$i].'" style="margin: 0;
																				  padding: 0px;
																				  border: 0;
																				  background: #f5f5f5;
																				  display:inline-block;
																				  width:100px;
																				  height:100px;
																				  float: left;
																				  background-image:url('.$image_url2.');
																				background-size:400% 400%;
																				background-position:'.$xpos.'% '.$ypos.'%;	"																			
										></li>';
							
						}
						
					?>
					
				</ul>
				<?php
						
						echo'
								<script>
								
						
						 </script>
						 ';
				?>
			</div>
			<img src="<?php echo$image_url2; ?>" style="width:400px;height:400px; margin-left:20px;">
			<button type="button" onclick="dddd()">click</button>
		</div>
		<script>
			window.addEventListener("DOMContentLoaded", () => {
				  slist(document.getElementById("sortlist"));
				});
			
				 
				 
			var list = document.getElementById("sortlist");
			
			function shuffle(items)
			{
				var cached = items.slice(0), temp, i = cached.length, rand;
				while(--i)
				{
					rand = Math.floor(i * Math.random());
					temp = cached[rand];
					cached[rand] = cached[i];
					cached[i] = temp;
				}
				return cached;
			}
			function shuffleNodes()
			{
				var nodes = list.children, i = 0;
				nodes = Array.prototype.slice.call(nodes);
				nodes = shuffle(nodes);
				while(i < nodes.length)
				{
					list.appendChild(nodes[i]);
					++i;
				}
			}
			shuffleNodes();
			
			function dddd()
			{
			 
				const vv=document.getElementById("sortlist").children;
				var count=0;
			
				var ff=vv[0].id;
				if(ff=="image1")
				{
					count=count+1;
				}
				var ff=vv[1].id;
				if(ff=="image2")
				{
					count=count+1;
				}
				var ff=vv[2].id;
				if(ff=="image3")
				{
					count=count+1;
				}
				var ff=vv[3].id;
				if(ff=="image4")
				{
					count=count+1;
				}
				var ff=vv[4].id;
				if(ff=="image5")
				{
					count=count+1;
				}
				var ff=vv[5].id;
				if(ff=="image6")
				{
					count=count+1;
				}
				var ff=vv[6].id;
				if(ff=="image7")
				{
					count=count+1;
				}
				var ff=vv[7].id;
				if(ff=="image8")
				{
					count=count+1;
				}
				var ff=vv[8].id;
				if(ff=="image9")
				{
					count=count+1;
				}
				var ff=vv[9].id;
				if(ff=="image10")
				{
					count=count+1;
				}
				var ff=vv[10].id;
				if(ff=="image11")
				{
					count=count+1;
				}
				var ff=vv[11].id;
				if(ff=="image12")
				{
					count=count+1;
				}
				var ff=vv[12].id;
				if(ff=="image13")
				{
					count=count+1;
				}
				var ff=vv[13].id;
				if(ff=="image14")
				{
					count=count+1;
				}
				var ff=vv[14].id;
				if(ff=="image15")
				{
					count=count+1;
				}
				var ff=vv[15].id;
				if(ff=="image16")
				{
					count=count+1;
				}
				 
		
				if(count==16)
				{
					alert(ff);
				}
				else
				{
					alert("not corect");
				}
			}
		</script>
	</body>
</html>