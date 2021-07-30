
<!-- Modal -->
<div class="modal fade" id="modaladdcars" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลยานพาหนะ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form action="" id="insert-form" method="post" enctype="multipart/form-data">
      <input type="hidden" id="id" name="id" class="form-control">
<div class="modal-body">
        <div class="mb-3 row">
            <label for="car_regis" class="col-sm-4 col-form-label">หมายเลขทะเบียน : <span style="color:red">*</span></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="car_regis" id="car_regis" value="" required>
                </div>
        </div>
        <div class="mb-3 row">
            <label for="car_brand" class="col-sm-4 col-form-label">ยี่ห้อยานพาหนะ : <span style="color:red">*</span></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-md" name="car_brand" id="car_brand" value="" required>
                </div>
        </div>
        <div class="mb-3 row">
            <label for="car_status" class="col-sm-4 col-form-label">สถานะ : <span style="color:red">*</span></label>
                <div class="col-sm-8">
                    <select class="form-select form-select-md" aria-label=".form-select-md example" name="car_status" id="car_status" required>
                        <option selected disabled>-- เลือกสถานะ --</option>
                        <option value="online">พร้อมใช้งาน </option>
                        <option value="offline">ไม่พร้อมใช้งาน </option>
                    </select>
                </div>
        </div>
</div>


      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button> -->
        <button type="submit" id="insert" class="btn btn-primary">บันทึกข้อมูล</button>
      </div>
      </form>
    </div>
  </div>
</div>