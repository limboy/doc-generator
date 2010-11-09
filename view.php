<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<link rel="stylesheet/less" href="media/style/main.less" type="text/css" />
		<link rel="stylesheet" href="media/scripts/prettify/prettify.css" type="text/css" />
		<script src="media/scripts/jquery-1.4.3.min.js"></script>
		<script src="media/scripts/less-1.0.35.min.js"></script>
		<script src="media/scripts/prettify/prettify.js"></script>
		<script src="media/scripts/main.js"></script>
		<title><?php echo empty($title) ? $projectName : $title; ?></title>
	</head>

	<body>
		<div id="header">
			<div class="logo"><a href="<?php echo substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], '?'));?>"><?php echo $projectName; ?></a></div>
		</div>

		<div id="doc" class="clear">
			<ul class="sidebar">
				<?php foreach($titleAndHeads as $filename => $item): $level = explode('-', $filename, 2); $level = $level[0]; ?>
				<li level="<?php echo $level; ?>" class="title"><a href="<?php echo '?file='.$filename; ?>"><?php echo $item['title']; ?></a>
					<div class="container hide">
						<ul>
							<?php foreach($item['heads'] as $i => $head): ++$i;?>
							<li class="child"><a header="header-<?php echo $i;?>" href="<?php echo '?file='.$filename.'#header-'.$i; ?>"><?php echo $head; ?></a></li>
							<?php endforeach;?>
						</ul>
					</div>
				</li>
				<?php endforeach;?>
			</ul>

			<div class="main">
				<?php echo empty($content) ? '' : $content; ?>
			</div>
		</div>
		
		<div id="footer">
			<p class="zen">CODE IS POETRY</p>
		</div>
	</body>
</html>


