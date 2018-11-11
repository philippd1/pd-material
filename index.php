<!doctype html>
<html>
<head>
	<meta name="google" content="notranslate" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.deep_purple-pink.min.css">
	<?php
	echo Theme::metaTags('title');
	echo Theme::metaTags('description');
	echo Theme::css(array(
		'styles.css'
	));
	Theme::plugins('siteHead');
	?>
</head>
<body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
	<?php Theme::plugins('siteBodyBegin'); ?>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
		<header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
			<div class="mdl-layout--large-screen-only mdl-layout__header-row"></div>
			<div class="mdl-layout__header-row"><h3><?php echo $site->title(); ?></h3></div>
			<div class="mdl-layout--large-screen-only mdl-layout__header-row"></div>
		</header>
		<main class="mdl-layout__content">
			<div class="mdl-layout__tab-panel is-active">
				<div class="posts">
					<?php foreach ($content as $page): ?>
						<section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
							<div class="mdl-card mdl-cell mdl-cell--12-col-desktop">
								<div class="mdl-card__supporting-text">
									<h4><?php echo $page->title() ?></h4>
									<hr>
									<?php echo $page->content() ?>
								</div>
							</div>
						</section>
					<?php endforeach ?>
				</div>
			</div>
			<footer class="mdl-mega-footer">
				<div class="mdl-mega-footer--bottom-section">
					<ul class="mdl-mega-footer--link-list">
						<li>Copyright © 2018</li>
					</ul>
				</div>
				<hr>
				<div class="mdl-mega-footer--bottom-section">
					<ul class="mdl-mega-footer--link-list">
						<?php
						$socialNetworks = array(
							'github'=>'Github',
							'twitter'=>'Twitter',
							'facebook'=>'Facebook',
							'googleplus'=>'Google Plus',
							'instagram'=>'Instagram',
							'codepen'=>'Codepen',
							'linkedin'=>'Linkedin'
						);
						?>
						<?php foreach ($socialNetworks as $key=>$label): ?>
							<?php if ($site->{$key}()): ?>
								<li><a rel="noopener noreferrer" target="_blank" href="<?php echo $site->{$key}(); ?>" class="icon fa-<?php echo $key; ?>"><span class="label"><?php echo $label; ?></span></a></li>
							<?php endif; ?>
						<?php endforeach; ?>
						<?php
						if (pluginActivated('pluginRSS')) {
							echo '<li><a href="'.$site->rss().'RSS</a></li>';
						}
						if (pluginActivated('pluginSitemap')) {
							echo '<li><a href="'.$site->sitemap().'">Sitemap</a></li>';
						}
						?>
					</ul>
				</div>
			</footer>
		</main>
	</div>
	<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<?php Theme::plugins('siteBodyEnd'); ?>
</body>
</html>