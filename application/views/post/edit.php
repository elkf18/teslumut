

<h2>Edit Post</h2>

<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

<?php echo form_open('post/edit/'.$post['idpost']); ?>
    <div class="form-group">
        <label for="title">Judul</label>
        <input type="text" class="form-control" id="title" name="title" value="<?php echo set_value('title', $post['title']); ?>">
    </div>
    <div class="form-group">
        <label for="content">Konten</label>
        <textarea class="form-control" id="content" name="content"><?php echo set_value('content', $post['content']); ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
<?php echo form_close(); ?>
