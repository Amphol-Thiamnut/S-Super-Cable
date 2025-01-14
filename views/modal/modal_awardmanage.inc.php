<div class="modal fade" id="awardManageModal" tabindex="-1" role="dialog" aria-labelledby="awardManageModalDialog"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="awardManageTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- Form -->
                <form id="form_awardManage" method='post' action='' enctype="multipart/form-data">

                    <div class="form-group ">
                        <label for="Tittle_Award" class="col-form-label">หัวข้อรางวัล:<span class="text-danger" >*</span></label>
                        <input type="text" class="form-control" id="Tittle_Award" name="Tittle_Award" value=""
                               required="required">
                    </div>

                    <div class="form-group">
                        <label for="ID_Employee" class="col-form-label">ชื่อพนักงาน:<span class="text-danger" >*</span></label>
                        <select class="form-control" name="ID_Employee" id="ID_Employee_Award">
                        <option value="" selected disabled>-กรุณาเลือกคนได้รับรางวัล-</option>
                            <?php 
                            foreach ($employeeList as $employee) { ?>
                                <option value="<?php echo $employee->getID_Employee(); ?>"><?php echo $employee->getName_Employee() . " " . $employee->getSurname_Employee(); ?></option>
                                
                            <?php 
                            } 
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <!-- set default image  -->
                        <?php $pic = Router::getSourcePath() . "images/" . $employee->Picuture_Employee; ?>
                        <!-- select image to upload -->
                        <img id="thumnails_award_pic" browsid="award_pic" class="thumnails-premise" src="<?= $pic ?>"  style=""/><span class="text-danger" >*</span>
                        <!-- chosse file -->
                        <input id="award_pic" name="award_pic" type="file" accept=".png, .jpg,.jpeg,.gif" style="" onchange="preview();" >                
                    </div>
                    

                </form>
            </div>

            <div class="modal-footer">
                <a href="#" id="button_awardManageModal" onclick="onaction_createorupdate()" data-status="" data-id=""
                   class="btn btn-primary">ตกลง</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
            </div>

        </div>
    </div>
</div>


<script type="text/javascript" src="AdminLTE/assets/js/page/manage_upload_pic_award.js"></script>