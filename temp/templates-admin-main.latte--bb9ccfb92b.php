<?php

use Latte\Runtime as LR;

/** source: /home/sukroncrb2025/Sukron/abiesoft/templates/admin/main.latte */
final class Template_bb9ccfb92b extends Latte\Runtime\Template
{
	public const Source = '/home/sukroncrb2025/Sukron/abiesoft/templates/admin/main.latte';

	public const Blocks = [
		['css' => 'blockCss', 'title' => 'blockTitle', 'content' => 'blockContent', 'js' => 'blockJs'],
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

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($baseurl)) /* line 20 */;
		echo 'assets/admin/css/style.css" />
';
		$this->renderBlock('css', get_defined_vars()) /* line 21 */;
		echo '    <title>';
		$this->renderBlock('title', get_defined_vars()) /* line 22 */;
		echo '</title>

</head>

<body>

    <!-- End Google Tag Manager (noscript) -->
    <div itemprop="blog Post" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
        <div itemprop="image" itemscope="itemscope" itemtype="http://schema.org/ImageObject">
            <meta content="';
		echo LR\Filters::escapeHtmlAttr($app['cover']) /* line 31 */;
		echo '" itemprop="';
		echo LR\Filters::escapeHtmlAttr($app['url']) /* line 31 */;
		echo '"/>
        </div>
    </div>

';
		$this->createTemplate('./components/header.latte', $this->params, 'include')->renderToContentType('html') /* line 35 */;
		echo "\n";
		$this->renderBlock('content', get_defined_vars()) /* line 37 */;
		echo '
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($baseurl)) /* line 39 */;
		echo 'assets/admin/js/style.js"></script>
';
		$this->renderBlock('js', get_defined_vars()) /* line 40 */;
		echo '
</body>

</html>';
	}


	/** {block css} on line 21 */
	public function blockCss(array $ʟ_args): void
	{
	}


	/** {block title} on line 22 */
	public function blockTitle(array $ʟ_args): void
	{
	}


	/** {block content} on line 37 */
	public function blockContent(array $ʟ_args): void
	{
	}


	/** {block js} on line 40 */
	public function blockJs(array $ʟ_args): void
	{
	}
}
