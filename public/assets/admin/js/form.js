function __buildActionForm(x){
    if(validasi({
        formid: x.form.id,
        field: x.field
    })){
        return submit({
            endpoint: x.endpoint,
            form: x.form,
            output: x.output
        });
    }
}

function validasi(x) {
    const form = document.getElementById(x.formid);
    if(form){     
        let arrayForm = x.field;
        let ide = "";
        let functionName = "";
        let fn = "";
        let item = "";
        for(let i=0; i<arrayForm.length; i++){
            ide = arrayForm[i].split("|")[0];
            functionName = arrayForm[i].split("|")[1];
            fn = window[functionName];
            item = "";
            if(typeof fn === "function"){
                item = document.getElementById(ide);
                if(fn(item.value)) {
                    Toast({
                        tipe: 'error',
                        pesan: ''+item.dataset.label + ' ' + fn(item.value)
                    });
                    item.focus();
                    return false;
                }
            }else{
                Toast({
                    tipe: 'error',
                    pesan: 'Validasi tipe '+ functionName + ' belum didefinisikan'
                });
                return false;
            }
        }
        return true;
    }
}

function setPilihan(txt) {
    if (txt == "" || txt == null) {
        const status = "belum dipilih";
        return status;
    }
}

function setClean(txt) {
    if (txt == "" || txt == null) {
        const status = "jangan dikosongkan";
        return status;
    }
}

function setSimpel(txt) {
    if (txt == "" || txt == null) {
        const status = "jangan dikosongkan";
        return status;
    } else if (txt.length <= 0) {
        const status = "minimal 1 huruf";
        return status;
    }
}

function setText(txt) {
    if (txt == "" || txt == null) {
        const status = "jangan dikosongkan";
        return status;
    } else if (txt.length <= 3) {
        const status = "minimal 4 huruf";
        return status;
    }
}

function validateEmail(email) {
    // const re =
    //     /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    const re = /^\w+(?:\.\w+)*@\w+(?:\.\w+)+$/;
    return re.test(email);
}

function validateUrl(url) {
    const pattern = new RegExp(
        "^(https?:\\/\\/)?" +
        "((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|" +
        "((\\d{1,3}\\.){3}\\d{1,3}))" +
        "(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*" +
        "(\\?[;&a-z\\d%_.~+=-]*)?" +
        "(\\#[-a-z\\d_]*)?$",
        "i"
    );
    return !!pattern.test(url);
}

function setEmail(txt) {
    if (txt == "" || txt == null) {
        const status = "jangan dikosongkan";
        return status;
    } else if (txt.length <= 3) {
        const status = "minimal 4 huruf";
        return status;
    } else if (!validateEmail(txt)) {
        const status = "tidak sesuai format";
        return status;
    }
}

function setUrl(txt) {
    if (txt == "" || txt == null) {
        const status = "jangan dikosongkan";
        return status;
    } else if (txt.length <= 3) {
        const status = "minimal 4 huruf";
        return status;
    } else if (!validateUrl(txt)) {
        const status = "format url salah";
        return status;
    }
}

function setAngka(txt) {
    if (txt == "" || txt == null) {
        const status = "jangan dikosongkan";
        return status;
    } else if (txt.length <= 3) {
        const status = "minimal 4 angka";
        return status;
    } else if (isNaN(txt)) {
        const status = "harus angka";
        return status;
    }
}

function setAngkaOnly(txt) {
    if (txt == "" || txt == null) {
        const status = "jangan dikosongkan";
        return status;
    } else if (isNaN(txt)) {
        const status = "harus angka";
        return status;
    }
}

function setNoHp(txt) {
    if (txt == "" || txt == null) {
        const status = "jangan dikosongkan";
        return status;
    } else if (txt.length <= 9) {
        const status = "minimal 8 angka";
        return status;
    } else if (isNaN(txt)) {
        const status = "harus angka";
        return status;
    }
}

function setUsia(txt) {
    if (txt == "" || txt == null) {
        const status = "jangan dikosongkan";
        return status;
    } else if (txt < 1) {
        const status = "minimal 1 tahun";
        return status;
    } else if (isNaN(txt)) {
        const status = "harus angka";
        return status;
    }
}

function setKtp(txt) {
    if (txt == "" || txt == null) {
        const status = "jangan dikosongkan";
        return status;
    } else if (txt.length <= 15) {
        const status = "harus 16 angka";
        return status;
    } else if (isNaN(txt)) {
        const status = "harus angka";
        return status;
    }
}

async function submit(x) {

    let url = baseurl + "/api/" + x.endpoint;
    let fd = new FormData(x.form);
    fd.append("formid", x.form.id);

    try {
        let response = await fetch(url, { method: 'POST', headers: { 'Authorization': `Bearer ${token}`, },
            body: fd
        });

        if (!response.ok) {
            let errorText = await response.text();`HTTP error! status: ${response.status}, message: ${errorText}`
            Toast({
                tipe: 'error',
                pesan: `HTTP error! status: ${response.status}, message: ${errorText}`
            });
        }

        let result = "";

        if(x.output != "text"){
            result = await response.json();
        }else{
            result = await response.text();
        }

        return result;

    } catch (error) {
        Toast({
            tipe: 'error',
            pesan: 'Ada masalah dengan operasi fetch:', error
        });
    }

}