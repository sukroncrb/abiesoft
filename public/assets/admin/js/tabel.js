let refreshs = document.querySelectorAll("[data-button]");
refreshs.forEach(refresh => {
    if(refresh.dataset.button = "refresh"){
        refresh.addEventListener('click', (e) => {
            e.preventDefault();
            refresh.children[0].setAttribute("style","transform: rotate(-90deg); transition: all .3s");
            setTimeout(()=>{
                refresh.children[0].setAttribute("style","transform: rotate(0deg); transition: all .3s");
                Toast({
                    tipe: "success",
                    pesan: "Data diperbarui"
                });
            },300);
        });
    }
});