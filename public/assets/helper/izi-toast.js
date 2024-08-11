function notifyInfo(message) {
  iziToast.show({
    icon: "ti ti-alert-circle-filled",
    iconColor: "#ffffff",
    title: "Info",
    titleColor: "#ffffff",
    message: message,
    messageColor: "#ffffff",
    progressBar: true,
    progressBarColor: "#ffffff",
    backgroundColor: "radial-gradient(circle at 12.3% 19.3%, rgb(85, 88, 218) 0%, rgb(95, 209, 249) 100.2%)",
    position: "topRight",
    layout: 2,
  });
}

function notifySuccess(message) {
  iziToast.show({
    icon: "ti ti-circle-check-filled",
    iconColor: "#ffffff",
    title: "Sukses",
    titleColor: "#ffffff",
    message: message,
    messageColor: "#ffffff",
    progressBar: true,
    progressBarColor: "#ffffff",
    backgroundColor: "linear-gradient(135deg, rgb(121, 241, 164) 10%, rgb(14, 92, 173) 100%)",
    position: "topRight",
    layout: 2,
  });
}

function notifyDanger(message) {
  iziToast.show({
    icon: "ti ti-circle-x-filled",
    iconColor: "#ffffff",
    title: "Eror",
    titleColor: "#ffffff",
    message: message,
    messageColor: "#ffffff",
    progressBar: true,
    progressBarColor: "#ffffff",
    backgroundColor: "linear-gradient(to right, rgb(255, 65, 108), rgb(255, 75, 43))",
    position: "topRight",
    layout: 2,
  });
}
