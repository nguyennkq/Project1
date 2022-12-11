<aside>
    <form action="index.php?ctr=room-search" method="POST" enctype="multipart/form-data">
        <div class="form-group-check">
            Check in
            <input name="ngay_vao" id="check_in_date"  data-min-date=today placeholder="Checkin" value="<?php if (isset($ngay_vao)) echo $ngay_vao ?>">
        </div>
        <div class="form-group-check">
            Check out
            <input name="ngay_tra" id="check_out_date"  data-min-date=today placeholder="Checkout" value="<?php if (isset($ngay_tra)) echo $ngay_tra ?>">
        </div>
        <div class="form-group">
            Người lớn
            <select name="nguoi_lon" id="nguoi_lon">
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
            <select name="tre_em" id="tre_em">
                <option value="0">0</option>
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