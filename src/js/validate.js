// function thongbaoloi(element, msg) {
//     document.getElementById(element).innerHTML = msg;
// }

// function validateBooking() {
//     var ngay_vao = document.forms.ngay_vao.value;
//     var ngay_tra = document.forms.ngay_tra.value;
//     var nguoi_lon = document.forms.nguoi_lon.value;
//     var tre_em = document.forms.tre_em.value;
   
//     var ok = true;
//     if (ngay_vao == "") {
//         thongbaoloi("loingayvao", "Không được để trống");
//         ok = false;
//     } else {
//         thongbaoloi("loingayvao", "");
//     }
//     if (ngay_tra == "") {
//         thongbaoloi("loingaytra", "Không được để trống");
//         ok = false;
//     } else {
//         thongbaoloi("loingaytra", "");
//     }
//     if (nguoi_lon== "") {
//         thongbaoloi("loinguoilon", "Không được để trống");
//         ok = false;
//     } else {
//         thongbaoloi("loinguoilon", "");
//     }
//     if (tre_em== "") {
//         thongbaoloi("loitreem", "Không được để trống");
//         ok = false;
//     } else {
//         thongbaoloi("loitreem", "");
//     }
    
//     if (ok == true) {
//         return true;
//     } else {
//         return false;
//     }
// }