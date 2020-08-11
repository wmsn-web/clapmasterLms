<?php if($msgVerify = $this->session->flashdata("msgVerify")){ ?>
            <div class="verify">
                <div class="verifyCont">
                    <span><a href=""><i class="fa fa-times"></i></a></span>
                    <?= $msgVerify; ?>

                </div>
            </div>
        <?php } ?>
        <?php if($err = $this->session->flashdata("err")){ ?>
        <div class="loginPop-modal">
            <div class="loginPop">
                <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mod-title">
                        <a href="">
                            <span style="float: right;"><i class="fa fa-times"></i></span>
                        </a>
                        <h3>Login</h3>
                    </div>
                    <?= $err; ?>
                    <form action="<?= base_url('ClientLogin/Login'); ?>" method="post">
                        <div class="sign-form">
                            <div class="form-group">
                                <label>Mobile No. Or Email Id</label>
                                <input type="text" name="username" class="form-controls" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-controls" placeholder="Password">
                            </div>
                            <input type="hidden" name="redirectUrl" value="<?= $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
                            <button type="submit">Login</button><br>
                            
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    <?php } ?>