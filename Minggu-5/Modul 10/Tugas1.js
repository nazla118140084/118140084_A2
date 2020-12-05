var i = 4;
function mTambah() {
    var nama = document.getElementById("new").value;
    var ul = document.getElementById("ul");
    var mNewList = document.createElement("li");
    mNewList.setAttribute("id", i);
    mAddNew(mNewList, nama);
    ul.append(mNewList);
    i++;
}

function mHapus(id) {
    document.getElementById(id).remove();
}

function mEdit(id) {
    var nama = prompt("Masukkan nama baru: ", document.getElementById(id).innerText.split(" | ")[0]);
    if (nama != null) {
        var li = document.getElementById(id);
        li.innerHTML = "";
        mAddNew(li, nama, id);
    }
}

function mAddNew(li, nama, id) {
    li.append(nama + " | ");
    li.append(mEdit(id));
    li.append(" | ");
    li.append(mHapus(id));
}

function mEdit(id = i) {
    var edit = document.createElement("a");
    edit.setAttribute("onclick", "edit(" + id + ")");
    edit.append("Edit");
    return edit;
}

function mHapus(id = i) {
    var edit = document.createElement("a");
    edit.setAttribute("onclick", "hapus(" + id + ")");
    edit.append("Hapus");
    return edit;
}