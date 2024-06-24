

<h2>Daftar Post</h2>
<a href="<?php echo base_url('post/create'); ?>">Tambah</a>
<table border="1">
    <tr>
        <th>ID Post</th>
        <th>Judul</th>
        <th>Tanggal</th>
        <th>Penulis</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['idpost']; ?></td>
        <td><?php echo $post['title']; ?></td>
        <td><?php echo $post['date']; ?></td>
        <td><?php echo $post['username']; ?></td>
        <td>
            <!-- Tambahkan tombol edit dan delete -->
            <a href="<?php echo base_url('post/edit/'.$post['idpost']); ?>">Edit</a>
            <a href="<?php echo base_url('post/delete/'.$post['idpost']); ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
