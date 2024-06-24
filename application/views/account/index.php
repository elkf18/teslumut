<h2>Daftar account</h2>
<a href="<?php echo base_url('account/create'); ?>">Tambah</a>
<table border="1">
    <tr>
        <th>Username</th>
        <th>Nama</th>
        <th>Role</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($accounts as $account): ?>
    <tr>
        <td><?php echo $account['username']; ?></td>
        <td><?php echo $account['name']; ?></td>
        <td><?php echo $account['role']; ?></td>
        <td>
            <!-- Tambahkan tombol edit dan delete -->
            <a href="<?php echo base_url('account/edit/'.$account['username']); ?>">Edit</a>
            <a href="<?php echo base_url('account/delete/'.$account['username']); ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
