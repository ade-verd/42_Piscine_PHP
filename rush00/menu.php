<?php require_once("connect.php"); ?>
<html>
    <style>
        .lower-header
        {
			display: flex;
			align-items: center;
			width: 375px;
			border-radius:15px;
        	justify-content: space-between;
            background-color: #343434;
            background-image: linear-gradient(to right, #eb651e, #ed7915, #ee8d0c, #eda009, #ebb312);
            height:60px;
        }
        
        .selector {
        	display: flex;
        	align-items: center;
        	flex-flow: row;
        }
        
        .dropdown {
        	margin:0px 10px;
        	position: relative;
        	overflow:hidden;
        	height:28px;
        	width:300px;
        	background:#f2f2f2;
        	border:1px solid;
        	border-color:white #f9f9f9;
        	border-radius:5px;
        	box-shadow:0 1px 1px rgba(0,0,0,0.08)
        }
        
        .dropdown:before, .dropdown:after{
        	content: '';
        	position:absolute;
        	z-index:2;
        	top:9px;
        	right:10px;
        	border:4px dashed;
        	border-color: #888888 transparent;
        }
        
        .dropdown:before {border-top:none;}
        
        .dropdown:after{
        	margin-top:7px;
        	border-bottom:none;
        }
        
        .dropdown-select{
        	position:relative;
        	width:105%;
        	margin:0;
        	padding:6px 8px 6px 10px;
        	height:28px;
        	line-height:14px;
        	font-size:12px;
        	color:#62717a;
        	text-shadow: 0 1px white;
        	background: #f2f2f2;
        	border:0;
        }
        
        .dropdown-select:focus {outline:none;}
        
        .search_butt {
        	display: flex;
        	align-items: center;
        	flex-flow: column;
        }
        
        .search_butt input[type=button] {
        	background-color: #d0d0d0;
        	color:#343434;
        	border: none;
        	padding: 10px 10px;
        	font-size: 14px;
        	width:100%;
        	cursor: pointer;
        	border-radius: 2px;
        }
        
        .search_butt input[type=button]:hover {
        	background-color: #b0b0b0;
        	color:white;
        }
   </style>
<body>
	<div class="lower-header">
		<div class="selector">
			<form action="" method="post" class=selector>
				<div class="dropdown">
					<select name="category" class="dropdown-select" >
						<?php
						$query = 'SELECT category FROM category';
						$category = mysqli_query($handle, $query);
						while ($array = mysqli_fetch_assoc($category)) {
							if ($array['category'] == 'all')
								echo '<option selected="selected" value="'.$array['category'].'">'.$array['category'].'</option>';
							else
								echo '<option value="'.$array['category'].'">'.$array['category'].'</option>';
						}
						mysqli_free_result($category);
						?>
					</select>
				</div>
				<div class="search_butt">
					<input id="ok" type="submit" value="OK">
				</div>
			</form>
		</div>
		</div>
	</div>
</body>
</html>