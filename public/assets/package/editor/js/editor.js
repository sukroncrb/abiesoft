// Opsional: Untuk menyimpan dan memuat konten dari Local Storage
const editorContent = document.getElementById('editorContent');

// Memuat konten saat halaman dimuat
const savedContent = localStorage.getItem('documentEditorContent');
if (savedContent) {
    editorContent.innerHTML = savedContent;
}

// Menyimpan konten setiap kali ada input
editorContent.addEventListener('input', () => {
    localStorage.setItem('documentEditorContent', editorContent.innerHTML);
    // let jumlahHalaman = Math.ceil((editorContent.offsetHeight / 924 ));
    // document.querySelector(".footer-page").innerHTML = jumlahHalaman;
});

// Contoh fungsi untuk menambahkan pemisah halaman manual (akan bekerja saat cetak)
function insertPageBreak() {
    const range = window.getSelection().getRangeAt(0);
    const pageBreakDiv = document.createElement('div');
    pageBreakDiv.className = 'page-break';
    pageBreakDiv.innerHTML = '--------------------------------'; // Tambahkan spasi agar terlihat di editor
    range.insertNode(pageBreakDiv);
    range.setStartAfter(pageBreakDiv);
    range.setEndAfter(pageBreakDiv);
    editorContent.focus();
}

// Anda bisa menambahkan tombol di HTML untuk memanggil fungsi insertPageBreak()
// <button onclick="insertPageBreak()">Insert Page Break</button>










// Set Posisi Mouse Ke awal
function getXPathForElement(elm) {
    var allNodes = document.getElementsByTagName('*');
    var segs = [];
    for (; elm && elm.nodeType == 1; elm = elm.parentNode) {
        if (elm.hasAttribute('id')) {
            var uniqueId = elm.id;
            segs.unshift('id("' + uniqueId + '")');
            return segs.join('/');
        } else {
            var i = 1;
            for (var sib = elm.previousSibling; sib; sib = sib.previousSibling) {
                if (sib.nodeType == 1 && sib.tagName == elm.tagName) {
                    i++;
                }
            }
            var tagName = elm.tagName.toLowerCase();
            var segment = tagName + '[' + i + ']';
            segs.unshift(segment);
        }
    }
    return segs.length ? '/' + segs.join('/') : null;
}

function getElementByXPath(path) {
    if (path.startsWith('id("')) {
        const id = path.match(/id\("([^"]+)"\)/)[1];
        return document.getElementById(id);
    }
    return document.evaluate(path, document, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null).singleNodeValue;
}

editorContent.addEventListener('input', saveCursorPosition);
editorContent.addEventListener('mouseup', saveCursorPosition);
editorContent.addEventListener('keyup', saveCursorPosition);

function saveCursorPosition() {
    const selection = window.getSelection();
    if (selection.rangeCount === 0) return;

    const range = selection.getRangeAt(0);
    const serializedRange = {
        startContainerPath: getXPathForElement(range.startContainer),
        startOffset: range.startOffset,
        endContainerPath: getXPathForElement(range.endContainer),
        endOffset: range.endOffset,
        collapsed: range.collapsed
    };
    localStorage.setItem('editorCursorPosition', JSON.stringify(serializedRange));
}


function restoreCursorPosition() {
    const savedPosition = localStorage.getItem('editorCursorPosition');
    if (!savedPosition) {
        editorContent.focus();
        return;
    }

    const serializedRange = JSON.parse(savedPosition);

    try {
        const startContainer = getElementByXPath(serializedRange.startContainerPath);
        const endContainer = getElementByXPath(serializedRange.endContainerPath);

        if (!startContainer || !endContainer) {
            editorContent.focus();
            return;
        }

        const selection = window.getSelection();
        const range = document.createRange();

        range.setStart(startContainer, serializedRange.startOffset);
        range.setEnd(endContainer, serializedRange.endOffset);

        selection.removeAllRanges();
        selection.addRange(range);

        editorContent.focus();

    } catch (e) {
        editorContent.focus();
    }
}

window.addEventListener('DOMContentLoaded', restoreCursorPosition);






// Opsi Button
function elementSelector (x) {
    return document.querySelector(x);
}

elementSelector(".print").addEventListener("click", ()=>{
    elementSelector(".editor-container").removeAttribute("style");
    window.print();
    elementSelector(".editor-container").setAttribute("style","zoom: "+elementSelector(".zoom").value);
});

elementSelector(".zoom").addEventListener("change", ()=>{
    elementSelector(".editor-container").setAttribute("style","zoom: "+elementSelector(".zoom").value);
});

