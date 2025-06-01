<?php

use Latte\Runtime as LR;

/** source: /home/sukroncrb2025/Sukron/abiesoft/templates/admin/main.latte */
final class Template_5fb185da08 extends Latte\Runtime\Template
{
	public const Source = '/home/sukroncrb2025/Sukron/abiesoft/templates/admin/main.latte';

	public const Blocks = [
		['css' => 'blockCss', 'title' => 'blockTitle', 'content' => 'blockContent', 'modal' => 'blockModal', 'menu' => 'blockMenu', 'js' => 'blockJs'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:url" content="';
		echo LR\Filters::escapeHtmlAttr($app['url']) /* line 8 */;
		echo '"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="';
		echo LR\Filters::escapeHtmlAttr($app['title']) /* line 10 */;
		echo '"/>
    <meta property="og:description" content="';
		echo LR\Filters::escapeHtmlAttr($app['description']) /* line 11 */;
		echo '"/>
    <meta property="og:image" content="';
		echo LR\Filters::escapeHtmlAttr($app['cover']) /* line 12 */;
		echo '"/>
    <meta name="description" content="';
		echo LR\Filters::escapeHtmlAttr($app['description']) /* line 13 */;
		echo '">

    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow" />
    <meta name="googlebot-news" content="index, follow" />

    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($baseurl)) /* line 19 */;
		echo '/assets/admin/css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
';
		$this->renderBlock('css', get_defined_vars()) /* line 22 */;
		echo '    <title>';
		$this->renderBlock('title', get_defined_vars()) /* line 23 */;
		echo '</title>

</head>

<body>

    <!-- End Google Tag Manager (noscript) -->
    <div itemprop="blog Post" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
        <div itemprop="image" itemscope="itemscope" itemtype="http://schema.org/ImageObject">
            <meta content="';
		echo LR\Filters::escapeHtmlAttr($app['cover']) /* line 32 */;
		echo '" itemprop="';
		echo LR\Filters::escapeHtmlAttr($app['url']) /* line 32 */;
		echo '"/>
        </div>
    </div>


';
		$this->createTemplate('./components/navbar.latte', $this->params, 'include')->renderToContentType('html') /* line 37 */;
		echo '
    <div class="container">
';
		$this->createTemplate('./components/sidebar.latte', $this->params, 'include')->renderToContentType('html') /* line 40 */;
		$this->renderBlock('content', get_defined_vars()) /* line 41 */;
		echo '    </div>

';
		$this->renderBlock('modal', get_defined_vars()) /* line 44 */;
		echo '    <div class="message-container"></div>
';
		$this->renderBlock('menu', get_defined_vars()) /* line 46 */;
		echo '    <div data-url="';
		echo LR\Filters::escapeHtmlAttr($baseurl) /* line 47 */;
		echo '" data-token="';
		echo LR\Filters::escapeHtmlAttr($app['bearer']) /* line 47 */;
		echo '"></div>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($baseurl)) /* line 48 */;
		echo '/assets/admin/js/style.js"></script>
';
		$this->renderBlock('js', get_defined_vars()) /* line 49 */;
		echo '
</body>

</html>';
	}


	/** {block css} on line 22 */
	public function blockCss(array $ʟ_args): void
	{
	}


	/** {block title} on line 23 */
	public function blockTitle(array $ʟ_args): void
	{
	}


	/** {block content} on line 41 */
	public function blockContent(array $ʟ_args): void
	{
	}


	/** {block modal} on line 44 */
	public function blockModal(array $ʟ_args): void
	{
	}


	/** {block menu} on line 46 */
	public function blockMenu(array $ʟ_args): void
	{
	}


	/** {block js} on line 49 */
	public function blockJs(array $ʟ_args): void
	{
	}
}
