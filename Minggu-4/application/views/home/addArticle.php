<!DOCTYPE html>
<html>
<head>
	<title>Daftar Artikel</title>
</head>
<body>
	<div class="text-center-title banner">
    <h2>Tambah Article</h2>
    </div>

    <?php validation_errors(); ?>
    <?php echo $error;?>

    <div class="container mt-5">
        <?php echo form_open_multipart('home/tambahArticles'); ?>
            <div class="form-group">
                <label>Judul Artikel</label>
                <input type="text" class="form-control" name="title" placeholder="Masukkan Judul Artikel">
                <p><?php echo  form_error('title'); ?></p>
            </div>
            <div class="form-group">
                <label>Artikel</label>
                <textarea class="form-control" name="article" rows="4"></textarea>
                <p><?php echo  form_error('article'); ?></p>
            </div>
            <div class="form-group">
                <label>Masukkan Cover Artikel (Berupa Gambar .jpg/.png)</label><br>
                <input type="file" name="cover_img">
            </div>
            <?php echo  form_error('cover_img'); ?>
            <br>
            <input type="submit" value="Tambah Artikel" class="btn btn-primary w-100">
        </form>
    </div>
</body>
</html>