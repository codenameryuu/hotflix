const customDatepicker = document.querySelectorAll(".custom-datepicker");
const customDatetimepicker = document.querySelectorAll(".custom-datetimepicker");
const customTimepicker = document.querySelectorAll(".custom-timepicker");

if (customDatepicker) {
  customDatepicker.forEach(function (element) {
    element.flatpickr({
      locale: "id",
      altInput: true,
      dateFormat: "Y-m-d",
      altFormat: "j F Y",
      disableMobile: "true",
    });
  });
}

if (customDatetimepicker) {
  customDatetimepicker.forEach(function (element) {
    element.flatpickr({
      locale: "id",
      enableTime: true,
      altInput: true,
      dateFormat: "Y-m-d H:i",
      altFormat: "j F Y H:i",
      disableMobile: "true",
    });
  });
}

if (customTimepicker) {
  customTimepicker.forEach(function (element) {
    element.flatpickr({
      locale: "id",
      enableTime: true,
      noCalendar: true,
      altInput: true,
      dateFormat: "H:i",
      altFormat: "H:i",
      time_24hr: true,
      disableMobile: "true",
    });
  });
}
