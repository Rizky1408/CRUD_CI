<?= $this->extend('layout/templates'); ?>

<?= $this->Section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"><i class="fas fa-server"></i> CRUD Sederhana</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('objects'); ?>">CRUD Sederhana</a></li>
                <li class="breadcrumb-item active">Update data</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Form Update
                </div>
                <div class="card-body">
                    <?php
                    $errors = session()->getFlashdata('failed');
                    if (!empty($errors)) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><i class="fas fa-times"></i> Failed</strong> data not added to database.
                            <ul>
                                <?php foreach ($errors as $e) { ?>
                                    <li><?= esc($e); ?></li>
                                <?php } ?>
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <?php
                    if (isset($validation)) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><i class="fas fa-times"></i> Failed</strong> data not added to database.
                            <ul>
                                <?= $validation->listErrors() ?>
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <?= form_open_multipart(); ?>
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $dataById['id']; ?>">
                    <input type="hidden" name="Oldphoto" value="<?= $dataById['photo']; ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?= old('name', $dataById['name']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Gender</label>
                        <?php if ($dataById['gender'] == 'Male') : ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="Male" <?= 'checked' ?>>
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                        <?php elseif ($dataById['gender'] == 'Female') : ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="Female" <?= 'checked' ?>>
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" cols="30" rows="10" class="form-control"><?= old('address', $dataById['address']); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" name="photo" id="photo">
                    </div>
                    <img src="<?= base_url(); ?>/photos/<?= $dataById['photo']; ?>" alt="Previous photo" width="10%"> <small>Previous photo</small>
                    <button type="submit" class="btn btn-primary btn-sm float-right">Submit</button>
                    <a href="<?= base_url('objects'); ?>" class="btn btn-secondary btn-sm float-right mr-1">Back</a>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </main>
    <?= $this->endSection(); ?>