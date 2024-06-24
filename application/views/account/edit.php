
<h2>Edit Akun</h2>

<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

<?php echo form_open('account/edit/'.$account['username']); ?>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username', $account['username']); ?>" readonly>
    </div>
    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name', $account['name']); ?>">
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <input type="text" class="form-control" id="role" name="role" value="<?php echo set_value('role', $account['role']); ?>" readonly>
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
<?php echo form_close(); ?>
