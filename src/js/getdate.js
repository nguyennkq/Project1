// flatpickr("#check_in_date", {
//     dateFormat: "Y-m-d",
//     allowInput: true
// });
// flatpickr("#check_out_date", {
//     dateFormat: "Y-m-d",
//     allowInput: true
// });

// var check_in = flatpickr("#check_in_date", { minDate: new Date() });
// var check_out = flatpickr("#check_out_date", { minDate: new Date() });

// check_in.set("onChange", function(d) { 
//     check_out.set("minDate", d.fp_incr(1)); //increment by one day
// });
// check_out.set("onChange", function(d) { 
//     check_in.set("maxDate", d); 
// });
check_in_date = flatpickr("#check_in_date", {
    onChange: function(selectedDates) {
        check_out_date.set('minDate', selectedDates[0]);
    }
});
    
check_out_date = flatpickr("#check_out_date", {});