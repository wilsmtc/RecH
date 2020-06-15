
var f=new Date();
var a=f.getFullYear();
var m=f.getMonth()+1;
var d=f.getDate();
    m=(m<10)?"0"+m:m;
    d=(d<10)?"0"+d:d;
var fechaactual=a+"-"+m+"-"+d;
$('#fecha_ing').flatpickr({
    dateFormat: "Y-m-d",
    minDate: "1960-01-01",
    maxDate: fechaactual
});
$('#fecha_ini').flatpickr({
    dateFormat: "Y-m-d",
    minDate: "1960-01-01",
    maxDate: fechaactual
});