elementSelector(".undo").addEventListener("click", ()=>{
    document.execCommand("undo");
});

elementSelector(".redo").addEventListener("click", ()=>{
    document.execCommand("redo");
});

elementSelector(".bold").addEventListener("click", ()=>{
    document.execCommand("bold");
});

elementSelector(".italic").addEventListener("click", ()=>{
    document.execCommand("italic");
});

elementSelector(".underline").addEventListener("click", ()=>{
    document.execCommand("underline");
});

elementSelector(".justifyleft").addEventListener("click", ()=>{
    document.execCommand("justifyLeft");
});

elementSelector(".justifycenter").addEventListener("click", ()=>{
    document.execCommand("justifyCenter");
});

elementSelector(".justifyright").addEventListener("click", ()=>{
    document.execCommand("justifyRight");
});

elementSelector(".justifyfull").addEventListener("click", ()=>{
    document.execCommand("justifyFull");
});

elementSelector(".unorderlist").addEventListener("click", ()=>{
    document.execCommand("insertUnorderedList");
});

elementSelector(".orderlist").addEventListener("click", ()=>{
    document.execCommand("insertOrderedList");
});

elementSelector(".font-family").addEventListener("change", ()=>{
    document.execCommand("fontName",false,elementSelector(".font-family").value);
});

elementSelector(".font-size").addEventListener("change", ()=>{
    document.execCommand("fontSize",false,elementSelector(".font-size").value);
});









function getStyleAtCursor() {
    const selection = window.getSelection();

    // Jika tidak ada seleksi atau kursor tidak ada di dalam editor
    if (!selection.rangeCount || !editorContent.contains(selection.anchorNode)) {
        resetStatus();
        return;
    }

    const range = selection.getRangeAt(0);
    let currentNode = range.commonAncestorContainer;

    // Jika kursor berada di node teks, pindah ke elemen induknya
    if (currentNode.nodeType === Node.TEXT_NODE) {
        currentNode = currentNode.parentNode;
    }

    let isBold = false;
    let isItalic = false;
    let isUnderline = false;
    let isOlList = false;
    let isUlList = false;

    // Traverse up the DOM tree from the current node until we reach the editor
    while (currentNode && currentNode !== editorContent) {
        const tagName = currentNode.tagName;
        if (tagName === 'B' || tagName === 'STRONG') {
            isBold = true;
        } else if (tagName === 'I' || tagName === 'EM') {
            isItalic = true;
        } else if (tagName === 'U') {
            isUnderline = true;
        } else if (tagName === 'OL') {
            isOlList = true;
        } else if (tagName === 'UL') {
            isUlList = true;
        }
        currentNode = currentNode.parentNode;
    }

    updateStatusDisplay(isBold, isItalic, isUnderline, isOlList, isUlList);
}

// Fungsi untuk memperbarui tampilan status
function updateStatusDisplay(bold, italic, underline, isOlList, isUlList, elDiv) {
    if(bold){
        elementSelector(".bold").classList.add('active', bold);
    }else{
        elementSelector(".bold").classList.remove('active', bold);
    }

    if(italic){
        elementSelector(".italic").classList.add('active', italic);
    }else{
        elementSelector(".italic").classList.remove('active', italic);
    }

    if(underline){
        elementSelector(".underline").classList.add('active', underline);
    }else{
        elementSelector(".underline").classList.remove('active', underline);
    }

    if(isUlList){
        elementSelector(".unorderlist").classList.add('active', isUlList);
    }else{
        elementSelector(".unorderlist").classList.remove('active', isUlList);
    }

    if(isOlList){
        elementSelector(".orderlist").classList.add('active', isOlList);
    }else{
        elementSelector(".orderlist").classList.remove('active', isOlList);
    }
    
}

// Fungsi untuk mereset tampilan status
function resetStatus() {
    updateStatusDisplay(false, false, false, false);
}

// --- Event Listeners untuk Memicu Deteksi Gaya ---
// Ini adalah cara paling andal untuk melacak posisi kursor/klik
editorContent.addEventListener('mouseup', getStyleAtCursor);      // Saat klik mouse dilepas
editorContent.addEventListener('keyup', getStyleAtCursor);       // Saat tombol keyboard dilepas (termasuk navigasi panah)
document.addEventListener('selectionchange', getStyleAtCursor); // Saat seleksi atau posisi kursor berubah

// Inisialisasi status saat halaman dimuat
getStyleAtCursor();
