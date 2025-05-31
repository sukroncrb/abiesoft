<?php

use Latte\Runtime as LR;

/** source: /home/sukroncrb2025/Sukron/abiesoft/source/Sistem/Http/../../../templates/admin/pengaturan/index.latte */
final class Template_e6b1a6b223 extends Latte\Runtime\Template
{
	public const Source = '/home/sukroncrb2025/Sukron/abiesoft/source/Sistem/Http/../../../templates/admin/pengaturan/index.latte';

	public const Blocks = [
		['title' => 'blockTitle', 'css' => 'blockCss', 'content' => 'blockContent', 'modal' => 'blockModal', 'js' => 'blockJs'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('title', get_defined_vars()) /* line 2 */;
		echo "\n";
		$this->renderBlock('css', get_defined_vars()) /* line 3 */;
		$this->renderBlock('content', get_defined_vars()) /* line 4 */;
		$this->renderBlock('modal', get_defined_vars()) /* line 90 */;
		$this->renderBlock('js', get_defined_vars()) /* line 133 */;
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
		echo '<div class="main-content">
    <div class="settings-page-wrapper">

        <aside class="settings-sidebar card no-hover">
            <h2>Pengaturan</h2>
            <nav class="settings-nav">
                <a href="#pengaturan-akun" class="nav-item" data-section="akun">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path></svg> Informasi Akun
                </a>
                <a href="#pengaturan-notifikasi" class="nav-item" data-section="notifikasi">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-bell"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path><path d="M9 17v1a3 3 0 0 0 6 0v-1"></path></svg> Notifikasi
                </a>
            </nav>
        </aside>

        <main class="settings-content">

            <section id="pengaturan-akun" class="settings-section">
                <h3 class="section-title">Informasi Akun</h3>
                <div class="setting-card card no-hover">
                    <div class="setting-item">
                        <div class="setting-info">
                            <h4>ID user</h4>
                            <p>ID ini digenerate secara otomatis saat anda mendaftar.</p>
                        </div>
                        <div class="setting-control">
                            <p class="plain-text">USER-12345</p>
                        </div>
                    </div>
                    <div class="setting-item">
                        <div class="setting-info">
                            <h4>Email</h4>
                            <p>Email ini terhubung ke akun anda.</p>
                        </div>
                        <div class="setting-control">
                            <p class="plain-text">user@example.com</p>
                            <button class="material-button secondary small" data-modal="modalEmail">Ganti</button>
                        </div>
                    </div>
                    <div class="setting-item">
                        <div class="setting-info">
                            <h4>Password</h4>
                            <p>Terakhir diubah 1 hari lalu</p>
                        </div>
                        <div class="setting-control">
                            <button class="material-button secondary small" data-modal="modalPassword">Ganti password</button>
                        </div>
                    </div>
                </div>
            </section>

            <section id="pengaturan-notifikasi" class="settings-section">
                <h3 class="section-title">Notifikasi</h3>
                <div class="setting-card card no-hover">
                    <div class="setting-item">
                        <div class="setting-info">
                            <h4>Tugas</h4>
                            <p>Menerima pembaruan tugas secara realtime.</p>
                        </div>
                        <div class="setting-control">
                            <label class="forms-style-switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="setting-item">
                        <div class="setting-info">
                            <h4>Suara Notifikasi</h4>
                            <p>Pilih suara notifikasi yang anda suka</p>
                        </div>
                        <div class="setting-control">
                            <select class="forms-style-select">
                                <option value="popcorn" selected>Popcorn</option>
                            </select>
                        </div>
                    </div>
                </div>
            </section>

        </main>
        
    </div>
</div>
';
	}


	/** {block modal} on line 90 */
	public function blockModal(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div id="modalEmail" class="modal">
    <div class="modal-content">
        <form method="post" id="';
		echo LR\Filters::escapeHtmlAttr($formemailid) /* line 93 */;
		echo '" data-action="formEmail">
            <div class="modal-header">
                <h2>Ganti Email</h2>
                <span class="close-button">&times;</span>
            </div>
            <div class="modal-body">
                <label for="email">Email baru:</label>
                <input type="text" id="email" name="email" placeholder="Email baru anda">
            </div>
            <div class="modal-footer">
                <input type="hidden" id="csrf" name="csrf" value="';
		echo LR\Filters::escapeHtmlAttr($csrfemail) /* line 103 */;
		echo '">
                <button type="button" class="modal-button cancel-button">Batal</button>
                <button class="modal-button primary-button">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<div id="modalPassword" class="modal">
    <div class="modal-content">
        <form method="post" id="';
		echo LR\Filters::escapeHtmlAttr($formpasswordid) /* line 113 */;
		echo '" data-action="formPassword">
            <div class="modal-header">
                <h2>Ganti Password</h2>
                <span class="close-button">&times;</span>
            </div>
            <div class="modal-body">
                <label for="passwordbaru">Password baru:</label>
                <input type="text" id="passwordbaru" name="passwordbaru" placeholder="Password baru anda">
                <label for="ulangi">Ulangi Password:</label>
                <input type="text" id="ulangi" name="ulangi" placeholder="Masukan ulang">
            </div>
            <div class="modal-footer">
                <input type="hidden" id="csrf" name="csrf" value="';
		echo LR\Filters::escapeHtmlAttr($csrfpassword) /* line 125 */;
		echo '">
                <button type="button" class="modal-button cancel-button">Batal</button>
                <button class="modal-button primary-button">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
';
	}


	/** {block js} on line 133 */
	public function blockJs(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<script>
document.addEventListener(\'DOMContentLoaded\', () => {
    
    /*





        Tab Pengaturan
    */

    const navItems = document.querySelectorAll(\'.settings-nav .nav-item\');
    const settingsSections = document.querySelectorAll(\'.settings-section\');

    function activateSection(sectionId) {
        
        // Menonaktifkan semua navigasi section dan section
        navItems.forEach(item => item.classList.remove(\'active\'));
        settingsSections.forEach(section => section.classList.remove(\'active\'));

        // Mengaktifkan Navi section berdasarkan section id yang dipilih
        const activeNavItem = document.querySelector(`.settings-nav .nav-item[data-section="${sectionId}"]`);
        if (activeNavItem) {
            activeNavItem.classList.add(\'active\');
        }

        // Mengaktifkan section berdasarkan id section yang diilih
        const activeSection = document.getElementById(`pengaturan-${sectionId}`); // Assuming IDs are like "general-settings"
        if (activeSection) {
            activeSection.classList.add(\'active\');
        }
    }

    navItems.forEach(navItem => {
        navItem.addEventListener(\'click\', (e) => {
            e.preventDefault();
            const sectionId = navItem.dataset.section;
            activateSection(sectionId);
        });
    });

    // Mendapatkan url dengan tanda #
    const initialHash = window.location.hash.substring(1);
    if (initialHash) {
        // Jika ada tanda # maka tampilan aktif akan diarahkan sesuai dengan id yang di dapat dari url
        const sectionIdFromHash = initialHash.replace(\'pengaturan-\', \'\');
        activateSection(sectionIdFromHash);
    } else {
        // Jika tidak ada maka defaultnya menjadi list paling awal
        if (navItems.length > 0) {
            const firstSectionId = navItems[0].dataset.section;
            activateSection(firstSectionId);
        }
    }


});


async function formEmail() {
    Toast({
        tipe: "success",
        pesan: "Form Email Submited"
    });
    
    /*
        console.log(token);
        const formData = new FormData(formulir);
        formData.append("fid", formulir.id);

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

    */
}

async function formPassword() {
    Toast({
        tipe: "error",
        pesan: "Form Password Submited"
    });
    
    /*
        console.log(token);
        const formData = new FormData(formulir);
        formData.append("fid", formulir.id);

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

    */
}
</script>
';
	}
}
