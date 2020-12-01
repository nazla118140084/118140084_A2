<!DOCTYPE html>
<html>
<head>
	<title>Daftar Artikel</title>
</head>
<body>
	<div class="text-center-title banner">
        <h2>Perbaharui Article</h2>
    </div>

    <?php validation_errors(); ?>

    <div class="container mt-5 mb-5">
        <?php foreach($article as $data){ ?>
        
        <?php echo form_open_multipart('home/updates'); ?>
            <input type="text" class="form-control" name="id" value="<?php echo $data->id; ?>" style="display:none;">
            <div class="form-group">
                <label>Judul Artikel</label>
                <input type="text" class="form-control" name="title" value="<?php echo $data->title; ?>" placeholder="Masukkan Judul Artikel">
                <p><?php echo  form_error('title'); ?></p>
            </div>
            <div class="form-group">
                <label>Artikel</label>
                <textarea class="form-control" name="article" rows="4"> <?php echo $data->article; ?> </textarea>
                <p><?php echo  form_error('article'); ?></p>
            </div>
            <div class="form-group">
                <label>Masukkan Cover Artikel (Berupa Gambar .jpg/.png)</label><br>
                <img src="<?php echo base_url('upload/') . $data->cover_img; ?>" alt="" width="300px" height="300px"><br><br>
                <input type="file" name="cover_img"><br>
                <small>*Jika Tidak ingin mengganti, kosongkan saja.</small>
            </div>
            <?php echo  form_error('cover_img'); ?>
            <br>
            <input type="submit" value="Perbaharui Artikel" class="btn btn-primary w-100">
        </form>

        <?php } ?>
    </div>
</body>
</html>