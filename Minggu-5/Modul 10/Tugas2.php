<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 1 Modul 10</title>
</head>
<body>
    <input type="text" name="new" id="new">
    <button onclick="mTambah()">Tambah</button>
    <ul id="ul">
        <li id="1">Pena | <a onclick="mEdit('1')">Edit</a> | <a onclick="mHapus(1)">Hapus</a></li>
        <li id="2">Buku Tulis | <a onclick="mEdit('2')">Edit</a> | <a onclick="mHapus(2)">Hapus</a></li>
        <li id="3">Pena | <a onclick="mEdit('3')">Edit</a> | <a onclick="mHapus(3)">Hapus</a></li>
    </ul>
</body>
<script>
    console.log(document.getElementsByName("new").value);
    console.log(document.getElementsByClassName("ul"));
    console.log(document.querySelector("button"));
    console.log(document.getElementsByTagNameNS("http://www.w3.org/1999/xhtml", li));
    console.log(document.querySelectorAll("li"));
</script>
</html>