<aside>
    <form action="index.php?ctr=room-search" method="POST" enctype="multipart/form-data">
        <div class="form-group-check">
            Check in
            <input name="ngay_vao" id="myID">
        </div>
        <div class="form-group-check">
            Check out
            <input name="ngay_tra" id="myID">
        </div>
        <div class="form-group">
            Người lớn
            <select name="nguoi_lon" id="">
                <option value="" selected hidden>No of Adults</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
        </div>
        <div class="form-group">
            Trẻ em
            <select name="tre_em" id="">
                <option value="" selected hidden>No of Children</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
        </div>
        <input type="submit" name="search" value="Check">
    </form>
</aside>