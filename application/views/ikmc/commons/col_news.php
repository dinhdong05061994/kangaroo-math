<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">
<!-- <script src="scripts/jquery.bootstrap.newsbox.min.js" type="text/javascript"></script> -->
<style type="text/css">
	.glyphicon {
margin-right: 4px !important; /*override*/
}
.pagination .glyphicon {
margin-right: 0px !important; /*override*/
}
.pagination a {
color: #555;
}
.panel ul {
padding: 0px;
margin: 0px;
list-style: none;
}
.news-item {
padding: 4px 4px;
margin: 0px;
border-bottom: 1px dotted #555;
}
</style>



<div class="panel panel-default col-sm-3" style="/*position: absolute;*/margin-top: -150px; overflow-y: auto; max-height: 400px;margin-left: 15px;
 " id = "content_news">
<div class="panel-heading"> <span class="glyphicon glyphicon-list-alt" ></span><b style="font-size: 16pt;">Tin tức</b></div>
<div class="panel-body">
<div class="row">
<div class="col-xs-12">
<ul class="demo">
	<?php
		if(count($news) > 0){
			foreach ($news as  $value) {?>
	<li class="news-item">
	<table cellpadding="4">
	<tr>
	<td style="width:60px;">
		<img src= '<?php echo base_url()."/img/news/".$value['avartar'];?>' class="img-circle" alt = 'Avartar image' width = '50px' height = '50px' />
	</td>

	<td><?php echo "<b>".$value['title']."</b><br/>".$value['content_short']."... ";?><a href="<?php echo base_url();?>summer/show_news/<?php echo $value['id'];?>">Xem thêm...</a>
	
	</td>
	</tr>
	</table>
	</li>
	<?php } 
		}else{
			echo "<i>Tin tức đang cập nhật</i>";
		}
	?>

</ul>
</div>
</div>
</div>
<div class="panel-footer"> </div>
</div>