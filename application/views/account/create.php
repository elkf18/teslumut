
<h2>Tambah Akun Baru</h2>

<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

<?php echo form_open('account/create'); ?>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name'); ?>">
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <select class="form-control" id="role" name="role">
            <option value="admin">Admin</option>
            <option value="author">Author</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
<?php echo form_close(); ?>
