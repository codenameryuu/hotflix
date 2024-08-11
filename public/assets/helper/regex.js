$(".regex-number").keypress(function (event) {
  const regExp = /^[0-9]+$/i;

  if (regExp.test(event.key)) {
    return true;
  }

  return false;
});

$(".regex-float").keypress(function (event) {
  const regExp = /^[0-9]*\,?[0-9]*$/i;

  if (regExp.test(event.key)) {
    return true;
  }

  return false;
});

function isEmail(email) {
  let regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function formatNumber(element) {
  let value = element.value;

  if (value) {
    value = value.replaceAll(".", "");
    const result = value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

    element.value = result;
  }
}
