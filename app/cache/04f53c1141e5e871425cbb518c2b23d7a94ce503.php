<?php $__env->startSection('content'); ?>
    <h4>Perbarui Profil</h4>
    <hr>
    <div class="row">
        <div class="col-sm-6">
            <form action="#" class="form-horizontal">
                <div class="form-group">
                    <label for="inputNama" class="col-sm-3">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?php echo e($_SESSION['user']->fullname); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="radio col-sm-offset-3">
                        <label>
                            <input type="radio" name="gender" value="1" <?php echo e($_SESSION['user']->gender != 1 ?: 'checked'); ?>> Pria
                        </label>
                        <label>
                            <input type="radio" name="gender" value="2" <?php echo e($_SESSION['user']->gender == 1 ?: 'checked'); ?>> Wanita
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="reg-username" class="col-sm-3">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" id="reg-username" value="<?php echo e($_SESSION['user']->email); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="reg-password" class="col-sm-3">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" id="reg-password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="reg-password-verify" class="col-sm-3">Ulangi password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="reg-password-verify">
                    </div>
                </div>
                <div class="col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                    <a href="<?php echo e(URL); ?>" class="btn btn-link">Batal</a>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>