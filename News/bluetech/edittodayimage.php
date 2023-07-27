<?php
if (isset($_POST['submit'])) 
{

    $sql = "update  todayimage set ";
    foreach ($_FILES as $a => $b) {
//       debug($_FILES);
        if (is_array($b['name'])) {
            $dd = '`' . $a . '`=';
            $b['name'] = array_unique(array_values(array_filter($b['name'])));
            $b['tmp_name'] = array_unique(array_values(array_filter($b['tmp_name'])));
            for ($i = 0; $i < count($b['name']); $i++) {
                $b['name'][$i] = time() . '-' . $b['name'][$i];
                move_uploaded_file($b['tmp_name'][$i], 'files/' . $b['name'][$i]);
            }
            if ($_POST[$a][0]) {
                unset($pb1);
                for ($i = 0; $i < count($_POST[$a]); $i++) {
                    $pb1[] = mysql_escape_string($_POST[$a][$i]);
                }
                $dd.="'" . implode(',', $b['name']) . "," . implode(",", $pb1) . "'";
            }
            else
                $dd.="'" . implode(',', $b['name']) . "'";
            $escape[] = $a;
        } elseif (is_array($b)) {
            $dd = '`' . $a . '`=';
            $b['name'] = time() . '-' . $b['name'];
            move_uploaded_file($b['tmp_name'], 'files/' . $b['name']);
            $dd.="'" . $b['name'] . "'";
            $escape[] = $a;
        }
        $pa[] = $dd;
    }
    foreach ($_POST as $a => $b) {
        if ($a != 'submit' && !in_array($a, $escape)) {
            $dd = "`" . $a . "`=";
            if (is_array($b)) {
                unset($pb1);
                for ($i = 0; $i < count($b); $i++) {
                    $b[$i] = mysql_escape_string($b[$i]);
                    if (strpos($a, "time") || strpos($a, "date") || $a == "date" || $a == "time" || strpos($a, "datetime") || $a == 'datetime')
                        $pb1[] = dmy2mysql($b[$i]);
                    else
                        $pb1[] = $b[$i];
                }
                $dd.="'" . implode(",", $pb1) . "'";
            }
            else {
                if (strpos($a, "time") || strpos($a, "date") || $a == "date" || $a == "time" || strpos($a, "datetime") || $a == 'datetime')
                    $dd.= "'" . dmy2mysql($b) . "'";
                else
                    $dd.= "'" . mysql_escape_string($b) . "'";
            }
        }
        $pa[] = $dd;
    }
    $sql.=implode(',', $pa) . " where id=" . $_GET['id'];

    $q = mysql_query($sql) or die(mysql_error() . $sql);
    if ($q)
        echo "<script>alert('Banner Images Updated'); window.location='index.php?p=viewtodayimage';</script>";
}

$sql = "select * from todayimage where id=" . $_GET['id'];
$q = mysql_query($sql);
$rdata = mysql_fetch_assoc($q);
//debug($rdata);
if ($_GET['del']) {   // when click on delete link this will be called and delete image from database
    $datadel = explode(',', $rdata[$_GET['del']]);
    $_GET['ids'] = $_GET['ids'] ? $_GET['ids'] : 0;
    @unlink($adminpath . $rdata['image']);
	@unlink($adminpath .'biggal'. $rdata['image']);
	@unlink($adminpath .'thumbgal'. $rdata['image']);
	@unlink($adminpath .'smallgal'.$rdata['image']);
    unset($datadel[$_GET['ids']]);
    $sql = "update todayimage set `" . $_GET['del'] . "`='" . implode(',', $datadel) . "' where id=" . $_GET['id'];
    $q = mysql_query($sql);
    echo "<script>alert('Image Updated'); window.location='index.php?p=edittodayimage&id=" . $_GET['id'] . "';</script>";
}
?>

<div class="container-fluid main-content">
   
    <div class="row">
        <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
                <div class="heading">
                    <i class="fa fa-table"></i>Edit Today's Image
                 </div>
                
                <div class="widget-content padded">
                    
                    <form action="#" class="form-horizontal" method="post" enctype="multipart/form-data">
                        
                        
          <div class="form-group">
            <label class="control-label col-md-2">Title</label>
            <div class="col-md-7">
                <input class="form-control" name="title" type="text" value="<?php echo $rdata['title'];?>"/>
            </div>
          </div>
                        
          
          
          
          <div class="form-group">
            <label class="control-label col-md-2">Sort Description</label>
            <div class="col-md-7">
                <input class="form-control" name="sortdesc" type="text" value="<?php echo $rdata['sortdesc']; ?>"/>
            </div>
          </div>   
           
           <div class="form-group">
                            <label class="control-label col-md-2">Image Upload</label>
                            <div class="col-md-4">
                                <?php
                                if ($rdata['image'] && file_exists($adminpath . $rdata['image'])) {
                                    ?>
                                <img src="<?php echo $adminpath . $rdata['image']; ?>" style="width: 50%;"/>
                                <a href="index.php?p=editgallery&del=image&id=<?php echo $_GET['id']; ?>">
                                   Delete </a>

                                <?php
                                    
                                } else {
                                    
                                    ?>
                                <div class="fileupload fileupload-new" data-provides="fileupload"><input type="hidden" value="" name="">
                                    <div class="fileupload-new img-thumbnail" style="width: 200px; height: 150px;">
                                        <img src="images/AAAAAA&text=no+image.gif">
                                    </div>
                                    <div class="fileupload-preview fileupload-exists img-thumbnail" style="width: 200px; max-height: 150px;"></div>
                                    <div>
                                        <span class="btn btn-default btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="image"></span><a class="btn btn-default fileupload-exists" data-dismiss="fileupload" href="#">Remove</a>
                                    </div>

                                </div>
                                <?php
                                }
                                ?>
                                
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-2">Status</label>
                            <div class="col-md-7">
                                <label class="radio" for="option1">
                                    <input id="option1" name="status" type="radio" value="Yes" <?php if($rdata['status']=='Yes') { ?>checked="checked"<?php } ?>/><span>Active</span></label>
                                <label class="radio"><input  name="status" type="radio" value="No" <?php if($rdata['status']=='No') { ?>checked="checked"<?php } ?>/><span>Hidden</span></label>

                            </div>
                        </div>

                  
         <div class="form-group">
          
              <div class="col-md-7" style="text-align: right;">
                  <button class="btn btn-primary" type="submit" name="submit">Update</button><button class="btn btn-default-outline">Cancel            </button>
            </div>
          </div>
        </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end DataTables Example -->
</div>

