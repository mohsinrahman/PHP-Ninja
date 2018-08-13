<section class="col-md-12 col-sm-6 col-xs-4">
<h5 class="latestPostText white">Latest posts</h5>
	<div class="latestPost">
		<?php
		include "error.php";
		include "database.php";

		$showPost = new Post($pdo);
		$lPosts = $showPost->latestPost();
		
		foreach ($lPosts as $row) {
			$title = $row['title'];
			$img = $row['img'];
			$blogText = $row['blogText'];
			$nrOfLikes = $row['nrOfLikes'];
			$postDate = $row['postDate'];
			$username = $row['username'];
			?>
			<div class='col-md-4 col-sm-4 col-xs-4'>
				<div class='card lPost'>
					<!-- <img class='card-img-top pt-15 img-responsive' src='<?= $img  ?>' alt='Card image cap'> -->
					<?php
					if (!empty($row['img'])) {
						?>
						<img class='card-img-top pt-15 img-responsive' src='<?= $img  ?>' alt='Card image cap'>
						<?php	
					}
					else {
						$default = "./img/default.jpg"
						?>
						<img class='card-img-top pt-15 img-responsive' src='<?= $default ?>' alt='Card image cap'>
						<?php
					}
					
					?>


					<div class='card-block'>
						<h4 class='card-title'><?= $title ?></h4>
						<p class='card-text'>
							<?= $blogText ?>
						</p>
						<p>
							Posted by: <?= $username?> <?=$postDate ?>
						</p>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</section>
