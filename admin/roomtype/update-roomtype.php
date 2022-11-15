<h1>Cập nhật loại phòng</h1>
<form action="index.php?ctr=add-roomtype" method="post" enctype="multipart/form-data">
    <div class="form-control">
        <label for="">Id loại phòng</label>
        <input type="text" placeholder="Id loại phòng" disabled>
    </div>
    <div class="form-control">
        <label for="">Tên loại phòng</label>
        <input type="text" placeholder="Tên loại phòng">
    </div>
    <div class="form-control">
        <label for="">Hình ảnh</label>
        <input type="file">
    </div>
    <input type="button" value="Cập nhật">
    <input type="reset" value="Nhập lại">
    <a href="index.php?ctr=list-roomtype"><input type="button" value="Danh sách loại phòng"></a>
</form>