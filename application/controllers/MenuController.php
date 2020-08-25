<?php
/**
 * 
 */
class MenuController extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->model("SiteModel");
	}

	public function getVids()
	{
        $aws_server = $this->SiteModel->aws_server();
		$crsId = $this->input->post("id");
		$getDataMenu = $this->SiteModel->getDataMenu($crsId); ?> 

		
                            <br><h3 class="text-white"><?= $getDataMenu['course_name']; ?></h3><br>
                            <div >
                                <img src="<?= base_url('uploads/videos/'.$getDataMenu['crsImg']); ?>" class="img-responsive" style="width:380px">
                            </div><br>
                            <span class="texts">
                                <?= $getDataMenu['descr']; ?>
                            </span>
                            <div class="sub-cat">
                                <ul>
                                    <?php if(!empty($getDataMenu['chapData'])){ ?>
                                    	<?php foreach($getDataMenu['chapData'] as $key){ ?>
                                            <li>
                                                <button onclick="newfunction('<?= $key['id']; ?>')"  class="cat-read"><?= $key['chapName']; ?></button>
                                            </li>
                                        <?php } ?> 
                                    <?php } ?>    
                                </ul>
                            </div>

	<?php } 

    public function getPreview()
    {
        $aws_server = $this->SiteModel->aws_server();
        $id = $this->input->post("id");
        $getPreviews = $this->SiteModel->getPreviews($id); ?>

                                
                            <br><h3 class="text-white"><?= $getPreviews['course_name']; ?></h3><br>
                            <?php if($getPreviews['previewData']['preview_type']=="file"){ ?>
                                <video width="100%" poster="<?= base_url('uploads/videos/'.$getPreviews['previewData']['thumb']); ?>" controls>
                                  <source src="<?= $aws_server['serverUrl'].$aws_server['folders'].$getPreviews['previewData']['preview']; ?>" type="video/mp4">
                                  Your browser does not support the video tag.
                                </video>
                            <?php }else{ ?>
                                <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/<?= $getPreviews['previewData']['preview_link']; ?>/?rel=0">
                        </iframe>
                            <?php } ?>
                                <br>
                            <span class="texts">
                                <?= $getPreviews['descr']; ?>
                            </span>
                            <div class="sub-cat">
                                <ul>
                                    <?php if(!empty($getPreviews['chapData'])){ ?>
                                        <?php foreach($getPreviews['chapData'] as $key){ ?>
                                            <li>
                                                <button onclick="newfunction('<?= $key['id']; ?>')"  class="cat-read"><?= $key['chapName']; ?></button>
                                            </li>
                                        <?php } ?> 
                                    <?php } ?>    
                                </ul>
                            </div>

        
    <?php 
        
    }

}