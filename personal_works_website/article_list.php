<?php
//載入 db.php 檔案，讓我們可以透過它連接資料庫
require_once 'php/db.php';

//載入 functions.php 檔案，透過裡面的方法取得資料庫的資料
require_once 'php/functions.php';

$datas = get_publish_article();
?>
<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<title>All Works</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<!-- 給行動裝置或平板顯示用，根據裝置寬度而定，初始放大比例 1 -->	
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 載入 bootstrap 的 css 方便我們快速設計網站-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="shortcut icon" href="images/icon.png">
	</head>

	<body>
		<!-- 頁首 -->
		
		<div class="jumbotron">
			<div class="container">
				<!-- 建立第一個 row 空間，裡面準備放格線系統 -->
				<div class="row">
					<!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
					<div class="col-xs-12">
						<!--網站標題-->
						<h1 class="text-center">My Art World</h1>
						
						<!-- 選單 -->
						<ul class="nav nav-pills">
							<li role="presentation"><a href="index.php">Menu</a></li>
							<li role="presentation" class="active"><a href="article_list.php">All Works</a></li>
							<li role="presentation"><a href="work_list.php">Details about Works</a></li>
							<li role="presentation"><a href="about.php">About us</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- 網站內容 -->
		<div class="content">
			<div class="container">
				<!-- 建立第一個 row 空間，裡面準備放格線系統 -->
				<div class="row">
					<!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
					<div class="col-xs-12">
						<?php if(!empty($datas)):?>
							<?php foreach($datas as $row):?>
							<?php 
								$showimage=$row['path'];
								//處理 摘要
								//去除所有html標籤
								//$abstract = strip_tags($row['content']);
								//取得100個字
								//$abstract = mb_substr($abstract, 0, 100, "UTF-8") 
							?>
							<!-- 使用 bootstrap 的 panel 來呈現 http://getbootstrap.com/components/#panels-->
							
						        <div class="panel-heading">
						            <h3 class="panel-title">
										<img src="<?php echo $row['path']; ?>" width='200' height='200' />
						            </h3>
						        </div>
						        <div class="panel-body">
						        	<p>
						        		<span class="label label-info"><?php echo $row['work_id']; ?></span>&nbsp;
						        		
						        	</p>
						            
						        </div>
						    
						    <?php endforeach; ?>
						<?php else: ?>
							<h3 class="text-center">尚無文章</h3>
					    <?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		
		<!-- 頁底 -->
		<div class="footer">
			<div class="container">
				<!-- 建立第一個 row 空間，裡面準備放格線系統 -->
				<div class="row">
					<!-- 在 xs 尺寸，佔12格，可參考 http://getbootstrap.com/css/#grid 說明-->
					<div class="col-xs-12">
						<p class="text-center">
							&copy; <?php echo date("Y")?>
						</p>
					</div>
				</div>
			</div>
			
		</div>
	</body>
</html>
