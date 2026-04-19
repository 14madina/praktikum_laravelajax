<script>
function loadData() {
    document.getElementById('hasil').innerHTML = "Loading...";

    fetch('/data-mahasiswa')
        .then(response => {
            if (!response.ok) {
                throw new Error("Gagal ambil data");
            }
            return response.json();
        })
        .then(data => {
            let html = `<table border="1">
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Kelas</th>
                    <th>Prodi</th>
                </tr>`;

            data.forEach(mhs => {
                html += `<tr>
                    <td>${mhs.nama}</td>
                    <td>${mhs.nim}</td>
                    <td>${mhs.kelas}</td>
                    <td>${mhs.prodi}</td>
                </tr>`;
            });

            html += `</table>`;

            document.getElementById('hasil').innerHTML = html;
        })
        .catch(error => {
            document.getElementById('hasil').innerHTML = "Error: " + error;
        });
}
</script>