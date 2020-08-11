<div id="modal2" tabindex="-1"  class="modal fade" role="dialog">
  <div class="modal-dialog  modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">        
        <span type="button" class="close" data-dismiss="modal">&times;</span>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-md-6 seperator">
                    <div class="mod-title">
                        <h3>Login</h3>
                    </div>
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
                            <a href="<?= base_url('ForgotPass'); ?>">Forgot Password?</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="mod-title">
                        <h3>Signup</h3>
                    </div>
                    <form action="<?= base_url('ClientLogin/SignUp'); ?>" method="post">
                        <div class="sign-form">
                             <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-controls" placeholder="Full Name" required="required">
                            </div>
                            <div class="form-group">
                                <label>Email Id</label>
                                <input type="email" name="email" class="form-controls" placeholder="Email Address" required="required">
                            </div>
                             <div class="form-group">
                                <label>Mobile No</label>
                                <input type="tel" name="mobile" class="form-controls" placeholder="10 Digit Mobile No" maxlength="10" required="required">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-controls" placeholder="Password" required="required">
                                <input type="hidden" name="redirectUrl" value="<?= $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
                            </div>
                            <button type="submit">Sign-Up</button><br>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="signs" tabindex="-1"  class="modal fade" role="dialog">
  <div class="modal-dialog  modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">        
        <span type="button" class="close" data-dismiss="modal">&times;</span>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mod-title">
                        <h3>Signup</h3>
                    </div>
                    <form action="<?= base_url('ClientLogin/SignUp'); ?>" method="post">
                        <div class="sign-form">
                             <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-controls" placeholder="Full Name" required="required">
                            </div>
                            <div class="form-group">
                                <label>Email Id</label>
                                <input type="email" name="email" class="form-controls" placeholder="Email Address" required="required">
                            </div>
                             <div class="form-group">
                                <label>Mobile No</label>
                                <input type="tel" name="mobile" class="form-controls" placeholder="10 Digit Mobile No" maxlength="10" required="required">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-controls" placeholder="Password" required="required">
                                <input type="hidden" name="redirectUrl" value="<?= $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
                            </div>
                            <button type="submit">Sign-Up</button><br>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="signsIn" tabindex="-1"  class="modal fade" role="dialog">
  <div class="modal-dialog  modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">        
        <span type="button" class="close" data-dismiss="modal">&times;</span>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mod-title">
                        <h3>Login</h3>
                    </div>
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
                            <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#forgots">Forgot Password?</a>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="forgots" tabindex="-1"  class="modal fade" role="dialog">
  <div class="modal-dialog  modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">        
        <span type="button" class="close" data-dismiss="modal">&times;</span>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mod-title">
                        <h3>Forgot Password</h3>
                    </div>
                    <form action="<?= base_url('ForgotPass/sendMail'); ?>" method="post">
                        <div class="sign-form">
                            <div class="form-group">
                                <label>Mobile No. Or Email Id</label>
                                <input type="text" name="username" class="form-controls" placeholder="Username">
                            </div>
                            
                            <button type="submit">Submit</button><br>
                            
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <div id="modal1" class="modald"> 
    <div class="modal-dialog  modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header"> 
      <button id="modCls2" class="btn btn-warning svbasic">Saves</button>       
        <span id="modCls" type="button" class="close">&times;</span>
      </div>
      <div class="modal-body">
        <div class="container">
            <table id="vidTable" class="table table-bordered prtable">
                <?php foreach($menuData['vidData'] as $vidData ){ ?>
                <tr>
                    <td>
                        <label class="container">
                          <input type="checkbox" name="vid_id" value="<?= $vidData['vid_id']; ?>">
                          <span class="checkmark"></span>
                        </label>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-md-3">
                                <div style="background: url('<?= base_url('uploads/videos/'.$vidData['thumb']); ?>'); background-size: cover;" class="vid-box">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="vidText">
                                    <h5>
                                        <a  class="text-primary" >
                                            <?= $vidData['title']; ?>
                                        </a>
                                    </h5>
                                    <p><?= $vidData['descr']; ?><br>
                                    <span><i class="fas fa-eye"></i> 50K <?= nbs(4); ?><i class="fas fa-thumbs-up"></i> 30K <?= nbs(4); ?><i class="fas fa-thumbs-down"></i> 30K</span>
                                        </p>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </table>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div id="slctPlan" class="modald"> 
    <div class="modal-dialog  modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header"> 
      <button id="modClsp" class="btn btn-warning svbasic">Saves</button>       
        <span id="modClspp" type="button" class="close">&times;</span>
      </div>
      <div class="modal-body">
        <div class="container">
            <div id="shTbl"></div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div id="vidMdl" class="modald"> 
    <div class="modal-dialog  modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body bg-dark">
        <div class="containergg">
          <a href="" class="text-white">
            <span style="float: right"><i class="fa fa-times"></i></span>
          </a>
            <div id="vidTbl"></div>

        </div>
      </div>
    </div>
  </div>
  </div>

  