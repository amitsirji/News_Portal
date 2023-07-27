<?php 

if(isset ($_GET['del'])=='Yes')

{

    $sql="delete from page  where  id='".$_GET['id']."'";

     $q=mysql_query($sql)or die(mysql_error().$sql);

    

    if($q)

    {

        echo "<script>alert('Page Delete Succesfully'); window.location='index.php?p=viewpage';</script>";

    }

    

}

?>



<div class="container-fluid main-content">



    <div class="row">

        <div class="col-lg-12">

            <div class="widget-container fluid-height clearfix">

                <div class="heading">

                    <i class="fa fa-table"></i>View Product

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

                                        Page_Name

                                    </th><th class="hidden-xs sorting" role="columnheader" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="

                                             Date Added

                                             : activate to sort column ascending" style="width: 154.77777767181396px;">

                                      Place

                                    </th><th class="hidden-xs sorting" role="columnheader" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="

                                             Status

                                             : activate to sort column ascending" style="width: 153.77777767181396px;">

                                        Title

                                    </th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 71.77777767181396px;"></th></tr></thead>



                            <tbody role="alert" aria-live="polite" aria-relevant="all">



                                <?php

                                $sql = "select * from page ";

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

                                        <img src="<?php echo $adminpath.$r['image'] ?>" style="width: 50px;height: 50px;"/>

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

                                        <?php echo $r['name']; ?>

                                    </td>

                                    <td class="hidden-xs ">

                                       <?php echo $r['place']; ?>

                                    </td>

                                    <td class="hidden-xs ">

                                         <?php echo $r['title']; ?>

                                             

                                    </td>

                                    <td class="actions ">

                                        <div class="action-buttons">

                                            <a class="table-actions" href=""><i class="fa fa-eye"></i></a><a class="table-actions" href="index.php?p=editpage&id=<?php echo $r['id'] ?>"><i class="fa fa-pencil"></i></a>
                                            <a class="table-actions" href="index.php?p=viewpage&del=Yes&id=<?php echo $r['id']; ?>" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i></a>

                                        </div>

                                    </td>

                                </tr>

                                <?php } ?>





                            </tbody></table>

                        </div>

                </div>

            </div>

        </div>

    </div>

    

</div>