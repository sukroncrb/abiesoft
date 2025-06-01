<?php

use Latte\Runtime as LR;

/** source: /home/sukroncrb2025/Sukron/abiesoft/source/Sistem/Http/../../../templates/admin/users/index.latte */
final class Template_5bcaf06c74 extends Latte\Runtime\Template
{
	public const Source = '/home/sukroncrb2025/Sukron/abiesoft/source/Sistem/Http/../../../templates/admin/users/index.latte';

	public const Blocks = [
		['title' => 'blockTitle', 'css' => 'blockCss', 'content' => 'blockContent', 'modal' => 'blockModal', 'menu' => 'blockMenu', 'js' => 'blockJs'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('title', get_defined_vars()) /* line 2 */;
		echo "\n";
		$this->renderBlock('css', get_defined_vars()) /* line 3 */;
		$this->renderBlock('content', get_defined_vars()) /* line 4 */;
		$this->renderBlock('modal', get_defined_vars()) /* line 39 */;
		$this->renderBlock('menu', get_defined_vars()) /* line 75 */;
		$this->renderBlock('js', get_defined_vars()) /* line 96 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['g' => '55'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
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
		echo '<div class="main-content">
    
    <div class="table-container mx-auto">
        <h2 class="table-title">Daftar User</h2>
        <table class="table">
            <thead>
                <tr>
                    <th class="column-name"><div class="text-center">Photo</div></th>
                    <th class="column-name">Nama</th>
                    <th class="column-name">Email</th>
                    <th class="column-name">Grup</th>
                    <th class="column-name"><div class="text-center">Opsi</div></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="text-center">
                            <div class="img-round mx-auto">
                                <img src="https://media.istockphoto.com/id/1398385367/photo/happy-millennial-business-woman-in-glasses-posing-with-hands-folded.jpg?s=612x612&w=0&k=20&c=Wd2vTDd6tJ5SeEY-aw0WL0bew8TAkyUGVvNQRj3oJFw=" alt="Photo profil">
                            </div>
                        </div>
                    </td>
                    <td>Sukron Abbayroad</td>
                    <td>email@email.com</td>
                    <td>Administrator</td>
                    <td><div class="text-center">-</div></td>
                </tr>
            </tbody>
        </table>
    </div>
    
</div>
';
	}


	/** {block modal} on line 39 */
	public function blockModal(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div id="userBaru" class="modal">
    <div class="modal-content">
        <form method="post" id="';
		echo LR\Filters::escapeHtmlAttr($formuserid) /* line 42 */;
		echo '" data-action="formUser">
            <div class="modal-header">
                <h2>Form User</h2>
                <span class="close-button">&times;</span>
            </div>
            <div class="modal-body">
                <label for="email">Nama:</label>
                <input type="text" id="nama" name="nama" data-label="Nama" placeholder="Nama">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" data-label="Email" placeholder="Email">
                <label for="email">Grup:</label>
                <select id="grupid" name="grupid" data-label="Grup user">
                    <option value="">Pilih grup user</option>
';
		foreach ($grup as $g) /* line 55 */ {
			echo '                        <option value="';
			echo LR\Filters::escapeHtmlAttr($g->id) /* line 56 */;
			echo '">';
			echo LR\Filters::escapeHtmlText($g->nama) /* line 56 */;
			echo '</option>
';

		}

		echo '                </select>
                <label for="jeniskelamin">Jenis Kelamin:</label>
                <select id="jeniskelamin" name="jeniskelamin" data-label="Grup user">
                    <option value="">Pilih jenis kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="csrf" name="csrf" value="';
		echo LR\Filters::escapeHtmlAttr($csrfuser) /* line 67 */;
		echo '">
                <button type="button" class="modal-button cancel-button">Batal</button>
                <button class="modal-button primary-button">Simpan</button>
            </div>
        </form>
    </div>
</div>
';
	}


	/** {block menu} on line 75 */
	public function blockMenu(array $ʟ_args): void
	{
		echo '<div class="float-bottom-menu">
    <card class="card">
        <div class="card-body">
            <div class="flex-between pa-10">
                <div class="input-wrapper">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>
                    <input id="keyword" name="keyword" class="form-input" placeholder="Cari user.." required>
                </div>
                <button class="button button-primary icon-only refresh flex-between" data-button="refresh">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-refresh"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path></svg>
                </button>
                <button class="button button-primary flex-between" data-modal="userBaru">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                    <span>Baru</span>
                </button>
            </div>
        </div>
    </div>
</div>
';
	}


	/** {block js} on line 96 */
	public function blockJs(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($baseurl)) /* line 97 */;
		echo '/assets/admin/js/form.js"></script>
<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($baseurl)) /* line 98 */;
		echo '/assets/admin/js/tabel.js"></script>
<script>
async function formUser() {
    let t = document.querySelector("[data-action=\'formUser\']");
    const result = __buildActionForm({
        form: t,
        field: [
            \'nama|setText\',
            \'email|setEmail\',
            \'grupid|setPilihan\',
            \'jeniskelamin|setPilihan\'
        ],
        endpoint: \'users\',
        // Jika ingin outputnya berupa text maka tambahkan output: \'text\'
    });

    if(typeof result == \'object\') {
        result.then(res => {
            if(res.code == 200){
                Toast({
                    tipe: \'success\',
                    pesan: \'User \'+res.data.nama+\' telah dibuat\'
                });
            }else{
                Toast({
                    tipe: \'error\',
                    pesan: res.data
                });
            }
        });
    }
}
</script>
';
	}
}
