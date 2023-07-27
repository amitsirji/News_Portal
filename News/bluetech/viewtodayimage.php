<?php 
if(isset ($_GET['del'])=='Yes')
{
   
	
$sql = "select * from todayimage where id=" . $_GET['id'];
$q = mysql_query($sql);
$rdata = mysql_fetch_assoc($q);
//debug($rdata);
   // when click on delete link this will be called and delete image from database
    $datadel = explode(',', $rdata[$_GET['del']]);
    $_GET['ids'] = $_GET['ids'] ? $_GET['ids'] : 0;
    
	@unlink($adminpath . $rdata['image']);
	@unlink($adminpath .'thumbgal'. $rdata['image']);
	@unlink($adminpath .'biggal'. $rdata['image']);
	@unlink($adminpath .'smallgal'.$rdata['image']);
   
    $sql1="delete from todayimage where  id='".$_GET['id']."'";
     $q1=mysql_query($sql1)or die(mysql_error().$sql1);
    
    if($q1)
    {

   
        echo "<script>alert('Today Image Delete Succesfully'); window.location='index.php?p=viewtodayimage';</script>";
    }
    
}
?>
<div class="container-fluid main-content">

    <div class="row">
        <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
                <div class="heading">
                    <i class="fa fa-table"></i>View Today Images
                </div>
                <div class="widget-content padded clearfix">
                    <div id="dataTable1_wrapper" class="dataTables_wrapper" role="grid">

                        <div class="dataTables_filter" id="dataTable1_filter">

                        </div>
                        <table class="table table-bordered table-striped dataTable" id="dataTable1" aria-describedby="dataTable1_info">
                            <thead>
                                <tr role="row"><th class="check-header hidden-xs sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="

                                                   " style="width: 17.777777671813965px;">
                                        <label><input id="checkAll" name="checkAll" type="checkbox"><span></span></label>
                                    </th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="
                                             Id
                                             : activate to sort column ascending" style="width: 143.77777767181396px;">
                                        Id
                                    </th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="
                                             Image
                                             : activate to sort column ascending" style="width: 141.77777767181396px;">
                                        Image
                                    </th><th class="hidden-xs sorting" role="columnheader" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="
                                             Product_Name
                                             : activate to sort column ascending" style="width: 247.77777767181396px;">
                                       Title
                                    </th><th class="hidden-xs sorting" role="columnheader" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="
                                             Date Added
                                             : activate to sort column ascending" style="width: 154.77777767181396px;">
                                       Short Description
                                    </th><th class="hidden-xs sorting" role="columnheader" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="
                                             Status
                                             : activate to sort column ascending" style="width: 153.77777767181396px;">
                                        Status
                                    </th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 71.77777767181396px;"></th></tr></thead>

                            <tbody role="alert" aria-live="polite" aria-relevant="all">

                                <?php
                                $sql = "select * from todayimage ";
                                $q = mysql_query($sql) or die(mysql_error() . $sql);
                                while($r= mysql_fetch_assoc($q))
                                {
                                ?>
                                <tr class="odd">
                                    <td class="check hidden-xs  sorting_1">
                                        <label><input name="optionsRadios1" type="checkbox" value="option1"><span></span></label>
                                    </td>
                                    <td class=" ">
                                       <?php echo $r['id']; ?>
                                    </td>
                                    <td class="">
                                        <?php if($r['image']&& file_exists($adminpath.$r['image'])){ ?>
                                       <img src="<?php echo $adminpath.$r['image'] ?>" width="50px" height="50px;"  />
                                    <?php }
                                    else
                                    {
                                      ?>
                                        <img src="images/AAAAAA&text=no+image.gif"style="width: 50px;height: 50px;"/>
                                        <?php
                                    }
                                    ?>
                                    </td>
                                    <td class="hidden-xs ">
                                        <?php echo $r['title']; ?>
                                    </td>
                                    <td class="hidden-xs ">
                                       <?php echo ($r['sortdesc']); ?>
                                    </td>
                                    <td class="hidden-xs ">
                                         <?php if($r['status']=='Yes')
                                             {
                                         ?>
                                        <span class="label label-success"> Active</span>
                                             <?php
                                         } else if($r['status']=='No'){ 
                                             ?>
                                          <span class="label label-danger"> Hidden</span>
                                        <?php } ?>
                                             
                                    </td>
                                    <td class="actions ">
                                        <div class="action-buttons">
                                            <a class="table-actions" href=""><i class="fa fa-eye"></i></a>
                                            <a class="table-actions" href="index.php?p=edittodayimage&id=<?php echo $r['id'] ?>"><i class="fa fa-pencil"></i></a>
                                            <a class="table-actions" href="index.php?p=viewtodayimage&del=Yes&id=<?php echo $r['id']; ?>"><i class="fa fa-trash-o"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>


                            </tbody></table>
                            <div class="dataTables_info" id="dataTable1_info">Showing 1 to 10 of 14 entries</div>
                            <div class="dataTables_paginate paging_full_numbers" id="dataTable1_paginate">
                            <a tabindex="0" class="first paginate_button paginate_button_disabled" id="dataTable1_first">First</a><a tabindex="0" class="previous paginate_button paginate_button_disabled" id="dataTable1_previous">Previous</a><span><a tabindex="0" class="paginate_active">1</a><a tabindex="0" class="paginate_button">2</a></span><a tabindex="0" class="next paginate_button" id="dataTable1_next">Next</a><a tabindex="0" class="last paginate_button" id="dataTable1_last">Last</a></div></div>
                </div>
            </div>
        </div>
    </div>
   
</div>