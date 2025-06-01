<?php

use Latte\Runtime as LR;

/** source: /home/sukroncrb2025/Sukron/abiesoft/source/Sistem/Http/../../../templates/test/home/index.latte */
final class Template_5acc867712 extends Latte\Runtime\Template
{
	public const Source = '/home/sukroncrb2025/Sukron/abiesoft/source/Sistem/Http/../../../templates/test/home/index.latte';

	public const Blocks = [
		['title' => 'blockTitle', 'css' => 'blockCss', 'content' => 'blockContent', 'js' => 'blockJs'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('title', get_defined_vars()) /* line 2 */;
		echo "\n";
		$this->renderBlock('css', get_defined_vars()) /* line 3 */;
		$this->renderBlock('content', get_defined_vars()) /* line 4 */;
		$this->renderBlock('js', get_defined_vars()) /* line 20 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		$this->parentName = '../main.latte';
		return get_defined_vars();
	}


	/** {block title} on line 2 */
	public function blockTitle(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo LR\Filters::escapeHtmlText($title) /* line 2 */;
	}


	/** {block css} on line 3 */
	public function blockCss(array $ʟ_args): void
	{
	}


	/** {block content} on line 4 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<section>
    <form id="';
		echo LR\Filters::escapeHtmlAttr($formid) /* line 6 */;
		echo '">
        <div>
            <label for="nama">Nama</label>
            <input id="nama" name="nama">
        </div>
        <div>
            <label for="email">Email</label>
            <input id="email" name="email">
        </div>
        <input type="hidden" id="csrf" name="csrf" value="';
		echo LR\Filters::escapeHtmlAttr($csrf) /* line 15 */;
		echo '">
        <button type="submit">Submit</button>
    </form>
</section>
';
	}


	/** {block js} on line 20 */
	public function blockJs(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<script>
const formulir = document.querySelector(\'form\'); // Ini sudah mereferensikan elemen FORM

formulir.addEventListener(\'submit\', async (e) => {
    e.preventDefault();
    
    const token = document.querySelector(\'[data-token]\').dataset.token;
    
    const formData = new FormData(formulir);
    formData.append("formid", formulir.id);

    try {
        const response = await fetch(\'http://127.0.0.1:8154/api/test\', {
            method: \'POST\',
            headers: {
                \'Authorization\': `Bearer ${token}`,
            },
            body: formData
        });

        if (!response.ok) {
            const errorText = await response.text();
            throw new Error(`HTTP error! status: ${response.status}, message: ${errorText}`);
        }

        const result = await response.json();
        console.log(result);

    } catch (error) {
        console.error(\'Ada masalah dengan operasi fetch:\', error);
    }
});
</script>
';
	}
}
